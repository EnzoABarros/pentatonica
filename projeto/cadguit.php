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
      <a href="guitarras.php"><button class="botao d-flex" type="button" style="margin-right: 15px;">Guitarras</button></a>
      <a href="cadlei.php"><button class="botao d-flex" type="button">Leilões</button></a>
    </div>
  </div>
  </nav>

  <div class="container" style="margin-top: 100px; max-width: 600px;">
    <<form action="cadguit_php.php" method="post" enctype="multipart/form-data" class="mt-5">
    <input type="text" name="nome" placeholder="Nome da Guitarra" class="form-control mb-2" required>
    <input type="text" name="marca" placeholder="Marca" class="form-control mb-2" required>
    <textarea name="descricao" placeholder="Descrição" class="form-control mb-2" required></textarea>
    <input type="text" name="preco" placeholder="Preço" class="form-control mb-2" required>

    <label class="custum-file-upload" for="file">
        <div class="icon">
            <img src="src/img/upload.png" alt="Upload Icon" class="img-fluid">
        </div>
        <div class="text">
            <span>Click to upload image</span>
        </div>
        <input type="file" id="file" name="imagem" accept="image/*" required>
    </label>

    <button type="submit" class="mt-3 btn btn-primary">Enviar</button>
</form>
  
      <div class="mt-3">
          <a href="index.php" class="btn btn-secondary">Voltar</a>
      </div>
</div>
</body>
</html>