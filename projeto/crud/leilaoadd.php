<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css "href="../src/style.css?<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="../src/img/logo.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
    <title>Pentatonica</title>
</head>

<style>
    body {
        display: flex;
        justify-content: center;
    }
</style>

<body>
<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">
        <img src="../src/img/logo.png" alt="logo" style="width:70px;" href="javascript:void(0)">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
      </ul>
      <a href="guitarras.php"><button class="botao d-flex" type="button" style="margin-right: 15px;">Guitarras</button></a>
      <a href="../cadlei.php"><button class="botao d-flex" type="button">Leilões</button></a>
      <a href="cadlei.php"><button class="botao d-flex" type="button">Logout</button></a>
    </div>
  </div>
  </nav>

  <div class="row d-flex" style="margin-top: 7.8rem; text-align: center;">

        <h1 class="mb-5" style="font-size: 3.5rem;">Criar novo leilão</h1>

		<div class="col" style="display: flex; justify-content: center;">

            <form class="form" method="POST" action="leilaoadd_php.php">
                <span class="input-span">
                    <label for="guitarra" class="label">Guitarra</label>
                    <input type="text" name="guitarra" id="guitarra"
                /></span>
                <span class="input-span">
                    <label for="marca" class="label">Marca</label>
                    <input type="text" name="marca" id="marca"
                /></span>
                    <span class="input=span">
                        <label for="descricao" class="label">Descrição</label>
                        <textarea name="descricao" id="descricao" rows="5"></textarea>
                    </span>
                    <span class="input-span">
                    <label for="lancemin" class="label">Lance mínimo</label>
                    <input type="text" name="lancemin" id="lancemin"
                /></span>
                <span class="input-span">
                    <label for="lancearreb" class="label">Lance de arrebatamento</label>
                    <input type="text" name="lancearreb" id="lancearreb"
                /></span>

                <label for="img">Choose a profile picture:</label>

                <input type="file" id="img" name="img" accept="image/png, image/jpeg" />
                
                <input class="submit mb-5 mt-4" type="submit" value="Criar" />
                </form>
			
			</form>
			</div>
		</div>
</body>
</html>