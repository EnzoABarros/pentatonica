<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pentatonica | Comprar</title>
  <link rel="stylesheet" href="/pentatonicaa/PROJETO/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
  <link rel="icon" href="/pentatonicaa/PROJETO/pentatonicaa/public/images/logo.png" type="image/png">
</head>
<style>
    body {
        display: flex;
        justify-content: center;
    }
</style>
<body>
  <?php require_once __DIR__ . "/../layouts/header.php" ?>


  <div class="leilao">
    <div class="inicio">
        <div class="img-compra">
        <img src="<?= htmlspecialchars($leilao['url_imagem']) ?>" alt="Imagem do produto">
        </div>
        <div class="sobre-compra">
        <h1><?= htmlspecialchars($leilao['modelo']) ?></h1>
        <h2>Marca: <?= htmlspecialchars($leilao['marca']) ?></h2>
        <h2>Preço inicial: R$ <?= htmlspecialchars($leilao['preco_inicio']) ?></h2>
        <h2>Maior lance: R$ <?= htmlspecialchars($leilao['preco_atual'] ?? "0.00") ?></h2>
        <h2>Descrição: <?= htmlspecialchars($leilao['descricao']) ?></h2>
        <h2>Categoria: <?= htmlspecialchars($leilao['categoria']) ?></h2>
        <h2>Data de encerramento: <?= (new DateTime($leilao['data_fim']))->format('d/m/Y H:i') ?></h2>

        <button class="botaoLance" id="abrirModal">Realizar lance</button>
        </div>
    </div>
    <div class="divAtual">
        <h1>Últimos Lances:</h1>
        <?php foreach ($leilao['top_lances'] as $lance): ?>
            <h2>Nome: <?= htmlspecialchars($lance['nome']) ?> | Valor: R$ <?= number_format($lance['valor_lance'], 2, ',', '.') ?></h2>
        <?php endforeach; ?>
    </div>

  </div>

  <div class="fundo" id="fundoModal">
    <div class="boxLance">
        <div class="lanceFormDiv">
            <form id="lanceForm" action="/pentatonicaa/PROJETO/pentatonicaa/public/lance" method="POST">
                <?php
                $minLance = isset($leilao['preco_atual']) && $leilao['preco_atual'] > 0 
                            ? $leilao['preco_atual'] 
                            : $leilao['preco_inicio'];
                ?>
    
                <button type="button" class="botaoLance" id="fecharModal">Voltar</button>
    
                <input type="hidden" name="leilao_id" value="<?= htmlspecialchars($leilao['id']) ?>">

                <div class="infosLance">
                    <p>Obs: O lance deve ser aumentados com valores multítplos de 10</p>
                    <p>Exemplo: <?= number_format(($minLance + 10), 2, ',', '.') ?>/ <?= number_format(($minLance + 20), 2, ',', '.') ?>/ <?= number_format(($minLance + 90), 2, ',', '.') ?></p>
                </div>

                <label for="valor_lance">Digite o valor do lance (R$):</label>
                <input type="number" name="valor_lance" id="valor_lance" 
                    step="10" min="<?= htmlspecialchars($minLance + 10) ?>" required
                    placeholder="Mínimo: R$ <?= number_format(($minLance + 10), 2, ',', '.') ?>">
    
    
                <button type="submit" class="botaoLance">Enviar lance</button>
            </form>
        </div>
        <div class="atualDiv">
    
        </div>

    </div>
  </div>

  <script>
    const botaoAbrir = document.getElementById('abrirModal');
    const botaoFechar = document.getElementById('fecharModal');
    const fundoModal = document.getElementById('fundoModal');

    botaoAbrir.addEventListener('click', () => {
      fundoModal.style.display = 'flex';
    });

    botaoFechar.addEventListener('click', () => {
      fundoModal.style.display = 'none';
    });
  </script>
</body>
</html>
