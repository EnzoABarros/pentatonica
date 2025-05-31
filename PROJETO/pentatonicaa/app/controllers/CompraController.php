<?php

require_once __DIR__ . '/../models/Pagamento.php';

class CompraController
{
    private $accessToken = 'APP_USR-8947115096969728-051817-32ecb5c76da8feec8a0cf1f77b30e91c-2447049530';
    private $urlBase = "https://f137-2804-34c0-6e04-3e01-f5eb-8001-8b7e-921a.ngrok-free.app/pentatonicaa/PROJETO/pentatonicaa/public";

    public function comprar()
    {
        session_start();

        if (!isset($_POST['itens']) || empty($_POST['itens'])) {
            echo "<script>alert('Carrinho vazio ou dados inválidos.');</script>";
            echo '<script>history.go(-1);</script>';
            exit;
        }

        $itens = $_POST['itens'];
        $idUsuario = $_SESSION['usuario']['id'] ?? null;
        $emailUsuario = $_SESSION['usuario']['email'] ?? null;

        $itensMP = [];
        $itensParaBanco = [];
        $total = 0;

        foreach ($itens as $item) {
            $idGuitarra = (int)$item['id_guitarra'];
            $modelo = htmlspecialchars($item['modelo']);
            $marca = htmlspecialchars($item['marca']);
            $quantidade = (int)$item['quantidade'];
            $preco = (float)$item['preco'];
            $totalItem = $quantidade * $preco;

            $itensMP[] = [
                "title" => "$modelo ($marca)",
                "quantity" => $quantidade,
                "unit_price" => $preco
            ];

            $itensParaBanco[] = [
                'id_guitarra' => $idGuitarra,
                'modelo' => $modelo,
                'marca' => $marca,
                'quantidade' => $quantidade,
                'preco_unitario' => $preco,
                'total_item' => $totalItem
            ];

            $total += $totalItem;
        }

        $dados = [
            "items" => $itensMP,
            "back_urls" => [
                "success" => "{$this->urlBase}/retorno",
                "failure" => "{$this->urlBase}/erro",
                "pending" => "{$this->urlBase}/aguardando"
            ],
            "auto_return" => "approved",
            "notification_url" => "{$this->urlBase}/notificacao",
            "metadata" => [
                "id_usuario" => $idUsuario,
                "email" => $emailUsuario,
                "carrinho" => json_encode($itensParaBanco),
                "tipo" => "carrinho"
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
            echo "Erro ao gerar link de pagamento.";
            header("Location: {$this->urlBase}/guitarras");
            exit;
        }
    }

    public function retorno()
    {
        echo "Pagamento processado. Aguarde a confirmação via e-mail.";
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
            $dataPagamento = $pagamento['date_approved'] ?? date('Y-m-d H:i:s');
            $tipo = $pagamento['metadata']['tipo'] ?? null;

            $pagamentoModel = new Pagamento();

            if ($tipo === 'carrinho') {
                $carrinho = json_decode($pagamento['metadata']['carrinho'], true);

                $pagamentoModel->salvarPagamentoAprovado(
                    $paymentId,
                    "Carrinho",
                    $preco,
                    $email,
                    $idUsuario,
                    $dataPagamento,
                    "carrinho"
                );

                if (!empty($carrinho)) {
                    $pagamentoModel->salvarItensCarrinho($paymentId, $carrinho);
                }

                file_put_contents($logPath, "Pagamento de carrinho salvo: $paymentId\n", FILE_APPEND);
            } else {
                $tipoPagamento = (str_contains($titulo, 'Leilão')) ? 'leilao' : 'compra';

                $pagamentoModel->salvarPagamentoAprovado(
                    $paymentId,
                    $titulo,
                    $preco,
                    $email,
                    $idUsuario,
                    $dataPagamento,
                    $tipoPagamento
                );

                file_put_contents($logPath, "Pagamento simples salvo: $paymentId\n", FILE_APPEND);
            }

            echo "Pagamento registrado com sucesso.";
        } else {
            file_put_contents($logPath, "Pagamento via webhook não aprovado.\n", FILE_APPEND);
            echo "Pagamento não aprovado ou inválido.";
        }

        http_response_code(200);
    }

    public function erro()
    {
        echo "Ocorreu um problema na finalização do pagamento. Por favor, tente novamente.";
    }

    public function aguardando()
    {
        echo "Seu pagamento está sendo processado. Por favor, aguarde a confirmação.";
    }
}
