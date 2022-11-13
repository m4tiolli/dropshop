window.document.onload = function(){ 
    div = document.getElementById('msgbox');
    setTimeout(function(){
        div.style.display = 'none';
    }, 5000)
    div.style.transition = '.2s';
    div.style.opacity = 0;

    alerta = document.getElementById('msgsenha');
    setTimeout(function(){
        alerta.style.display = 'none';
    }, 5000)
    alerta.style.transition = '.2s';
    alerta.style.opacity = 0;
}