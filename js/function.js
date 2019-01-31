// costanti per funzioni ajax
const connector = 'class/connector.php'
const type = 'POST'
const dataType = 'json'
const $root = $('html, body');
const observer = lozad('.lozad', { rootMargin: '10px 0px', threshold: 0.1 });
const page = window.location.pathname.split('/').pop().split('.')[0]
$(document).ready(function(){
  $('.scroll').on('click',function() {
    var href = $(this).attr('href').split("#").pop();
    var t = $("#"+href).offset().top
    $root.animate({ scrollTop: t - 60 }, 500, function () { window.location.hash = href; });
    return false;
  });
  $(".dropdown").on('show.bs.dropdown', function(){
    $("#navbarDropdownMenuLink").addClass('linkActive');
  })
  $(".dropdown").on('hide.bs.dropdown', function(){
    $("#navbarDropdownMenuLink").removeClass('linkActive');
  })

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
    numsch = $(this).attr('href');
    data={}
    data['oop']={file:'global.class.php',classe:'General',func:'getIdByNumsch'}
    data['dati']={numsch: numsch}
    $.ajax({url: connector, type: type, dataType: dataType, data: data})
    .done(function(data) {linkScheda(data[0].id_scheda)});
  });
})


function wrapImgWidth(){ $(".imgDiv").height($("#img0").width()) }

function imgWall(limit){
  data={}
  data['oop']={file:'global.class.php',classe:'General',func:'imgWall'}
  data['dati']={limit:limit}
  $.ajax({url: connector, type: type, dataType: dataType, data: data})
    .done(function(data) {
      data.forEach(function(val,idx){
        if (!val.sog_titolo || val.sog_titolo == '-' || val.sog_titolo == '') {titolo = val.path.slice(0,-4); }else {titolo = val.sog_titolo;}
        d1=$("<div/>",{id:'img'+idx})
          .attr("data-scheda",val.id_scheda)
          .addClass('col-12 col-sm-6 col-md-4 col-lg-3 p-0 imgDiv')
          .appendTo('.wrapImg')
          .on('click',function(){ linkScheda(val.id_scheda) });
        d2=$("<div/>").addClass('imgContent animation text-center')
          .html('<i class="fas fa-circle-notch fa-spin fa-5x"></i>')
          .attr("data-echo-background","foto_medium/"+val.path)
          .appendTo(d1)
        d3=$("<div/>")
          .addClass('animation imgTxt')
          .appendTo(d1)
        $("<p/>").addClass('animation').html(titolo).appendTo(d3)
        wrapImgWidth();
      })
    }
  );
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

function linkScheda(id){
  var form = $("<form/>",{action:'scheda.php',method:'post'}).appendTo('body')
  $('<input/>',{type:'hidden',name:'scheda',value:id}).appendTo(form)
  form.submit();
}
