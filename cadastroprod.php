<?php header("Content-type: text/html; charset=utf-8");
session_start();
date_default_timezone_set('America/Sao_Paulo');
include_once("conexao.php");
mysqli_set_charset($conexao, "utf8");

$tabela = "produto";

$campos = "nome, descricao, tipo, tamanho, pr_venda, quant, site_compra, imagem1";

$diretorio = "imagens/";


if (isset($_POST['cadastrar'])) {

    $nomeF = $_POST['nome'];
    $descricaoF = $_POST['descricao'];
    $tipoF = $_POST['tipo'];
    $tamanhoF = $_POST['tamanho'];
    $pr_vendaF = $_POST['pr_venda'];
    $quantF = $_POST['quant'];
    $site_compraF = $_POST['site_compra'];

    $extensao = strtolower(substr($_FILES['img']["name"], -4));

    $novo_nome = strtolower($nomeF) . $extensao;

    $arquivo = $diretorio . $novo_nome;

    $sql = "INSERT INTO $tabela ($campos) VALUES ('$nomeF', '$descricaoF', '$tipoF', '$tamanhoF', '$pr_vendaF', '$quantF', '$site_compraF', '$arquivo');";

    $instrucao = mysqli_query($conexao, $sql);

    move_uploaded_file($_FILES['img']["tmp_name"], $arquivo);

    if (!$instrucao) {
        die('Algo deu errado: ' . mysqli_error($conexao));
    } else {
        mysqli_close($conexao);
        header('Location: cadastroprod.php');
        $_SESSION['msgvenda'] = '<p id="mensagemvenda">Produto  ' . $nomeF . ' cadastrado com sucesso!</p>';
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
</head>

<body>
    <?php
    if (isset($_SESSION['msgvenda'])) {
        echo $_SESSION['msgvenda'];
    } else {
        $_SESSION['msgvenda'] = "";
    }
    ?>
    <form action="" enctype="multipart/form-data" method="post">
        <input type="text" name="nome" placeholder="Digite o nome do produto..." required><br>
        <input type="text" name="descricao" placeholder="Digite uma descrição do produto..." required><br>
        <select name="tipo">
            <option value="">Selecione o tipo</option>
            <option value="camisa">Camisa</option>
            <option value="camiseta">Camiseta</option>
            <option value="calca">Calça</option>
            <option value="bermuda">Bermuda</option>
            <option value="sapato">Sapato</option>
            <option value="acessorio">Acessório</option>
        </select><br>
        <input type="text" name="tamanho" placeholder="Digite o tamanho do produto..." required><br>
        <input type="text" name="pr_venda" placeholder="Digite o preço do produto..." required><br>
        <input type="text" name="quant" placeholder="Digite a quantidade do produto..." required><br>
        <input type="text" name="site_compra" placeholder="Digite o site do produto..." required><br>
        <input type="file" name="img"><br>
        <input type="submit" name="cadastrar">
    </form>
    <a href="listarprod.php">Voltar</a>
</body>

</html>