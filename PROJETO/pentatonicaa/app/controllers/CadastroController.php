<?php

require_once __DIR__ . '/../models/Cliente.php';

class CadastroController {
    public function form()
    {
        require_once __DIR__ . '/../views/pages/cadastro.php';
    }

    public function cadastrar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
    
            $nome = $_POST['nome'] ?? '';
            $email = $_POST['email'] ?? '';
            $cpf = $_POST['cpf'] ?? '';
            $senha = $_POST['senha'] ?? '';
            $confirmar_senha = $_POST['confirmar_senha'] ?? '';
    
            if ($senha !== $confirmar_senha) {
                echo "<script>alert('As senhas não conferem.'); history.back();</script>";
                return;
            }
    
            $cliente = new Cliente();
            $resultado = $cliente->cadastrar($nome, $email, $cpf, $senha);
            $usuario = $cliente->login($email, $senha, 'cliente');
    
            if ($resultado === true) {
                $_SESSION['usuario'] = $usuario;
    
                header("Location: /pentatonicaa/PROJETO/pentatonicaa/public/");
                exit;
            } elseif ($resultado === "email") {
                echo "<script>alert('Este e-mail já está em uso.'); history.back();</script>";
            } elseif ($resultado === "cpf") {
                echo "<script>alert('Este CPF já está em uso.'); history.back();</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar. Tente novamente.'); history.back();</script>";
            }
        } else {
            echo "<script>alert('Método inválido.'); history.back();</script>";
        }
    }
    
}
