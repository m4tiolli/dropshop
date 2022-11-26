<?php header("Content-type: text/html; charset=utf-8");
session_start();
include("conexao.php");
mysqli_set_charset($conexao, "utf8");
$id = $_SESSION['idprod'];
$nome1 = $_POST['nome'];
$descricao = $_POST['descricao'];
$tamanho = $_POST['tamanho'];
$pr_venda = $_POST['pr_venda'];
$quant = $_POST['quant'];
$site_compra = $_POST['site_compra'];
$sql = "UPDATE produto SET nome = '{$nome1}', descricao = '{$descricao}', tamanho = '{$tamanho}', pr_venda = '{$pr_venda}', quant = '{$quant}', site_compra = '{$site_compra}' WHERE id = '{$id}'";
$result = mysqli_query($conexao, $sql);
if ($result) {
    $_SESSION['alteracao'] = "<p id='mensagem'>Produto " . $nome1 . " alterado com sucesso.</p>";
    header('Location: prodvend.php');
}
