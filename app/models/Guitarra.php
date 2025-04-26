<?php 

class Guitarra {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../../core/Database.php';
        $database = new Database();
        $this->db = $database->getConnection();
    }


    public function cadastrar($modelo, $marca, $preco, $descricao, $categoria, $modo, $url_imagem) {
        $sql = "INSERT INTO tb_guitarra (modelo, marca, preco, descricao, categoria, modo, url_imagem) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssdssss", $modelo, $marca, $preco, $descricao, $categoria, $modo, $url_imagem);
    
        return $stmt->execute();
    }
    
    

    public function listarGuitarras($modo) {
        $sql = "SELECT * FROM tb_guitarra WHERE modo = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $modo);
        $stmt->execute();
        $result = $stmt->get_result();

        $guitarras = array();
        while ($row = $result->fetch_assoc()) {
            $guitarras[] = $row;
        }

        return $guitarras;
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM tb_guitarra WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function filtrar($filtrosGet) {
        $sql = "SELECT * FROM tb_guitarra WHERE 1=1";
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
            $sql .= " AND preco <= ?";
            $parametros[] = $filtrosGet['preco'];
            $tipos[] = 'd';
        }
    
        $stmt = $this->db->prepare($sql);
    
        if (!empty($parametros)) {
            $stmt->bind_param(implode('', $tipos), ...$parametros);
        }
    
        $stmt->execute();
        $result = $stmt->get_result();
        $guitarras = [];
    
        while ($row = $result->fetch_assoc()) {
            $guitarras[] = $row;
        }
    
        $stmt->close();
    
        return $guitarras;
    }
    
    
    
}
