<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pentatonica | Editar Guitarra</title>
    <link rel="stylesheet" type="text/css" href="/pentatonicaa/PROJETO/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
    <link rel="icon" href="/pentatonicaa/PROJETO/pentatonicaa/public/images/logo.png" type="image/png">
</head>
<body>

    <?php require_once __DIR__ . "/../layouts/header.php" ?><br><br><br><br><br><br><br>

    <h2>Editar Guitarra</h2>

    <form action="/pentatonicaa/PROJETO/pentatonicaa/public/editar-guitarra?id=<?php echo $guitarra['id']; ?>" method="POST" enctype="multipart/form-data">
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?php echo htmlspecialchars($guitarra['modelo']); ?>" required><br><br>

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="<?php echo htmlspecialchars($guitarra['marca']); ?>" required><br><br>

        <label for="preco">Preço:</label>
        <input type="number" step="0.01" id="preco" name="preco" value="<?php echo htmlspecialchars($guitarra['preco']); ?>" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4" cols="50" required><?php echo htmlspecialchars($guitarra['descricao']); ?></textarea><br><br>

        <input name="modo" type="text" value="guitarras" style="display: none;">

        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" value="<?php echo htmlspecialchars($guitarra['categoria']); ?>" required><br><br>

        <label for="imagem">Imagem (opcional):</label>
        <input type="file" id="imagem" name="imagem" accept="image/*"><br><br>

        <input type="submit" value="Editar Guitarra">
    </form>

</body>
</html>
