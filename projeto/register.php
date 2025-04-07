<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Pentatonica</title>
</head>
<body>
    <h1>Registro</h1>
    <form action="registro.php" method="POST">
        <label for="nomedeusuario">Nome de usuário:</label><br>
        <input type="text" id="nomedeusuario" name="nomedeusuario" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Senha:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="cpf">Digite seu CPF:</label><br>
        <input type="cpf" id="cpf" name="cpf" required><br><br>
        
        <input type="submit" value="Registrar">
    </form>

    <p>Já tem uma conta? <a href="login.php">Faça login</a></p>

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