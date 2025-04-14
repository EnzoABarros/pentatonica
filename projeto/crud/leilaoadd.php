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
      <a href="../cadguit.php"><button class="botao d-flex" type="button" style="margin-right: 15px;">Guitarras</button></a>
      <a href="../cadlei.php"><button class="botao d-flex" type="button">Leilões</button></a>
      <a href="cadlei.php"><button class="botao d-flex" type="button">Logout</button></a>
    </div>
  </div>
  </nav>

  <div class="row" style="margin-top: 7.8rem; text-align: center;">

        <h1 class="mb-5" style="font-size: 3.5rem;">Criar novo leilão</h1>

			<div class="col">
			
			<form method="POST" action="index.php?page=1" class="form">
			<input type="text" name="guitarra" placeholder="Nome da guitarra">
			<input type="text" name="marca" placeholder="Marca da guitarra">
			<textarea name="descricao" rows="3" placeholder="Descrição da guitarra"></textarea>
            <input type="text" name="lancemin" placeholder="Lance mínimo">
            <input type="text" name="lancearreb" placeholder="Lance de arrebatamento">

            <form class="form" method="POST" action="index.php?page=1">
                <span class="input-span">
                    <label for="guitarra" class="label">Guitarra:</label>
                    <input type="text" name="guitarra" id="guitarra"
                /></span>
                <span class="input-span">
                    <label for="password" class="label">Password</label>
                    <input type="password" name="password" id="password"
                /></span>
                <span class="span"><a href="#">Forgot password?</a></span>
                <input class="submit" type="submit" value="Log in" />
                <span class="span">Don't have an account? <a href="#">Sign up</a></span>
                </form>


            <label class="custum-file-upload" for="file">
            <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
            </div>
            <div class="text">
            <span>Click to upload image</span>
            </div>
            <input type="file" id="file">
            </label>

			<button type="submit" class="mt-2 btn btn-primary">Enviar</button>
			
			</form>
			</div>
		</div>
</body>
</html>