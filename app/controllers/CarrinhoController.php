<?php

require_once __DIR__ . '/../models/Guitarra.php';
require_once __DIR__ . '/../models/Carrinho.php';

class CarrinhoController {


    public function carrinho() {
        session_start();
        $carrinhoModel = new Carrinho();
        $itensCarrinho = $carrinhoModel->listarCarrinho($_SESSION['usuario']['id']);
        require_once __DIR__ . '/../views/pages/carrinho.php';
    }

    public function adicionarCarrinho() {
        session_start();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $carrinhoModel = new Carrinho();
            $guitarraModel = new Guitarra();
            $guitarra = $guitarraModel->buscarPorId($id);
            $carrinhoModel->adicionarCarrinho($_SESSION['usuario']['id'], $guitarra['id'], 1);
            header("Location: /pentatonicaa/public/carrinho");
            exit;
        } else {
            header("Location: /pentatonicaa/public/guitarras");
            exit;
        }
    }

    public function removerCarrinho() {
        session_start();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $carrinhoModel = new Carrinho();
            $carrinhoModel->removerCarrinho($_SESSION['usuario']['id'], $id);
            header("Location: /pentatonicaa/public/carrinho");
            exit;
        } else {
            header("Location: /pentatonicaa/public/guitarras");
            exit;
        }
    }
    
}
