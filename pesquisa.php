<?php header("Content-type: text/html; charset=utf-8");
session_start();
include('conexao.php');
mysqli_set_charset($conexao, "utf8");
$pesquisa = $_POST['pesquisar'];

$consulta = "SELECT * FROM produto WHERE nome LIKE '%$pesquisa%'";
$result = mysqli_query($conexao, $consulta);
mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Produto</title>
    <link rel="stylesheet" href="css/style.css ">
    <link rel="stylesheet" href="css/pesquisa.css">
    <style>
        a {
            text-decoration: none;
            color: #000;
        }

        a:hover {
            color: #fff;
        }

        .card-btn:hover a {
            color: #fff;
        }

        .card-btn:hover {
            background: #000;
            color: #fff;
        }
    </style>
</head>

<body>
    <div id="headerDiv"></div>
    <div id="backHeader"></div>

    <div class="content">
        <h2 id="titulo">Mostrando resultados para '<?php echo $pesquisa; ?>'</h2>

        <div class="product-container">
            <?php
            foreach ($result as $show) {
                $desconto =  $show['pr_venda'] - ($show['pr_venda'] * 20 / 100);
                $nome = $show['nome'];
                echo '
       
  <div class="product-card">
    <div class="product-image">
      <span class="discount-tag">20% off</span>
      <img src="' . $show["imagem1"] . '" class="product-thumb" alt="" />
      
      <button class="card-btn"><a href="verproduto.php?id=' . $show['id'] . '">ver produto</a></button>
    </div>
    <div class="product-info">
      <h2 class="product-brand">' . $show['nome'] . '</h2>
      <p class="product-short-description">
        ' . $show['descricao'] . ' </p>
      <span class="price">R$' . number_format($desconto, 2, ',', '.') . '</span><span class="actual-price">R$' .  number_format($show['pr_venda'], 2, ',', '.') . '</span>
    </div>
  </div>';
            }
            ?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script>
            $(function() {
                $("#headerDiv").load("header.php");
            });
        </script>
</body>

</html>