<?php header("Content-type: text/html; charset=utf-8");
session_start();

include_once("conexao.php");
mysqli_set_charset($conexao, "utf8");

$tabela = "cliente";

$campos = "nome, cidade, bairro, rua, numcasa, complementocasa, cep, uf, telefone, cpf, email, senha, data_nasc";


if (isset($_POST['cadastrar'])) {

  $nomeF = $_POST['nome'];
  $cidadeF = $_POST['cidade'];
  $bairroF = $_POST['bairro'];
  $ruaF = $_POST['rua'];
  $numcasaF = $_POST['numcasa'];
  $complementocasaF = $_POST['complementocasa'];
  $cepF = $_POST['cep'];
  $ufF = $_POST['estado'];
  $telefoneF = $_POST['telefone'];
  $cpfF = $_POST['cpf'];
  $emailF = $_POST['email'];
  $senhaF = $_POST['senha'];
  $data = $_POST['data_nasc'];

  $sql = "INSERT INTO $tabela ($campos) 
			VALUES ('$nomeF', '$cidadeF', '$bairroF', '$ruaF', '$numcasaF', '$complementocasaF', '$cepF', '$ufF', '$telefoneF', '$cpfF', '$emailF', '$senhaF', '$data')";

  $instrucao = mysqli_query($conexao, $sql);

  if (!$instrucao) {
    die('Algo deu errado: ' . mysqli_error($conexao));
  } else {
    mysqli_close($conexao);
    $_SESSION['email'] = $emailF;
    $_SESSION['senha'] = $senhaF;
    header('Location: index.php');
    $_SESSION['msg'] = '<p id="mensagem">Bem Vindo, ' . $nomeF . '!</p>';
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
            <input class="effect-1" type="text" placeholder="Digite seu nome" name="nome" required>
            <span class="focus-border"></span>
          </div>
          <div class="col-3">
            <input class="effect-1" type="text" placeholder="Digite seu CPF" name="cpf" id="CPFInput" oninput="criaMascara('CPF')" onblur="validarCPF(this)" maxlength="11" required>
            <span class="focus-border"></span>
          </div>
          <div class="col-3">
            <input class="effect-1" type="text" oninput="data(this)" onblur="validardata(this)" name="data_nasc" placeholder="Digite sua data de nascimento" required>
            <span class="focus-border"></span>
          </div>
          <script>
            function data(i) {

              var v = i.value;

              if (isNaN(v[v.length - 1])) {
                i.value = v.substring(0, v.length - 1);
                return;
              }

              i.setAttribute("maxlength", "10");
              if (v.length == 2) i.value += "/";
              if (v.length == 5) i.value += "/";
              if (v.length == 6) i.value += "/";
            }
          </script>
          <div class="col-3">
            <input class="effect-1" type="text" placeholder="Digite seu telefone" name="telefone" id="CelularInput" oninput="criaMascara('Celular')" maxlength="11" required>
            <span class="focus-border"></span>
          </div>
          <div class="col-3">
            <input class="effect-1" type="text" placeholder="Digite seu CEP" name="cep" id="CEPInput" oninput="mascara(this)" required>
            <span class="focus-border"></span>
          </div>
        </div>
        <div class="two">
          <select name="estado" id="uf" required>
            <option value="">Selecione seu estado</option>
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
            <input class="effect-1" type="text" placeholder="Digite sua cidade" name="cidade" id="cidade" required>
            <span class="focus-border"></span>
          </div>
          <div class="col-3">
            <input class="effect-1" type="text" placeholder="Digite seu bairro" name="bairro" id="bairro" required>
            <span class="focus-border"></span>
          </div>
          <div class="col-3">
            <input class="effect-1" type="text" placeholder="Digite sua rua" name="rua" id="rua" required>
            <span class="focus-border"></span>
          </div>
          <div class="col-3">
            <input class="effect-1" type="text" placeholder="Digite seu número de residência" name="numcasa" id="numcasa" required>
            <span class="focus-border"></span>
          </div>
          <div class="col-3">
            <input class="effect-1" type="text" placeholder="Digite o complemento (opcional)" name="complementocasa" id="complementocasa">
            <span class="focus-border"></span>
          </div>
        </div>
      </div>
      <div class="three">
        <div class="col-3">
          <input class="effect-1" type="text" placeholder="Digite um email válido" name="email" required>
          <span class="focus-border"></span>
        </div>
        <div class="col-3">
          <input class="effect-1" type="password" placeholder="Digite uma senha válida" name="senha" id="senha" required>
          <span class="fa-regular fa-eye" id="olho"></span>
          <span class="focus-border"></span>
        </div>
      </div>
      <div class="four">
        <button type="submit" name="cadastrar">Cadastrar</button><br>
    </form>
    <form action="index.php">
      <button name="voltar" type="submit">Voltar</button>
    </form>
  </div>
  </div>

</body>
<script>
  function mascara(i) {

    var v = i.value;

    if (isNaN(v[v.length - 1])) {
      i.value = v.substring(0, v.length - 1);
      return;
    }

    i.setAttribute("maxlength", "9");
    if (v.length == 5) i.value += "-";
  }
</script>
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
<script>
  function _cpf(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');
    if (cpf == '') return false;
    if (cpf.length != 11 ||
      cpf == "00000000000" ||
      cpf == "11111111111" ||
      cpf == "22222222222" ||
      cpf == "33333333333" ||
      cpf == "44444444444" ||
      cpf == "55555555555" ||
      cpf == "66666666666" ||
      cpf == "77777777777" ||
      cpf == "88888888888" ||
      cpf == "99999999999")
      return false;
    add = 0;
    for (i = 0; i < 9; i++)
      add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
      rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
      return false;
    add = 0;
    for (i = 0; i < 10; i++)
      add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
      rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
      return false;
    return true;
  }

  function validarCPF(el) {
    if (!_cpf(el.value)) {

      alert("CPF inválido!");

      el.value = "";
    }
  }
</script>

<script>
  function validadata() {
    var data = document.getElementById("data_nasc").value; // pega o valor do input
    data = data.replace(/\//g, "-"); // substitui eventuais barras (ex. IE) "/" por hífen "-"
    var data_array = data.split("-"); // quebra a data em array

    // para o IE onde será inserido no formato dd/MM/yyyy
    if (data_array[0].length != 4) {
      data = data_array[2] + "-" + data_array[1] + "-" + data_array[0]; // remonto a data no formato yyyy/MM/dd
    }

    // comparo as datas e calculo a idade
    var hoje = new Date();
    var nasc = new Date(data);
    var idade = hoje.getFullYear() - nasc.getFullYear();
    var m = hoje.getMonth() - nasc.getMonth();
    if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;

    if (idade < 18) {
      alert(false);
    }

    if (idade >= 18 && idade <= 60) {
      alert(true);
    }

    // se for maior que 60 não vai acontecer nada!
    alert(false);
  }

  
</script>

</html>