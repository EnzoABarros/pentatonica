<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        
        <input type="submit" value="Registrar">
    </form>
</body>
</html>