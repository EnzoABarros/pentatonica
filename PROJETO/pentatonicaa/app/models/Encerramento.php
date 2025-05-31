<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../../../vendor/autoload.php';

class Encerramento {
    private $db;
    private $urlBase = "https://f137-2804-34c0-6e04-3e01-f5eb-8001-8b7e-921a.ngrok-free.app/pentatonicaa/PROJETO/pentatonicaa/public";
    private $accessToken = 'APP_USR-8947115096969728-051817-32ecb5c76da8feec8a0cf1f77b30e91c-2447049530';

    public function __construct() {
        require_once __DIR__ . '/../../core/Database.php';
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function encerrarLeiloesExpirados() {
        date_default_timezone_set('America/Sao_Paulo');
        $agora = date('Y-m-d H:i:s');

        $sqlBusca = "SELECT id FROM tb_leilao WHERE status = 'ativo' AND data_fim <= ?";
        $stmtBusca = $this->db->prepare($sqlBusca);
        $stmtBusca->bind_param("s", $agora);
        $stmtBusca->execute();
        $result = $stmtBusca->get_result();

        $idsEncerrados = [];
        while ($row = $result->fetch_assoc()) {
            $idsEncerrados[] = $row['id'];
        }

        $sql = "UPDATE tb_leilao SET status = 'encerrado' WHERE status = 'ativo' AND data_fim <= ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $agora);

        if ($stmt->execute()) {
            echo "[✔] Leilões encerrados com sucesso às $agora\n";

            foreach ($idsEncerrados as $idLeilao) {
                $this->processarPagamentoVencedor($idLeilao);
            }
        } else {
            echo "[✖] Erro ao encerrar leilões: " . $stmt->error . "\n";
        }
    }

    private function processarPagamentoVencedor($idLeilao) {
        $sql = "SELECT u.email, u.id, l.valor_lance, le.modelo 
                FROM tb_lances l
                JOIN tb_usuarios u ON l.id_usuario = u.id
                JOIN tb_leilao le ON l.id_guitarra = le.id
                WHERE l.id_guitarra = ?
                ORDER BY l.valor_lance DESC
                LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $idLeilao);
        $stmt->execute();
        $result = $stmt->get_result();
        $dados = $result->fetch_assoc();

        if (!$dados) {
            echo "[!] Nenhum lance encontrado para o leilão ID $idLeilao\n";
            return;
        }

        $email = $dados['email'];
        $idUsuario = $dados['id'];
        $valor = (float) $dados['valor_lance'];
        $modelo = $dados['modelo'];

        $dadosPagamento = [
            "items" => [[
                "title" => "Guitarra: $modelo (Leilão)",
                "quantity" => 1,
                "unit_price" => $valor
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
                "email" => $email
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
            CURLOPT_POSTFIELDS => json_encode($dadosPagamento)
        ]);

        $resposta = json_decode(curl_exec($ch), true);
        curl_close($ch);

        if (!isset($resposta['init_point'])) {
            echo "[✖] Erro ao gerar link de pagamento para o vencedor.\n";
            return;
        }

        $linkPagamento = $resposta['init_point'];

        $mensagemHTML = "
            <p>Olá!</p>
            <p>Você venceu o leilão da guitarra <strong>$modelo</strong>.</p>
            <p>Clique no link abaixo para finalizar sua compra:<br>
            <a href='$linkPagamento'>$linkPagamento</a></p>
            <p>Obrigado!</p>
        ";

        $this->enviarEmail($email, "Parabéns! Você venceu o leilão!", $mensagemHTML);
    }

    private function enviarEmail($destinatario, $assunto, $mensagemHTML) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'vsoaressilva06@gmail.com';
            $mail->Password = 'gfre dpgj hplh mppc';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('vsoaressilva06@gmail.com', 'Pentatonica');
            $mail->addAddress($destinatario);

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = $assunto;
            $mail->Body    = $mensagemHTML;
            $mail->AltBody = strip_tags(str_replace("<br>", "\n", $mensagemHTML));

            $mail->send();
            echo "[✔] Link de pagamento enviado para $destinatario\n";

        } catch (Exception $e) {
            echo "[✖] Erro ao enviar e-mail para $destinatario: {$mail->ErrorInfo}\n";
        }
    }
}
