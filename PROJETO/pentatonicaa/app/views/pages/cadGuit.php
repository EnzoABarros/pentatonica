<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pentatonica | Cadastrar Guitarra</title>
    <link rel="stylesheet" type="text/css" href="/pentatonicaa/PROJETO/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
    <link rel="icon" href="/pentatonicaa/public/images/logo.png" type="image/png">
</head>
<body>

    <?php require_once __DIR__ . "/../layouts/header.php" ?><br><br><br><br><br><br><br>

    <h2>Cadastrar Guitarra</h2>

    <form action="/pentatonicaa/public/cadastrar-guitarra" method="POST" enctype="multipart/form-data">
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required><br><br>

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required><br><br>

        <label for="preco">Preço:</label>
        <input type="number" step="0.01" id="preco" name="preco" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4" cols="50" required></textarea><br><br>

        <input name="modo" type="text" value="guitarras" style="display: none;">

        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" required><br><br>

        <label for="imagem">Imagem:</label>
        <input type="file" id="imagem" name="imagem" accept="image/*" required><br><br>

        <input type="submit" value="Cadastrar Guitarra">
    </form>

</body>
</html>
