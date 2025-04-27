<?php

class Cliente {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../../core/Database.php';
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function cadastrar($nome, $email, $cpf, $senha) {
        if ($this->existeEmail($email)) {
            return "email";
        }

        if ($this->existeCpf($cpf)) {
            return "cpf";
        }

        $sql = "INSERT INTO tb_usuarios (nome, email, cpf, senha) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt->bind_param("ssss", $nome, $email, $cpf, $senhaHash);

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
        $sql = "SELECT id, nome, email, senha FROM tb_usuarios WHERE email = ? AND tipo = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $email, $tipo);
        $stmt->execute();
        $stmt->store_result();
    
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $nome, $email, $senhaHash);
            $stmt->fetch();
    
            if (password_verify($senha, $senhaHash)) {
                return ['id' => $id, 'nome' => $nome, 'email' => $email, 'tipo' => $tipo];
            }
        }
    
        return false;
    }
    
}
