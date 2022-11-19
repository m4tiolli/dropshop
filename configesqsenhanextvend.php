<?php
session_start();

$cnpj = $_SESSION['cnpj'];
$email = $_SESSION['email'];

include('conexao.php');
$senha = $_POST['senha'];
$sql = "UPDATE vendedor SET senha = '$senha' WHERE cnpj = '$cnpj' AND email = '$email';";
$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
    $_SESSION['altersenha'] = "<p id='msgsenha'>Senha alterada com sucesso!</p>";
    header('Location: fazerloginvend.php');
} else {
   echo "Erro ao alterar a senha. <a href='esqsenhavend.php'>Voltar</a>"; 
}

unset($_SESSION['cnpj']);
unset($_SESSION['email']);
session_destroy();