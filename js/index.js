$(document).ready(function(){
  imgWall()
  geotag()
  echo.init({ callback: function (el, op) { $(el).html(''); } });
})

//quando un device viene ruotato ricalcolo l'altezza delle immagini
window.addEventListener("orientationchange", function() {
  window.setTimeout(function() { wrapImgWidth() }, 200);
}, false);
