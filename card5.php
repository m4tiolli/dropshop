<?php header("Content-type: text/html; charset=utf-8");
include('conexao.php');
mysqli_set_charset($conexao, "utf8");
$sql = 'SELECT * FROM produto WHERE tipo = "Acessório" ';
$result = mysqli_query($conexao, $sql);
mysqli_close($conexao);

$linhas = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html>

<head>
  <script src="js/script.js"></script>
  <link rel="stylesheet" href="css/card.css" />
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

  <section class="product" id="acessorios">
    <h2 class="product-category">Acessórios</h2>
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
</body>

</html>