$(document).ready(function(){
  limit = screen.width < 768 ? 10 : 20
  imgWall(limit)
  echo.init({ callback: function (el, op) { $(el).html(''); } });
  $(".tag").on('click',function(){
    id=$(this).data('id')
    filtro=$(this).data('filtro')
    tag=$(this).data('tag')
    form = $('[name=geoTagForm]');
    $('<input/>',{type:'hidden',name:'val',value:id}).appendTo(form)
    $('<input/>',{type:'hidden',name:'tag',value:tag}).appendTo(form)
    $('<input/>',{type:'hidden',name:'filtro',value:filtro}).appendTo(form)
    form.submit();
  });
})

//quando un device viene ruotato ricalcolo l'altezza delle immagini
window.addEventListener("orientationchange", function() {
  window.setTimeout(function() { wrapImgWidth() }, 200);
}, false);
