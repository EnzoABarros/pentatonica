<?php

require_once __DIR__ . '/../models/Cliente.php';

class AreaClienteController
{
    public function areaCliente()
    {
        require_once __DIR__ . '/../views/pages/areaCliente.php';
    }

    public function atualizarEmail()
    {
        session_start();
        $idCliente = $_SESSION['usuario']['id'];

        $novoEmail = $_POST['email'];

        $clienteModel = new Cliente();
        $cliente = $clienteModel->buscarPorId($idCliente);

        if ($cliente) {
            $cliente->email = $novoEmail;
            $clienteModel->salvarEmail($novoEmail, $idCliente);
            $_SESSION['usuario']['email'] = $novoEmail;
            header('Location: /pentatonicaa/PROJETO/pentatonicaa/public/area-cliente');
            exit();
        }
    }

    public function atualizarEndereco()
    {
        session_start();
        $idCliente = $_SESSION['usuario']['id'];

        $novoEndereco = $_POST['endereco'];

        $clienteModel = new Cliente();
        $cliente = $clienteModel->buscarPorId($idCliente);

        if ($cliente) {
            $cliente->email = $novoEndereco;
            $clienteModel->salvarEndereco($novoEndereco, $idCliente);
            $_SESSION['usuario']['endereco'] = $novoEndereco;
            header('Location: /pentatonicaa/PROJETO/pentatonicaa/public/area-cliente');
            exit();
        }
    }

    public function index()
    {
        session_start();
        $idCliente = $_SESSION['usuario'];

        $clienteModel = $this->loadModel('Cliente');
        $cliente = $clienteModel->findById($idCliente);

        $compraModel = $this->loadModel('Compra');
        $historico = $compraModel->getComprasPorCliente($idCliente);

        $leilaoModel = $this->loadModel('Leilao');
        $leiloesAtivos = $leilaoModel->getLeiloesAtivosPorCliente($idCliente);

        $this->render('areaCliente', [
            'cliente' => $cliente,
            'historico' => $historico,
            'leiloesAtivos' => $leiloesAtivos
        ]);
    }

}
