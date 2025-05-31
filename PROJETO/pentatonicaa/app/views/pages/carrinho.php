<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pentatonica | Carrinho</title>
    <link rel="stylesheet" href="/pentatonicaa/PROJETO/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
    <link rel="icon" href="/pentatonicaa/PROJETO/pentatonicaa/public/images/logo.png" type="image/png">
</head>
<body class="body-carrinho">
<?php require_once __DIR__ . "/../layouts/header.php"; ?>

<br><br><br><br><br><br><br><br><br><br><br><br>

<h1 class="titulo-carrinho">Carrinho de Compras</h1>

<?php if (empty($itensCarrinho)): ?>
    <p>Seu carrinho está vazio.</p>
<?php else: ?>
    <form method="POST" action="/pentatonicaa/PROJETO/pentatonicaa/public/pagar">
        <table class="tabela-carrinho">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Total</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Modo</th>
                    <th>Imagem</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $totalCarrinho = 0;
                foreach ($itensCarrinho as $index => $item): 
                    $totalItem = $item['guitarra_preco'] * $item['quantidade']; 
                    $totalCarrinho += $totalItem;
                ?>
                    <tr>
                        <td><?= $item['guitarra_modelo'] . " (" . $item['guitarra_marca'] . ")" ?></td>
                        <td><?= $item['quantidade'] ?></td>
                        <td>R$ <?= number_format($item['guitarra_preco'], 2, ',', '.') ?></td>
                        <td>R$ <?= number_format($totalItem, 2, ',', '.') ?></td>
                        <td><?= $item['guitarra_descricao'] ?></td>
                        <td><?= $item['guitarra_categoria'] ?></td>
                        <td><?= $item['guitarra_modo'] ?></td>
                        <td><img src="<?= $item['guitarra_imagem'] ?>" width="100" alt="Imagem da guitarra"></td>
                        <td><a href="remover-carrinho?id=<?= $item['id_guitarra'] ?>">Remover</a></td>
                    </tr>

                    <input type="hidden" name="itens[<?= $index ?>][id_guitarra]" value="<?= $item['id_guitarra'] ?>">
                    <input type="hidden" name="itens[<?= $index ?>][modelo]" value="<?= $item['guitarra_modelo'] ?>">
                    <input type="hidden" name="itens[<?= $index ?>][marca]" value="<?= $item['guitarra_marca'] ?>">
                    <input type="hidden" name="itens[<?= $index ?>][quantidade]" value="<?= $item['quantidade'] ?>">
                    <input type="hidden" name="itens[<?= $index ?>][preco]" value="<?= $item['guitarra_preco'] ?>">

                <?php endforeach; ?>
            </tbody>
        </table>

        <input type="hidden" name="total" value="<?= $totalCarrinho ?>">
        <button type="submit" class="finalizar-carrinho">Finalizar compra</button>
    </form>
<?php endif; ?>
</body>
</html>
