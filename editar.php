<?php header("Content-type: text/html; charset=utf-8");
session_start();
include("conexao.php");
mysqli_set_charset($conexao, "utf8");
$id = $_GET['id'];
$_SESSION['idprod'] = $id;
$sql1 = "SELECT * FROM produto WHERE id = '{$id}'";
$result1 = mysqli_query($conexao, $sql1);
$nome = mysqli_fetch_array($result1);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="css/editar.css">
</head>

<body>
    <div class="content">
        <div id="principal">
            <div id="slider">
                <a href="#" class="control_next">></a>
                <a href="#" class="control_prev"><</a>
                        <ul>
                            <li><img src="<?php echo $nome['imagem1']; ?>"></li>
                            <li><img src="<?php echo $nome['imagem2']; ?>"></li>
                            <li><img src="<?php echo $nome['imagem3']; ?>"></li>
                        </ul>
            </div>
            <div id="infos">
                <form action="editarnext.php" method="post" autocomplete="off">
                <h2>Editar Produto "<?php echo $nome['nome']; ?>"</h2>
                <label for="">Digite o novo nome</label><br><div class="col-3 input-effect">
                <input type="text" class="effect-17" name="nome" value="<?php echo $nome['nome']; ?>"><span class="focus-border"></span>
            </div><br>
                <label for="">Digite a nova descrição</label><br><div class="col-3 input-effect">
                <input type="text" class="effect-17" name="descricao" value="<?php echo $nome['descricao']; ?>"><span class="focus-border"></span>
            </div><br>
                <label for="">Digite o novo tamanho</label><br><div class="col-3 input-effect">
                <input type="text" class="effect-17" name="tamanho" value="<?php echo $nome['tamanho']; ?>"><span class="focus-border"></span>
            </div><br>
                <label for="">Digite o novo preço</label><br><div class="col-3 input-effect">
                <input type="text" class="effect-17" name="pr_venda" value="<?php echo $nome['pr_venda']; ?>"><span class="focus-border"></span>
            </div><br>
                <label for="">Digite a nova quantidade</label><br><div class="col-3 input-effect">
                <input type="text" class="effect-17" name="quant" value="<?php echo $nome['quant']; ?>"><span class="focus-border"></span>
            </div><br>
                <label for="">Digite o novo site</label><br><div class="col-3 input-effect">
                <input type="text" class="effect-17" name="site_compra" value="<?php echo $nome['site_compra']; ?>"><span class="focus-border"></span>
            </div><br>
                <input type="submit" value="Atualizar" class="button">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
</body>

</html>