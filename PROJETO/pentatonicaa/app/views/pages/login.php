<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pentatonica | Login</title>
    <link rel="stylesheet" type="text/css" href="/pentatonicaa/PROJETO/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
    <link rel="icon" href="/pentatonicaa/PROJETO/pentatonicaa/public/images/logo.png" type="image/png">
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
            <img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/logo.png" alt="Logo">
            <img id="guits" src="https://img.freepik.com/vetores-premium/conjunto-de-guitarras-eletricas-de-rock-diferente-imagens-monocromaticas-de-vetor_80590-1404.jpg" alt="Guitarras">
        </div>
        <div class="inputs">
            <h1>Login</h1>
            <form id="loginForm" action="logar" method="POST" onsubmit="return validarFormulario()">

            <label for="email">Email: *</label>
            <input type="email" id="email" name="email" placeholder="Email" required>

            <label for="senha">Senha: *</label>
            <input type="password" id="senha" name="senha" placeholder="Senha" required>

            <div class="adm">
                <input type="checkbox" name="adm" id="adm" value="adm">
                <label for="adm">Login como administrador</label>
            </div>

            <button type="submit">Entrar</button>
            </form>
            <p>Continuar sem login: <a href="/pentatonicaa/PROJETO/pentatonicaa/public">Explorar</a></p>
            <p>Não tem uma conta? <a href="/pentatonicaa/PROJETO/pentatonicaa/public/cadastro">Cadastre-se</a></p>

        </div>
    </div>
    <script>
        const admCheckbox = document.getElementById("adm");
        const formulario = document.getElementById("loginForm");
    
        admCheckbox.addEventListener("change", function() {
            if (admCheckbox.checked) {
                formulario.action = "logarAdm";
            } else {
                formulario.action = "logar";
            }
        });

    </script>
    <script src="js/auth.js"></script>
</body>
</html>
