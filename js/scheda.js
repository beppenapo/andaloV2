const BING_KEY = 'Arsp1cEoX9gu-KKFYZWbJgdPEa8JkRIUkxcPr8HBVSReztJ6b0MOz3FEgmNRd4nM';
let item = $("[name=item]").val();
let marker;
wrapImgWidth();
observer.observe();
initSmallMap();
$(document).ready(function() {
  $(".feedbackMsg, #smallMap").hide()
  $('.imgOverlay').on('click', function() {
    $('.imgModal').fadeIn('fast',function(){
      $('body').addClass('modal-open');
    });
  });
  $('[name=closeModal]').on('click', function() {
    $('.imgModal').fadeOut('fast',function(){
      $('body').removeClass('modal-open');
    });
  });
  $("button.sendFeedback").on('click',function(e){
    form = $("[name=feedbackForm]");
    isvalidate = form[0].checkValidity();
    if (isvalidate) {
      e.preventDefault()
      data={}
      dati={}
      data['oop']={file:'global.class.php',classe:'General',func:'feedback'}
      campi = form.find(".form-control")
      $.each(campi,function(i,v){ dati[v.name]=v.value })
      data['dati']=dati
      $.ajax({url: connector, type: type, dataType: dataType, data:data})
      .done(function(data) { $(".feedbackMsg.alert-success").fadeIn(500,fadeout(".feedbackMsg.alert-success")); })
      .fail(function(data) { $(".feedbackMsg.alert-danger").fadeIn(500,fadeout(".feedbackMsg.alert-danger"));})
      .always(function() { console.log("complete"); });
    }
  })
});

function fadeout(el){ setInterval(function(){ $(el).fadeOut(500) },3000); }
function initSmallMap(){
  const bounds = [[46.10539894026305,10.827382372853421],[46.2405342513989,11.157272035155751]];
  const map = L.map('smallMap',{ zoomControl:true});
  const osm = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: 'Map data (c)OpenStreetMap contributors'}).addTo(map);
  const bing = L.tileLayer.bing({bingMapsKey: BING_KEY, imagerySet:'AerialWithLabels'})
  let baseLayers = {
    "OpenStreetMap": osm,
    "Bing Satellite": bing,
  };
  L.control.layers(baseLayers, null,{collapsed: false}).addTo(map);
  $.getJSON( 'class/json.class.php', {id: item} )
  .done(function( json ) {
    if( json.features){
      $("#smallMap").show()
      marker = L.geoJson(json,{
        style: {
          fillOpacity: 0.1,
          fillColor: '#ff0000',
          color:'#ff0000',
          weight:1
        },
        onEachFeature: function (feature, layer) {
          layer.bindTooltip(feature.properties.area, {permanent: false, opacity: 0.7});
        }
      });
      map.addLayer(marker);
      map.fitBounds(marker.getBounds());
    }
  })
  .fail(function( jqxhr, textStatus, error ) {
    var err = textStatus + ", " + error;
    console.log("Request Failed: " + err );
  });

  L.easyButton('fa-globe', function(btn, map){ map.flyToBounds(marker.getBounds()); }).addTo(map);
}
