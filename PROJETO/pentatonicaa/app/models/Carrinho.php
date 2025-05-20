<?php 

class Carrinho {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../../core/Database.php';
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function adicionarCarrinho($id_usuario, $id_guitarra, $quantidade) {
        $sql_verifica = "SELECT quantidade FROM tb_carrinho WHERE id_usuario = ? AND id_guitarra = ?";
        $stmt = $this->db->prepare($sql_verifica);
        $stmt->bind_param("ii", $id_usuario, $id_guitarra);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $novaQuantidade = $row['quantidade'] + $quantidade;
    
            $sql_update = "UPDATE tb_carrinho SET quantidade = ? WHERE id_usuario = ? AND id_guitarra = ?";
            $stmt = $this->db->prepare($sql_update);
            $stmt->bind_param("iii", $novaQuantidade, $id_usuario, $id_guitarra);
            return $stmt->execute();
    
        } else {
            $sql_insert = "INSERT INTO tb_carrinho (id_usuario, id_guitarra, quantidade) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($sql_insert);
            $stmt->bind_param("iii", $id_usuario, $id_guitarra, $quantidade);
            return $stmt->execute();
        }
    }
    

    public function listarCarrinho($id_usuario) {
        $sql = "
            SELECT 
                c.id,
                c.id_usuario,
                c.id_guitarra,
                c.quantidade,
                g.modelo AS guitarra_modelo,
                g.marca AS guitarra_marca,
                g.preco AS guitarra_preco,
                g.descricao AS guitarra_descricao,
                g.categoria AS guitarra_categoria,
                g.modo AS guitarra_modo,
                g.url_imagem AS guitarra_imagem
            FROM tb_carrinho c
            JOIN tb_guitarra g ON c.id_guitarra = g.id
            WHERE c.id_usuario = ?";
            
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $carrinho = array();
        while ($row = $result->fetch_assoc()) {
            $carrinho[] = $row;
        }
    
        return $carrinho;
    }
    

    public function removerCarrinho($id_usuario, $id_guitarra) {
        $sql = "DELETE FROM tb_carrinho WHERE id_usuario = ? AND id_guitarra = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ii", $id_usuario, $id_guitarra);
        return $stmt->execute();
    }
    

    
}
