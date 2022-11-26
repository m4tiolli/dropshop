<?php header("Content-type: text/html; charset=utf-8");
session_start();
include("conexao.php");
mysqli_set_charset($conexao, "utf8");
$id = $_GET['id'];
$sql = "DELETE FROM produto WHERE id = '{$id}'";
$result = mysqli_query($conexao, $sql);
$sql1 = "SELECT nome FROM produto WHERE id = '{$id}'";
$result1 = mysqli_query($conexao, $sql1);
$nome = mysqli_fetch_array($result1);
if($result){
    $_SESSION['exclusao'] = "<p id='mensagem'>Produto ".$nome['nome']." excluído com sucesso.</p>";
    header('Location: prodvend.php');
}