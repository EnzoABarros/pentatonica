<?php
include("conecta_db.php");

$conn = conecta_db();

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM tb_lojista WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $lojista = $result->fetch_assoc();

    if (password_verify($senha, $lojista['senha'])) {
        session_start();
        $_SESSION['usuario_id'] = $lojista['id'];
        $_SESSION['usuario_nome'] = $lojista['nome'];
        $_SESSION['tipo'] = 'lojista';

        header("Location: painelloja.php");
        exit;
    }
}

echo "<script>alert('Email ou senha inválidos!'); location.href='login_lojista.php';</script>";
?>
