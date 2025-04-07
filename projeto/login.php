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
<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="main.php">
      <img src="src/img/logo.png" alt="logo" style="width:120px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
      </ul>
      <a class="btn btn-dark d-flex me-2" href="login.php">Login</a>
      <a class="btn btn-secondary d-flex" href="register.php">Cadastre-se</a>
      </form>
    </div>
  </div>
  </nav>

  <div class="form-container">
	<p class="title">Login</p>
	<form class="form">
		<div class="input-group">
			<label for="usuario">Usuário</label>
			<input type="text" name="usuario" id="usuario" placeholder="">
		</div>
		<div class="input-group">
			<label for="senha">Senha</label>
			<input type="senha" name="senha" id="password" placeholder="">
			<div class="forgot">
				<a rel="noopener noreferrer" href="#">Esqueceu sua senha?</a>
			</div>
		</div>
		<button class="sign">Entrar</button>
	</form>
	<p class="signup">Não tem uma conta?
		<a rel="noopener noreferrer" href="#" class="">Faça seu cadastro</a>
	</p>
</div>
  <script src="src/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>