<?php
session_start();

include("conexao.php");
mysqli_set_charset($conexao, "utf8");

if (isset($_POST['enviar'])) {
  $emailF = $_POST['email'];
  $enviarF = $_POST['enviar'];
  $cnpjF = $_POST['cnpj'];
}

$sqlverifica = "SELECT * FROM vendedor WHERE email =
    '$emailF' AND cnpj = '$cnpjF'";
$resultadoverifica = @mysqli_query($conexao, $sqlverifica);

if (mysqli_num_rows($resultadoverifica) == 1) {
  setcookie("redefinir", $emailF);
  $_SESSION['email'] = $emailF;
  $_SESSION['cnpj'] = $cnpjF;
  header("Location: esqsenhanextvend.php");
} else {
  $_SESSION['text'] = "<p id='mensagem'>Não existe conta associada à esses dados.<p>";
  header("Location: esqsenhavend.php");
}
