<head>
    <link rel="stylesheet" href="css/headervend.css">
    <script src="js/script.js"></script>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/6e68b6b4aa.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div id="divLogo"><img src="img/logo_white.png">
        </div>
        <div id="divLogin">
            <?php
            if (isset($_COOKIE["emailv"])) {
                $mostrar = "<a class='logent' id='caditem' href='cadastroprod.php'>Cadastrar Item</a>";
            } else {
                $mostrar = "<a class='logent' id='log' href='fazerloginvend.php'>Entrar</a>";
            }
            echo $mostrar;
            ?>
            <?php
            if (isset($_COOKIE["emailv"])) {
                $mostrar2 = "<form method='POST' action='deslogavend.php'><input class='logent' id='ent' href='' type='submit' name='desloga' value='SAIR'></form>";
                $mostrar3 = "<a class='logent' id='ent' href='prodvend.php'>Meus Produtos</a>";
            } else {
                $mostrar2 = "<a class='logent' id='ent' href='cadastrovend.php'>Criar Conta</a>";
                $mostrar3 = "";
            }
            echo $mostrar3;
            echo $mostrar2;
            ?>
        </div>
    </header>
</body>