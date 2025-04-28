<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pentatonica | Carrunho</title>
    <link rel="stylesheet" type="text/css" href="/pentatonicaa/PROJETO/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
    <link rel="icon" href="/pentatonicaa/PROJETO/pentatonicaa/public/images/logo.png" type="image/png">
</head>
<body>
<?php require_once __DIR__ . "/../layouts/header.php" ?>

<br><br><br><br><br>

<h1>Carrinho de Compras</h1>

<?php if (empty($itensCarrinho)): ?>
    <p>Seu carrinho está vazio.</p>
<?php else: ?>
    <table>
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
            foreach ($itensCarrinho as $item): 
                $totalItem = $item['guitarra_preco'] * $item['quantidade']; 
                $totalCarrinho += $totalItem;
            ?>
                <tr>
                    <td><?php echo $item['guitarra_modelo'] . " (" . $item['guitarra_marca'] . ")"; ?></td>
                    <td><?php echo $item['quantidade']; ?></td>
                    <td>R$ <?php echo number_format($item['guitarra_preco'], 2, ',', '.'); ?></td>
                    <td>R$ <?php echo number_format($totalItem, 2, ',', '.'); ?></td>
                    <td><?php echo $item['guitarra_descricao']; ?></td>
                    <td><?php echo $item['guitarra_categoria']; ?></td>
                    <td><?php echo $item['guitarra_modo']; ?></td>
                    <td><img src="<?php echo $item['guitarra_imagem']; ?>" alt="Imagem da guitarra" width="100"></td>
                    <td>
                        <a href="remover-carrinho?id=<?php echo $item['id_guitarra']; ?>">Remover</a> 
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div>
        <h3>Total do Carrinho: R$ 
            <?php echo number_format($totalCarrinho, 2, ',', '.'); ?>
        </h3>
        <a href="">Finalizar Compra</a>

<?php endif; ?>


</body>
</html>
