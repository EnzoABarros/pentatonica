<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pentatonica | Leilões</title>
    <link rel="stylesheet" type="text/css" href="/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
    <link rel="icon" href="/pentatonicaa/public/images/logo.png" type="image/png">
</head>
<body>
<?php require_once __DIR__ . "/../layouts/header.php" ?>

    <div class="catalogo" style="margin-top: 160px;">
        <div class="filtro botoes-links">
            <h1 style="margin-top: -50px;">Filtros</h1>
            <form method="get">

                <div class="filtro-titulo">Modelo</div>
                <div class="filtro-conteudo">
                    <label><input type="checkbox" name="modelo[]" value="Stratocaster"> Stratocaster</label><br>
                    <label><input type="checkbox" name="modelo[]" value="Telecaster"> Telecaster</label><br>
                    <label><input type="checkbox" name="modelo[]" value="Les Paul"> Les Paul</label><br>
                    <label><input type="checkbox" name="modelo[]" value="SG"> SG</label><br>
                    <label><input type="checkbox" name="modelo[]" value="Jazzmaster"> Jazzmaster</label><br>
                    <label><input type="checkbox" name="modelo[]" value="Explorer"> Explorer</label><br>
                    <label><input type="checkbox" name="modelo[]" value="Flying V"> Flying V</label><br>
                    <label><input type="checkbox" name="modelo[]" value="Headless"> Headless</label><br>
                    <label><input type="checkbox" name="modelo[]" value="Baritona"> Barítona</label><br>
                </div>

                <div class="filtro-titulo">Marca</div>
                <div class="filtro-conteudo">
                    <label><input type="checkbox" name="marca[]" value="Fender"> Fender</label><br>
                    <label><input type="checkbox" name="marca[]" value="Gibson"> Gibson</label><br>
                    <label><input type="checkbox" name="marca[]" value="Ibanez"> Ibanez</label><br>
                    <label><input type="checkbox" name="marca[]" value="Epiphone"> Epiphone</label><br>
                    <label><input type="checkbox" name="marca[]" value="Jackson"> Jackson</label><br>
                    <label><input type="checkbox" name="marca[]" value="PRS"> PRS (Paul Reed Smith)</label><br>
                    <label><input type="checkbox" name="marca[]" value="ESP"> ESP</label><br>
                    <label><input type="checkbox" name="marca[]" value="Gretsch"> Gretsch</label>
                </div>

                <div class="filtro-titulo">Categoria</div>
                <div class="filtro-conteudo">
                    <label><input type="checkbox" name="categoria[]" value="Eletrica"> Elétrica</label><br>
                    <label><input type="checkbox" name="categoria[]" value="Semi-acustica"> Semi-acústica</label><br>
                    <label><input type="checkbox" name="categoria[]" value="Acustica"> Acústica</label><br>
                    <label><input type="checkbox" name="categoria[]" value="Baritona"> Barítona</label><br>
                    <label><input type="checkbox" name="categoria[]" value="Headless"> Headless</label>
                </div>

                <div class="filtro-titulo">Preço</div>
                <div class="filtro-conteudo">
                    <label for="preco">Até R$ <span id="preco-valor"><?= isset($_GET['preco']) ? $_GET['preco'] : 5000 ?></span></label><br>
                    <input type="range" id="preco" name="preco" min="100" max="20000" step="50" 
                           value="<?= isset($_GET['preco']) ? $_GET['preco'] : 5000 ?>" 
                           oninput="document.getElementById('preco-valor').textContent = this.value">
                </div>

                <br>
                <button type="submit">Filtrar</button>
            </form>

        </div>
        <div class="guitarras-encontradas">
        <h1>Catálogo de Leilões</h1>
        <div class="container-guitarras">
            <?php if (!empty($guitarras)): ?>
                <?php foreach ($guitarras as $guitarra): ?>
                    <div class="card-guitarra">
                        <h2><?= htmlspecialchars($guitarra['modelo']) ?></h2>
                        <div class="img-guitarra">
                            <img src="<?= htmlspecialchars($guitarra['url_imagem']) ?>" alt="<?= htmlspecialchars($guitarra['modelo']) ?>">
                        </div>
                        <div class="card-infos">
                            <div class="infos">
                                <p>Marca: <?= htmlspecialchars($guitarra['marca']) ?></p>
                                <p>Preço: R$ <?= number_format($guitarra['preco'], 2, ',', '.') ?></p>
                                <p>Categoria: <?= htmlspecialchars($guitarra['categoria']) ?></p>
                            </div>
                            <div class="acoes">
                                <?php if (!isset($_SESSION["usuario"])): ?>
                                    <button onclick="alert('Realize o login para continuar a compra')">Comprar</button>
                                    <button onclick="alert('Realize o login para adiconar ao carrinho')">Carrinho</button>
                                <?php else: ?>
                                    <a href="comprar?id=<?= htmlspecialchars($guitarra['id']) ?>">
                                        <button>Comprar</button>
                                    </a>
                                    <button>Carrinho</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhuma guitarra encontrada.</p>
            <?php endif; ?>
        </div>
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
