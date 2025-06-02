<?php
require_once __DIR__ . '/../../models/Guitarra.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pentatonica | Histórico de Vendas</title>
    <link rel="stylesheet" type="text/css" href="/pentatonicaa/PROJETO/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
    <link rel="icon" href="/pentatonicaa/PROJETO/pentatonicaa/public/images/logo.png" type="image/png">
</head>

<body class="bg-light">
<?php require_once __DIR__ . "/../layouts/header.php"; ?> <br> <br> <br>

<div class="container mt-5 p-4 bg-white shadow rounded" style="margin-top: 4.6rem; margin-left: 1rem;">
    <h1 style="text-align: center; font-size: 50px;">Histórico de Vendas</h1>

    <table class="tabela-carrinho">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Valor</th>
                    <th>E-mail do cliente</th>
                    <th>Status</th>
                    <th>Data da venda</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td><?= $vendas['id_pagamento']?></td>
                        <td><?= $vendas['titulo'] ?></td>
                        <td>R$ <?= $vendas['valor'] ?></td>
                        <td><?= $vendas['email'] ?></td>
                        <td><?= $vendas['status'] ?></td>
                        <td><?= $vendas['data_pagamento'] ?></td>
                    </tr>
            </tbody>
        </table>





</div>
</body>
</html>
