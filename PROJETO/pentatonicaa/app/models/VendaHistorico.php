<?php
class VendaHistorico
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    public function getVendas()
    {
        $stmt = $this->db->prepare("SELECT * FROM vendas ORDER BY data_venda DESC");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFaturamentoTotal()
    {
        $stmt = $this->db->prepare("SELECT SUM(quantidade * preco_unitario) as total FROM vendas");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    public function getMaisVendido()
    {
        $stmt = $this->db->prepare("
            SELECT nome_produto, SUM(quantidade) as total 
            FROM vendas 
            GROUP BY nome_produto 
            ORDER BY total DESC 
            LIMIT 1
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getVendasPorMes()
    {
        $stmt = $this->db->prepare("
            SELECT DATE_FORMAT(data_venda, '%Y-%m') as mes, SUM(quantidade * preco_unitario) as total
            FROM vendas
            GROUP BY mes
            ORDER BY mes
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}