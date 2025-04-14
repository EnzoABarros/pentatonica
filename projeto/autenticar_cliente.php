<?php
include("conecta_db.php");

$conn = conecta_db();

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM tb_cliente WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $usuario = $result->fetch_assoc();

    if (password_verify($senha, $usuario['senha'])) {
        session_start();
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['tipo'] = 'cliente';

        header("Location: painel.php");
        exit;
    }
}

echo "<script>alert('Email ou senha inválidos!'); location.href='login_cliente.php';</script>";
?>
