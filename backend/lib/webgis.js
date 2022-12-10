/******************************************************************************/
/*****************  FUNZIONI OPENLAYERS  ******************************************/
/******************************************************************************/
var gsat, comuni, comuniLayer,  arrayOSM, osm, toponomastica; //baselayer
var aree_carto, aree_archeo, aree_archivi, aree_architett, aree_biblio, aree_cultmat,aree_cultmat_line, aree_foto, aree_orale, aree_stoart, ubicazione, aree_line, aree; //overlay
var ubi_archeo, ubi_archit, ubi_archiv, ubi_biblio, ubi_foto, ubi_mater, ubi_oral, ubi_stoart;
var highlightLayer, listalayer, listaUbi,control, hover,actLayer;
var info, extent, highlightCtrl, selectCtrl, pan, zoomin, popupUbi, cqlHub; //funzioni o comandi
var proj900913, proj4326, proj32632, proj3857;
var CLUSTER_SCALE_THRESHOLD = 25000;
var previousMapScale;

var bingKey = 'Arsp1cEoX9gu-KKFYZWbJgdPEa8JkRIUkxcPr8HBVSReztJ6b0MOz3FEgmNRd4nM';
function init() {
    OpenLayers.ProxyHost = "/cgi-bin/proxy.cgi?url=";
    format = 'image/png';
    map = new OpenLayers.Map ("map", {
        controls:[
            new OpenLayers.Control.Navigation(),
            new OpenLayers.Control.Zoom(),
            new OpenLayers.Control.MousePosition({div:document.getElementById("coord")}),
        ],
        resolutions: [156543.03390625, 78271.516953125, 39135.7584765625, 19567.87923828125, 9783.939619140625, 4891.9698095703125, 2445.9849047851562, 1222.9924523925781, 611.4962261962891, 305.74811309814453, 152.87405654907226, 76.43702827453613, 38.218514137268066, 19.109257068634033, 9.554628534317017, 4.777314267158508, 2.388657133579254, 1.194328566789627, 0.5971642833948135, 0.29858214169740677, 0.14929107084870338, 0.07464553542435169, 0.037322767712175846, 0.018661383856087923, 0.009330691928043961, 0.004665345964021981, 0.0023326729820109904, 0.0011663364910054952, 5.831682455027476E-4, 2.915841227513738E-4, 1.457920613756869E-4],
        maxResolution: 'auto',
        units: 'm',
        projection: new OpenLayers.Projection("EPSG:3857"),
        displayProjection: new OpenLayers.Projection("EPSG:4326")
    });
    var scalebar = new OpenLayers.Control.ScaleBar({div:document.getElementById("scalebar")});
    map.addControl(scalebar);
    extent = new OpenLayers.Bounds(1209497.66727411, 5790076.9394499,1239755.9815138, 5818463.27737179);
    proj900913 = new OpenLayers.Projection("EPSG:900913");
    proj4326 = new OpenLayers.Projection("EPSG:4326");
    proj32632 = new OpenLayers.Projection("EPSG:32632");
    proj3857 = new OpenLayers.Projection("EPSG:3857");

    gsat = new OpenLayers.Layer.Bing({name: "Aerial",key: bingKey,type: "Aerial"});
    osm = new OpenLayers.Layer.OSM();
    map.addLayers([gsat,osm]);


    comuni = new OpenLayers.Layer.WMS("comuni", "http://78.46.230.205:8080/geoserver/wms",{
        srs: 'EPSG:3857',
        layers: ['andalo:comuni'],
        styles: '',
        format: format,
        transparent: true
    }
    ,{isBaseLayer: false},{singleTile: true, ratio: 1},{ tileSize: new OpenLayers.Size(256,256)} );
    map.addLayer(comuni);

//comuni.setVisibility(false);


    aree_archeo = new OpenLayers.Layer.WMS("Aree archeologiche", "http://78.46.230.205:8080/geoserver/wms",{
        srs: 'EPSG:3857',
        layers: ['andalo:aree_archeo_poly'],
        styles: '',
        format: format,
        transparent: true
    }
    ,{isBaseLayer: false},{singleTile: true, ratio: 1},{ tileSize: new OpenLayers.Size(256,256)});
    map.addLayer(aree_archeo);
    aree_archeo.setVisibility(false);

    aree_architett = new OpenLayers.Layer.WMS("Aree architettoniche", "http://78.46.230.205:8080/geoserver/wms",{
        srs: 'EPSG:3857',
        layers: ['andalo:aree_architett_poly'],
        styles: '',
        format: format,
        transparent: true
    }
    ,{isBaseLayer: false},{singleTile: true, ratio: 1},{ tileSize: new OpenLayers.Size(256,256)});
    map.addLayer(aree_architett);
    aree_architett.setVisibility(false);

    aree_archivi = new OpenLayers.Layer.WMS("Aree archivistiche", "http://78.46.230.205:8080/geoserver/wms",{
        srs: 'EPSG:3857',
        layers: ['andalo:aree_archiv_poly'],
        styles: '',
        format: format,
        transparent: true
    }
    ,{isBaseLayer: false},{singleTile: true, ratio: 1},{ tileSize: new OpenLayers.Size(256,256)});
    map.addLayer(aree_archivi);
    aree_archivi.setVisibility(false);

    aree_biblio = new OpenLayers.Layer.WMS("Aree bibliografiche", "http://78.46.230.205:8080/geoserver/wms",{
        srs: 'EPSG:3857',
        layers: ['andalo:aree_biblio_poly'],
        styles: '',
        format: format,
        transparent: true
    }
    ,{isBaseLayer: false},{singleTile: true, ratio: 1},{ tileSize: new OpenLayers.Size(256,256)});
    map.addLayer(aree_biblio);
    aree_biblio.setVisibility(false);

    aree_cultmat = new OpenLayers.Layer.WMS("Aree cultura materiale", "http://78.46.230.205:8080/geoserver/wms",{
        srs: 'EPSG:3857',
        layers: ['andalo:aree_mater_poly'],
        styles: '',
        format: format,
        transparent: true
    }
    ,{isBaseLayer: false},{singleTile: true, ratio: 1},{ tileSize: new OpenLayers.Size(256,256)});
    map.addLayer(aree_cultmat);
    aree_cultmat.setVisibility(false);

    aree_cultmat_line = new OpenLayers.Layer.WMS("Aree cultura materiale linee", "http://78.46.230.205:8080/geoserver/wms",{
        srs: 'EPSG:3857',
        layers: ['andalo:aree_mater_line'],
        styles: '',
        format: format,
        transparent: true
    }
    ,{isBaseLayer: false},{singleTile: true, ratio: 1},{ tileSize: new OpenLayers.Size(256,256)});
    map.addLayer(aree_cultmat_line);
    aree_cultmat_line.setVisibility(false);

    aree_foto = new OpenLayers.Layer.WMS("Aree foto", "http://78.46.230.205:8080/geoserver/wms",{
        srs: 'EPSG:3857',
        layers: ['andalo:aree_foto_poly'],
        styles: '',
        format: format,
        transparent: true
    }
    ,{isBaseLayer: false},{singleTile: true, ratio: 1},{ tileSize: new OpenLayers.Size(256,256)});
    map.addLayer(aree_foto);
    aree_foto.setVisibility(false);

    aree_orale = new OpenLayers.Layer.WMS("Aree orale", "http://78.46.230.205:8080/geoserver/wms",{
        srs: 'EPSG:3857',
        layers: ['andalo:aree_orale_poly'],
        styles: 'orale',
        format: format,
        transparent: true
    }
    ,{isBaseLayer: false},{singleTile: true, ratio: 1},{ tileSize: new OpenLayers.Size(256,256)});
    map.addLayer(aree_orale);
    aree_orale.setVisibility(false);

    aree_stoart = new OpenLayers.Layer.WMS("Aree storico-artistiche", "http://78.46.230.205:8080/geoserver/wms",{
        srs: 'EPSG:3857',
        layers: ['andalo:aree_stoart_poly'],
        styles: '',
        format: format,
        transparent: true
    }
    ,{isBaseLayer: false},{singleTile: true, ratio: 1},{ tileSize: new OpenLayers.Size(256,256)});
    map.addLayer(aree_stoart);
    aree_stoart.setVisibility(false);

    aree_carto = new OpenLayers.Layer.WMS("Aree cartografiche", "http://78.46.230.205:8080/geoserver/wms",{
        srs: 'EPSG:3857',
        layers: ['andalo:aree_carto_poly'],
        styles: '',
        format: format,
        transparent: true
    }
    ,{isBaseLayer: false},{tiled: true, ratio: 1},{ tileSize: new OpenLayers.Size(256,256)});
    map.addLayer(aree_carto);
    aree_carto.setVisibility(false);

    var s = new OpenLayers.StyleMap({
        "default": new OpenLayers.Style({fillOpacity:0,strokeOpacity:0}),
        "select": new OpenLayers.Style({strokeColor: "#1D22CF",strokeWidth:3,fillColor: "#1D22CF", fillOpacity:0.6, graphicZIndex: 2}),
        "active": new OpenLayers.Style({fillColor: "#7578F5", fillOpacity:0.6, graphicZIndex: 2})
    });
    var hiLy = ["area_int_poly", "area_int_line"]
    highlightLayer = new OpenLayers.Layer.Vector("Highlighted", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        styleMap: s,
        protocol: new OpenLayers.Protocol.WFS({
            version:     "1.0.0",
            url:         "http://78.46.230.205:8080/geoserver/wfs",
            featureType: hiLy,
            featureNS:   "http://78.46.230.205/andalo",
            srsName:     "EPSG:3857",
            geometryName:"the_geom"
        })
    });
    map.addLayer(highlightLayer);

    actLayer = new OpenLayers.Layer.Vector("Active", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        styleMap: s,
        protocol: new OpenLayers.Protocol.WFS({
            version:     "1.0.0",
            url:         "http://78.46.230.205:8080/geoserver/wfs",
            featureType: "area_int_poly",
            featureNS:   "http://78.46.230.205/andalo",
            srsName:     "EPSG:3857",
            geometryName:"the_geom",
            schema:      "http://78.46.230.205:8080/andalo?service=WFS&version=1.0.0&request=DescribeFeatureType&TypeName=area_int_poly"
        })
    });
    map.addLayer(actLayer);

    ubi_archeo = new OpenLayers.Layer.Vector("ubi_archeo", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        protocol: new OpenLayers.Protocol.WFS({
            version:     "1.0.0",
            url:         "http://78.46.230.205:8080/geoserver/wfs",
            featureType: "ubi_archeo",
            featureNS:   "http://78.46.230.205/andalo",
            srsName:     "EPSG:3857",
            geometryName:"the_geom",
            schema:      "http://78.46.230.205:8080/andalo?service=WFS&version=1.0.0&request=DescribeFeatureType&TypeName=ubi_archeo"
        })
    });
    map.addLayer(ubi_archeo);
    ubi_archeo.setVisibility(false);

    ubi_archit = new OpenLayers.Layer.Vector("ubi_archit", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        protocol: new OpenLayers.Protocol.WFS({
            version:     "1.0.0",
            url:         "http://78.46.230.205:8080/geoserver/wfs",
            featureType: "ubi_archit",
            featureNS:   "http://78.46.230.205/andalo",
            srsName:     "EPSG:3857",
            geometryName:"the_geom",
            schema:      "http://78.46.230.205:8080/andalo?service=WFS&version=1.0.0&request=DescribeFeatureType&TypeName=ubi_archit"
        })
    });
    map.addLayer(ubi_archit);
    ubi_archit.setVisibility(false);

    ubi_archiv = new OpenLayers.Layer.Vector("ubi_archiv", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        protocol: new OpenLayers.Protocol.WFS({
            version:     "1.0.0",
            url:         "http://78.46.230.205:8080/geoserver/wfs",
            featureType: "ubi_archiv",
            featureNS:   "http://78.46.230.205/andalo",
            srsName:     "EPSG:3857",
            geometryName:"the_geom",
            schema:      "http://78.46.230.205:8080/andalo?service=WFS&version=1.0.0&request=DescribeFeatureType&TypeName=ubi_archiv"
        })
    });
    map.addLayer(ubi_archiv);
    ubi_archiv.setVisibility(false);

    ubi_biblio = new OpenLayers.Layer.Vector("ubi_biblio", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        protocol: new OpenLayers.Protocol.WFS({
            version:     "1.0.0",
            url:         "http://78.46.230.205:8080/geoserver/wfs",
            featureType: "ubi_biblio",
            featureNS:   "http://78.46.230.205/andalo",
            srsName:     "EPSG:3857",
            geometryName:"the_geom",
            schema:      "http://78.46.230.205:8080/andalo?service=WFS&version=1.0.0&request=DescribeFeatureType&TypeName=ubi_biblio"
        })
    });
    map.addLayer(ubi_biblio);
    ubi_biblio.setVisibility(false);

    ubi_foto = new OpenLayers.Layer.Vector("ubi_foto", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        protocol: new OpenLayers.Protocol.WFS({
            version:     "1.0.0",
            url:         "http://78.46.230.205:8080/geoserver/wfs",
            featureType: "ubi_foto",
            featureNS:   "http://78.46.230.205/andalo",
            srsName:     "EPSG:3857",
            geometryName:"the_geom",
            schema:      "http://78.46.230.205:8080/andalo?service=WFS&version=1.0.0&request=DescribeFeatureType&TypeName=ubi_foto"
        })
    });
    map.addLayer(ubi_foto);
    ubi_foto.setVisibility(false);

    ubi_mater = new OpenLayers.Layer.Vector("ubi_mater", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        protocol: new OpenLayers.Protocol.WFS({
            version:     "1.0.0",
            url:         "http://78.46.230.205:8080/geoserver/wfs",
            featureType: "ubi_mater",
            featureNS:   "http://78.46.230.205/andalo",
            srsName:     "EPSG:3857",
            geometryName:"the_geom",
            schema:      "http://78.46.230.205:8080/andalo?service=WFS&version=1.0.0&request=DescribeFeatureType&TypeName=ubi_mater"
        })
    });
    map.addLayer(ubi_mater);
    ubi_mater.setVisibility(false);

    ubi_oral = new OpenLayers.Layer.Vector("ubi_oral", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        protocol: new OpenLayers.Protocol.WFS({
            version:     "1.0.0",
            url:         "http://78.46.230.205:8080/geoserver/wfs",
            featureType: "ubi_oral",
            featureNS:   "http://78.46.230.205/andalo",
            srsName:     "EPSG:3857",
            geometryName:"the_geom",
            schema:      "http://78.46.230.205:8080/andalo?service=WFS&version=1.0.0&request=DescribeFeatureType&TypeName=ubi_oral"
        })
    });
    map.addLayer(ubi_oral);
    ubi_oral.setVisibility(false);

    ubi_stoart = new OpenLayers.Layer.Vector("ubi_stoart", {
        strategies: [new OpenLayers.Strategy.BBOX()],
        protocol: new OpenLayers.Protocol.WFS({
            version:     "1.0.0",
            url:         "http://78.46.230.205:8080/geoserver/wfs",
            featureType: "ubi_stoart",
            featureNS:   "http://78.46.230.205/andalo",
            srsName:     "EPSG:3857",
            geometryName:"the_geom",
            schema:      "http://78.46.230.205:8080/andalo?service=WFS&version=1.0.0&request=DescribeFeatureType&TypeName=ubi_stoart"
        })
    });
    map.addLayer(ubi_stoart);
    ubi_stoart.setVisibility(false);

    toponomastica = new OpenLayers.Layer.WMS("Toponomastica", "http://78.46.230.205:8080/geoserver/wms",{
        srs: 'EPSG:3857',
        layers: ['andalo:toponomastica'],
        styles: '',
        format: format,
        transparent: true
    }
    ,{isBaseLayer: false},{singleTile: true, ratio: 1},{ tileSize: new OpenLayers.Size(256,256)});
    map.addLayer(toponomastica);
    //toponomastica.setVisibility(true);

    listaUbi=[ubi_archeo, ubi_archit, ubi_archiv, ubi_biblio, ubi_foto, ubi_mater, ubi_oral, ubi_stoart];
    listalayer= [aree_carto, aree_archeo, aree_archivi, aree_architett, aree_biblio, aree_cultmat,aree_cultmat_line, aree_foto, aree_orale, aree_stoart];

    info = new OpenLayers.Control.WMSGetFeatureInfo({
        url: 'http://78.46.230.205:8080/geoserver/wms',
        title: 'Informazioni sui livelli interrogati',
        queryVisible: true,
        layers: listalayer,
        infoFormat: 'application/vnd.ogc.gml',
        //vendorParams: {buffer: 10},
        eventListeners: {
            getfeatureinfo: function(event) {
                var arr = new Array();
                var arrActive = new Array();
                var arrArea = new Array();
                for (var i = 0; i < event.features.length; i++) {
                    var feature = event.features[i];
                    var attributes = feature.attributes;
                    var id_ai = attributes.id_geom;
                    var id_area = attributes.id_area;
                    arr.push("area_int_poly.id = "+id_ai);
                    arrArea.push('id_area = '+id_area);
                }
                $(".ai:checked").map(function(){arrActive.push('dgn_tpsch = '+$(this).attr('data-tipo'));});

                $.ajax({
                    url: 'inc/popupAi.php',
                    type: 'POST',
                    data: {arr:arr,arrActive:arrActive,arrArea:arrArea},
                    success: function(data){
                        $("#result").animate({left:"0px"}).addClass('opened');
                        $("#resultContent").html(data);
                    }
                });
            }
        }
    });
    map.addControl(info);
    info.activate();

    var report = function(e) {OpenLayers.Console.log(e.type, e.feature.id);};

    var highlightCtrl = new OpenLayers.Control.SelectFeature(listaUbi, {
        hover: true,
        highlightOnly: true,
        renderIntent: "temporary",
        eventListeners: {
            beforefeaturehighlighted: report,
            featurehighlighted: report,
            featureunhighlighted: report
        }
    });
    var selectCtrl = new OpenLayers.Control.SelectFeature(listaUbi);

    map.addControl(highlightCtrl);
    map.addControl(selectCtrl);
    highlightCtrl.activate();
    selectCtrl.activate();

    function onPopupClose(evt) {selectControl.unselect(feature);}

    var selectControl = new OpenLayers.Control.SelectFeature(listaUbi);
    ubi_archeo.events.on({
        featureselected: function(event) {
            var feature = event.feature;
            var id_ubi = feature.attributes.id;
            var tipoUbi = new Array();
            var tu = $('input:checkbox[name=overlaysUbi]:checked').map(function() { return this.value; }).get();
            console.log("ubi: "+tu);
            $.ajax({
                url: 'inc/popupUbi.php',
                type: 'POST',
                data: {id_ubi:id_ubi, tipo:6},
                success: function(data){
                    popupUbi = data;
                    var popup = new OpenLayers.Popup.Anchored(
                        "popUbi",
                        feature.geometry.getBounds().getCenterLonLat(),
                        null,
                        popupUbi,
                        null,
                        true,
                        null
                    );
                    feature.popup = popup;
                    popup.autoSize = true;
                    map.addPopup(popup);
                    $(".olPopupCloseBox").html('&#10006;');
                }
            });
        },
        featureunselected: function(event) {
            var feature = event.feature;
            if (feature.popup){
                map.removePopup(feature.popup);
                feature.popup.destroy();
                feature.popup = null;
            }
        }
    });

ubi_archit.events.on({
  featureselected: function(event) {
     var feature = event.feature;
     var id_ubi = feature.attributes.id;
     var tipoUbi = new Array();
     var tu = $('input:checkbox[name=overlaysUbi]:checked').map(function() { return this.value; }).get();
     console.log("ubi: "+tu);
     $.ajax({
       url: 'inc/popupUbi.php',
       type: 'POST',
       data: {id_ubi:id_ubi, tipo:8},
       success: function(data){
          popupUbi = data;
          var popup = new OpenLayers.Popup.Anchored(
            "popUbi",
            feature.geometry.getBounds().getCenterLonLat(),
            null,
            popupUbi,
            null,
            true,
            null
     );
     feature.popup = popup;
     popup.autoSize = true;
     map.addPopup(popup);
     $(".olPopupCloseBox").html('&#10006;');
     }
   });//ajax
     //console.log("popup: "+popupUbi);

  },
  featureunselected: function(event) {
     var feature = event.feature;
     if (feature.popup){
       map.removePopup(feature.popup);
       feature.popup.destroy();
       feature.popup = null;
     }
   }
});

ubi_archiv.events.on({
  featureselected: function(event) {
     var feature = event.feature;
     var id_ubi = feature.attributes.id;
     var tipoUbi = new Array();
     var tu = $('input:checkbox[name=overlaysUbi]:checked').map(function() { return this.value; }).get();
     console.log("ubi: "+tu);
     $.ajax({
       url: 'inc/popupUbi.php',
       type: 'POST',
       data: {id_ubi:id_ubi, tipo:4},
       success: function(data){
          popupUbi = data;
          var popup = new OpenLayers.Popup.Anchored(
            "popUbi",
            feature.geometry.getBounds().getCenterLonLat(),
            null,
            popupUbi,
            null,
            true,
            null
     );
     feature.popup = popup;
     popup.autoSize = true;
     map.addPopup(popup);
     $(".olPopupCloseBox").html('&#10006;');
     }
   });//ajax
     //console.log("popup: "+popupUbi);

  },
  featureunselected: function(event) {
     var feature = event.feature;
     if (feature.popup){
       map.removePopup(feature.popup);
       feature.popup.destroy();
       feature.popup = null;
     }
   }
});

ubi_biblio.events.on({
  featureselected: function(event) {
     var feature = event.feature;
     var id_ubi = feature.attributes.id;
     var tipoUbi = new Array();
     var tu = $('input:checkbox[name=overlaysUbi]:checked').map(function() { return this.value; }).get();
     console.log("ubi: "+tu);
     $.ajax({
       url: 'inc/popupUbi.php',
       type: 'POST',
       data: {id_ubi:id_ubi, tipo:5},
       success: function(data){
          popupUbi = data;
          var popup = new OpenLayers.Popup.Anchored(
            "popUbi",
            feature.geometry.getBounds().getCenterLonLat(),
            null,
            popupUbi,
            null,
            true,
            null
     );
     feature.popup = popup;
     popup.autoSize = true;
     map.addPopup(popup);
     $(".olPopupCloseBox").html('&#10006;');
     }
   });//ajax
     //console.log("popup: "+popupUbi);

  },
  featureunselected: function(event) {
     var feature = event.feature;
     if (feature.popup){
       map.removePopup(feature.popup);
       feature.popup.destroy();
       feature.popup = null;
     }
   }
});

ubi_foto.events.on({
  featureselected: function(event) {
     var feature = event.feature;
     var id_ubi = feature.attributes.id;
     var tipoUbi = new Array();
     var tu = $('input:checkbox[name=overlaysUbi]:checked').map(function() { return this.value; }).get();
     console.log("ubi: "+tu);
     $.ajax({
       url: 'inc/popupUbi.php',
       type: 'POST',
       data: {id_ubi:id_ubi, tipo:7},
       success: function(data){
          popupUbi = data;
          var popup = new OpenLayers.Popup.Anchored(
            "popUbi",
            feature.geometry.getBounds().getCenterLonLat(),
            null,
            popupUbi,
            null,
            true,
            null
     );
     feature.popup = popup;
     popup.autoSize = true;
     map.addPopup(popup);
     $(".olPopupCloseBox").html('&#10006;');
     }
   });//ajax
     //console.log("popup: "+popupUbi);

  },
  featureunselected: function(event) {
     var feature = event.feature;
     if (feature.popup){
       map.removePopup(feature.popup);
       feature.popup.destroy();
       feature.popup = null;
     }
   }
});

ubi_mater.events.on({
  featureselected: function(event) {
     var feature = event.feature;
     var id_ubi = feature.attributes.id;
     var tipoUbi = new Array();
     var tu = $('input:checkbox[name=overlaysUbi]:checked').map(function() { return this.value; }).get();
     console.log("ubi: "+tu);
     $.ajax({
       url: 'inc/popupUbi.php',
       type: 'POST',
       data: {id_ubi:id_ubi, tipo:2},
       success: function(data){
          popupUbi = data;
          var popup = new OpenLayers.Popup.Anchored(
            "popUbi",
            feature.geometry.getBounds().getCenterLonLat(),
            null,
            popupUbi,
            null,
            true,
            null
     );
     feature.popup = popup;
     popup.autoSize = true;
     map.addPopup(popup);
     $(".olPopupCloseBox").html('&#10006;');
     }
   });//ajax
     //console.log("popup: "+popupUbi);

  },
  featureunselected: function(event) {
     var feature = event.feature;
     if (feature.popup){
       map.removePopup(feature.popup);
       feature.popup.destroy();
       feature.popup = null;
     }
   }
});

ubi_oral.events.on({
  featureselected: function(event) {
     var feature = event.feature;
     var id_ubi = feature.attributes.id;
     var tipoUbi = new Array();
     var tu = $('input:checkbox[name=overlaysUbi]:checked').map(function() { return this.value; }).get();
     console.log("ubi: "+tu);
     $.ajax({
       url: 'inc/popupUbi.php',
       type: 'POST',
       data: {id_ubi:id_ubi, tipo:1},
       success: function(data){
          popupUbi = data;
          var popup = new OpenLayers.Popup.Anchored(
            "popUbi",
            feature.geometry.getBounds().getCenterLonLat(),
            null,
            popupUbi,
            null,
            true,
            null
     );
     feature.popup = popup;
     popup.autoSize = true;
     map.addPopup(popup);
     $(".olPopupCloseBox").html('&#10006;');
     }
   });//ajax
     //console.log("popup: "+popupUbi);

  },
  featureunselected: function(event) {
     var feature = event.feature;
     if (feature.popup){
       map.removePopup(feature.popup);
       feature.popup.destroy();
       feature.popup = null;
     }
   }
});

ubi_stoart.events.on({
  featureselected: function(event) {
     var feature = event.feature;
     var id_ubi = feature.attributes.id;
     var tipoUbi = new Array();
     var tu = $('input:checkbox[name=overlaysUbi]:checked').map(function() { return this.value; }).get();
     console.log("ubi: "+tu);
     $.ajax({
       url: 'inc/popupUbi.php',
       type: 'POST',
       data: {id_ubi:id_ubi, tipo:9},
       success: function(data){
          popupUbi = data;
          var popup = new OpenLayers.Popup.Anchored(
            "popUbi",
            feature.geometry.getBounds().getCenterLonLat(),
            null,
            popupUbi,
            null,
            true,
            null
     );
     feature.popup = popup;
     popup.autoSize = true;
     map.addPopup(popup);
     $(".olPopupCloseBox").html('&#10006;');
     }
   });//ajax
     //console.log("popup: "+popupUbi);

  },
  featureunselected: function(event) {
     var feature = event.feature;
     if (feature.popup){
       map.removePopup(feature.popup);
       feature.popup.destroy();
       feature.popup = null;
     }
   }
});
 //Storico navigazione
 var history = new OpenLayers.Control.NavigationHistory();
 map.addControl(history);

 var btnPrev = new OpenLayers.Control.Panel({
    div: document.getElementById("btnPrev"),
    displayClass:"prev"
 });

 var btnNext = new OpenLayers.Control.Panel({
   div: document.getElementById("btnNext"),
   displayClass:"next"
 });

 map.addControl(btnPrev);
 btnPrev.addControls([history.previous]);
 map.addControl(btnNext);
 btnNext.addControls([history.next]);

 pan = new OpenLayers.Control.DragPan({
 	div: document.getElementById("drag"),
 	isDefault: true,
 	title:"Pan"
 });
 map.addControl(pan);
 pan.activate();

 zoomin = new OpenLayers.Control.ZoomBox({
 	div: document.getElementById("zoomArea"),
 	title:"Zoom in box",
 	out: false
 });
 map.addControl(zoomin);
 zoomin.deactivate();

 var panControl = document.getElementById("drag");
 var zoomControl = document.getElementById("zoomArea");

 if (!map.getCenter()) {map.zoomToExtent(extent);}

 //getLayer();

    map.events.register('zoomend', map, function() {
        console.log(previousMapScale);
        if ((previousMapScale > CLUSTER_SCALE_THRESHOLD) && (this.getScale() < CLUSTER_SCALE_THRESHOLD)) {
            $("#toponomastica").prop("disabled", false);
        }
        if ((previousMapScale < CLUSTER_SCALE_THRESHOLD) && (this.getScale() > CLUSTER_SCALE_THRESHOLD)) {
            $("#toponomastica").prop("disabled", true);
        }
        previousMapScale = this.getScale();
    });

} //end init mappa


/***********  FUNZIONI PER LA CREAZIONE DEI LIVELLI NELLA MAPPA **************************/

/******** ACCENDI/SPEGNI TUTTE LE AREE CONTEMPORANEAMENTE ************************/
$(".layerToggle").click(function(){
    var classe = $(this).data('classe');
    if(classe == 'ai'){ var l = listalayer; }else { var l = listaUbi; }
    $(this).toggleClass('acceso');
    if($(this).hasClass('acceso')){
        $('input[name=overlays].'+classe).prop('checked', true).parent().next().fadeIn('fast');
        if(classe == 'ai'){$(".sliderLivelli").css("visibility","visible");}
        $.each(l, function(i,val){ val.setVisibility(true); });
    }else {
        $('input[name=overlays].'+classe).prop('checked', false).parent().next().fadeOut('fast');
        if(classe == 'ai'){$(".sliderLivelli").css("visibility","hidden");}
        $.each(l, function(i,val){ val.setVisibility(false); });
    }
});

$("input[name='overlays']").on('change', function(){
    var el=$(this);
    var tipo = el.data('tipo');
    var checked = el.prop('checked');
    toggleVisElement(el);
    if(tipo == 2){
        var line = $(this).next();
        line.prop("checked",checked);
        toggleVisElement(line);
    }
    if(tipo>0){
        var classe = $("input[name='overlays']");
        var checkNum = countChecked(classe);
        console.log(checkNum);
        checkNum > 0 ? $(".sliderLivelli").css("visibility","visible") : $(".sliderLivelli").css("visibility","hidden");
    }
});

function countChecked(el){
    var check = el.filter(":checked");
    var count = check.filter(function() { return $(this).data('tipo') > 0;}).length;
    return count;
}

function toggleVisElement(el){
    var layer = el.val();
    layer = eval(layer);
    el.parent().next().fadeToggle('fast');
    toggleVis(layer);
}
function toggleVis(layer){
    if (layer.getVisibility() == true) {layer.setVisibility(false);}else{layer.setVisibility(true);}
}

function zoomLayer(layer,ll){
    if (comuni.getVisibility() == true) {
            comuni.setVisibility(false);
            $("input#comuni").attr('checked', false);
        }
    if (toponomastica.getVisibility() == false) {
            toponomastica.setVisibility(true);
            $("input#"+layer).attr('checked', true);
    }
    var xy = new OpenLayers.LonLat(ll[0],ll[1]);
    var testZoom = map.getZoomForExtent(extent);
    console.log(xy);
    map.setCenter(xy,17);
}

function getLayer(){
    var mLayers = map.getLayersByName("Aree cultura materiale");
    // for(var a = 0; a < mLayers.length; a++ ){console.log(mLayers[a].name);};
    console.log(mLayers);
}
/******************************************************************************/
/*****************  FUNZIONI JQUERY  ******************************************/
/**********************it********************************************************/
$("#logo").click(function(){window.open("home.php", "_blank");});
$("#database").click(function(){window.open("ricerche.php", "_blank");});
$(".hide").hide();
$(".sliderLivelli").css("visibility","hidden");
var result = $("#result");
$("#resHeadImg").on('click',function(){
    if(result.hasClass('opened')){
        $("#result").animate({ left: '-290px' });
    }else {
        $("#result").animate({ left: '0px' });
    }
    result.toggleClass('opened');
})


/*****************   COMANDI PER INTERAGIRE CON LA MAPPA ***********************/
$("#zoomMax").click(function(){map.zoomToExtent(extent);});
$("#topoSearch select").change(function(){
    var ll = $(this).val().split(',');
    var layer = "toponomastica";
    zoomLayer(layer,ll);
    //console.log("ll: "+ll);
});

$("#zoomArea").click(function(){
	$(this).addClass('attivo');
	$('#drag').removeClass('attivo');
	zoomin.activate();
	pan.deactivate();
});
$("#drag").click(function(){
	$(this).addClass('attivo');
	$('#zoomArea').removeClass('attivo');
   zoomin.deactivate();
	pan.activate();
});


/******************** GESTIONE SLIDER *******************************************/
var $tooltip = $('<span class="sliderTip" id="sliderTip"></span>');
$( "#slider" ).slider({
        orientation: "vertical",
        range: "min",
        min: 0,
        max: 2000,
        value: 2000,
        slide: function( event, ui ) { $(".sliderTip").text(ui.value); }
}).find(".ui-slider-handle").append($tooltip);
$(".sliderTip").text($("#slider").slider('option','value'));

$("#sliderArea").slider({
        range: "min",
        min: 0,
        max: 100,
        value: 100,
        slide: function(e, ui) {
          aree_archeo.setOpacity(ui.value / 100);
          aree_archivi.setOpacity(ui.value / 100);
          aree_architett.setOpacity(ui.value / 100);
          aree_biblio.setOpacity(ui.value / 100);
          aree_cultmat.setOpacity(ui.value / 100);
          aree_cultmat_line.setOpacity(ui.value / 100);
          aree_foto.setOpacity(ui.value / 100);
          aree_orale.setOpacity(ui.value / 100);
          aree_stoart.setOpacity(ui.value / 100);
          $( "#amountAree" ).text(ui.value + "%");
          $('.legendeAreeArcheo').css('background-color', 'rgba(255,102,0,'+ui.value/100+')');
          $('.legendeAreeArchitet').css('background-color', 'rgba(255,0,0,'+ui.value/100+')');
          $('.legendeAreeArchiv').css('background-color', 'rgba(255,0,255,'+ui.value/100+')');
          $('.legendeAreeBiblio').css('background-color', 'rgba(255,255,0,'+ui.value/100+')');
          $('.legendeAreeCult').css('background-color', 'rgba(0,128,0,'+ui.value/100+')');
          $('.legendeAreeFoto').css('background-color', 'rgba(0,255,0,'+ui.value/100+')');
          $('.legendeAreeOrale').css('background-color', 'rgba(0,255,255,'+ui.value/100+')');
          $('.legendeAreeStoArt').css('background-color', 'rgba(0,0,128,'+ui.value/100+')');
        }
});
$("#amountAree").text($("#sliderArea").slider("value") + "%");
