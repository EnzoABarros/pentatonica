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
    <link rel="icon" href="src/img/logo.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>Pentatonica</title>
</head>
<body>
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
      <a href="cadguit.php"><button class="botao d-flex" type="button" style="margin-right: 15px;">Guitarras</button></a>
      <a href="cadlei.php"><button class="botao d-flex" type="button">Leilões</button></a>
      <a href="cadlei.php"><button class="botao d-flex" type="button">Logout</button></a>
    </div>
  </div>
  </nav>

  <div class="row" style="margin-top: 15rem;">
			<div class="col">
			
			<form method="POST" action="index.php?page=1">
			<input type="text"
					name="descricao"
					class="form-control"
					placeholder="Digite sua descrição aqui.">
			<button type="submit" 
					class="mt-2 btn btn-primary">Enviar</button>
			
			</form>
			</div>
		</div>
</body>
</html>