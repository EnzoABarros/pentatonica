<?php

class Pagamento {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../../core/Database.php';
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function salvarPagamentoAprovado($id_pagamento, $titulo, $preco, $email, $id_usuario = null, $data_pagamento = null, $tipo_pagamento = 'compra') {
        $sql = "SELECT COUNT(*) as total FROM tb_pagamentos WHERE id_pagamento = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $id_pagamento);
        $stmt->execute();
        $result = $stmt->get_result();
        $dados = $result->fetch_assoc();

        if ($dados['total'] > 0) {
            echo "[!] Pagamento já salvo anteriormente.\n";
            return;
        }

        $sql = "INSERT INTO tb_pagamentos 
                (id_pagamento, titulo, preco, email, status, id_usuario, data_pagamento, tipo_pagamento) 
                VALUES (?, ?, ?, ?, 'aprovado', ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        $stmt->bind_param("ssdssss", $id_pagamento, $titulo, $preco, $email, $id_usuario, $data_pagamento, $tipo_pagamento);

        if ($stmt->execute()) {
            echo "[✔] Pagamento salvo com sucesso: $id_pagamento\n";
        } else {
            echo "[✖] Erro ao salvar pagamento: " . $stmt->error . "\n";
        }
    }
}
