<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Pentatonica</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.php">
        <img src="src/img/logo.png" alt="logo" style="width:70px;" href="index.php">
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

  <div class="form-container card-registro">
	<p class="title">Login</p>
  <form class="form" method="POST" action="autenticar_lojista.php">
  <div class="input-group">
			<label for="usuario">Identificar</label>
			<input type="text" name="usuario" id="usuario" placeholder="E-mail ou CPF">
		</div>
		<div class="input-group">
			<label for="password">Senha</label>
			<input type="password" name="senha" id="password" placeholder="">
			<div class="forgot">
				<a rel="noopener noreferrer" href="#">Esqueceu sua senha?</a>
			</div>
		</div>
		<button class="sign">Entrar</button>
	</form>
</div>
  <script src="src/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>