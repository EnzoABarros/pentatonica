<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css "href="src/style.css?<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Pentatonica - Cadastrar Guitarra</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
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
    </div>
  </div>
  </nav>

  <div class="container" style="margin-top: 100px; max-width: 600px;">
    <h2 class="mb-4">Cadastrar Guitarra</h2>
    <form action="cadguit_php.php" method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da guitarra</label>
            <input type="text" class="form-control" name="nome" required>
        </div>
        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" name="marca" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar Guitarra</button>
    </form>
</div>
</body>
</html>