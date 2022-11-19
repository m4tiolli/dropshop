<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Recuperar Senha</title>
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="css/senha.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://kit.fontawesome.com/6e68b6b4aa.js" crossorigin="anonymous"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="js/login.js"></script>
</head>

<body>
  <?php
  if (isset($_COOKIE['redefinir'])) {
    echo '<div class="content">
        <img src="img/logo.png" alt="" />
        <h2>Esqueceu a Senha?</h2>
        <form action="configesqsenhanext.php" method="POST" autocomplete="off">
          <div class="col-3 input-effect">
            <input
              type="password"
              class="effect-17"
              name="senha"
              id="senha"
              placeholder="Digite uma senha nova"
            />
            <span class="fa-regular fa-eye" id="olho"></span>
            <span class="focus-border"></span>
          </div>
          <div class="col-3 input-effect">
            <input
              type="password"
              class="effect-17"
              name="senha"
              id="senhaconfirm"
              placeholder="Repita a nova senha"
            />
            <span class="fa-regular fa-eye" id="olhoconfirm"></span>
            <span class="focus-border"></span>
          </div>
          <input
            class="buttonseguir"
            type="submit"
            name="enviar"
            value="ALTERAR"
          />
        </form>
      </div>
  
      <script>
        var senha = $("#senha");
        var olho = $("#olho");
        var senhaconfirm = $("#senhaconfirm");
        var olhoconfirm = $("#olhoconfirm");
  
        olho.mousedown(function () {
          senha.attr("type", "text");
        });
        $("#olho").mouseout(function () {
          $("#senha").attr("type", "password");
        });
        olhoconfirm.mousedown(function () {
          senhaconfirm.attr("type", "text");
        });
        $("#olhoconfirm").mouseout(function () {
          $("#senhaconfirm").attr("type", "password");
        });
      </script>';
  } else {
    echo '<div class="error"><p class="erro">Você não tem permissão para acessar essa página. Faça a validação dos seus dados antes de continuar <a href="esqsenha.php" class="link">aqui</a>.</p></div>';
  }
  ?>
  <script>
    var password = document.getElementById("senha"),
      confirm_password = document.getElementById("senhaconfirm");

    function validatePassword() {
      if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("As senhas não coincidem!");
      } else {
        confirm_password.setCustomValidity("");
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
  </script>

</body>

</html>