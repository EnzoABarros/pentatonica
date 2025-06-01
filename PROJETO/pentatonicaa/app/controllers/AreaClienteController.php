<?php

require_once __DIR__ . '/../models/Cliente.php';

class AreaClienteController
{
    public function areaCliente()
    {
        session_start();
    $idCliente = $_SESSION['usuario']['id'];

    $clienteModel = new Cliente();
    $cliente = $clienteModel->buscarPorId($idCliente);

    $leilaoModel = new Leilao();
    $leiloesAtivos = $leilaoModel->participandoLeilao($idCliente);

    $this->render('areaCliente', [
        'cliente' => $cliente,
        'leiloesAtivos' => $leiloesAtivos
    ]);
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
        $idCliente = $_SESSION['usuario']['id'];

        $clienteModel = new Cliente();
        $cliente = $clienteModel->buscarPorId($idCliente);

        // $compraModel = new Compra();
        // $historico = $compraModel->getComprasPorCliente($idCliente);

        $leilaoModel = new Leilao();
        $leiloesAtivos = $leilaoModel->participandoLeilao($idCliente);

        $this->render('areaCliente', [
            'cliente' => $cliente,
            // 'historico' => $historico,
            'leiloesAtivos' => $leiloesAtivos
        ]);
    }

    private function render($view, $dados = [])
{
    extract($dados);

    $caminhoView = __DIR__ . "/../views/pages/{$view}.php";

    if (file_exists($caminhoView)) {
        require $caminhoView;
    } else {
        echo "Erro: View '{$view}.php' não encontrada em {$caminhoView}";
    }
    
    $pagamentoModel = new Pagamento();
    $historico = $pagamentoModel->getHistoricoCompras($_SESSION['usuario']['id']);
}

}
