<?php

require_once __DIR__ . '/../models/Cliente.php';

class LoginController {
    public function form() {
        require_once __DIR__ . '/../views/pages/login.php';
    }

    public function login() {
        $partes = explode('/', $_SERVER['REQUEST_URI']);
        $ultima = end($partes);

        if ($ultima === 'logarAdm') {
            $tipo = 'adm';
        } else {
            $tipo = 'cliente';
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';
    
            if (empty($email) || empty($senha)) {
                echo "<script>alert('Preencha todos os campos.'); history.back();</script>";
                return;
            }
    
            $cliente = new Cliente();
            $usuario = $cliente->login($email, $senha, $tipo);
    
            if ($usuario) {
                session_start();
                $_SESSION['usuario'] = $usuario;
    
                header("Location: /pentatonicaa/PROJETO/pentatonicaa/public/");
                exit;
            } else {
                echo "<script>alert('Credenciais inválidas. Verifique seu email e senha.'); history.back();</script>";
                return;
            }
        } else {
            echo "<script>alert('Método inválido.'); history.back();</script>";
        }
    }
    
}
