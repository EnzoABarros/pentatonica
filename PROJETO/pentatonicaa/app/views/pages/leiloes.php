<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pentatonica | Leilões</title>
    <link rel="stylesheet" type="text/css" href="/pentatonicaa/PROJETO/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
    <link rel="icon" href="/pentatonicaa/PROJETO/pentatonicaa/public/images/logo.png" type="image/png">
</head>
<body>
<?php require_once __DIR__ . "/../layouts/header.php" ?><br><br><br><br><br> 

<img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/leiloes.png" alt="Leilões">

<div class="catalogo" style="margin-top: 160px;">
    <div class="filtro botoes-links">
        <h1 style="margin-top: -50px;">Filtros</h1>
        <form method="get">
            <div class="filtro-titulo">Modelo</div>
            <div class="filtro-conteudo">
                <?php 
                $modelos = ["Stratocaster", "Telecaster", "Les Paul", "SG", "Jazzmaster", "Explorer", "Flying V", "Headless", "Baritona"];
                foreach ($modelos as $modelo): 
                ?>
                    <label>
                        <input type="checkbox" name="modelo[]" value="<?= $modelo ?>" 
                            <?= (isset($_GET['modelo']) && in_array($modelo, $_GET['modelo'])) ? 'checked' : '' ?>>
                        <?= $modelo ?>
                    </label><br>
                <?php endforeach; ?>
            </div>

            <div class="filtro-titulo">Marca</div>
            
            <div class="filtro-conteudo">
                <?php 
                $marcas = ["Fender", "Gibson", "Ibanez", "Epiphone", "Jackson", "PRS", "ESP", "Gretsch"];
                foreach ($marcas as $marca): 
                ?>
                    <label>
                        <input type="checkbox" name="marca[]" value="<?= $marca ?>" 
                            <?= (isset($_GET['marca']) && in_array($marca, $_GET['marca'])) ? 'checked' : '' ?>>
                        <?= $marca ?>
                    </label><br>
                <?php endforeach; ?>
            </div>

            <div class="filtro-titulo">Categoria</div>
            <div class="filtro-conteudo">
                <?php 
                $categorias = ["Eletrica", "Semi-acustica", "Acustica", "Baritona", "Headless"];
                foreach ($categorias as $categoria): 
                ?>
                    <label>
                        <input type="checkbox" name="categoria[]" value="<?= $categoria ?>" 
                            <?= (isset($_GET['categoria']) && in_array($categoria, $_GET['categoria'])) ? 'checked' : '' ?>>
                        <?= $categoria ?>
                    </label><br>
                <?php endforeach; ?>
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
            <?php if (!empty($leiloes)): ?>
                <?php foreach ($leiloes as $leilao): ?>
                    <div class="card-guitarra">
                        <h2><?= htmlspecialchars($leilao['modelo']) ?></h2>
                        <?php if (isset($_SESSION['usuario'])): ?>

                            <?php if ($_SESSION['usuario']['tipo'] === 'adm'): ?>
                                <div class="adm-acoes">
                                    <a class="remove-leilao" href="/pentatonicaa/PROJETO/pentatonicaa/public/remover-leilao?id=<?= htmlspecialchars($leilao['id']) ?>">
                                        <button style="background-color: red; color: white;">Remover</button>
                                    </a>
                                    <a class="edit-leilao" href="/pentatonicaa/PROJETO/pentatonicaa/public/edita-leilao?id=<?= htmlspecialchars($leilao['id']) ?>">
                                        <button style="background-color: blue; color: white;">Editar</button>
                                    </a>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        
                        <div class="img-guitarra">
                            <img src="<?= htmlspecialchars($leilao['url_imagem']) ?>" alt="<?= htmlspecialchars($leilao['modelo']) ?>">
                        </div>
                        <div class="card-infos">
                            <div class="infos">
                                <p><?= htmlspecialchars($leilao['marca']) ?></p>
                                <p><?= number_format($leilao['preco_inicio'], 2, ',', '.') ?></p>
                                <p><?= htmlspecialchars($leilao['categoria']) ?></p>
                                <p><?= date("d/m/Y H:i", strtotime($leilao['data_fim'])) ?></p>
                            </div>
                            <div class="acoes">
                                <?php if (!isset($_SESSION["usuario"])): ?>
                                    <button style="width: 100%; margin-right: 10px;" onclick="alert('Realize o login para participar do leilão')">Participar</button>
                                <?php else: ?>
                                    <a  href="/pentatonicaa/PROJETO/pentatonicaa/public/participar?id=<?= htmlspecialchars($leilao['id']) ?>">
                                        <button style="width: 100%; margin-right: 10px;">participar</button>
                                    </a>
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
