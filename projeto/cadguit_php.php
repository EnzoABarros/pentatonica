<?php
session_start();
require_once("conecta_db.php");

$conn = conecta_db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $marca = $_POST['marca'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    // Upload da imagem
    $imagem_nome = $_FILES['imagem']['name'];
    $imagem_temp = $_FILES['imagem']['tmp_name'];
    $pasta_destino = "uploads/";

    if (!is_dir($pasta_destino)) {
        mkdir($pasta_destino, 0755, true); // cria pasta se não existir
    }

    $caminho_final = $pasta_destino . uniqid() . "_" . basename($imagem_nome);
    
    if (move_uploaded_file($imagem_temp, $caminho_final)) {
        $stmt = $conn->prepare("INSERT INTO tb_anuncio (nome_guitarra, marca_guitarra, descricao, imagem, preco) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssd", $nome, $marca, $descricao, $caminho_final, $preco);

        if ($stmt->execute()) {
            echo "Guitarra cadastrada com imagem com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro ao fazer upload da imagem.";
    }

    $conn->close();
} else {
    echo "Requisição inválida.";
}
?>
