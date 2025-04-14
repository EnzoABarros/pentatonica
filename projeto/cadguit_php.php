<?php
session_start();
require_once("conecta.php"); 

if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] != 'lojista') {
    echo "Acesso negado!";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $marca = $_POST['marca'];
    $descricao = $_POST['descricao'];
    $id_lojista = $_SESSION['usuario_id'];

    $stmt = $conn->prepare("INSERT INTO tb_anuncio (nome_guitarra, marca_guitarra, descricao, id_lojista) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $nome, $marca, $descricao, $id_lojista);

    if ($stmt->execute()) {
        echo "Guitarra cadastrada com sucesso!<br>";
        echo '<a href="cadguit.php">Voltar</a>';
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Requisição inválida.";
}
?>
