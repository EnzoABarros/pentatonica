<?php
	include("../conecta_db.php");


    $conn = conecta_db();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $guitarra = $_POST["guitarra"];
    $marca = $_POST["marca"];
    $descricao = $_POST["descricao"];
    $lancemin = $_POST["lancemin"];
    $lancearreb = $_POST["lancearreb"];
    $lancemaior = 0;
    $img = $_POST["img"];

    $sql = "INSERT INTO tb_leilao (nome_guitarra, marca_guitarra, descricao, lance_minimo, lance_arrebatamento, img, lance_maior) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sssddsd", $guitarra, $marca, $descricao, $lancemin, $lancearreb, $img, $lancemaior);
        if ($stmt->execute()) {
            ?>
            <script>
                alert("Leilão criado com sucesso!");
                location.href = "../cadlei.php";
            </script>
            <?php
        } else {
            echo "Erro ao cadastrar: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Erro na preparação da query: " . $conn->error;
    }

    $conn->close();

?>