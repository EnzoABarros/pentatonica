<?php 

class Leilao {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../../core/Database.php';
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function cadastrarLeilao($modelo, $marca, $preco_inicio, $descricao, $categoria, $modo, $data_fim, $url_imagem) {
        $sql = "INSERT INTO tb_leilao (modelo, marca, preco_inicio, descricao, categoria, modo, data_fim, url_imagem) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssdsssss", $modelo, $marca, $preco_inicio, $descricao, $categoria, $modo, $data_fim, $url_imagem);
    
        return $stmt->execute();
    }

    public function listarLeiloes($filtrosGet) {
        $sql = "SELECT * FROM tb_leilao WHERE 1=1";
        $parametros = [];
        $tipos = [];
        
        if (isset($filtrosGet['modelo']) && is_array($filtrosGet['modelo'])) {
            $placeholders = implode(',', array_fill(0, count($filtrosGet['modelo']), '?'));
            $sql .= " AND modelo IN ($placeholders)";
            foreach ($filtrosGet['modelo'] as $modelo) {
                $parametros[] = $modelo;
                $tipos[] = 's';
            }
        }
        
        if (isset($filtrosGet['marca']) && is_array($filtrosGet['marca'])) {
            $placeholders = implode(',', array_fill(0, count($filtrosGet['marca']), '?'));
            $sql .= " AND marca IN ($placeholders)";
            foreach ($filtrosGet['marca'] as $marca) {
                $parametros[] = $marca;
                $tipos[] = 's';
            }
        }
        
        if (isset($filtrosGet['categoria']) && is_array($filtrosGet['categoria'])) {
            $placeholders = implode(',', array_fill(0, count($filtrosGet['categoria']), '?'));
            $sql .= " AND categoria IN ($placeholders)";
            foreach ($filtrosGet['categoria'] as $categoria) {
                $parametros[] = $categoria;
                $tipos[] = 's';
            }
        }
        
        if (isset($filtrosGet['preco']) && is_numeric($filtrosGet['preco'])) {
            $sql .= " AND preco_inicio <= ?";
            $parametros[] = $filtrosGet['preco'];
            $tipos[] = 'd';
        }

        $stmt = $this->db->prepare($sql);
        
        if (!empty($parametros)) {
            $stmt->bind_param(implode('', $tipos), ...$parametros);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        $leiloes = [];
        
        while ($row = $result->fetch_assoc()) {
            $leiloes[] = $row;
        }
        
        $stmt->close();
        return $leiloes;
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM tb_leilao WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function atualizar($id, $modelo, $marca, $preco_inicio, $descricao, $categoria, $modo, $data_fim, $url_imagem) {
        $sql = "UPDATE tb_leilao SET modelo = ?, marca = ?, preco_inicio = ?, descricao = ?, categoria = ?, modo = ?, data_fim = ?, url_imagem = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssdsssssi", $modelo, $marca, $preco_inicio, $descricao, $categoria, $modo, $data_fim, $url_imagem, $id);
        return $stmt->execute();
    }

    public function removerLeilao($id) {
        $sql = "DELETE FROM tb_leilao WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function atualizarPrecoAtual($id, $novoPreco, $id_usuario, $id_guitarra, $valor_lance) {
        $sql = "UPDATE tb_leilao SET preco_atual = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("di", $novoPreco, $id);
        
        if (!$stmt->execute()) {
            return false;
        }

        $sql_lance = "INSERT INTO tb_lances (id_usuario, id_guitarra, valor_lance) VALUES (?, ?, ?)";
        $stmt_lance = $this->db->prepare($sql_lance);
        $stmt_lance->bind_param("iis", $id_usuario, $id_guitarra, $valor_lance);

        return $stmt_lance->execute();
    }


    public function buscarTop3Lances($id_guitarra) {
        $sql = "SELECT u.nome, l.valor_lance
                FROM tb_lances l
                JOIN tb_usuarios u ON l.id_usuario = u.id
                WHERE l.id_guitarra = ?
                ORDER BY l.valor_lance DESC
                LIMIT 3";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id_guitarra);
        $stmt->execute();

        $resultado = $stmt->get_result();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

}