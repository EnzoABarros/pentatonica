<?php
require_once __DIR__ . '/../app/models/Encerramento.php';

$leilao = new Encerramento();
$leilao->encerrarLeiloesExpirados();
