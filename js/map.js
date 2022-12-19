var center,zoom,minZoom,map,resetMap,base,osm,thunderF,cluster,fonti,data={};
initMap()
function initMap(){
  center = [46.1662,11.0037];
  zoom = 10;
  // minZoom = 5;
  $("#loader").show();
  cluster = L.markerClusterGroup();
  map = L.map('map')
  map.on('load', function (event) {
    $("#loader").hide()
    $(".leaflet-tooltip").css("display","none")
  });
  map.setView(center,zoom);
  thunderF = L.tileLayer('https://tile.thunderforest.com/neighbourhood/{z}/{x}/{y}.png?apikey=f1151206891e4ca7b1f6eda1e0852b2e',{
    opacity:0.7
  })
  osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
    opacity:0.7
  }).addTo(map)
  var ico = L.icon({
    iconUrl: 'img/mapIco/marker_pieno.png',
    shadowUrl: 'img/mapIco/marker_ombra.png',
    iconSize:     [25, 50], // size of the icon
    shadowSize:   [50, 25], // size of the shadow
    iconAnchor:   [10, 50], // point of the icon which will correspond to marker's location
    shadowAnchor: [0, 22]  // the same for the shadow
  });
  data['oop']={file:'global.class.php',classe:'General',func:'getMarker'}

  $.ajax({
    url: connector
    , type: type
    , dataType: dataType
    , data: data
  })
  .done(function(data) {
    // console.log(data);
    data.forEach(function(m,i){
      let marker = L.marker([m.lat,m.lon],{
        gid:m.gid
        ,id:m.id
        ,area:m.area
        ,foto:m.foto
        , icon:ico
      });
      let pop = "<div class='text-center mapPopUp'>";
      pop += "<h5>"+m.area+"</h5>";
      pop += "</div>";
      // marker.bindPopup(pop);
      marker.on('click',bindPopUp)
      cluster.addLayer(marker);
    })
  });
  cluster.addTo(map);
  // $.getJSON("json/markerList.php", function(data) {
  //   console.log(data);
  //   if (!data.features) {
  //     console.log('no data');
  //   }else {
  //     fonti = L.geoJson(data,{
  //       pointToLayer: function (feature, latlng) {
  //         label = String(feature.properties.area)
  //         return L.marker(latlng, {icon: ico}).bindTooltip(label, {
  //           permanent: true,
  //           opacity: 0.7,
  //           direction: 'bottom',
  //           offset: L.point({x:0, y:0})
  //         }).openTooltip();
  //       }
  //     });
  //     cluster.addLayer(fonti);
  //     map.addLayer(cluster);
  //     map.fitBounds(cluster.getBounds());
  //     fonti.on('click',bindPopUp)
  //     const tooltipThreshold = 17;
  //     map.on('zoomend', function() {
  //       var z = map.getZoom();
  //       if (z < tooltipThreshold ) {
  //         $(".leaflet-tooltip").css("display","none")
  //       } else {
  //         $(".leaflet-tooltip").css("display","block")
  //       }
  //     })
  //   }
  // });

  resetMap = L.Control.extend({
    options: { position: 'topleft'},
    onAdd: function (map) {
      var container = L.DomUtil.create('div', 'extentControl leaflet-bar leaflet-control leaflet-touch');
      btn=$("<a/>",{href:'#'}).appendTo(container);
      $("<i/>",{class:'fas fa-home'}).appendTo(btn)
      btn.on('click', function (e) {
        e.preventDefault()
        // map.fitBounds(cluster.getBounds());
        map.setView(center,zoom);
      });
      return container;
    }
  })

  map.addControl(new resetMap());
  L.control.scale({imperial:false}).addTo(map);
  L.control.mousePosition({emptystring:'',prefix:'WGS84'}).addTo(map);
  $("[name=baseLayer]").on('change',function(){
    show = $(this).val()
    if (show == 'osm') {
      map.addLayer(osm)
      map.removeLayer(thunderF)
    }else {
      map.removeLayer(osm)
      map.addLayer(thunderF)

    }
  })
}
function bindPopUp(e) {
  prop = e.sourceTarget.options;
  console.log(prop);
  $("#nome-area").text(prop.area)

  $.getJSON("json/imgMapList.php",{area:prop.id})
  .done(function(data){ buildImgList(data) })
  .fail(function( jqxhr, textStatus, error ) { console.log( "Request Failed: " + textStatus + ", " + error ); })

  $("#panel").show().promise().done(function(){
    header = $(".panel-content>header").outerHeight();
    footer = $(".panel-content>footer").outerHeight();
    height = parseInt(header+footer+10)
    $(".panel-content>section").css("height","calc(100% - "+height+"px)")
    $(".panel-content").animate({marginRight:0},500);
  })
}

function buildImgList(data){
  var imgArr = []
  var imgItem;
  $.each(data,function(i,img){
    imgItem = "<div id='imgMap"+i+"' data-id='"+img.id+"' class='col-12 col-md-6 p-0 imgMapDiv'>"
    imgItem += "<div class='imgContent animation lozad' data-background-image='foto_medium/"+img.path+"'></div>"
    imgItem += "<div class='animation imgTxt d-none d-md-block'>"
    imgItem += "<p class='animation'>"+img.dgn_dnogg+"</p>"
    imgItem += "</div>"
    imgItem += "</div>"
    imgArr.push(imgItem)
  })
  $(".imgGallery").html(imgArr.join(''))
  $(".imgMapDiv").height($("#imgMap0").width()).on('click',function(){ linkScheda($(this).data('id')) });
  observer.observe();
}

function initSwitcher(){

}
