<?php
session_start();

include_once("conexao.php");
mysqli_set_charset($conexao, "utf8");

if (isset($_POST['entrar'])) {
  $emailF = strtolower($_POST['email']);
  $entrarF = $_POST['entrar'];
  $senhaF = $_POST['senha'];
}
if (isset($entrarF)) {
  $sqlverifica = "SELECT * FROM cliente WHERE email =
    '$emailF' AND senha = '$senhaF'";
  $resultadoverifica = @mysqli_query($conexao, $sqlverifica);
  $sqlnome = "SELECT nome FROM cliente where email = '$emailF' AND senha = '$senhaF'";
  $nomesql = @mysqli_query($conexao, $sqlnome);

  if (mysqli_num_rows($nomesql) > 0) {
    while ($rowData = mysqli_fetch_array($nomesql)) {
      $show = $rowData["nome"];
    }
  }

  if (mysqli_num_rows($resultadoverifica) != 0) {
    if (!isset($_COOKIE['email'])) {
      setcookie("email", $emailF);
    }
    $_SESSION['msg'] = "<p id='mensagem'>Bem vindo,  <u>$show</u>!<p>";
    header("Location: index.php");
  } else {
    $_SESSION['msg'] = "<p id='mensagem'>Usuário ou senha incorretos<p>";
    header("Location: fazerlogin.php");
    die();
    session_destroy();
  }
}
