<?php
session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'lojista') {
    header("Location: login_lojista.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel do Lojista</title>
</head>
<body>
    <h1>Bem-vindo ao Painel, <?php echo $_SESSION['usuario_nome']; ?>!</h1>

    <p>Você está logado como <strong>lojista</strong>.</p>

    <a href="logout.php">Sair</a>
</body>
</html>
