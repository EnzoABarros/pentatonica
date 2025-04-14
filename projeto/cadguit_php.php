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

    // Upload da imagem
    $imagem_nome = $_FILES['imagem']['name'];
    $imagem_temp = $_FILES['imagem']['tmp_name'];
    $pasta_destino = "uploads/";

    if (!is_dir($pasta_destino)) {
        mkdir($pasta_destino, 0755, true); // cria pasta se não existir
    }

    $caminho_final = $pasta_destino . uniqid() . "_" . basename($imagem_nome);
    
    if (move_uploaded_file($imagem_temp, $caminho_final)) {
        $stmt = $conn->prepare("INSERT INTO tb_anuncio (nome_guitarra, marca_guitarra, descricao, imagem, id_lojista) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $nome, $marca, $descricao, $caminho_final, $id_lojista);

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
