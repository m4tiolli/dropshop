<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DropShop | Página Inicial</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css ">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="https://kit.fontawesome.com/6e68b6b4aa.js" crossorigin="anonymous"></script>
	<script src="js/script.js"></script>
	<script src="js/index.js"></script>
</head>

<body>
	<div id="msgbox">
		<?php
		if (isset($_SESSION['msg'])) {
			if ($_SESSION['msg'] === "<p id='mensagem'>Usuário ou senha incorretos<p>") {
				echo $_SESSION['msg'];
				$_SESSION['msg'] == "";
				session_destroy();
			} else {
				echo $_SESSION['msg'];
			}
		} else {
			$_SESSION['msg'] = "";
		}
		?>

		<script>
			setTimeout(function() {
				$('#msgbox').fadeOut("slow");
			}, 3000);
		</script>
	</div>
	<div id="headerDiv"></div>
	<div id="backHeader"></div>

	<div id="conteudo">
		<br>
		<div class="carousel">
			<div class="carousel-inner">
				<input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
				<div class="carousel-item">
					<img src="img/1.gif">
				</div>
				<input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
				<div class="carousel-item">
					<img src="img/2.gif">
				</div>
				<label for="carousel-2" class="carousel-control next control-1">›</label>
				<label for="carousel-1" class="carousel-control prev control-2">‹</label>
				<label for="carousel-2" class="carousel-control prev control-1">‹</label>
				<label for="carousel-1" class="carousel-control next control-2">›</label>
				<ol class="carousel-indicators">
					<li>
						<label for="carousel-1" class="carousel-bullet">•</label>
					</li>
					<li>
						<label for="carousel-2" class="carousel-bullet">•</label>
		</li>
				</ol>
			</div>
		</div><br>

		<div id="cardDiv1"></div>
		<div id="cardDiv2"></div>
		<div id="cardDiv3"></div>
		<div id="cardDiv4"></div>

	</div>
	<div id="footerDiv"></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script>
		$(function() {
			$("#headerDiv").load("header.php");
			$("#footerDiv").load("footer.html");
			$("#cardDiv1").load("card1.html");
			$("#cardDiv2").load("card2.html");
			$("#cardDiv3").load("card3.html");
			$("#cardDiv4").load("card4.html");
		});
	</script>
</body>

</html>