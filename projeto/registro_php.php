<?php
include("conecta_db.php");

$conn = conecta_db();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];

$sql = "INSERT INTO tb_cliente (email, senha, nome, cpf) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ssss", $email, $senha, $nome, $cpf);
    if ($stmt->execute()) {
        ?>
        <script>
            alert("Usuário cadastrado com sucesso com o ID <?php echo $conn->insert_id ?>!");
            location.href = "login.php";
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
