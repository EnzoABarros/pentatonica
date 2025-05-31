<?php

require_once __DIR__ . '/../models/Guitarra.php';
require_once __DIR__ . '/../models/Carrinho.php';

class CarrinhoController {

    public function __construct() {
        session_start();
    }

    public function carrinho() {
        $carrinhoModel = new Carrinho();
        $itensCarrinho = $carrinhoModel->listarCarrinho($_SESSION['usuario']['id']);
        require_once __DIR__ . '/../views/pages/carrinho.php';
    }

    public function adicionarCarrinho() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $carrinhoModel = new Carrinho();
            $guitarraModel = new Guitarra();
            $guitarra = $guitarraModel->buscarPorId($id);
            $carrinhoModel->adicionarCarrinho($_SESSION['usuario']['id'], $guitarra['id'], 1);
            header("Location: /pentatonicaa/PROJETO/pentatonicaa/public/carrinho");
            exit;
        } else {
            header("Location: /pentatonicaa/PROJETO/pentatonicaa/public/guitarras");
            exit;
        }
    }

    public function removerCarrinho() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $carrinhoModel = new Carrinho();
            $carrinhoModel->removerCarrinho($_SESSION['usuario']['id'], $id);
            header("Location: /pentatonicaa/PROJETO/pentatonicaa/public/carrinho");
            exit;
        } else {
            header("Location: /pentatonicaa/PROJETO/pentatonicaa/public/guitarras");
            exit;
        }
    }
}
