<?php
session_start();
require_once 'conecta_db.php';


$conn = conecta_db();

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

// Verificação simples
if (empty($usuario) || empty($senha)) {
    echo "Preencha todos os campos.";
    exit;
}

// Consulta por CPF ou e-mail
$sql = "SELECT * FROM tb_cliente WHERE email = ? OR cpf = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $cliente = $result->fetch_assoc();

    if (password_verify($senha, $cliente['senha'])) {
        // Login OK
        $_SESSION['cliente_id'] = $cliente['id'];
        $_SESSION['cliente_nome'] = $cliente['nome'];
        header("Location: painel.php");
        exit;
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Usuário não encontrado.";
}
?>
