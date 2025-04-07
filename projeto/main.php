<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css "href="src/style.css?<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>Pentatonica</title>
</head>
<body data-bs-spy="scroll">
<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">
        <img src="src/img/logo.png" alt="logo" style="width:70px;" href="javascript:void(0)">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
      </ul>
      <a href="login.php"><button class="botao d-flex" type="button" style="margin-right: 15px;" href="login.php">Login</button></a>
      <a href="register.php"><button class="botao d-flex" type="button" href="register.php">Cadastre-se</button></a>
      </form>
    </div>
  </div>
  </nav>

  <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

<!-- Indicators/dots -->
<div class="carousel-indicators">
  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active border"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="1" class="border"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="2" class="border"></button>
</div>

<!-- The slideshow/carousel -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="src/img/banner1.png" alt="Los Angeles" class="d-block w-100" style="width:50%;">
  </div>
  <div class="carousel-item">
    <img src="src/img/banner2.png" alt="Chicago" class="d-block w-100" style="width:50%;">
  </div>
  <div class="carousel-item">
    <img src="src/img/banner3.png" alt="New York" class="d-block w-100" style="width:50%;">
  </div>
</div>

<!-- Left and right controls/icons -->
<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div>

<div class="container">
  <h1 class="roboto-mono-fontelegal mt-5" style="font-size:50px;">Bem-vindo(a) à <kbd>pentatonica.<kbd></h1>
</div>

<div class="d-flex flex-column mt-5 py-4 section1">
  <h3 class="h3 mb-5 ms-3">De guitarrista, para guitarrista.</h3>

  <p class="mx-3">
    Vai comprar sua primeira guitarra? Deseja aumentar sua coleção? Ou quer uma guitarra única? Independente da sua necessidade, temos o que você precisa para ficar
    satisfeito com a sua compra. Vasculhe por nosso vasto catálogo de instrumentos para achar o que procura.


  </p>
  </div>

<div class="d-flex flex-column section2">
    <h3 class="h3 mb-5 ms-3 mt-5">Encontre a guitarra perfeita para você</h3>

    <p class="mx-3">
    Não sabe qual guitarra escolher? Temos um guia sobre os modelos diferentes de guitarra e um quiz rápido para você encontrar o instrumento perfeito para você! <br>
    </p>
    <button class="clique mt-3 mb-5" href="#areaajuda">Clique aqui</button>
  </div>

<div id="areaajuda">
  <a class="guias" href="guia/stratocaster.php">
    <img src="src/img/stratocaster.png" alt="">
    </a>
  <a class="guias" href="guia/lespaul.php">
    <img src="src/img/lespaul.png" alt="">
  </a>

  <a class="guias" href="guia/telecaster.php">
    <img src="src/img/telecaster.png" alt="">
    </a>

    <a class="guias" href="guia/sg.php">
    <img src="src/img/sg.png" alt="">
    </a>

    <a class="guias" href="guia/superstrato.php">
    <img src="src/img/superstratocaster.png" alt="">
    </a>

    <a class="guias" href="guia/flyingv.php">
    <img src="src/img/flyingv.png" alt="">
    </a>

    <a class="guias" href="guia/semiacustica.php">
    <img src="src/img/semiacustica.png" alt="">  
    </a>

    <a class="guias" href="guia/quiz.php">
      <img src="src/img/quiz.png" alt="">
    </a>
</div>

</body>
</html>