<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pentatonica</title>
    <link rel="stylesheet" type="text/css" href="/pentatonicaa/PROJETO/pentatonicaa/public/css/style.css?<?php echo time(); ?>">
    <link rel="icon" href="/pentatonicaa/PROJETO/pentatonicaa/public/images/logo.png" type="image/png">

</head>
<body>
    <?php require_once __DIR__ . "/../layouts/header.php" ?>

    <div class="slider">
        <div class="slides">
            <img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/banner1.png" class="slide active">
            <img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/banner2.png" class="slide">
            <img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/banner3.png" class="slide">
        </div>

        <div class="indicators">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>

    <h1 class="titulo">
        Bem-vindo(a) à <span class="titulo-back">pentatonica.</span>
    </h1>


    <div style="background-color:rgb(241, 241, 241); padding-top: 0.9rem; padding-left: 0.5rem; padding-bottom: 0.3rem;">
  <h3 style="font-size:35px;">De guitarrista, para guitarrista.</h3>

  <p style="font-size:20px;">
    Vai comprar sua primeira guitarra? Deseja aumentar sua coleção? Ou quer uma guitarra única? Independente da sua necessidade, temos o que você precisa para ficar
    satisfeito com a sua compra. <br> Vasculhe por nosso vasto catálogo de instrumentos para achar o que procura.


  </p>
  </div>
  <div style="background-color:rgb(224, 224, 224); padding-top: 0.9rem; padding-left: 0.5rem; padding-bottom: 0.3rem;">
  <h3 style="font-size:35px;">Encontre a guitarra perfeita para você</h3>

  <p style="font-size:20px;">
    Não sabe qual guitarra escolher? Logo abaixo temos um guia sobre os modelos diferentes de guitarra e um quiz rápido para você encontrar o instrumento perfeito para você! <br>
  </p>
  </div>

    <br><br><br><br><br><br><br><br><br><br>

    <div class="guia">
  <a class="guias" href="guia?guia=stratocaster">
    <img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/stratocaster.png" alt="">
    </a>
  <a class="guias" href="guia?guia=lespaul">
    <img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/lespaul.png" alt="">
  </a>

  <a class="guias" href="guia?guia=telecaster">
    <img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/telecaster.png" alt="">
    </a>

    <a class="guias" href="guia?guia=sg">
    <img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/sg.png" alt="">
    </a>

    <a class="guias" href="guia?guia=superstrato">
    <img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/superstratocaster.png" alt="">
    </a>

    <a class="guias" href="guia?guia=flyingv">
    <img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/flyingv.png" alt="">
    </a>

    <a class="guias" href="guia?guia=semiacustica">
    <img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/semiacustica.png" alt="">  
    </a>

    <a class="guias" href="guia?guia=quiz">
      <img src="/pentatonicaa/PROJETO/pentatonicaa/public/images/quiz.png" alt="">
    </a>
</div>


    <script src="js/slider.js"></script>

</body>
</html>
