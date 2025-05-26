<?php
require_once 'app/models/VendaHistorico.php';

class HistoricoController extends MainController
{
    public function index()
    {
        $vendaModel = new VendaHistorico();
        $vendas = $vendaModel->getVendas();
        $faturamento = $vendaModel->getFaturamentoTotal();
        $maisVendido = $vendaModel->getMaisVendido();
        $vendasMes = $vendaModel->getVendasPorMes();

        require_once 'app/views/pages/historico.php';
    }
}