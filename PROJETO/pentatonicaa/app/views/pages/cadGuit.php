<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pentatonica | Cadastrar Guitarra</title>
    <link rel="stylesheet" type="text/css" href="/pentatonicaa/PROJETO/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
    <link rel="icon" href="/pentatonicaa/PROJETO/pentatonicaa/public/images/logo.png" type="image/png">
</head>
<style>
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    img { 
        width: 100vw;
        margin-bottom: 20px;
    }
</style>
<body>

    <?php require_once __DIR__ . "/../layouts/header.php" ?><br><br><br><br><br><br><br>

    <img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/cadastrarguit.png" alt="Cadastrar Guitarra">

    <form class="cadProd" action="/pentatonicaa/PROJETO/pentatonicaa/public/cadastrar-guitarra" method="POST" enctype="multipart/form-data">
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

        <label for="imagem" class="label">Escolher imagem</label>
        <input type="file" id="imagem" name="imagem" accept="image/*" required hidden>
        <span id="nome-arquivo">Nenhum arquivo selecionado</span>

        <br>
        <img id="previa-imagem" src="#" alt="Prévia da imagem">

        <br>
        <input class="finalizar-carrinho" type="submit" value="Cadastrar Guitarra">
    </form>

<script>
    document.getElementById('imagem').addEventListener('change', function() {
        const arquivo = this.files[0];
        const nomeSpan = document.getElementById('nome-arquivo');
        const preview = document.getElementById('previa-imagem');

        if (arquivo) {
            nomeSpan.textContent = arquivo.name;

            const leitor = new FileReader();
            leitor.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            leitor.readAsDataURL(arquivo);
        } else {
            nomeSpan.textContent = "Nenhum arquivo selecionado";
            preview.src = "#";
            preview.style.display = 'none';
        }
    });
</script>

</body>
</html>
