<?php
session_start();

include("conexao.php");
mysqli_set_charset($conexao, "utf8");

if (isset($_POST['enviar'])) {
  $emailF = $_POST['email'];
  $enviarF = $_POST['enviar'];
  $cpfF = $_POST['cpf'];
}

$sqlverifica = "SELECT * FROM cliente WHERE email =
    '$emailF' AND cpf = '$cpfF'";
$resultadoverifica = @mysqli_query($conexao, $sqlverifica);

if (mysqli_num_rows($resultadoverifica) == 1) {
  setcookie("redefinir", $emailF);
  $_SESSION['email'] = $emailF;
  $_SESSION['cpf'] = $cpfF;
  header("Location: esqsenhanext.php");
} else {
  $_SESSION['text'] = "<p id='mensagem'>Não existe conta associada à esses dados.<p>";
  header("Location: esqsenha.php");
}
