<?php
session_start();
	if (isset($_SESSION['msgv'])) {
		if ($_SESSION['msgv'] === "<p id='mensagem'>Usuário ou senha incorretos<p>") {
			$_SESSION['msgv'] == "";
			session_destroy();
		} else {
			$msg = $_SESSION['msgv'];
		}
	} else {
		$msg = "Olá, vendedor!";
	}
    if(isset($_COOKIE['email'])){
        $show = "<a href='cadastroprod.php'>CADASTRAR</a>";
    } else {
        $show = "<a href='cadastrovend.php'>CRIAR CONTA</a>";
    }
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DropShop Para Vendedores</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/stylevend.css ">
    <link rel="stylesheet" href="css/headervend.css ">
    <link rel="stylesheet" href="css/footervend.css ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://kit.fontawesome.com/6e68b6b4aa.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="headerDiv"></div>
    <div id="contentDiv">
        <h1>DropShop</h1>
        <p>&nbsp;&nbsp;&nbsp;<?php echo $msg; ?> Se deseja cadastrar algum de seu produto em nosso site, cadastre pelo botão logo abaixo:</p>
        <div id="button"><?php echo $show; ?>></div>
    </div>
    <div id="footerDiv"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
        $(function() {
            $("#headerDiv").load("headervend.php");
            $("#footerDiv").load("footervend.html");
            $("#cardDiv1").load("card1.html");
            $("#cardDiv2").load("card2.html");
            $("#cardDiv3").load("card3.html");
            $("#cardDiv4").load("card4.html");
        });
    </script>
</body>

</html>