loaderInit()
$(document).ready(function(){
  loadImages();
  loadLuoghi();
  loadParole();
  loadAutori();
  
  $(".closePanel").on('click', function(){
    $(".panel-content").animate({marginRight:"-=50%"},500, function(){
      $("#panel").hide()
      $(".imgGallery").html('')
    });
  })
})

//quando un device viene ruotato ricalcolo l'altezza delle immagini
window.addEventListener("orientationchange", function() {
  window.setTimeout(function() { wrapImgWidth() }, 200);
}, false);



function loadImages() {
  if (allImagesLoaded || isLoading) { return; }
  isLoading = true;
  dati.stato = 2; 
  dati.trigger='loadGallery';
  dati.offset = offset;
  dati.limit= limit;
  
  fetch('api/endpoint_gallery.php', {
    method: ajaxType,
    headers: headerJson,
    body: JSON.stringify(dati),
  })
  .then(response => response.json())
  .then(data => {
    data.img.forEach((img,idx) => {
      let titolo;
      if(img.dgn_dnogg && img.dgn_dnogg !== ''){titolo = img.dgn_dnogg}
      else if((!img.dgn_dnogg || img.dgn_dnogg == '') && (img.sog_titolo && img.sog_titolo !== '')){titolo = img.sog_titolo}
      else { titolo = img.path.slice(0,-4)}
      let imgDiv = $("<div/>",{id:'img'+idx, class:'col-4 col-md-3 col-xl-2 p-0 imgDiv'}).attr("data-id",img.id).appendTo('#wrapImg').on('click',function(){ linkScheda(img.id) });
      $("<div/>",{class:'imgContent animation'}).css("background-image","url(foto/"+img.path+")").appendTo(imgDiv);
      let imgTxt = $("<div/>",{class:'animation imgTxt d-none d-md-block'}).appendTo(imgDiv)
      $("<p/>",{class:'animation'}).html(titolo.replace(/\/+$/, '')).appendTo(imgTxt)
      wrapImgWidth();
    });
  })
  .catch(error => console.error('Errore nel caricamento delle immagini:', error))
  .finally(() => {});
}

function loadLuoghi(){
  fetch('api/endpoint_index.php', {
    method: ajaxType,
    headers: headerJson,
    body: JSON.stringify({trigger:'luoghi'}),
  })
  .then(response => response.json())
  .then(data => {
    if (data.length === 0) { return; }
    let geoTagArray = {};
    data.forEach(item => {
      let firstLetter = item.tag[0].charAt(0).toUpperCase()
      if(!geoTagArray[firstLetter]){geoTagArray[firstLetter] = [];}
      geoTagArray[firstLetter].push(item);
    });
    buildTag('#geoTag', 'geotag', geoTagArray);
  })
  .catch(error => console.error('Errore nel caricamento dei luoghi:', error))
  .finally(() => {});
}

function loadParole(){
  fetch('api/endpoint_index.php', {
    method: ajaxType,
    headers: headerJson,
    body: JSON.stringify({trigger:'parole'}),
  })
  .then(response => response.json())
  .then(data => {
    if (data.length === 0) { return; }
    let paroleArray = {};
    data.forEach(item => {
      let firstLetter = item.tag[0].charAt(0).toUpperCase()
      if(!paroleArray[firstLetter]){paroleArray[firstLetter] = [];}
      paroleArray[firstLetter].push(item);
    });
    buildTag('#paroleTag', 'tag', paroleArray);
  })
  .catch(error => console.error('Errore nel caricamento delle parole:', error))
  .finally(() => {});
}

function loadAutori(){
  fetch('api/endpoint_index.php', {
    method: ajaxType,
    headers: headerJson,
    body: JSON.stringify({trigger:'autori'}),
  })
  .then(response => response.json())
  .then(data => {
    if (data.length === 0) { return; }
    console.log(data);
    let autoriArray = {};
    data.forEach(item => {
      let firstLetter = item.tag[0].charAt(0).toUpperCase()
      if(!autoriArray[firstLetter]){autoriArray[firstLetter] = [];}
      autoriArray[firstLetter].push(item);
    });
    buildTag('#autoriTag', 'autore', autoriArray);
  })
  .catch(error => console.error('Errore nel caricamento delle parole:', error))
  .finally(() => {});
}

function buildTag(container, filtro, dati){
  let group = Object.entries(dati).map(([key, value]) => ({ [key]: value }));
  console.log(group);
  let classe='';
  switch (filtro) {
    case 'geotag': classe='geoTag'; break;
    case 'tag': classe='paroleTag'; break;
    case 'autore': classe='autoreTag'; break;
  }
  group.forEach(item => {
    for (const [key, items] of Object.entries(item)) {
      $("<span/>",{class:'firstLetter h1 '+classe}).text(key).appendTo(container);
      items.forEach(tag => {
        let url = "gallery.php?filtro="+filtro+"&val="+tag['geoid']+"&tag="+tag['tag'];
        let a = $("<a/>",{class:'tag '+classe+' animation rounded', href:url}).text(tag['tag'].replace('\\','')).css("font-size",tag.size+"px").appendTo(container)
        $("<span/>",{class:'d-none d-lg-inline-block animation'}).text(tag['schede']).appendTo(a)
      })
    }
  })
}
