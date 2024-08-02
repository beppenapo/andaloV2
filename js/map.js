var center,zoom,map,resetMap,base,osm,thunderF,cluster,fonti,data={};
initMap()

function initMap(){
  zoom = 3;
  map = L.map('map',{ minZoom: zoom})
  map.on('load', function (event) {
    $(".leaflet-tooltip").css("display","none")
  });

  cluster = L.markerClusterGroup({
    maxClusterRadius:50,
    iconCreateFunction: function(cluster) {
      var mark = cluster.getAllChildMarkers()
      var sum = 0
      var digit = 0
      mark.forEach(function(v,i){
        sum += v.feature.properties.foto
        digit = (sum+'').length
      })
      return new L.DivIcon({
        html: sum,
        className: 'cluster digit-'+digit,
        iconSize: null
      })
    }
  }).addTo(map);

  thunderF = L.tileLayer(TF_TILE,{opacity:0.7}).addTo(map)
  osm = L.tileLayer(OSM_TILE, {attribution: OSM_ATTRIB, opacity:0.7})

  var baseLayers = {
    "Thunderforest": thunderF,
    "OpenStreetMap": osm
  };
  let controlLayers = L.control.layers(baseLayers, null,{'collapsed':false}).addTo(map);

  const comunitaStyle = {
    fillColor: '#969696',
    color: '#969696',
    weight: 1,
    opacity: 1,
    fillOpacity: 0.4
  }

  let comunitaJson = new L.geoJson(comunita,{style:comunitaStyle}).addTo(map);
  controlLayers.addOverlay(comunitaJson, "Comunità di Valle");
  map.fitBounds(comunitaJson.getBounds());

  const ico = L.icon({
    iconUrl: 'img/mapIco/marker_pieno.png',
    shadowUrl: 'img/mapIco/marker_ombra.png',
    iconSize:     [25, 50],
    shadowSize:   [50, 25],
    iconAnchor:   [10, 50],
    shadowAnchor: [0, 22]
  });

  fetch('api/endpoint_index.php', {
    method: ajaxType,
    headers: headerJson,
    body: JSON.stringify({trigger:'markerList'}),
  })
  .then(response => response.json())
  .then(data => {
    if (data.length === 0) { return; }
    fonti = L.geoJson(data,{
      pointToLayer: function (feature, latlng) {
        let pop = "<div class='text-center mapPopUp'>";
        pop += "<h6>"+feature.properties.localita+"</h6>";
        pop += "<p class='m-0'>foto presenti: "+feature.properties.foto+"</p>";
        pop += "</div>";
        return L.marker(latlng, {icon: ico}).bindTooltip(pop, {
          opacity: 0.7,
          direction: 'top',
          offset: L.point({x:2, y:-50})
        }).openTooltip();
      }
    });
    fonti.on('click',bindPopUp)
    cluster.addLayer(fonti);
  })
  .catch(error => console.error('Errore nel caricamento dei marker:', error))
  .finally(() => {});

  resetMap = L.Control.extend({
    options: { position: 'topleft'},
    onAdd: function (map) {
      var container = L.DomUtil.create('div', 'extentControl leaflet-bar leaflet-control leaflet-touch');
      btn1=$("<a/>",{href:'#', title:'zoom sulla Comunità di valle'}).appendTo(container);
      $("<i/>",{class:'fas fa-globe'}).appendTo(btn1)
      btn1.on('click', function (e) {
        e.preventDefault()
        map.fitBounds(comunitaJson.getBounds());
      });
      btn2=$("<a/>",{href:'#', title:'visualizza tutte le aree di interesse'}).appendTo(container);
      $("<i/>",{class:'fas fa-location-dot'}).appendTo(btn2)
      btn2.on('click', function (e) {
        e.preventDefault()
        map.fitBounds(cluster.getBounds());
      });
      return container;
    }
  })

  map.addControl(new resetMap());
  L.control.scale({imperial:false}).addTo(map);
  L.control.mousePosition({emptystring:'',prefix:'WGS84'}).addTo(map);

}

function bindPopUp(e) {
  prop = e.sourceTarget.feature.properties;
  $("#nome-area > #nome").text(prop.localita)

  $("#panel").show().promise().done(function(){
    header = $(".panel-content>header").outerHeight();
    footer = $(".panel-content>footer").outerHeight();
    height = parseInt(header+footer+10)
    $(".panel-content>section").css("height","calc(100% - "+height+"px)")
    $(".panel-content").animate({marginRight:0},500);
  })

  loader.show();
  fetch('api/endpoint_index.php', {
    method: ajaxType,
    headers: headerJson,
    body: JSON.stringify({trigger:'imgMapList', area:prop.id_localita}),
  })
  .then(response => response.json())
  .then(data => {
    if (data.length === 0) { return; }
    data.forEach((img,idx) => {
      let imgMap = $("<div/>",{id:'imgMap'+idx, class:'col-12 col-md-6 p-0 imgMapDiv'}).appendTo('.imgGallery')
      $("<div/>",{class:'imgContent animation'}).css("background-image","url(foto/"+img.path+")").appendTo(imgMap)
      let imgTxt = $("<div/>",{class:'animation imgTxt d-none d-md-block'}).appendTo(imgMap)
      $("<p/>",{class:'animation'}).text(img.dgn_dnogg).appendTo(imgTxt)
      setHeight(img.id)
    })
    
  })
  .catch(error => console.error('Errore nel caricamento dei marker:', error))
  .finally(() => {loader.fadeOut('fast');});
}

function setHeight(id){
  $(".imgMapDiv")
    .height($("#imgMap0").width())
    .on('click',function(){ linkScheda(id) });
}