<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pentatonica | Cadastro</title>
    <link rel="stylesheet" type="text/css" href="/pentatonicaa/PROJETO/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
    <link rel="icon" href="/pentatonicaa/public/images/logo.png" type="image/png">
</head>
<style>
    body {
        background-color: rgb(20, 20, 20);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }


</style>
<body>
    <div class="form">
        <div class="sobre">
            <img src="/pentatonicaa/public/images/logo.png" alt="">
            <img id="guits" src="https://img.freepik.com/vetores-premium/conjunto-de-guitarras-eletricas-de-rock-diferente-imagens-monocromaticas-de-vetor_80590-1404.jpg" alt="">
        </div>
        <div class="inputs">
            <h1>Cadastro</h1>
            <form id="cadastroForm" action="cadastrar" method="POST" onsubmit="return validarFormulario()">

            <label for="nome">Nome: *</label>
            <input type="text" id="nome" name="nome" placeholder="Nome completo" required pattern="^[A-Za-zÀ-ÿ\s]+$" title="Use apenas letras e espaços.">

            <label for="email">Email: *</label>
            <input type="email" id="email" name="email" placeholder="Email" required>

            <label for="cpf">CPF: *</label>
            <input type="text" id="cpf" name="cpf" placeholder="CPF (somente números)" required 
                pattern="\d{11}" title="Digite um CPF com 11 números.">

            <label for="senha">Senha: *</label>
            <input type="password" id="senha" name="senha" placeholder="Senha" required>

            <label for="confirmar_senha">Confirmar Senha: *</label>
            <input type="password" id="confirmar_senha" name="confirmar_senha" placeholder="Confirmar senha" required>

            <button type="submit">Cadastrar</button>
            </form>
            <p>Já tem uma conta? <a href="/pentatonicaa/public/login">Faça login</a></p>

        </div>
    </div>

    <script src="js/auth.js"></script>
</body>
</html>