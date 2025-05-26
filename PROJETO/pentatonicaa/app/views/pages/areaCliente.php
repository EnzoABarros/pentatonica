<?php
require_once __DIR__ . '/../../models/Cliente.php';

session_start();

$cliente = $cliente ?? null;          
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

<div class="container mt-5 p-4 bg-white shadow rounded" style="margin-top: 5rem; margin-left: 1rem;">

    <img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/areadocliente.png" alt="Área do Cliente">

    <?php if ($cliente): ?>
        <div class="mb-3">
            <p><strong>Nome:</strong> <?= htmlspecialchars($cliente->nome) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($cliente->email) ?></p>
            <p><strong>Endereço:</strong> <?= htmlspecialchars($cliente->endereco ?? 'Não informado') ?></p>
        </div>

        <hr>

        <h4 class="mt-4">Alterar Email</h4>
        <form action="/areaCliente/atualizarEmail" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Novo Email:</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?= htmlspecialchars($cliente->email) ?>">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Email</button>
        </form>

        <hr>

        <h4 class="mt-4">Histórico de Compras</h4>
        <?php if (!empty($historico)): ?>
            <ul class="list-group mb-4">
                <?php foreach ($historico as $compra): ?>
                    <li class="list-group-item">
                        Produto: <?= htmlspecialchars($compra->produto_nome) ?> -
                        Data: <?= htmlspecialchars($compra->data_compra) ?> -
                        Valor: <strong>R$ <?= htmlspecialchars(number_format($compra->valor, 2, ',', '.')) ?></strong>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Você ainda não realizou nenhuma compra.</p>
        <?php endif; ?>

        <hr>

        <h4>Leilões Ativos</h4>
        <?php if (!empty($leiloesAtivos)): ?>
            <ul class="list-group">
                <?php foreach ($leiloesAtivos as $leilao): ?>
                    <li class="list-group-item">
                        Leilão: <?= htmlspecialchars($leilao->titulo) ?> -
                        Status: <?= htmlspecialchars($leilao->status) ?> -
                        Fim: <?= htmlspecialchars($leilao->data_fim) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Você não está participando de nenhum leilão ativo.</p>
        <?php endif; ?>

    <?php else: ?>
        <div class="alert alert-danger">Cliente não encontrado.</div>
    <?php endif; ?>

    <div class="mt-4">
        <a href="/pentatonicaa/public/index.php" class="btn btn-secondary">Voltar à Home</a>
        <a href="/pentatonicaa/public/logout.php" class="btn btn-danger">Sair</a>
    </div>

</div>
</body>
</html>
