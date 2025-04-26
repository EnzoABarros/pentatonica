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

}