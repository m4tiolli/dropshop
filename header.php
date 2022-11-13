 <head>
    <link rel="stylesheet" href="css/header.css">
    <script src="js/script.js"></script>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/6e68b6b4aa.js" crossorigin="anonymous"></script>
    <script src="js/header.js"></script>
</head>

<body>
    <header>
        <div id="divLogo"><img src="img/logo.png">
        </div>
        <div id="divBusca">
            <div id=busca>
                <input type="text" id="txtBusca" class="inputres" placeholder="Buscar..." />
                <span class="fa-solid fa-magnifying-glass buttonPesquisa" id="pesquisa"></span>
            </div>
        </div>
        <div id="divLogin">
            <?php
            if (isset($_COOKIE["email"])) {
                $mostrar = "";
            } else {
                $mostrar = "<a class='logent' id='log' href='fazerlogin.php'>Entrar</a>";
            }
            echo $mostrar;
            ?>
            <?php
            if (isset($_COOKIE["email"])) {
                $mostrar2 = "<form method='POST' action='desloga.php'><input class='logent' id='ent' href='' type='submit' name='desloga' value='SAIR'></form>";
            } else {
                $mostrar2 = "<a class='logent' id='ent' href='cadastro.php'>Criar Conta</a>";
            }
            echo $mostrar2;
            ?>

        </div>
    </header>
    <nav>
        <ul class="menu" id="nav">
            <li><a href="#destaques">Destaques</a>
            </li>
            <li><a href="#">Roupas</a>
                <ul>
                    <li><a href="#camisas">Camisetas</a></li>
                    <li><a href="#camisas">Camisas</a></li>
                    <li><a href="#calcados">Calças</a></li>
                    <li><a href="#calcados">Bermudas</a></li>
                </ul>
            </li>
            <li><a href="#">Calçados</a>
                <ul>
                    <li><a href="#">Sapatos</a></li>
                    <li><a href="#">Tênis</a></li>
                </ul>
            </li>
            <li><a href="#acessorios">Acessórios</a></li>
        </ul>
    </nav>
    <div id="confirmacao">
        <p>É um vendedor e deseja cadastrar seu produto?  <a href="indexvend.php">entre  aqui</a></p>
        <span class="fa-solid fa-close" onclick="fecharpopup()" id="botao"></span>

    </div>
</body>