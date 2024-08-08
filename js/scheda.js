const SCHEDA = $("[name=item").val()
const isLocal = window.location.hostname === 'localhost';
const fotoDir = isLocal ? './foto/' : 'https://www.bibliopaganella.org/foto/';

initScheda()

$(".feedbackMsg,#feedbackLoader, #imgModal").hide()
$("button.sendFeedback").on('click',function(e){
  form = $("[name=feedbackForm]");
  isvalidate = form[0].checkValidity();
  if (isvalidate) {
    e.preventDefault()
    dati={trigger:'feedback'}
    campi = form.find(".form-control")
    $.each(campi,function(i,v){ dati[v.name]=v.value })
    $("#feedbackLoader").show()
    fetch('api/endpoint_scheda.php', {
      method: ajaxType,
      headers: headerJson,
      body: JSON.stringify(dati),
    })
    .then(response => response.json())
    .then(data => {
      if(data.code==1){
        console.error(data);
        return;
      }
      let alertClass = data.code == 0 ? 'success' : 'danger';
      $(".feedbackMsg.alert-"+alertClass).text(data.msg).fadeIn(500);
      $("#feedbackLoader").hide()
    })
    .catch(error => {
      console.error('Errore nel caricamento della scheda:', error);
      $(".feedbackMsg.alert-danger").fadeIn(500);
      $("#feedbackLoader").hide()
    })
    .finally(() => {
      $("#feedbackLoader").hide()
    });
  }
})

$('.imgOverlay').on('click', function() {
  $("#imgModal").fadeIn('fast');
});
$("#closeModal").on('click', function(){
  $("#imgModal").fadeOut('fast');
})

async function initScheda() {
  loader.show();
  dati.trigger = 'viewScheda';
  dati.id = SCHEDA;
  try {
    const response = await fetch('api/endpoint_scheda.php', {
      method: ajaxType,
      headers: headerJson,
      body: JSON.stringify(dati),
    });
    const data = await response.json();
    console.log(data);

    if (data.geom && data.geom !== null) {
      initSmallMap(data.geom);
    } else {
      $("#smallMap").remove();
    }

    const scheda = data.scheda;
    let titolo;
    if (scheda.dgn_dnogg && scheda.dgn_dnogg !== '') {
      titolo = scheda.dgn_dnogg;
    } else if ((!scheda.dgn_dnogg || scheda.dgn_dnogg == '') && (scheda.sog_titolo && scheda.sog_titolo !== '')) {
      titolo = scheda.sog_titolo;
    } else {
      titolo = scheda.path.slice(0, -4);
    }
    $("#titolo").text(titolo);
    $("#fotoPath").attr("src", fotoDir + scheda.path);
    $("#downloadImg").attr("href", fotoDir + scheda.path);
    $("#imgModalContainer").css("background-image", "url('" + fotoDir + scheda.path + "')");

    $("<li/>", { class: 'mb-2' }).appendTo("#testregex");
    $("<li/>", { class: 'mb-2' }).html("<strong>" + scheda.dgn_numsch + "</strong>").appendTo("#testregex");
    $("<li/>", { class: 'mb-2' }).text(titolo).appendTo("#testregex");

    let dtcArr = [];
    if (scheda.dtc_icol && scheda.dtc_icol !== null) {
      switch (scheda.dtc_icol) {
        case 'BN': dtcArr.push('Bianco e nero'); break;
        case 'C': dtcArr.push('Colore'); break;
        default: dtcArr.push(scheda.dtc_icol); break;
      }
    }

    if (scheda.dtc_mattec && scheda.dtc_mattec !== null) { dtcArr.push(scheda.dtc_mattec); }
    if (scheda.dtc_ffile && scheda.dtc_ffile !== null) { dtcArr.push(" (" + scheda.dtc_ffile + ")"); }
    if (scheda.dtc_misfd && scheda.dtc_misfd !== null) { dtcArr.push(scheda.dtc_misfd.toLowerCase()); }
    $("<li/>", { class: 'mb-2' }).html("<span class='txt12'>" + dtcArr.join(', ') + "</span>").appendTo("#testregex");
    $("#modalImgDescription").text(scheda.dgn_numsch+" "+dtcArr.join(', '))

    let soggArr = [scheda.cro_spec];
    if (scheda.sog_autore && scheda.sog_autore !== null) { soggArr.push("autore: " + scheda.sog_autore); }
    if (scheda.sog_note && scheda.sog_note !== null && scheda.sog_note !== '-') { soggArr.push("(" + scheda.sog_note + ")"); }
    $("<li/>", { class: 'mb-2' }).html("<span class='txt12'>" + soggArr.join(' ') + "</span>").appendTo("#testregex");

    $("<li/>", { class: 'mb-2' }).html("<span class='txt14'>" + scheda.sog_sogg + "</span>").appendTo("#testregex");

    if (scheda.sog_notestor && scheda.sog_notestor !== null) {
      $("<li/>", { class: 'mb-2' }).html("<span class='txt14'>Note storiche: " + scheda.sog_notestor + "</span>").appendTo("#testregex");
    }

    let notePromises = [];

    if ((scheda.note && scheda.note !== null && scheda.note !== '') || (scheda.alt_note && scheda.alt_note !== null && scheda.alt_note !== '')) {
      let liNote = $("<li/>", { class: 'mt-3 mb-2 pt-3 border-top' }).appendTo("#testregex");
      $("<span/>", { class: 'txt16 d-block' }).text('Note:').appendTo(liNote);

      if (scheda.note && scheda.note !== null && scheda.note !== '') {
        notePromises.push(regexp(scheda.note).then(result => {
          $("<li/>", { class: 'mb-2' }).html("<span class='txt14'>" + result + "</span>").appendTo("#testregex");
        }));
      }
      if (scheda.alt_note && scheda.alt_note !== null && scheda.alt_note !== '') {
        notePromises.push(regexp(scheda.alt_note).then(result => {
          $("<li/>", { class: 'mb-2' }).html("<span class='txt14'>" + result + "</span>").appendTo("#testregex");
        }));
      }
    }

    if (scheda.tags && scheda.tags !== null) {
      $("<span/>", { class: 'me-3 d-inline-block' }).html('<i class="fa-solid fa-tags"></i> Tag:').appendTo("#tagDiv");
      let rawTags = scheda.tags;
      rawTags = rawTags.replace(/{|}/g, '').trim();
      let tagsArray = rawTags.split(',').map(tag => tag.trim().replace(/^"|"$/g, ''));
      tagsArray.forEach(tag => {
        let randomVal = Math.floor(Math.random() * Math.pow(10, 5));
        let url = "gallery.php?filtro=tag&val=" + randomVal + "&tag=" + tag;
        $("<a/>", { class: 'btn btn-info btn-sm text-white me-1 mb-1 tag', href: url, title: 'cerca immagini associate alla parola ' + tag }).text(tag).appendTo("#tagDiv").tooltip();
      });
    } else {
      $("#tagDiv").remove();
    }
    
    if (data.geotag && data.geotag !== null && data.geotag.length > 0) {
      $("<span/>", { class: 'me-3 d-inline-block' }).html('<i class="fa-solid fa-location-dot"></i> geoTag:').appendTo("#geoTagDiv");
      data.geotag.forEach(tag => {
        let url = "gallery.php?filtro=geotag&val=" + tag.id_comune + "&tag=" + tag.tag;
        $("<a/>", { class: 'btn btn-warning btn-sm text-white me-1 mb-1 tag', href: url, title: 'cerca immagini associate alla località: ' + tag.tag }).text(tag.tag).appendTo("#geoTagDiv").tooltip();
      });    
    } else {
      $("#geoTagDiv").remove();
    }

    if(data.foto && data.foto !== null && data.foto.length > 0){
      data.foto.forEach((img, idx) => {
        let titolo;
        if (!img.titolo || img.titolo == '-' || img.titolo == '') {
          titolo = img.path.slice(0, -4);
        } else {
          titolo = img.titolo;
        }
        let imgDiv = $("<div/>", { id: 'img' + idx, class: 'col-4 col-md-3 col-xl-2 p-0 imgDiv' }).attr("data-id", img.id).appendTo('#wrapImg').on('click', function () { linkScheda(img.id) });
        $("<div/>", { class: 'imgContent animation' }).css("background-image", "url(" + fotoDir + img.path + ")").appendTo(imgDiv);
        let imgTxt = $("<div/>", { class: 'animation imgTxt d-none d-md-block' }).appendTo(imgDiv);
        $("<p/>", { class: 'animation' }).html(titolo.replace(/\/+$/, '')).appendTo(imgTxt);
        wrapImgWidth();
      });
    }else{
      $("#fotoWrap").remove();
    }

    // Attendi la risoluzione di tutte le promesse delle note
    await Promise.all(notePromises);

  } catch (error) {
    console.error('Errore nel caricamento della scheda:', error);
  } finally {
    loader.fadeOut('fast');
  }
}


function initSmallMap(json){
  const map = L.map('smallMap');
  osm = L.tileLayer(OSM_TILE, {attribution: OSM_ATTRIB, opacity:0.7}).addTo(map)
  bing = L.tileLayer.bing({bingMapsKey: BING_KEY, imagerySet:'AerialWithLabels'})
  let baseLayers = {
    "OpenStreetMap": osm,
    "Bing Satellite": bing,
  };
  L.control.layers(baseLayers, null,{'collapsed':false}).addTo(map);

  marker = L.geoJson(JSON.parse(json),{
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

  resetMap = L.Control.extend({
    options: { position: 'topleft'},
    onAdd: function (map) {
      var container = L.DomUtil.create('div', 'extentControl leaflet-bar leaflet-control leaflet-touch');
      btn=$("<a/>",{href:'#', title:'torna alla zoom iniziale'}).appendTo(container);
      $("<i/>",{class:'fas fa-globe'}).appendTo(btn)
      btn.on('click', function (e) {
        e.preventDefault()
        map.fitBounds(marker.getBounds());
      });
      return container;
    }
  })

  map.addControl(new resetMap());
  L.control.scale({imperial:false}).addTo(map);
}

async function regexp(txt) {
  const pattern = /(FOTO[A-Z]+-I{1,3}-\w{4,5})/g;
  const matches = txt.match(pattern);
  if (matches === null) return txt;
  const matchToIdMap = {};
  for (const match of matches) {
    const id = await fetchIdForMatch(match);
    matchToIdMap[match] = id;
  }
  const result = txt.replace(pattern, (match) => {
    const id = matchToIdMap[match];
    return `<a href='scheda.php?scheda=${id}' class='text-dark animation hyperLink' title='visualizza la scheda ${match}'>${match}</a>`;
  });
  loader.fadeOut('fast')
  return result;
}

async function fetchIdForMatch(match) {
  dati.trigger = 'getIdByNumsch';
  dati.numsch = match;
    const response = await fetch('api/endpoint_scheda.php', {
      method: ajaxType,
      headers: headerJson,
      body: JSON.stringify(dati)
    });
    const data = await response.json();
    return data.id;
}
