const FOTOAPI = 'https://www.bibliopaganella.org/foto_medium/';
let dataset = [];
//di default parti con le schede chiuse
initGallery(2)
window.addEventListener("orientationchange", function() {
  window.setTimeout(function() { wrapImgWidth() }, 200);
}, false);
$(document).ready(function() {
  $('.imgDiv').on('click', function(event) {
    id = $(this).data('id');
    linkScheda(id)
  });
  $('.scroll-gallery').on('click',function() {
    $root.animate({ scrollTop: $("#top").offset().top }, 500, function () {window.location.hash = 'top'; });
  });
});

$("[name=statoScheda]").on('change', function(){
  initGallery($(this).val())
})

function initGallery(statoScheda){
  dataset = [];
  $(".statfilter").text('');
  $('.loading').show();

  $('.wrapImg').html('');
  let titolo = '';
  data={}
  data['oop']={file:'global.class.php',classe:'General',func:'initGallery'}
  data['dati']={statoScheda:statoScheda}
  $("[name=filtro]").val() ? data['dati'].filtro = $("[name=filtro]").val() : null;
  $("[name=tag]").val() ? data['dati'].tag = $("[name=tag]").val() : null;
  $("[name=val]").val() ? data['dati'].val = $("[name=val]").val() : null;
  $.ajax({url: connector, type: type, dataType: dataType, data: data})
    .done(function(data) {
      if(data.length == 0){
        titolo = 'Nessuna immagine corrispondente al tuo criterio di ricerca!';
        $(".statfilter").text(titolo);
        $('.loading').hide();
        return false;
      }
      titolo = data.length == 1 ? data.length+" immagine" : data.length+" immagini"
      switch ($("[name=filtro]").val()) {
        case 'titolo' :
          titolo += data.length == 1 ? " che contiene ": " che contengono ";
          titolo += $("[name=tag]").val().split(" ").length == 1 ? ' la parola "'+$("[name=tag]").val()+'"' : ' le parole "'+$("[name=tag]").val().replace(/\s/g,', ')+'"';
        break;
        case 'geotag':
          titolo += data.length == 1 ? " scattata in " + $("[name=tag]").val(): " scattate in " + $("[name=tag]").val();
        break;
        default: titolo += data.length == 1 ? " totale" : " totali";

      }
      $(".statfilter").text(titolo);
      $('.loading').hide();
      data.forEach((img,idx) => {
        let titolo;
        if (img.dgn_dnogg && img.dgn_dnogg !== '-' && img.dgn_dnogg !== '') {
          titolo = img.dgn_dnogg;
        }else if (!img.dgn_dnogg && img.sog_titolo) {
          titolo = img.sog_titolo;
        }else {
          titolo = img.path.slice(0,-4);
        }
        let imgDiv = $("<div/>",{id:'img'+idx, class:'col-4 col-md-3 col-xl-2 p-0 imgDiv'}).attr({"data-id":img.id}).appendTo('.wrapImg').on('click',function(){ linkScheda(img.id) });
        let imgContent = $("<div/>",{class:'imgContent animation lozad'})
        .attr({"data-background-image":FOTOAPI+img.path})
        .appendTo(imgDiv)
        let imgTxt = $("<div/>", {class:'animation imgTxt d-none d-md-block'}).appendTo(imgDiv)
        $("<p/>",{class:'animation'}).text(titolo).appendTo(imgTxt)
      })
      wrapImgWidth();
      observer.observe();
      // data.forEach((item) => {dataset.push(item)});
      // setGallery()
      // setTimeout(setGallery(),500)

    });
}

function setGallery(){
  if (dataset.length > 0){

  }
  wrapImgWidth();
  observer.observe();
}
