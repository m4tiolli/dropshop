<?php header("Content-type: text/html; charset=utf-8");
session_start();

include_once("conexao.php");
mysqli_set_charset($conexao, "utf8");

$tabela = "vendedor";

$campos = "nome, cidade, bairro, rua, numcasa, cep, uf, cnpj, email, senha";


if (isset($_POST['cadastrar'])) {

  $nomeF = $_POST['nome'];
  $cidadeF = $_POST['cidade'];
  $bairroF = $_POST['bairro'];
  $ruaF = $_POST['rua'];
  $numcasaF = $_POST['numcasa'];
  $cepF = $_POST['cep'];
  $ufF = $_POST['estado'];
  $cnpjF = $_POST['cnpj'];
  $emailF = $_POST['email'];
  $senhaF = $_POST['senha'];

  $sql = "INSERT INTO $tabela ($campos) 
			VALUES ('$nomeF', '$cidadeF', '$bairroF', '$ruaF', '$numcasaF', '$cepF', '$ufF', '$cnpjF', '$emailF', '$senhaF')";

  $instrucao = mysqli_query($conexao, $sql);

  if (!$instrucao) {
    die('Algo deu errado: ' . mysqli_error($conexao));
  } else {
    mysqli_close($conexao);
    $_SESSION['email'] = $emailF;
    $_SESSION['senha'] = $senhaF;
    $_SESSION['nome'] = $nomeF;
    header('Location: indexvend.php');
    $_SESSION['msg'] = "Olá, ".$nomeF."!";
    setcookie("email", $emailF);
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DropShop | Cadastro</title>
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="css/cadastro.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/6e68b6b4aa.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/cadastro.js"></script>
</head>

<body>
  <div class="content">
    <img src="img/logo.png" alt="">
    <h2>Criar Conta</h2>
    <form action="" method="post" autocomplete="off">
      <div class="allone">
      <div class="one">
        <div class="col-3">
          <input class="effect-1" type="text" placeholder="Digite o nome da empresa" name="nome">
          <span class="focus-border"></span>
        </div>
        <div class="col-3">
          <input class="effect-1" type="text" placeholder="Digite o CNPJ" name="cnpj"
          id="CNPJInput" oninput="criaMascara('CNPJ')" maxlength="14">
          <span class="focus-border"></span>
        </div>
        <div class="col-3">
          <input class="effect-1" type="text" placeholder="Digite o CEP" name="cep" id="CEPInput" oninput="criaMascara('CEP')" maxlength="8">
          <span class="focus-border"></span>
        </div>
        </div>
        <div class="two">
        <select name="estado" id="uf">
          <option value="">Selecione o estado</option>
          <option value="AC">Acre</option>
          <option value="AL">Alagoas</option>
          <option value="AP">Amapá</option>
          <option value="AM">Amazonas</option>
          <option value="BA">Bahia</option>
          <option value="CE">Ceará</option>
          <option value="DF">Distrito Federal</option>
          <option value="ES">Espirito Santo</option>
          <option value="GO">Goiás</option>
          <option value="MA">Maranhão</option>
          <option value="MS">Mato Grosso do Sul</option>
          <option value="MT">Mato Grosso</option>
          <option value="MG">Minas Gerais</option>
          <option value="PA">Pará</option>
          <option value="PB">Paraíba</option>
          <option value="PR">Paraná</option>
          <option value="PE">Pernambuco</option>
          <option value="PI">Piauí</option>
          <option value="RJ">Rio de Janeiro</option>
          <option value="RN">Rio Grande do Norte</option>
          <option value="RS">Rio Grande do Sul</option>
          <option value="RO">Rondônia</option>
          <option value="RR">Roraima</option>
          <option value="SC">Santa Catarina</option>
          <option value="SP">São Paulo</option>
          <option value="SE">Sergipe</option>
          <option value="TO">Tocantins</option>
        </select>
        <div class="col-3">
          <input class="effect-1" type="text" placeholder="Digite a cidade" name="cidade" id="cidade">
          <span class="focus-border"></span>
        </div>
        <div class="col-3">
          <input class="effect-1" type="text" placeholder="Digite o bairro" name="bairro" id="bairro">
          <span class="focus-border"></span>
        </div>
        <div class="col-3">
          <input class="effect-1" type="text" placeholder="Digite a rua" name="rua" id="rua">
          <span class="focus-border"></span>
        </div>
        <div class="col-3">
          <input class="effect-1" type="text" placeholder="Digite o logradouro" name="numcasa" id="numcasa">
          <span class="focus-border"></span>
        </div>
      </div>
      </div>
      <div class="three">
        <div class="col-3">
          <input class="effect-1" type="text" placeholder="Digite um email válido" name="email">
          <span class="focus-border"></span>
        </div>
        <div class="col-3">
          <input class="effect-1" type="password" placeholder="Digite uma senha válida" name="senha" id="senha">
          <span class="fa-regular fa-eye" id="olho"></span>
          <span class="focus-border"></span>
        </div>
      </div>
      <div class="four">
        <button type="submit" name="cadastrar">Cadastrar</button><br>
    </form>
    <form action="indexvend.php">
    <button name="voltar" type="submit">Voltar</button>
    </form>
  </div>
  </div>

</body>
<script>
  function criaMascara(mascaraInput) {
    const maximoInput = document.getElementById(
      `${mascaraInput}Input`
    ).maxLength;
    let valorInput = document.getElementById(`${mascaraInput}Input`).value;
    let valorSemPonto = document
      .getElementById(`${mascaraInput}Input`)
      .value.replace(/([^0-9])+/g, "");
    const mascaras = {
      CPF: valorInput
        .replace(/[^\d]/g, "")
        .replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4"),
      Celular: valorInput.replace(/[^\d]/g, "").replace(/^(\d{2})(\d{5})(\d{4})/, "($1) $2-$3"),
      CEP: valorInput
        .replace(/[^\d]/g, "")
        .replace(/(\d{5})(\d{3})/, "$1-$2"),
        CNPJ: valorInput
        .replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, "$1.$2.$3/$4-$5")
    };

    valorInput.length === maximoInput ?
      (document.getElementById(`${mascaraInput}Input`).value =
        mascaras[mascaraInput]) :
      (document.getElementById(`${mascaraInput}Input`).value =
        valorSemPonto);
  }
</script>
<script type="text/javascript">
  $("#CEPInput").focusout(function() {
    $.ajax({
      url: "https://viacep.com.br/ws/" + $(this).val() + "/json/",
      dataType: "json",
      success: function(resposta) {
        $("#rua").val(resposta.logradouro);
        $("#complementocasa").val(resposta.complemento);
        $("#bairro").val(resposta.bairro);
        $("#cidade").val(resposta.localidade);
        $("#uf").val(resposta.uf);
        $("#numcasa").focus();
      },
    });
  });
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

</html>