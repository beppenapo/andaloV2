// costanti per funzioni ajax
const connector = 'class/connector.php'
const type = 'POST'
const dataType = 'json'
const $root = $('html, body');
const observer = lozad('.lozad', { rootMargin: '10px 0px', threshold: 0.1 });
const page = window.location.pathname.split('/').pop().split('.')[0]
$(document).ready(function(){
  $('.scroll').on('click',function() {
    var href = $(this).data('id');
    var t = $("#"+href).offset().top
    $root.animate({ scrollTop: t - 60 }, 500, function () { window.location.hash = href; });
    return false;
  });
})


function wrapImgWidth(){ $(".imgDiv").height($("#img0").width()) }

function imgWall(limit){
  data={}
  data['oop']={file:'global.class.php',classe:'General',func:'imgWall'}
  data['dati']={limit:limit}
  $.ajax({url: connector, type: type, dataType: dataType, data: data})
    .done(function(data) {
      console.log(data);
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
