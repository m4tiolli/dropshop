<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer Login</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/6e68b6b4aa.js" crossorigin="anonymous"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src="js/login.js"></script>
</head>

<body>
    <div id="msgbox">
        <?php
        if (isset($_SESSION['msgv'])) {
            echo $_SESSION['msgv'];
            $_SESSION['msgv'] = '';
            session_destroy();
        }
        ?>

        <script>
            setTimeout(function() {
                $('#msgbox').fadeOut("slow");
            }, 5000);
        </script>
    </div>
    <div class="content">
        <img src="img/logo.png" alt="">
        <h2>Login</h2>
        <form action="loginvend.php" method="POST" autocomplete="off">
            <div class="col-3 input-effect">
                <input class="effect-17" type="text" placeholder="Digite seu email" name="email">
                <span class="focus-border"></span>
            </div>
            <div class="col-3 input-effect">
                <input type="password" class="effect-17" name="senha" id="senha" placeholder="Digite sua senha">
                <span class="fa-regular fa-eye" id="olho"></span>
                <span class="focus-border"></span>
            </div>
            <input class="buttonlogin" type="submit" name="entrar" value="Entrar"><br>
            <a class="buttonsenha" href="esqsenhavend.php">Esqueceu a senha?</a>
            <p class="link">
                Não tem conta?
                <a href="cadastrovend.php"> Ir para Cadastro </a>
            </p>
        </form>
    </div>
    <?php
    if (isset($_SESSION['altersenha'])) {
        echo $_SESSION['altersenha'];
        $_SESSION['altersenha'] == "";
        session_destroy();
    }
    ?>
    <script>
        setTimeout(function() {
            $('#msgsenha').fadeOut("slow");
        }, 5000);
    </script>

    <script>
        var senha = $('#senha');
        var olho = $("#olho");

        olho.mousedown(function() {
            senha.attr("type", "text");
        });

        olho.mouseup(function() {
            senha.attr("type", "password");
        });
        $("#olho").mouseout(function() {
            $("#senha").attr("type", "password");
        });
    </script>
</body>

</html>