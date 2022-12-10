const scheda = $("[name=id_scheda]").val()
const livello = $("[name=livelloScheda]").val()
$(document).ready(function() {
  initMap();
  $("#liv"+livello).addClass('active')
  $(".form-select, .form-control").addClass('form-select-sm')
  $("#stampa").on("click", function(){ window.print();});
  $("#elimina").on('click', delScheda)
});

function delScheda(){
  let check = confirm('Attenzione!!! Stai per eliminare una scheda, a cascata verranno eliminati in maniera permanente tutti i dati e i file connessi alla scheda\nVuoi procedere?')
  let dati = {id:scheda};
  if (check) { ajax('delScheda', dati); }
}

function ajax(trigger, dati){
  $.ajax({
    url: 'api/scheda.php',
    type: 'POST',
    dataType: 'json',
    data: {trigger: trigger, dati}
  })
  .done(function(data){
    alert(data.msg);
    window.location.href = 'catalogo.php';
  })
}

function initMap(){
  const bingKey = "Arsp1cEoX9gu-KKFYZWbJgdPEa8JkRIUkxcPr8HBVSReztJ6b0MOz3FEgmNRd4nM";
  const thunderFKey = "f1151206891e4ca7b1f6eda1e0852b2e";
  const thunderFTile = 'https://tile.thunderforest.com/outdoors/{z}/{x}/{y}.png?apikey='+thunderFKey;
  const thunderFAttrib = 'Maps &copy; <a href="https://www.thunderforest.com">Thunderforest</a>, Data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>';
  //extent della comunità di valle
  let extent = [[46.10, 10.89], [46.23, 11.09]];
  let bing = L.tileLayer.bing({bingMapsKey: bingKey, imagerySet:'AerialWithLabels'})
  let outdoor = L.tileLayer(thunderFTile, { attribution: thunderFAttrib, maxZoom: 19});
  let osm = L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
    opacity:0.7
  });

  var map = L.map('map');
  let poly = L.featureGroup().addTo(map);

  bing.addTo(map)
  var baseLayers = {
    "Satellite": bing,
    "OpenStreetMap": osm,
    "ThunderForest": outdoor
  };
  L.control.layers(baseLayers, null).addTo(map);

  let resetMap = L.Control.extend({
    options: { position: 'topleft'},
    onAdd: function (map) {
      var container = L.DomUtil.create('div', 'extentControl leaflet-bar leaflet-control leaflet-touch');
      btn=$("<a/>",{href:'#', id:'resetMap'}).appendTo(container);
      $("<i/>",{class:'fas fa-crosshairs'}).appendTo(btn)

      return container;
    }
  })
  map.addControl(new resetMap());
  $.getJSON( 'api/geom.php',{ trigger: 'getAree', tab:'area_int_poly', scheda:scheda})
    .done(function( json ) {
      if(json.features.length > 0){
        let layer = L.geoJson(json).addTo(poly);
        extent = layer.getBounds();
        map.fitBounds(extent);
      }else {
        map.fitBounds(extent);
      }
    })
    .fail(function( jqxhr, textStatus, error ) {
      var err = jqxhr+", "+textStatus + ", " + error;
      console.log("Request Failed: " + err );
    });

    $('body').on('click','#resetMap', function (e) {
      e.preventDefault()
      map.flyToBounds(extent);
    });

}
