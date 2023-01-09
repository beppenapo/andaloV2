const FOTOAPI = 'https://www.bibliopaganella.org/foto_medium/';
// costanti per funzioni ajax
const connector = 'class/connector.php'
const type = 'POST'
const dataType = 'json'
const $root = $('html, body');
const observer = lozad('.lozad', { rootMargin: '10px 0px', threshold: 0.1 });
const page = window.location.pathname.split('/').pop().split('.')[0]
$(document).ready(function(){
  if (page=='gallery') {
    get=window.location.search;
    if (get) {
      g1 = get.slice(1).split('&')[0];
      g2 = get.slice(1).split('&')[1];
      if (g1.split('=')[1]=='titolo') { $("#txtSearch").val(g2.split('=')[1].replace(/\+/g,' '))}
    }
  }
  $('.scroll').on('click',function() {
    var href = $(this).attr('href').split("#").pop();
    var $target = $($("#"+href));
    $root.animate({ scrollTop: $target.offset().top }, 500, function () {window.location.hash = href; });
  });
  $("#txtSearch").tooltip({trigger:'focus',placement: "left"})

  $(".dropdown").on('show.bs.dropdown', function(){ $("#navbarDropdownMenuLink").addClass('linkActive'); })
  $(".dropdown").on('hide.bs.dropdown', function(){ $("#navbarDropdownMenuLink").removeClass('linkActive'); })

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

  $("body").on('click', '.hyperLink', function(event) {
    event.preventDefault();
    numsch = $(this).attr('href').slice(1);
    data={}
    data['oop']={file:'global.class.php',classe:'General',func:'getIdByNumsch'}
    data['dati']={numsch: numsch}
    $.ajax({url: connector, type: type, dataType: dataType, data: data})
    .done(function(data) { linkScheda(data[0].id) });
  });
  menuFooter();
})

function wrapImgWidth(){$(".imgDiv").height($("#img0").width())}

function imgWall(limit){
  data={}
  data['oop']={file:'global.class.php',classe:'General',func:'imgWall'}
  data['dati']={limit:limit, statoScheda:2}
  $.ajax({url: connector, type: type, dataType: dataType, data: data}).done(setGallery);
}
function lazyImg(){
  data={}
  data['oop']={file:'global.class.php',classe:'General',func:'lazyLoad'}
  $.ajax({url: connector, type: type, dataType: dataType, data: data})
    .done(function(data) {
      data.forEach(function(val,idx){
        if (!val.sog_titolo || val.sog_titolo == '-' || val.sog_titolo == '') {titolo = val.path.slice(0,-4); }else {titolo = val.sog_titolo;}
        d1=$("<div/>",{id:'img'+idx})
          .attr("data-scheda",val.id)
          .addClass('col-12 col-sm-6 col-md-4 col-lg-3 p-0 imgDiv')
          .appendTo('.progImg')
          .on('click',function(){ linkScheda(val.id) });
      })
    }
  );
}

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
      setGallery(data);
    });
}
function setGallery(data){
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
}
function linkScheda(id){
  var form = $("<form/>",{action:'scheda.php',method:'get'}).appendTo('body')
  $('<input/>',{type:'hidden',name:'scheda',value:id}).appendTo(form)
  form.submit();
}

function menuFooter(){
  $('.mainMenu .mf').each(function(){
    li=$("<li/>").appendTo('.menuFooter');
    $("<a/>",{class:"scroll animation", href:$(this).attr('href')}).text($(this).text()).appendTo(li);
  });
}
