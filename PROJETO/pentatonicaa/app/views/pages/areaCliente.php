<?php
require_once __DIR__ . '/../../models/Cliente.php';

session_start();

$cliente = $_SESSION['usuario']['id'] ?? null;          
$historico = $historico ?? [];        
$leiloesAtivos = $leiloesAtivos ?? [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pentatonica | Área do Cliente</title>
    <link rel="stylesheet" type="text/css" href="/pentatonicaa/PROJETO/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
    <link rel="icon" href="/pentatonicaa/PROJETO/pentatonicaa/public/images/logo.png" type="image/png">
</head>

<body class="bg-light">
<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<div class="container mt-5 p-4 bg-white shadow rounded" style="margin-top: 4.2rem; margin-left: 1rem;">

    <img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/areadocliente.png" alt="Área do Cliente" width="100%">

    <?php if ($cliente): ?>
        <div class="mb-3">
            <p style="font-size: 17px;"><strong style="font-size: 20px;">Nome:</strong> <?= htmlspecialchars($_SESSION['usuario']['nome']) ?></p> <br>
            <p style="font-size: 17px;"><strong style="font-size: 20px;">Email:</strong> <?= htmlspecialchars($_SESSION['usuario']['email']) ?></p> <br>
            <p style="font-size: 17px;"><strong style="font-size: 20px;">Endereço:</strong> <?= htmlspecialchars($_SESSION['usuario']['endereco'] ?? "Não informado") ?></pp <br>
        </div>
        <br>
        <hr>
        <br>
        <h4 class="mt-4" style="font-size: 25px;">Alterar Email</h4>
        <form action="/pentatonicaa/PROJETO/pentatonicaa/public/alterar-email" method="post">
            <div class="mb-3">
                <label for="email" class="form-label" style="font-size: 20px;">Novo Email:</label> <br> <br>
                <input type="email" class="form-control" id="email" name="email" required class="email-field" style="background-color: #eee;border: none;padding: 1rem;font-size: 1rem;width: 13em;border-radius: 1rem;color: black;box-shadow: 0 0.4rem #dfd9d9;">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Atualizar Email</button>
        </form>

        <h4 class="mt-4" style="font-size: 25px;">Alterar Endereço</h4>
        <form action="/pentatonicaa/PROJETO/pentatonicaa/public/alterar-endereco" method="post">
            <div class="mb-3">
                <label for="endereco" class="form-label" style="font-size: 20px;">Novo Endereço:</label> <br> <br>
                <input type="endereco" class="form-control" id="endereco" name="endereco" required style="background-color: #eee;border: none;padding: 1rem;font-size: 1rem;width: 13em;border-radius: 1rem;color: black;box-shadow: 0 0.4rem #dfd9d9;">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Atualizar Endereço</button>
        </form>

        <hr>

        <h4 class="mt-4" style="font-size: 25px;">Histórico de Compras</h4>
        <?php if (!empty($historico)): ?>
            <ul class="list-group mb-4">
                <?php foreach ($historico as $compra): ?>
                    <li class="list-group-item">
                        Produto: <?= htmlspecialchars($compra['titulo']) ?> -
                        Data: <?= htmlspecialchars($compra['data_pagamento']) ?> -
                        Valor: <strong>R$ <?= htmlspecialchars(number_format($compra['preco'], 2, ',', '.')) ?></strong>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Você ainda não realizou nenhuma compra.</p>
        <?php endif; ?>

        <hr>

        <h4 style="font-size: 25px;">Leilões Ativos</h4>
        <?php if (!empty($leiloesAtivos)): ?>
            <ul class="list-group">
                <?php foreach ($leiloesAtivos as $leilao): ?>
                    <li class="list-group-item">
                        Leilão: <?= htmlspecialchars($leilao['modelo']) ?> -
                        Valor atual: R$ <?= htmlspecialchars($leilao['preco_atual']) ?> -
                        Fim: <?= htmlspecialchars($leilao['data_fim']) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Você não está participando de nenhum leilão ativo.</p>
        <?php endif; ?>

        <?php endif; ?>
</div>
</body>
</html>
