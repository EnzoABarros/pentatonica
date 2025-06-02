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

        public function salvarItensCarrinho($idPagamento, $itens)
    {
        $sql = "INSERT INTO tb_pagamento_carrinho 
                (id_pagamento, id_guitarra, modelo, marca, preco_unitario, quantidade, total_item)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        foreach ($itens as $item) {
            $stmt = $this->db->prepare($sql);

            $idGuitarra = (int)$item['id_guitarra'];
            $modelo = $item['modelo'];
            $marca = $item['marca'];
            $precoUnitario = (float)$item['preco_unitario'];
            $quantidade = (int)$item['quantidade'];
            $totalItem = $precoUnitario * $quantidade;

            $stmt->bind_param(
                "sissdid",
                $idPagamento,
                $idGuitarra,
                $modelo,
                $marca,
                $precoUnitario,
                $quantidade,
                $totalItem
            );

            if (!$stmt->execute()) {
                echo "[✖] Erro ao salvar item do carrinho: " . $stmt->error . "\n";
            } else {
                echo "[✔] Item salvo: $modelo x $quantidade\n";
            }

            $stmt->close();
        }
    }
    public function getPagamentosPorCliente($idCliente) {
        $sql = "SELECT titulo, preco, status, data_pagamento, tipo_pagamento 
                FROM tb_pagamentos 
                WHERE id_usuario = ? 
                ORDER BY data_pagamento DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $idCliente);
        $stmt->execute();

        $result = $stmt->get_result();

        $pagamentos = [];
        while ($row = $result->fetch_assoc()) {
            $pagamentos[] = $row;
        }

        return $pagamentos;
    }
    public function getVendas() {
        $sql = "SELECT * FROM tb_pagamentos";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();

        $vendas = [];
        while($row = $result->fetch_assoc()) {
            $vendas[] = $row;
        }
        
    return $vendas;
    }
}