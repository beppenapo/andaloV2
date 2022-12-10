const API = "api/drawGeom.php";
const bingKey = 'Arsp1cEoX9gu-KKFYZWbJgdPEa8JkRIUkxcPr8HBVSReztJ6b0MOz3FEgmNRd4nM';
var layers = [];
var i, ii, selectedFeature,interaction, features, vector;
var bing = [ 'Aerial', 'AerialWithLabelsOnDemand'];
var baseLayers = ['osm','Aerial', 'AerialWithLabelsOnDemand'];
var minZoomArea = 5000; //metri

var featuresToDelete = [];
var activeDrawInteraction;
var editingLayer;

var drawData = {
  id: $("[name=id]").val(),
  tipo: $("[name=tipo]").val(),
  area: $("[name=area]").val()
};
$("#titleGeom").text(drawData.area);
//baseLayer
let osm = new ol.layer.Tile({source: new ol.source.OSM()})
layers.push(osm);
for (i = 0, ii = bing.length; i < ii; ++i) {
  layers.push(
    new ol.layer.Tile({
      visible: false,
      preload: Infinity,
      source: new ol.source.BingMaps({
        key: bingKey,
        imagerySet: bing[i],
      }),
    })
  );
}
var optView = { center: ol.proj.fromLonLat([10.75, 45.87]), zoom: 12, minZoom:11, maxZoom:19};
var homeView = new ol.View(optView);
var fullScreen = new ol.control.FullScreen();

var featureTypes = drawData.tipo == 'area' ? 'ledro:area_int_poly,ledro:area_int_line,ledro:area_int_point' : 'ledro:ubicazione';
var source = new ol.source.Vector({
  url: 'http://78.46.230.205:8080/geoserver/ledro/ows?service=WFS&version=1.0.0&request=GetFeature&typeName='+featureTypes+'&outputFormat=application%2Fjson',
  // url: 'proxy.php?service=WFS&version=1.0.0&request=GetFeature&typeName=ledro:area_int_poly&outputFormat=application%2Fjson',
  format: new ol.format.GeoJSON()
});
vector = new ol.layer.Vector({ source: source });

editingLayer = new ol.layer.Vector({
  source: new ol.source.Vector(),
  style: new ol.style.Style({
    fill: new ol.style.Fill({
      color: 'rgba(255, 0, 0, 0.5)'
    }),
    stroke: new ol.style.Stroke({
      color: 'rgba(255, 0, 0, 0.7)'
    }),
    image: new ol.style.Circle({
      radius: 10,
      fill: new ol.style.Fill({
        color: 'rgba(255, 0, 0, 0.5)'
      })
    })
  })
});

layers.push(vector, editingLayer);

if(drawData.tipo == 'area') {
  caricaGeometrieArea(true);
} else {
  caricaGeometriaUbicazione(true);

  $('#drawGeom option:eq(1)').prop('selected',true);
  $('#drawGeom').prop('disabled',true);
}

var map = new ol.Map({
  // controls: ol.control.defaults().extend([fullScreen]),
  controls: [],
  target: 'map',
  layers: layers,
  view: homeView
});

map.on('pointermove', function(e) {
  if (e.dragging) return;
  var pixel = map.getEventPixel(e.originalEvent);
  var hit = map.hasFeatureAtPixel(pixel);
  map.getTargetElement().style.cursor = hit ? 'pointer' : '';
});

document.getElementById('remove').addEventListener('click', function() {
  var feature = selectedFeature;

  featuresToDelete.push({
    id: feature.get('id'),
    geometryType: feature.getGeometry().getType()
  });

  if(!editingLayer.getSource().getFeatures().length) {
    toggleEditButtons(false);
  }
  toggleSaveButton(true);

    editingLayer.getSource().removeFeature(feature);
    overlay.setPosition();
});

var remove_b = document.getElementById('overlay');
var overlay = new ol.Overlay({ element: remove_b });
map.addOverlay(overlay);
remove_b.style.display = 'block';

$("[name=mapControl]").on('click, change', function(){
  let el = $(this).get(0).tagName;
  let val = $(this).val();

  if(el == 'SELECT') {
    if(activeDrawInteraction) activeDrawInteraction.setActive(false);

    if(val) {
      activeDrawInteraction = interactions['draw' + val];
      activeDrawInteraction.setActive(true);
    }
  } else if(el == 'INPUT') {
    $("select#drawGeom option:eq(0)").prop('selected',true);
    if(activeDrawInteraction) activeDrawInteraction.setActive(false);

    if(val != 'pan') {
      activeDrawInteraction = interactions[val];
      activeDrawInteraction.setActive(true);
    }
  }

  interactions.snap.setActive(activeDrawInteraction && activeDrawInteraction.active);
});

const interactions = {
  drawpoint: new ol.interaction.Draw({ source: editingLayer.getSource(), type: 'Point' }),
  drawline: new ol.interaction.Draw({ source: editingLayer.getSource(), type: 'LineString' }),
  drawpoly: new ol.interaction.Draw({ source: editingLayer.getSource(), type: 'Polygon' }),
  modify: new ol.interaction.Modify({source: editingLayer.getSource()}),
  remove: new ol.interaction.Select({
        condition: ol.events.condition.click,
        layers: [editingLayer]
    }),
  snap: new ol.interaction.Snap({ source: vector.getSource() })
};
Object.values(interactions).forEach(i => i.setActive(false));

interactions.drawpoint.on('drawend', onDrawEnd);
interactions.drawline.on('drawend', onDrawEnd);
interactions.drawpoly.on('drawend', onDrawEnd);
interactions.modify.on('modifyend', onDrawEnd);
interactions.remove.on('select', onRemoveFeatureSelect);

function onDrawEnd(e) {
  var feature = e.feature || e.features.getArray()[0]; //con edit c'è target
  feature.set('is_modified', true);

  toggleEditButtons(true);
  toggleSaveButton(true);
}

function onRemoveFeatureSelect(event) {
  selectedFeature = event.selected[0];
  selectedFeature ? overlay.setPosition(selectedFeature.getGeometry().getExtent()): overlay.setPosition(undefined);
}

map.getInteractions().extend(Object.values(interactions));


function salvaGeometria() {
  var features = editingLayer.getSource().getFeatures(),
    format = new ol.format.WKT(),
  toSave = [];

  features.forEach(f => {
    if(!f.get('is_modified')) return;

  toSave.push({
    geometry: format.writeGeometry(f.getGeometry()),
    geometryType: f.getGeometry().getType(),
    id_area: drawData.id,
    id: f.get('id'),
    action: f.get('id') ? 'update' : 'insert'
  });
  });

  featuresToDelete.forEach(f => {
    f.action = 'delete';
    toSave.push(f);
  });

  if(toSave.length) {
    $.ajax(API, {
      type: 'POST',
      data: {
      action: 'save',
      type: drawData.tipo,
      features: toSave
      }
    }).done(function() {
      featuresToDelete = [];
      editingLayer.getSource().clear();
      source.refresh();

    if(drawData.tipo == 'area') {
      caricaGeometrieArea(true);
    } else {
      caricaGeometriaUbicazione(true);

      $('#drawGeom option:eq(1)').prop('selected',true);
      $('#drawGeom').prop('disabled',true);
    }

      //caricaGeometrie();
      toggleSaveButton(false);
    });
  }
}

function caricaGeometrieArea(zoom) {
  $.ajax(API + '?idArea=' + drawData.id).done(function(r) {
    var results = JSON.parse(r);
    const format = new ol.format.WKT();
    var features = [];

    results.forEach(res => {
      let geom = format.readGeometry(res.geometry);

      features.push(new ol.Feature({
        geometry: geom,
        id: res.id,
        id_area: res.id_area,
        is_modified: false
      }));
    });

    var src = editingLayer.getSource();

    if(features.length) {
      src.clear();
      src.addFeatures(features);
      toggleEditButtons(true);
    }

    if(zoom) {
      zoomToEditingFeatures();
    }
  });
}

function caricaGeometriaUbicazione(zoom) {
  $.ajax(API + '?idUbicazione=' + drawData.id).done(function(r) {
    if(!r) {
      interactions.drawpoint.setActive(true);
    } else {
      interactions.drawpoint.setActive(false);

      var res = JSON.parse(r);
      const format = new ol.format.WKT();

      var src = editingLayer.getSource(),
        geom = format.readGeometry(res.geometry);

      src.addFeature(new ol.Feature({
        geometry: geom,
        id: res.id,
        id_area: res.id_area,
        is_modified: false
      }));

      toggleEditButtons(true);
    }
    if(zoom) {
      zoomToEditingFeatures();
    }
  });
}


function zoomToEditingFeatures() {
  var extent = editingLayer.getSource().getExtent(),
    width = ol.extent.getWidth(extent);

  if(Math.abs(width) == Infinity) return;

  if(width > minZoomArea) {
    homeView.fit(extent);
  } else {
    var bufferSize = (minZoomArea - width) / 2;
    homeView.fit(ol.extent.buffer(extent, bufferSize));
  }
}

function toggleEditButtons(enable) {
  $("#modifica, #elimina").prop('disabled', !enable);
}
function toggleSaveButton(enable) {
  $("#salvaGeometria input").prop('disabled', !enable);
  $("#pan").prop('checked', true);
}

$(document).ready(function() {
  $("<button/>",{type:'button', class:'ol-control-button',html:"<i class='fas fa-home'></i>"})
    .appendTo(".ol-zoom")
    .find('i').css('font-size','.8em')
    .on('click',function(){
      optView.duration = 2000;
      homeView.animate(optView);
    }
  );
  $("[name=baseLayer]").on('change', function(){ toggleLayer($(this).val()); })
  $("[name=vectorLayer]").on('click', function(){ vector.setVisible($(this).is(":checked")); })
  $("[name=zoom]").on('click', function(event) {
    let zoom = $(this).val() == 1 ? map.getView().getZoom() + 1 : map.getView().getZoom() - 1;
    map.getView().animate({ zoom: zoom, duration: 250 })
  })

  $("[name=resetZoom]").on('click',function(){
    optView.duration = 2000;
    homeView.animate(optView);
  })

  map.on('moveend', function(e) {
    var newZoom = map.getView().getZoom();
    newZoom < 12 ? $("#zoomOut").prop('disabled',true) : $("#zoomOut").prop('disabled',false);
    newZoom > 18 ? $("#zoomIn").prop('disabled',true) : $("#zoomIn").prop('disabled',false);
  });

  // salvataggio
  $('#salvaGeometria').on('click', salvaGeometria);
});

var toggleLayers = [layers[0],layers[1],layers[2]]
function toggleLayer(base) {
  for (var i = 1, ii = toggleLayers.length; i < ii; ++i) {
    toggleLayers[i].setVisible(baseLayers[i] === base);
  }
}
