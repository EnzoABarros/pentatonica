<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css "href="src/style.css?<?php echo time(); ?>">
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
  
<div class="form-container">
	<p class="title">Registro</p>
	<form class="form">
		<div class="input-group">
			<label for="username">Nome de usuário:</label>
			<input type="text" name="username" id="username" placeholder="">
		</div>
        <div class="input-group">
			<label for="email">E-mail:</label>
			<input type="text" name="email" id="email" placeholder="">
			</div>
        <div class="input-group">
			<label for="email">CPF:</label>
			<input type="text" name="cpf" id="cpf" placeholder="">
			</div>
		<div class="input-group">
			<label for="password">Senha:</label>
			<input type="password" name="password" id="password" placeholder="">
		</div>
		<button class="sign">Registre-se</button>
	</form>
	<p class="signup">Já tem uma conta?
		<a rel="noopener noreferrer" href="login.php" class="">Login</a>
	</p>
</div>

    <script>
        document.getElementById('cpf').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 11) {
                value = value.slice(0, 11);
            }
            if (value.length > 3) {
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
            }
            if (value.length > 6) {
                value = value.replace(/(\d{3})\.(\d{3})(\d)/, '$1.$2-$3');
            }
            e.target.value = value;
        });
    </script>
</body>
</html>