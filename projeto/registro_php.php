<?php
include("conecta_db.php");

$conn = conecta_db();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];

$sql  = "INSERT INTO tb_cliente(email, senha, nome, cpf) ";
$sql .= "VALUES('$email', '$senha', '$nome', '$cpf');";

if ($conn->query($sql) === true) {
    ?>
    <script>
        alert("Usuário cadastrado com sucesso com o ID <?php echo $conn->insert_id ?>!");
        location.href = "login.php";
    </script>
    <?php
} 