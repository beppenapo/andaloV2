$(document).ready(function(){
  limit = screen.width < 768 ? 12 : 20
  imgWall(limit)
  echo.init({ callback: function (el, op) { $(el).html(''); } });

})

//quando un device viene ruotato ricalcolo l'altezza delle immagini
window.addEventListener("orientationchange", function() {
  window.setTimeout(function() { wrapImgWidth() }, 200);
}, false);
