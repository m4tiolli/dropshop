<?php header("Content-type: text/html; charset=utf-8");
session_start();
date_default_timezone_set('America/Sao_Paulo');
include_once("conexao.php");
mysqli_set_charset($conexao, "utf8");

$tabela = "produto";

$campos = "id_vendedor, nome, descricao, tipo, tamanho, pr_venda, quant, site_compra, imagem1, imagem2, imagem3";

$diretorio = "imagens/";

$emailv = $_SESSION['emailv'];
$senhav = $_SESSION['senhav'];
$id = "SELECT id FROM vendedor WHERE email = '$emailv' AND senha = '$senhav'";
$idvend = mysqli_query($conexao, $id);


if (isset($_POST['cadastrar'])) {

    $nomeF = $_POST['nome'];
    $descricaoF = $_POST['descricao'];
    $tipoF = $_POST['tipo'];
    $tamanhoF = strtoupper($_POST['tamanho']);
    $pr_vendaF = preg_replace('/[^0-9]+/','',$_POST['pr_venda']);
    $quantF = $_POST['quant'];
    $site_compraF = $_POST['site_compra'];

    $extensao = strtolower(substr($_FILES['img1']["name"], -4));

    $novo_nome1 = strtolower(preg_replace('<\W+>', "-", $nomeF)) . "-principal" . $extensao;

    $novo_nome2 = strtolower(preg_replace('<\W+>', "-", $nomeF)) . "-2" . $extensao;

    $novo_nome3 = strtolower(preg_replace('<\W+>', "-", $nomeF)) . "-3" . $extensao;

    $img1 = $diretorio . $novo_nome1;
    $img2 = $diretorio . $novo_nome2;
    $img3 = $diretorio . $novo_nome3;


    $sql = "INSERT INTO $tabela ($campos) VALUES ('$idvend', '$nomeF', '$descricaoF', '$tipoF', '$tamanhoF', '$pr_vendaF', '$quantF', '$site_compraF', '$img1', '$img2', '$img3');";

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
    <script src="cadprod.js"></script>
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
            <div class="col-3">
                <input type="text" class="effect-1" name="nome" placeholder="Digite o nome do produto..." required><br>
                <span class="focus-border"></span>
            </div>
            <div class="col-3">
                <input type="long" class="effect-1" name="descricao" placeholder="Digite uma descrição do produto..." required><br>
                <span class="focus-border"></span>
            </div>
            <div class="col-3">
                <select name="tipo">
                    <option value="">Selecione o tipo</option>
                    <option value="camisa">Camisa</option>
                    <option value="camiseta">Camiseta</option>
                    <option value="calca">Calça</option>
                    <option value="bermuda">Bermuda</option>
                    <option value="sapato">Sapato</option>
                    <option value="acessorio">Acessório</option>
                </select><br>
                <span class="focus-border"></span>
            </div>
            <div class="col-3">
                <input type="text" class="effect-1" name="tamanho" placeholder="Digite o tamanho do produto..." required><br>
                <span class="focus-border"></span>
            </div>
            <div class="col-3">
                <input type="text" class="effect-1" name="pr_venda" placeholder="Digite o preço do produto..." size="12" onKeyUp="mascaraMoeda(this, event)" required><br>
                <span class="focus-border"></span>
                <script>
                    String.prototype.reverse = function(){
    return this.split('').reverse().join(''); 
  };
  
  function mascaraMoeda(campo,evento){
    var tecla = (!evento) ? window.event.keyCode : evento.which;
    var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
    var resultado  = "";
    var mascara = "##.###.###,##".reverse();
    for (var x=0, y=0; x<mascara.length && y<valor.length;) {
      if (mascara.charAt(x) != '#') {
        resultado += mascara.charAt(x);
        x++;
      } else {
        resultado += valor.charAt(y);
        y++;
        x++;
      }
    }
    campo.value = resultado.reverse();
  }
                </script>
            </div>
            <div class="col-3">
                <input type="number" class="effect-1" name="quant" placeholder="Digite a quantidade do produto..." required><br>
                <span class="focus-border"></span>
            </div>
            <div class="col-3">
                <input type="url" class="effect-1" name="site_compra" placeholder="Digite o site do produto..." required><br>
                <span class="focus-border"></span>
            </div>
            <h2>Imagens do Produto</h2>
            <div id="table">
            <label for="imgInput1">Imagem 1</label><br>
            <label for="imgInput2">Imagem 2</label><br>
            <label for="imgInput3">Imagem 3</label><br>
            <img id="view-img1" src="" width="500px">
            <img id="view-img2" src="" width="500px">
            <img id="view-img3" src="" width="500px">
            </div><br>
            <button type="submit" name="cadastrar">Cadastrar</button>
            <input type="file" name="img1" id="imgInput1" required><br>
            <input type="file" name="img2" id="imgInput2"><br>
            <input type="file" name="img3" id="imgInput3"><br>
        </form>

    </div>
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
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