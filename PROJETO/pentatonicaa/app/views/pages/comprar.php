<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pentatonica | Comprar</title>
    <link rel="stylesheet" type="text/css" href="/pentatonicaa/PROJETO/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
    <link rel="icon" href="/pentatonicaa/public/images/logo.png" type="image/png">
</head>
<style>
    body {
        display: flex;
        justify-content: center;
    }
</style>
<body>
<?php require_once __DIR__ . "/../layouts/header.php" ?>

    <div class="compra">
        <div class="img-compra">
            <img src="<?= htmlspecialchars($guitarra['url_imagem']) ?>" alt="">
        </div>
        <div class="sobre-compra">
            <h1><?= htmlspecialchars($guitarra['modelo']) ?></h1>
            <h2>Marca: <?= htmlspecialchars($guitarra['marca']) ?></h2>
            <h2>Preço: R$ <?= htmlspecialchars($guitarra['preco']) ?></h2>
            <h2>Descrição: <?= htmlspecialchars($guitarra['descricao']) ?></h2>
            <h2>Categoria: <?= htmlspecialchars($guitarra['categoria']) ?></h2>
            <button>Finalizar compra</button>
        </div>
    </div>
</body>
</html>
