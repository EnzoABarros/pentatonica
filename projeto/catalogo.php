<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="src/style.css?<?php echo time(); ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
        <title>Pentatonica</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="src/img/pentatonica.png" alt="logo" style="width:200px;" href="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                </ul>
                <button class="btn btn-dark d-flex" type="button" style="margin-right: 15px;" href="login.php">Login</button>
                <button class="btn btn-secondary d-flex" type="button" href="register.php">Cadastre-se</button>
                </form>
                </div>
            </div>
        </nav>

    <div class="catalogo" style="margin-top: 100px;">
    <div class="filtro">
        <h1>Filtros</h1>
        <form action="catalogo.php" method="get">
            
            <div class="filtro-titulo">Modelo</div>
            <div class="filtro-conteudo">
                <label><input type="checkbox" name="guitarras[]" value="Stratocaster"> Stratocaster</label><br>
                <label><input type="checkbox" name="guitarras[]" value="Telecaster"> Telecaster</label><br>
                <label><input type="checkbox" name="guitarras[]" value="Les Paul"> Les Paul</label><br>
                <label><input type="checkbox" name="guitarras[]" value="SG"> SG</label><br>
                <label><input type="checkbox" name="guitarras[]" value="Superstrat"> Superstrat</label><br>
                <label><input type="checkbox" name="guitarras[]" value="Jazzmaster"> Jazzmaster</label><br>
                <label><input type="checkbox" name="guitarras[]" value="Jaguar"> Jaguar</label><br>
                <label><input type="checkbox" name="guitarras[]" value="Semi-acustica"> Semi-acústica / Hollow Body</label><br>
                <label><input type="checkbox" name="guitarras[]" value="Explorer"> Explorer</label><br>
                <label><input type="checkbox" name="guitarras[]" value="Flying V"> Flying V</label><br>
                <label><input type="checkbox" name="guitarras[]" value="Mustang"> Mustang</label><br>
                <label><input type="checkbox" name="guitarras[]" value="Baritona"> Barítona</label><br>
                <label><input type="checkbox" name="guitarras[]" value="Headless"> Headless</label>
            </div>

            <div class="filtro-titulo">Marca</div>
            <div class="filtro-conteudo">
                <label><input type="checkbox" name="marca[]" value="Fender"> Fender</label><br>
                <label><input type="checkbox" name="marca[]" value="Gibson"> Gibson</label><br>
                <label><input type="checkbox" name="marca[]" value="Ibanez"> Ibanez</label><br>
                <label><input type="checkbox" name="marca[]" value="Epiphone"> Epiphone</label><br>
                <label><input type="checkbox" name="marca[]" value="Jackson"> Jackson</label><br>
                <label><input type="checkbox" name="marca[]" value="Gretsch"> Gretsch</label><br>
                <label><input type="checkbox" name="marca[]" value="ESP"> ESP</label>
            </div>

            <div class="filtro-titulo">Exemplo 1</div>
            <div class="filtro-conteudo">
                <label><input type="checkbox" name="123" value="123"> 123</label><br>
                <label><input type="checkbox" name="123" value="123"> 123</label><br>
                <label><input type="checkbox" name="123" value="123"> 123</label><br>
                <label><input type="checkbox" name="123" value="123"> 123</label><br>
                <label><input type="checkbox" name="123" value="123"> 123</label><br>
                <label><input type="checkbox" name="123" value="123"> 123</label><br>
                <label><input type="checkbox" name="123" value="123"> 123</label>
            </div>  
            
            <div class="filtro-titulo">Exemplo 2</div>
            <div class="filtro-conteudo">
                <label><input type="checkbox" name="123" value="123"> 123</label><br>
                <label><input type="checkbox" name="123" value="123"> 123</label><br>
                <label><input type="checkbox" name="123" value="123"> 123</label><br>
                <label><input type="checkbox" name="123" value="123"> 123</label><br>
                <label><input type="checkbox" name="123" value="123"> 123</label><br>
                <label><input type="checkbox" name="123" value="123"> 123</label><br>
                <label><input type="checkbox" name="123" value="123"> 123</label>
            </div>

            <div class="filtro-titulo">Preço</div>
            <div class="filtro-conteudo">
                <label for="preco">Até R$ <span id="preco-valor">5000</span></label><br>
                <input type="range" id="preco" name="preco" min="100" max="20000" step="50" value="5000">
            </div>

            <br>
            <button type="submit" class="btn btn-dark">Filtrar</button>
        </form>
    </div>
    </div>

    <script>
        const tamanho = document.getElementById("preco");
        const valor = document.getElementById("preco-valor");

        tamanho.addEventListener("input", () => {
            valor.innerText = tamanho.value;
        });

        const titulos = document.querySelectorAll(".filtro-titulo");

        titulos.forEach(titulo => {
            titulo.addEventListener("click", () => {
                const conteudos = document.querySelectorAll(".filtro-conteudo");

                conteudos.forEach(c => {
                    if (c !== titulo.nextElementSibling) {
                        c.classList.remove("ativo");
                    }
                });

                titulo.nextElementSibling.classList.toggle("ativo");
            });
        });

    </script>

    </body>
</html>
