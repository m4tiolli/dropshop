function navegacao() {
  var x = document.getElementById("nav");
  if (x.className === "nav") {
    x.className += " responsive";
  } else {
    x.className = "nav";
  }
}

function pesquisa() {
  var botao = document.getElementById("pesquisa");
  var input = document.getElementById("txtBusca");
  if (botao.className === "pesquisaRes") {
    input.style.display = "block";
  } else {
    botao.className = "pesquisaRes";
  }
}

function mascaraData() {
  const input = document.getElementById("campo");
  input.addEventListener("keyup", formatarData);
  function formatarData(e) {
    var v = e.target.value.replace(/\D/g, "");

    v = v.replace(/(\d{2})(\d)/, "$1/$2");

    v = v.replace(/(\d{2})(\d)/, "$1/$2");

    e.target.value = v;
  }
}