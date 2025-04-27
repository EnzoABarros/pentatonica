<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pentatonica | Editar Leilão</title>
    <link rel="stylesheet" type="text/css" href="/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
    <link rel="icon" href="/pentatonicaa/public/images/logo.png" type="image/png">
</head>
<body>

    <?php require_once __DIR__ . "/../layouts/header.php" ?><br><br><br><br><br><br><br>

    <h2>Editar Leilão</h2>

    <form action="/pentatonicaa/public/editar-leilao?id=<?php echo $leilao['id']; ?>" method="POST" enctype="multipart/form-data">
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" value="<?php echo htmlspecialchars($leilao['modelo']); ?>" required><br><br>

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="<?php echo htmlspecialchars($leilao['marca']); ?>" required><br><br>

        <label for="preco_inicial">Preço Inicial:</label>
        <input type="number" step="0.01" id="preco_inicial" name="preco_inicial" value="<?php echo htmlspecialchars($leilao['preco_inicio']); ?>" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4" cols="50" required><?php echo htmlspecialchars($leilao['descricao']); ?></textarea><br><br>

        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" value="<?php echo htmlspecialchars($leilao['categoria']); ?>" required><br><br>

        <label for="data_fim">Data de Fim:</label>
        <input type="datetime-local" id="data_fim" name="data_fim" value="<?php echo date('Y-m-d\TH:i', strtotime($leilao['data_fim'])); ?>" required><br><br>

        <label for="imagem">Imagem (opcional):</label>
        <input type="file" id="imagem" name="imagem" accept="image/*"><br><br>

        <input type="submit" value="Editar Leilão">
    </form>

</body>
</html>
