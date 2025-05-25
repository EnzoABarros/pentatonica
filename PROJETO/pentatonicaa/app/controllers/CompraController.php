<?php

require_once __DIR__ . '/../models/Pagamento.php';

class CompraController
{
    private $accessToken = 'APP_USR-8947115096969728-051817-32ecb5c76da8feec8a0cf1f77b30e91c-2447049530';
    private $urlBase = "https://b442-2804-34c0-6ed7-1301-a865-e358-fe7f-976a.ngrok-free.app/pentatonicaa/PROJETO/pentatonicaa/public";

    public function comprar()
    {
        session_start();

        if (!isset($_POST['titulo'], $_POST['preco'])) {
            echo "<script>alert('Por favor, preencha todos os dados necessários para a compra.');</script>";
            echo '<script>history.go(-1);</script>';
            exit;
        }

        $titulo = htmlspecialchars($_POST['titulo']);
        $preco = (float) $_POST['preco'];
        $idUsuario = $_SESSION['usuario']['id'] ?? null;
        $emailUsuario = $_SESSION['usuario']['email'] ?? null;

        $dados = [
            "items" => [[
                "title" => $titulo,
                "quantity" => 1,
                "unit_price" => $preco
            ]],
            "back_urls" => [
                "success" => "{$this->urlBase}/retorno",
                "failure" => "{$this->urlBase}/erro",
                "pending" => "{$this->urlBase}/aguardando"
            ],
            "auto_return" => "approved",
            "notification_url" => "{$this->urlBase}/notificacao",
            "metadata" => [
                "id_usuario" => $idUsuario,
                "email" => $emailUsuario
            ]
        ];

        $ch = curl_init("https://api.mercadopago.com/checkout/preferences");
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "Authorization: Bearer {$this->accessToken}"
            ],
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($dados)
        ]);

        $resposta = json_decode(curl_exec($ch), true);
        curl_close($ch);

        if (isset($resposta['init_point'])) {
            header("Location: " . $resposta['init_point']);
            exit;
        } else {
            echo "Não foi possível gerar o link de pagamento no momento. Por favor, tente novamente mais tarde.";
            header("Location: {$this->urlBase}/guitarras");
            exit;
        }
    }

    public function retorno()
    {
        session_start();

        if (!isset($_GET['payment_id'])) {
            echo "<script>alert('Não foi possível identificar o pagamento. Por favor, tente novamente.');</script>";
            header("Location: {$this->urlBase}/guitarras");
            exit;
        }

        $idPagamento = $_GET['payment_id'];

        $ch = curl_init("https://api.mercadopago.com/v1/payments/$idPagamento");
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer {$this->accessToken}"
            ]
        ]);
        $resposta = curl_exec($ch);
        curl_close($ch);

        $pagamento = json_decode($resposta, true);

        if (isset($pagamento['status']) && $pagamento['status'] === 'approved') {
            $titulo = $pagamento['additional_info']['items'][0]['title'] ?? 'Produto';
            $preco = $pagamento['transaction_amount'];
            $email = $pagamento['metadata']['email'] ?? '';
            $idUsuario = $pagamento['metadata']['id_usuario'] ?? null;
            $dataPagamento = date('Y-m-d H:i:s');

            $pagamentoModel = new Pagamento();
            $salvo = $pagamentoModel->salvarPagamentoAprovado($idPagamento, $titulo, $preco, $email, $idUsuario, $dataPagamento);

            if ($salvo) {
                echo "<script>alert('Pagamento aprovado com sucesso! Obrigado pela sua compra.');</script>";
                echo "Pagamento aprovado e registrado com sucesso.";
                header("Location: {$this->urlBase}/guitarras");            
                exit;

            } else {
                echo "<script>alert('Este pagamento já foi registrado anteriormente.');</script>";
                header("Location: {$this->urlBase}/guitarras");
                exit;
            }
        } else {
            echo "<script>alert('O pagamento não foi aprovado. Por favor, verifique e tente novamente.');</script>";
            header("Location: {$this->urlBase}/guitarras");
            exit;

            
        }
    }

    public function webhook()
    {
        $json = file_get_contents('php://input');
        $logPath = __DIR__ . '/../../public/webhook_log.txt';

        file_put_contents($logPath, "\n==== NOVA REQUISIÇÃO ====\n", FILE_APPEND);
        file_put_contents($logPath, $json . "\n", FILE_APPEND);

        $notificacao = json_decode($json, true);

        if (!$notificacao) {
            http_response_code(400);
            echo "Requisição inválida.";
            return;
        }

        ob_start();
        print_r($notificacao);
        file_put_contents($logPath, ob_get_clean() . "\n", FILE_APPEND);

        $paymentId = $notificacao['data']['id'] ?? ($notificacao['resource'] ?? null);

        if (isset($notificacao['topic']) && $notificacao['topic'] === 'merchant_order') {
            file_put_contents($logPath, "Pedido do comerciante recebido. Ignorado.\n", FILE_APPEND);
            http_response_code(200);
            echo "Pedido do comerciante ignorado.";
            return;
        }

        if (!$paymentId) {
            http_response_code(400);
            echo "Requisição inválida: ID do pagamento não encontrado.";
            return;
        }

        $ch = curl_init("https://api.mercadopago.com/v1/payments/$paymentId");
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer {$this->accessToken}"
            ]
        ]);
        $resposta = curl_exec($ch);
        curl_close($ch);

        $pagamento = json_decode($resposta, true);

        if (isset($pagamento['status']) && $pagamento['status'] === 'approved') {
            $titulo = $pagamento['additional_info']['items'][0]['title'] ?? 'Produto';
            $preco = $pagamento['transaction_amount'];
            $email = $pagamento['metadata']['email'] ?? '';
            $idUsuario = $pagamento['metadata']['id_usuario'] ?? null;
            $dataPagamento = date('Y-m-d H:i:s');

            $pagamentoModel = new Pagamento();
            $pagamentoModel->salvarPagamentoAprovado($paymentId, $titulo, $preco, $email, $idUsuario, $dataPagamento);

            file_put_contents($logPath, "Pagamento via webhook registrado: $paymentId\n", FILE_APPEND);
            echo "Pagamento registrado com sucesso.";
        } else {
            file_put_contents($logPath, "Pagamento via webhook não aprovado.\n", FILE_APPEND);
            echo "Pagamento não aprovado ou inválido.";
        }

        http_response_code(200);
    }

    public function erro() {
        echo "Ocorreu um problema na finalização do pagamento. Por favor, tente novamente.";
    }

    public function aguardando() {
        echo "Seu pagamento está sendo processado. Por favor, aguarde a confirmação.";
    }
}
