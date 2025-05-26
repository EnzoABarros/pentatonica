<?php
class AreaClienteController
{
    public function areaCliente()
    {
        require_once __DIR__ . '/../views/pages/areaCliente.php';
    }

    public function atualizarEmail()
    {
        session_start();
        $idCliente = $_SESSION['usuario'];

        $novoEmail = $_POST['email'];

        $clienteModel = $this->loadModel('Cliente');
        $cliente = $clienteModel->findById($idCliente);

        if ($cliente) {
            $cliente->email = $novoEmail;
            $cliente->save();
            header('Location: /areaCliente');
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
