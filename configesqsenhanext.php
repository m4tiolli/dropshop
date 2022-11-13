<?php
session_start();

$cpf = $_SESSION['cpf'];
$email = $_SESSION['email'];

include('conexao.php');
$senha = $_POST['senha'];
$sql = "UPDATE cliente SET senha = '$senha' WHERE cpf = '$cpf' AND email = '$email';";
$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
    $_SESSION['altersenha'] = "<p id='msgsenha'>Senha alterada com sucesso!</p>";
    header('Location: fazerlogin.php');
} else {
   echo "Erro ao alterar a senha. <a href='esqsenha.php'>Voltar</a>"; 
}

unset($_SESSION['cpf']);
unset($_SESSION['email']);