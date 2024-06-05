$(document).ready(function(){
  limit = screen.width < 768 ? 12 : 24
  imgWall(limit)

})

//quando un device viene ruotato ricalcolo l'altezza delle immagini
window.addEventListener("orientationchange", function() {
  window.setTimeout(function() { wrapImgWidth() }, 200);
}, false);

$(".closePanel").on('click', function(){
  $(".panel-content").animate({marginRight:"-=50%"},500, function(){
    $("#panel").hide()
    $(".imgGallery").html('')
  });
})
