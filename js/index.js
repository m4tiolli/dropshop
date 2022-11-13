window.document.onload = function(e){ 
    div = document.getElementById('msgbox');
    div.style.transition = '.2s';
    div.style.opacity = 0;
    setTimeout(function(){
        div.style.display = 'none';
    }, 5000)
}