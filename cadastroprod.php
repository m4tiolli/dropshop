<?php header("Content-type: text/html; charset=utf-8");
session_start();
date_default_timezone_set('America/Sao_Paulo');
include_once("conexao.php");
mysqli_set_charset($conexao, "utf8");

$tabela = "produto";

$campos = "nome, descricao, tipo, tamanho, pr_venda, quant, site_compra, imagem1, imagem2, imagem3";

$diretorio = "imagens/";


if (isset($_POST['cadastrar'])) {

    $nomeF = $_POST['nome'];
    $descricaoF = $_POST['descricao'];
    $tipoF = $_POST['tipo'];
    $tamanhoF = $_POST['tamanho'];
    $pr_vendaF = $_POST['pr_venda'];
    $quantF = $_POST['quant'];
    $site_compraF = $_POST['site_compra'];

    $extensao = strtolower(substr($_FILES['img1']["name"], -4));

    $novo_nome1 = strtolower(preg_replace('<\W+>', "-", $nomeF)) . "-principal" . $extensao;

    $novo_nome2 = strtolower(preg_replace('<\W+>', "-", $nomeF)) . "-2" . $extensao;

    $novo_nome3 = strtolower(preg_replace('<\W+>', "-", $nomeF)) . "-3" . $extensao;

    $img1 = $diretorio . $novo_nome1;
    $img2 = $diretorio . $novo_nome2;
    $img3 = $diretorio . $novo_nome3;


    $sql = "INSERT INTO $tabela ($campos) VALUES ('$nomeF', '$descricaoF', '$tipoF', '$tamanhoF', '$pr_vendaF', '$quantF', '$site_compraF', '$img1', '$img2', '$img3');";

    $instrucao = mysqli_query($conexao, $sql);

    move_uploaded_file($_FILES['img1']["tmp_name"], $img1);
    move_uploaded_file($_FILES['img2']["tmp_name"], $img2);
    move_uploaded_file($_FILES['img3']["tmp_name"], $img3);

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
    <link rel="stylesheet" href="css/cadastroprod.css">
</head>

<body>
    <?php
    if (isset($_SESSION['msgvenda'])) {
        echo $_SESSION['msgvenda'];
        unset($_SESSION['msgvenda']);
    } else {
        $_SESSION['msgvenda'] = "";
    }
    ?>
    <div id="content">
        <h2>Cadastrar Produto</h2>
        <form action="" enctype="multipart/form-data" method="post" autocomplete="off">

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
            <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
            <input type="file" name="img1" id="imgInput1"><br>
            <input type="file" name="img2" id="imgInput2"><br>
            <input type="file" name="img3" id="imgInput3"><br>

            <input type="submit" name="cadastrar">
            <input type="reset" value="Limpar">
        </form>
        <a href="listarprod.php">Voltar</a>
        <img id="view-img1" src="default.jpg" width="350px">
        <img id="view-img2" src="default.jpg" width="350px">
        <img id="view-img3" src="default.jpg" width="350px">
    </div>
    <div class="img-container">
        <img src="https://www.cleverfiles.com/howto/wp-content/uploads/2016/08/mini.jpg">
    </div>
    <script>
        $("#imgInput1").change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#view-img1').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
    <script>
        $("#imgInput2").change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#view-img2').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
    <script>
        $("#imgInput3").change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#view-img3').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
</body>

</html>