$(window).load(function () {
  $(".col-3 input").val("");

  $(".input-effect input").focusout(function () {
    if ($(this).val() != "") {
      $(this).addClass("has-content");
    } else {
      $(this).removeClass("has-content");
    }
  });
});

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
