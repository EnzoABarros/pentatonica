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


}