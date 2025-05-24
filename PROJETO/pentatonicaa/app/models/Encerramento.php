<?php

class Encerramento {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/../../core/Database.php';
        $database = new Database();
        $this->db = $database->getConnection();
    }

    
    public function encerrarLeiloesExpirados() {
        date_default_timezone_set('America/Sao_Paulo');
        $agora = date('Y-m-d H:i:s');

        $sql = "UPDATE tb_leilao 
                SET status = 'encerrado' 
                WHERE status = 'ativo' 
                AND data_fim <= ?";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $agora);
        
        if ($stmt->execute()) {
            echo "[✔] Leilões encerrados com sucesso às $agora\n";
        } else {
            echo "[✖] Erro ao encerrar leilões: " . $stmt->error . "\n";
        }
    }

}
