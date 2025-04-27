<?php

class Database {
    private $conn;

    public function __construct() {
        $config = require __DIR__ . '/../config/config.php';
        $db = $config['db'];

        $host = $db['host'] . ':' . $db['port'];
        $this->conn = new mysqli($host, $db['user'], $db['pass'], $db['name']);

        if ($this->conn->connect_error) {
            die("Erro na conexão: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
