<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/senha.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/6e68b6b4aa.js" crossorigin="anonymous"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src="js/login.js"></script>
    <script src=”https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js“></script>
</head>

<body>
    <div class="content">
        <img src="img/logo.png" alt="">
        <h2>Esqueceu a Senha?</h2>
        <form action="configesqsenhavend.php" method="POST" autocomplete="off">
            <div class="col-3 input-effect">
                <input class="effect-17" type="text" placeholder="Digite seu CNPJ" oninput="mascara(this)" name="cnpj">
                <span class="focus-border"></span>
            </div>
            <div class="col-3 input-effect">
                <input type="text" class="effect-17" name="email" placeholder="Digite seu e-mail">
                <span class="focus-border"></span>
            </div>
            <input class="buttonseguir" type="submit" name="enviar" value="CONTINUAR">
        </form>
        <?php
        if (isset($_SESSION['text'])) {
            echo '<div id="erro">' . $_SESSION['text'] . '</div>';
        }
        session_destroy();
        ?>
    </div>

    <script>
        function mascara(i) {

            var v = j.value;

            if (isNaN(v[v.length - 1])) {
                j.value = v.substring(0, v.length - 1);
                return;
            }

            j.setAttribute("maxlength", "18");
            if (v.length == 2) j.value += ".";
            if (v.length == 6) j.value += ".";
            if (v.length == 10) j.value += "/";
            if (v.length == 15) j.value += "-";

        }
    </script>

</body>

</html>