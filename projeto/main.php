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
<body>
<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">
        <img src="src/img/logo.png" alt="logo" style="width:120px;" href="main.php">
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

  <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

<!-- Indicators/dots -->
<div class="carousel-indicators">
  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
</div>

<!-- The slideshow/carousel -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="src/img/guitarras1.png.png" alt="Los Angeles" class="d-block w-100" style="width:50%;">
  </div>
  <div class="carousel-item">
    <img src="src/img/guitarras1.png.png" alt="Chicago" class="d-block w-100" style="width:50%;">
  </div>
  <div class="carousel-item">
    <img src="src/img/guitarras1.png.png" alt="New York" class="d-block w-100" style="width:50%;">
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
  <h1 class="h1 roboto-mono-fontelegal mt-5" style="font-size:50px;">Bem-vindo(a) à Pentatonica!</h1>
</div>

<div class="container-md mt-5 p-4 caixa">
  <h3 class="h3">De guitarrista, para guitarrista.</h3>
  <p>
  Vai comprar sua primeira guitarra? Deseja aumentar sua coleção? Ou quer uma guitarra única? Independente da sua necessidade, temos o que você precisa para ficar
  satisfeito com a sua compra


  </p>
</div>


</body>
</html>