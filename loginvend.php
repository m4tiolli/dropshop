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
  $sqlverifica = "SELECT * FROM vendedor WHERE email =
    '$emailF' AND senha = '$senhaF'";
  $resultadoverifica = @mysqli_query($conexao, $sqlverifica);
  $sqlnome = "SELECT nome FROM vendedor where email = '$emailF' AND senha = '$senhaF'";
  $nomesql = @mysqli_query($conexao, $sqlnome);

  if (mysqli_num_rows($nomesql) > 0) {
    while ($rowData = mysqli_fetch_array($nomesql)) {
      $show = $rowData["nome"];
    }
  }

  if (mysqli_num_rows($resultadoverifica) == 1) {
    if (!isset($_COOKIE['emailv'])) {
      setcookie("emailv", $emailF);
    }
    $_SESSION['msgv'] = "Olá, ".$show."!";
    header("Location: indexvend.php");
    $_SESSION['emailv'] = $emailF;
    $_SESSION['senhav'] = $senhaF;
  } else if (mysqli_num_rows($resultadoverifica) == 0) {
    $_SESSION['msgv'] = "<p id='mensagem'>Não existe usuário associado à essas informações.<p>";
    header("Location: fazerloginvend.php");
  }
  
  else {
    $_SESSION['msgv'] = "<p id='mensagem'>Usuário ou senha incorretos.<p>";
    header("Location: fazerloginvend.php");
  }
}

