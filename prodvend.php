<?php header("Content-type: text/html; charset=utf-8");
include('conexao.php');
session_start();
mysqli_set_charset($conexao, "utf8");
if(isset($_SESSION['emailv']) && isset($_SESSION['senhav'])){
$emailv = $_SESSION['emailv'];
$senhav = $_SESSION['senhav'];
} else {
  $emailv = "";
  $senhav = "";
}
$sqlid = "SELECT id FROM vendedor WHERE email = '$emailv' AND senha = '$senhav'";
$id = mysqli_query($conexao, $sqlid);
$var = mysqli_fetch_array($id);
$id_vend = intval($var[0]);

$sql = "SELECT * FROM produto WHERE id_vend = '$id_vend'";
$result = mysqli_query($conexao, $sql);
mysqli_close($conexao);

?>
<!DOCTYPE html>
<html>

<head>
  <script src="js/script.js"></script>
  <link rel="stylesheet" href="css/card.css" />
  <meta charset="utf-8">
  <style>
    a {
      text-decoration: none;
      color: #000;
    }

    a:hover {
      color: #fff;
    }
  </style>
</head>

<body>

  <section class="product" id="destaques">
    <h2 class="product-category">destaques</h2>
    <button class="pre-btn"><img src="images/arrow.png" alt="" /></button>
    <button class="nxt-btn"><img src="images/arrow.png" alt="" /></button>
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
      
      <button class="card-btn"><a href="' . $show['site_compra'] . '">ir ao site</a></button>
    </div>
    <div class="product-info">
      <h2 class="product-brand">' . $show['nome'] . '</h2>
      <p class="product-short-description">
        ' . $show['descricao'] . ' </p>
      <span class="price">R$' . $desconto . '</span><span class="actual-price">R$' .  $show['pr_venda'] . '</span>
    </div>
  </div>';
      }
      ?>


    </div>
  </section>
  <script>
    const productContainers = [
      ...document.querySelectorAll(".product-container"),
    ];
    const nxtBtn = [...document.querySelectorAll(".nxt-btn")];
    const preBtn = [...document.querySelectorAll(".pre-btn")];

    productContainers.forEach((item, i) => {
      let containerDimensions = item.getBoundingClientRect();
      let containerWidth = containerDimensions.width;

      nxtBtn[i].addEventListener("click", () => {
        item.scrollLeft += containerWidth;
      });

      preBtn[i].addEventListener("click", () => {
        item.scrollLeft -= containerWidth;
      });
    });
  </script>
  '
</body>

</html>