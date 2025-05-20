<?php

class Pagamento {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../../core/Database.php';
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function salvarPagamentoAprovado($id_pagamento, $titulo, $preco, $email, $id_usuario = null, $data_pagamento = null) {
        $sql_verifica = "SELECT id_pagamento FROM tb_pagamentos WHERE id_pagamento = ?";
        $stmt = $this->db->prepare($sql_verifica);
        $stmt->bind_param("s", $id_pagamento);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->close();
            return false;
        }
        $stmt->close();

        if (!$data_pagamento) {
            $data_pagamento = date('Y-m-d H:i:s');
        }

        $sql = "INSERT INTO tb_pagamentos (id_pagamento, titulo, preco, email, status, id_usuario, data_pagamento) 
                VALUES (?, ?, ?, ?, 'aprovado', ?, ?)";
        $stmt = $this->db->prepare($sql);

        if ($id_usuario === null) {
            $null = null;
            $stmt->bind_param("ssdsss", $id_pagamento, $titulo, $preco, $email, $null, $data_pagamento);
        } else {
            $stmt->bind_param("ssdsss", $id_pagamento, $titulo, $preco, $email, $id_usuario, $data_pagamento);
        }

        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }
}
