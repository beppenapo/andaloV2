$(document).ready(function(){
  oop={file:'global.class.php',classe:'General',func:'imgWall'}
  var limit = screen.width < 768 ? 10 : 20
  dati={limit:limit}
  $.ajax({url: connector, type: type, dataType: dataType, data: {oop:oop,dati:dati}})
    .done(function(data) {
      console.log(data);
      data.forEach(function(val,idx){
        if (!val.sog_titolo || val.sog_titolo == '-' || val.sog_titolo == '') {titolo = val.path.slice(0,-4); }else {titolo = val.sog_titolo;}
        d1=$("<div/>",{id:'img'+idx}).addClass('col-12 col-sm-6 col-md-4 col-lg-3 p-0 border imgDiv').appendTo('.wrapImg');
        d2=$("<div/>").addClass('imgContent animation text-center')
          // .css("background-image","url('foto/"+val.path+"')")
          .html('<i class="fas fa-circle-notch fa-spin fa-5x"></i>')
          .attr("data-echo-background","foto/"+val.path)
          .appendTo(d1)
        d3=$("<div/>").addClass('animation imgTxt').appendTo(d1)
        $("<p/>").addClass('animation').html(titolo).appendTo(d3)
        wrapImgWidth();
      })
    }
  );
  echo.init({ callback: function (el, op) { $(el).html(''); } });
})

//quando un device viene ruotato ricalcolo l'altezza delle immagini
window.addEventListener("orientationchange", function() {
  window.setTimeout(function() {
    wrapImgWidth()
  }, 200);
}, false);
function wrapImgWidth(){ $(".imgDiv").height($("#img0").width()) }
function orientationChanged() {
  const timeout = 120;
  return new window.Promise(function(resolve) {
    const go = (i, height0) => {
      window.innerHeight != height0 || i >= timeout ?
        resolve() :
        window.requestAnimationFrame(() => go(i + 1, height0));
    };
    go(0, window.innerHeight);
  });
}
