<?php
class VendasController {
    public function vendas() {
        $pagamentosModel = new Pagamento();
        $vendas = $pagamentosModel->getVendas();

        require_once __DIR__ . '/../views/pages/histVendas.php';
    }
}