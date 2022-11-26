<?php header("Content-type: text/html; charset=utf-8");
include('conexao.php');
session_start();
mysqli_set_charset($conexao, "utf8");
if (isset($_SESSION['emailv']) && isset($_SESSION['senhav'])) {
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

$sql = "SELECT * FROM produto WHERE id_vendedor = $id_vend";
$result = mysqli_query($conexao, $sql);
mysqli_close($conexao);

?>
<!DOCTYPE html>
<html>

<head>
  <script src="js/script.js"></script>
  <link rel="stylesheet" href="css/produtos.css" />
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/6e68b6b4aa.js" crossorigin="anonymous"></script>
  <script src="js/prodvend.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
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
  <div id="msgbox">
    <?php
    if(isset($_SESSION['exclusao'])){
    if ($_SESSION['exclusao'] != "")  {
      echo $_SESSION['exclusao'];
      $_SESSION['exclusao'] == "";
    }
  }
  if(isset($_SESSION['alteracao'])){
    if ($_SESSION['alteracao'] != "")  {
      echo $_SESSION['alteracao'];
      $_SESSION['alteracao'] == "";
    }
  }
    ?>

    <script>
      setTimeout(function() {
        $('#msgbox').fadeOut("slow");
      }, 5000);
    </script>
  </div>

  <h2 class="product-category">Seus Produtos</h2>
  <div class="product-container">
    <?php

    foreach ($result as $show) {
      $desconto =  $show['pr_venda'] - ($show['pr_venda'] * 20 / 100);
      echo '
  <div class="product-card">
  <a href="editar.php?id=' . $show['id'] . '"><i class="fa-solid fa-pen-to-square discount-tag"></i></a>
<a href="excluir.php?id=' . $show['id'] . '"><i class="fa-solid fa-trash-can discount-tag"></i></a>
    <div class="product-image">
      <img src="' . $show["imagem1"] . '" class="product-thumb" alt="" />
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