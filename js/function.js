// costanti per funzioni ajax
const connector = 'class/connector.php'
const type = 'POST'
const dataType = 'json'
const $root = $('html, body');
$(document).ready(function(){
  $('.scroll').on('click',function() {
    var href = $(this).data('id');
    var t = $("#"+href).offset().top
    console.log(t);
    $root.animate({ scrollTop: t }, 500, function () { window.location.hash = href; });
    return false;
  });
})

const observer = lozad('.lozad', { rootMargin: '10px 0px', threshold: 0.1 });

function wrapImgWidth(){ $(".imgDiv").height($("#img0").width()) }

function imgWall(limit){
  data={}
  data['oop']={file:'global.class.php',classe:'General',func:'imgWall'}
  data['dati']={limit:limit}
  // oop={file:'global.class.php',classe:'General',func:'imgWall'}
  // dati={limit:limit}
  $.ajax({url: connector, type: type, dataType: dataType, data: data})
    .done(function(data) {
      data.forEach(function(val,idx){
        if (!val.sog_titolo || val.sog_titolo == '-' || val.sog_titolo == '') {titolo = val.path.slice(0,-4); }else {titolo = val.sog_titolo;}
        d1=$("<div/>",{id:'img'+idx})
          .attr("data-scheda",val.id)
          .addClass('col-12 col-sm-6 col-md-4 col-lg-3 p-0 imgDiv')
          .appendTo('.wrapImg')
          .on('click',function(){ linkScheda(val.id) });
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

// function lazyImg(){
//   data={}
//   data['oop']={file:'global.class.php',classe:'General',func:'lazyLoad'}
//   $.ajax({url: connector, type: type, dataType: dataType, data: data})
//   .done(function(data) {
//       data.forEach(function(val,idx){
//           val.path.slice(0,-4); }else {titolo = val.sog_titolo;}
//           d1=$("<div/>",{id:'img'+idx})
//           .attr("data-scheda",val.id)
//           .addClass('col-12 col-sm-6 col-md-4 col-lg-3 p-0 imgDiv')
//           .appendTo('.wrapImg')
//           .on('click',function(){ linkScheda(val.id) });
//           d2=$("<div/>").addClass('imgContent animation text-center lozad')
//           .html('<i class="fas fa-circle-notch fa-spin fa-5x"></i>')
//           .attr("data-background-image","foto_small/"+val.path)
//           .appendTo(d1)
//           wrapImgWidth();
//         })
//       }
//     );
//   }
// }

function linkScheda(id){
  var form = $("<form/>",{action:'scheda.php',method:'post'}).appendTo('body')
  $('<input/>',{type:'hidden',name:'scheda',value:id}).appendTo(form)
  form.submit();
}

function geotag () {
  oop={file:'global.class.php',classe:'General',func:'geotag'}
  $.ajax({url: connector, type: type, dataType: dataType, data: {oop:oop}})
    .done(function(data) {
      max = Math.max.apply(Math, data.map(function(o) { return o.schede; }))
      cluster = max / 10;
      data.forEach(function(val,idx){
        switch (true) {
          case (val.schede <= cluster): size = 16; break;
          case (val.schede > cluster && val.schede <= (cluster * 2) ): size = 18; break;
          case (val.schede > (cluster * 2) && val.schede <= (cluster * 3) ): size = 20; break;
          case (val.schede > (cluster * 3) && val.schede <= (cluster * 4) ): size = 22; break;
          case (val.schede > (cluster * 4) && val.schede <= (cluster * 5) ): size = 24; break;
          case (val.schede > (cluster * 5) && val.schede <= (cluster * 6) ): size = 26; break;
          case (val.schede > (cluster * 6) && val.schede <= (cluster * 7) ): size = 28; break;
          case (val.schede > (cluster * 7) && val.schede <= (cluster * 8) ): size = 30; break;
          case (val.schede > (cluster * 8) && val.schede <= (cluster * 9) ): size = 32; break;
          case (val.schede > (cluster * 9) && val.schede <= max ): size = 34; break;
          default: size = 14
        }
        btn = $("<label/>").addClass('geotag mr-3 animation rounded').css("font-size",size).attr("data-id", val.id).text(val.area).appendTo('.geoTagContent');
        $("<span/>").text(val.schede).appendTo(btn)
      })
    }
  );
}
