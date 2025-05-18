<?php
require_once('../../models/Cliente.php');

$clienteId = 1; 
$clienteObj = new Cliente();
$cliente = $clienteObj->buscarPorId($clienteId);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Área do Cliente</title>
    <link rel="stylesheet" href="/pentatonicaa/public/css/style.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5 p-4 bg-white shadow rounded">

        <h2 class="mb-4">Área do Cliente</h2>

        <?php if ($cliente): ?>
            <div class="mb-3">
                <p><strong>Nome:</strong> <?= htmlspecialchars($cliente->nome) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($cliente->email) ?></p>
                <p><strong>Endereço:</strong> <?= htmlspecialchars($cliente->endereco ?? 'Não informado') ?></p>
            </div>
        <?php else: ?>
            <div class="alert alert-danger">Cliente não encontrado.</div>
        <?php endif; ?>

        <hr>

        <h4 class="mt-4">Histórico de Compras</h4>
        <ul class="list-group mb-4">
            <li class="list-group-item">Guitarra Fender Stratocaster - <strong>R$ 3.500</strong></li>
            <li class="list-group-item">Guitarra Gibson Les Paul - <strong>R$ 4.800</strong></li>
        </ul>

        <h4>Leilões Ativos</h4>
        <ul class="list-group">
            <li class="list-group-item">Leilão 1 - Lance atual: <strong>R$ 1.500</strong></li>
            <li class="list-group-item">Leilão 2 - Lance atual: <strong>R$ 2.000</strong></li>
        </ul>

        <div class="mt-4">
            <a href="/pentatonicaa/public/index.php" class="btn btn-secondary">Voltar à Home</a>
            <a href="/pentatonicaa/public/logout.php" class="btn btn-danger">Sair</a>
        </div>

    </div>
</body>
</html>
