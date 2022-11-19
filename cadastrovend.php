<?php header("Content-type: text/html; charset=utf-8");
session_start();

include_once("conexao.php");
mysqli_set_charset($conexao, "utf8");

$tabela = "vendedor";

$campos = "nome, cidade, bairro, rua, numcasa, cep, uf, cnpj, email, senha";


if (isset($_POST['cadastrar'])) {

  $nomeF = ucwords($_POST['nome']);
  $cidadeF = $_POST['cidade'];
  $bairroF = $_POST['bairro'];
  $ruaF = $_POST['rua'];
  $numcasaF = $_POST['numcasa'];
  $cepF = $_POST['cep'];
  $ufF = $_POST['estado'];
  $cnpjF = $_POST['cnpj'];
  $emailF = strtolower($_POST['email']);
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
    $_SESSION['msg'] = "Olá, " . $nomeF . "!";
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
</head>

<body>
  <div class="content">
    <img src="img/logo.png" alt="">
    <h2>Criar Conta</h2>
    <form action="" method="post" autocomplete="off">
      <div class="allone">
        <div class="one">
          <div class="col-3">
            <input class="effect-1" type="text" placeholder="Digite o nome da empresa" name="nome" required>
            <span class="focus-border"></span>
          </div>
          <div class="col-3">
            <input class="effect-1" type="text" placeholder="Digite o CNPJ" name="cnpj" id="cnpj" oninput="valcnpj(this)" required onblur="validarCNPJ(this)">
            <span class="focus-border"></span>
          </div>
          <div class="col-3">
            <input class="effect-1" type="text" placeholder="Digite o CEP" name="cep" id="CEPInput" oninput="mascara(this)" maxlength="8" required>
            <span class="focus-border"></span>
          </div>
        </div>
        <div class="two">
          <select name="estado" id="uf" required>
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
            <input class="effect-1" type="text" placeholder="Digite a cidade" name="cidade" id="cidade" required>
            <span class="focus-border"></span>
          </div>
          <div class="col-3">
            <input class="effect-1" type="text" placeholder="Digite o bairro" name="bairro" id="bairro" required>
            <span class="focus-border"></span>
          </div>
          <div class="col-3">
            <input class="effect-1" type="text" placeholder="Digite a rua" name="rua" id="rua" required>
            <span class="focus-border"></span>
          </div>
          <div class="col-3">
            <input class="effect-1" type="text" placeholder="Digite o logradouro" name="numcasa" id="numcasa" required>
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
          <input class="effect-1" type="password" placeholder="Digite uma senha válida" name="senha" id="senha" minlength="8" required>
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
function validarcnpj(cnpj) {
 
 cnpj = cnpj.replace(/[^\d]+/g,'');

 if(cnpj == '') return false;
  
 if (cnpj.length != 14)
     return false;

 // Elimina CNPJs invalidos conhecidos
 if (cnpj == "00000000000000" || 
     cnpj == "11111111111111" || 
     cnpj == "22222222222222" || 
     cnpj == "33333333333333" || 
     cnpj == "44444444444444" || 
     cnpj == "55555555555555" || 
     cnpj == "66666666666666" || 
     cnpj == "77777777777777" || 
     cnpj == "88888888888888" || 
     cnpj == "99999999999999")
     return false;
      
 // Valida DVs
 tamanho = cnpj.length - 2
 numeros = cnpj.substring(0,tamanho);
 digitos = cnpj.substring(tamanho);
 soma = 0;
 pos = tamanho - 7;
 for (i = tamanho; i >= 1; i--) {
   soma += numeros.charAt(tamanho - i) * pos--;
   if (pos < 2)
         pos = 9;
 }
 resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
 if (resultado != digitos.charAt(0))
     return false;
      
 tamanho = tamanho + 1;
 numeros = cnpj.substring(0,tamanho);
 soma = 0;
 pos = tamanho - 7;
 for (i = tamanho; i >= 1; i--) {
   soma += numeros.charAt(tamanho - i) * pos--;
   if (pos < 2)
         pos = 9;
 }
 resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
 if (resultado != digitos.charAt(1))
       return false;
        
 return true;
 
}

function validarCNPJ(el) {
    if (!validarcnpj(el.value)) {

      alert("CNPJ inválido!");

      el.value = "";
    }
  }
</script>

<script>
  function valcnpj(j) {

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

</html>