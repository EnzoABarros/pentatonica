<?php

class Cliente {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../../core/Database.php';
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function cadastrar($nome, $email, $cpf, $senha) {
        $tipo = "cliente";
        if ($this->existeEmail($email)) {
            return "email";
        }

        if ($this->existeCpf($cpf)) {
            return "cpf";
        }

        $sql = "INSERT INTO tb_usuarios (nome, email, cpf, senha, tipo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt->bind_param("sssss", $nome, $email, $cpf, $senhaHash, $tipo);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    private function existeEmail($email) {
        $sql = "SELECT id FROM tb_usuarios WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        return $stmt->num_rows > 0;
    }

    private function existeCpf($cpf) {
        $sql = "SELECT id FROM tb_usuarios WHERE cpf = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $cpf);
        $stmt->execute();
        $stmt->store_result();

        return $stmt->num_rows > 0;
    }

        public static function sair() {
        session_start();
        session_unset();
        session_destroy();
    }

    public function login($email, $senha, $tipo) {
        $sql = "SELECT id, nome, email, senha, endereco FROM tb_usuarios WHERE email = ? AND tipo = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $email, $tipo);
        $stmt->execute();
        $stmt->store_result();
    
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $nome, $email, $senhaHash, $endereco);
            $stmt->fetch();
    
            if (password_verify($senha, $senhaHash)) {
                return ['id' => $id, 'nome' => $nome, 'email' => $email, 'tipo' => $tipo, 'endereco' => $endereco];
            }
        }
    
        return false;
    }

    public function buscarPorId($id) {
    $sql = "SELECT id, nome, email, endereco FROM tb_usuarios WHERE id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        return $resultado->fetch_object();
    }

    return null;
}

        public function salvarEmail($novoEmail, $idCliente) {
            $sql = "UPDATE tb_usuarios SET email = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("si", $novoEmail, $idCliente);
            $stmt->execute();
            
        }

        public function salvarEndereco($novoEndereco, $idCliente) {
            $sql = "UPDATE tb_usuarios SET endereco = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("si", $novoEndereco, $idCliente);
            $stmt->execute();
            
        }
    
    
}
