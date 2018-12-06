//costanti per funzioni ajax
const connector='class/connector.php'
const type='POST'
const dataType='json'
$(document).ready(function(){

})

function wrapImgWidth(){ $(".imgDiv").height($("#img0").width()) }

function imgWall(){
  oop={file:'global.class.php',classe:'General',func:'imgWall'}
  limit = screen.width < 768 ? 10 : 20
  dati={limit:limit}
  $.ajax({url: connector, type: type, dataType: dataType, data: {oop:oop,dati:dati}})
    .done(function(data) {
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
}

function geotag(){
  oop={file:'global.class.php',classe:'General',func:'geotag'}
  $.ajax({url: connector, type: type, dataType: dataType, data: {oop:oop}})
    .done(function(data) {
      max = Math.max.apply(Math, data.map(function(o) { return o.schede; }))
      cluster = max / 10;
      data.forEach(function(val,idx){
        switch (true) {
          case (val.schede <= cluster): size = 12; break;
          case (val.schede > cluster && val.schede <= (cluster * 2) ): size = 14; break;
          case (val.schede > (cluster * 2) && val.schede <= (cluster * 3) ): size = 16; break;
          case (val.schede > (cluster * 3) && val.schede <= (cluster * 4) ): size = 18; break;
          case (val.schede > (cluster * 4) && val.schede <= (cluster * 5) ): size = 20; break;
          case (val.schede > (cluster * 5) && val.schede <= (cluster * 6) ): size = 22; break;
          case (val.schede > (cluster * 6) && val.schede <= (cluster * 7) ): size = 24; break;
          case (val.schede > (cluster * 7) && val.schede <= (cluster * 8) ): size = 26; break;
          case (val.schede > (cluster * 8) && val.schede <= (cluster * 9) ): size = 28; break;
          case (val.schede > (cluster * 9) && val.schede <= max ): size = 30; break;
          default: size = 10
        }
        btn = $("<label/>").addClass('geotag mr-3 animation').css("font-size",size).attr("data-id", val.id).text(val.area).appendTo('.geoTagContent');
        $("<span/>").text(val.schede).appendTo(btn)
      })
    }
  );
}
