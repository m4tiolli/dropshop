<?php header("Content-type: text/html; charset=utf-8");
session_start();
include("conexao.php");
mysqli_set_charset($conexao, "utf8");
$id = $_GET['id'];
$sql = "SELECT * FROM produto WHERE id = '{$id}'";
$result = mysqli_query($conexao, $sql);

$nome = mysqli_fetch_assoc($result);
$desconto =  $nome['pr_venda'] - ($nome['pr_venda'] * 20 / 100);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $nome['nome'] ?></title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/verproduto.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
  <div id="headerDiv"></div>
  <div id="backHeader"></div>
  <?php
  if(isset($_COOKIE['email'])){
    echo '<div class="content">
    <div id="principal">
      <div id="slider">
        <a href="#" class="control_next">></a>
        <a href="#" class="control_prev"><</a>
            <ul>
              <li><img src="'. $nome['imagem1'].'"></li>
              <li><img src="'. $nome['imagem2'].'"></li>
              <li><img src="'. $nome['imagem3'].'"></li>
            </ul>
      </div>
      <div id="infos">
        <h2>'. $nome['nome'] .'</h2>
        <p id="id">cód: '. $nome['id'] .'</p>
        <p id="tipo">'. $nome['tipo'] .'</p>
        <p id="tamanho">Tamanho: '. $nome['tamanho'] .'</p>
        <p id="descricao">'. $nome['descricao'] .'</p>
        <span class="preco"><p id="preco">R$'. number_format($desconto, 2, ',', '.') .'</p>
        <p id="preco_old">R$'. number_format($nome['pr_venda'], 2, ',', '.') .'</p></span>
        <span id="links"><a href="'. $nome['site_compra'] .'" id="link">COMPRAR</a></span>
      </div>
    </div>
  </div>';
  } else {
    echo '<div class="error"><p class="erro">Você não tem permissão para acessar essa página. Faça a validação dos seus dados antes de continuar <a href="login.php" class="link">aqui</a>.</p></div>';
  }
  ?>
  <script>
    $(function() {
      $("#headerDiv").load("header.php");
    });
  </script>
  <script>
    jQuery(document).ready(function($) {

      $('#checkbox').change(function() {
        setInterval(function() {
          moveRight();
        }, 3000);
      });

      var slideCount = $('#slider ul li').length;
      var slideWidth = $('#slider ul li').width();
      var slideHeight = $('#slider ul li').height();
      var sliderUlWidth = slideCount * slideWidth;

      $('#slider').css({
        width: slideWidth,
        height: slideHeight
      });

      $('#slider ul').css({
        width: sliderUlWidth,
        marginLeft: -slideWidth
      });

      $('#slider ul li:last-child').prependTo('#slider ul');

      function moveLeft() {
        $('#slider ul').animate({
          left: +slideWidth
        }, 200, function() {
          $('#slider ul li:last-child').prependTo('#slider ul');
          $('#slider ul').css('left', '');
        });
      };

      function moveRight() {
        $('#slider ul').animate({
          left: -slideWidth
        }, 200, function() {
          $('#slider ul li:first-child').appendTo('#slider ul');
          $('#slider ul').css('left', '');
        });
      };

      $('a.control_prev').click(function() {
        moveLeft();
      });

      $('a.control_next').click(function() {
        moveRight();
      });

    });
  </script>
  </div>
</body>

</html>