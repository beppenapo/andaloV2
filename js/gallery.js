document.addEventListener('DOMContentLoaded', () => {loadImages();});
window.addEventListener('scroll', handleScroll);
window.addEventListener('resize', handleScroll);
window.addEventListener("orientationchange", function() {window.setTimeout(function() { wrapImgWidth() }, 200);}, false);

$(document).ready(function() {
  $("[name=statoScheda]").on('change', function(){
    allImagesLoaded = false;
    isLoading = false;
    offset = 0;
    $('#wrapImg').html('');
    loadImages();
})
  $('.imgDiv').on('click', function(event) {
    id = $(this).data('id');
    linkScheda(id)
  });
  $('.scroll-gallery').on('click',function() {
    $root.animate({ scrollTop: $("#top").offset().top }, 500, function () {window.location.hash = 'top'; });
  });
  loadingAlert.hide();
});

let observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting && !allImagesLoaded && !isLoading) {
      loadingAlert.find('h3').text('Caricamento di altre immagini in corso...');
      loadingAlert.show();
      loadImages();
    }
  });
}, {
  root: null,
  rootMargin: '0px',
  threshold: 0.1
});

observer.observe(document.querySelector('#scrollAnchor'));

function loadImages() {
  if (allImagesLoaded || isLoading) { return; }
  isLoading = true;

  dati.stato = $("[name=statoScheda]:checked").attr("id");
  if ($("[name='getFiltro']").length > 0) {dati.filtro = $("[name='getFiltro']").val()}
  if ($("[name='getTag']").length > 0) {dati.tag = $("[name='getTag']").val()}
  if ($("[name='getVal']").length > 0) {dati.val = $("[name='getVal']").val()}
  
  dati.trigger='loadGallery';
  dati.offset = offset;
  dati.limit= limit;
  
  loader.show();
  fetch('api/endpoint_gallery.php', {
    method: ajaxType,
    headers: headerJson,
    body: JSON.stringify(dati),
  })
  .then(response => response.json())
  .then(data => {
    $("#statfilter").text(data.title);
    if (data.img.length === 0) {
      allImagesLoaded = true;
      if(offset > 0){
        loadingAlert.find('h3').text('non ci sono più immagini da caricare...');
        loadingAlert.show();
      }else{
        loadingAlert.hide()
      }
      loader.hide()
      return;
    }
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
    if(!$("#statfilter").is(':empty')){loader.fadeOut('fast');}
    if (data.img.length > 0) { offset += limit; }
  })
  .catch(error => console.error('Errore nel caricamento delle immagini:', error))
  .finally(() => {
    isLoading = false;
    if (!allImagesLoaded) { loadingAlert.hide(); }
  });
}

function handleScroll() {
  const scrollTop = window.scrollY || document.documentElement.scrollTop || document.body.scrollTop;
  const scrollHeight = document.documentElement.scrollHeight || document.body.scrollHeight;
  const clientHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;

  if (scrollTop + clientHeight >= scrollHeight / 2) {
    if (!allImagesLoaded && !isLoading) {
      loadingAlert.find('h3').text('Caricamento di altre immagini in corso...');
      loadingAlert.show();
    }
    loadImages();
  }
}

//////////////////////
// VECCHIE FUNZIONI
//////////////////////
// let dataset = [];
// initGallery(2)
// window.addEventListener("orientationchange", function() {
//   window.setTimeout(function() { wrapImgWidth() }, 200);
// }, false);
// $(document).ready(function() {
//   $('.imgDiv').on('click', function(event) {
//     id = $(this).data('id');
//     linkScheda(id)
//   });
//   $('.scroll-gallery').on('click',function() {
//     $root.animate({ scrollTop: $("#top").offset().top }, 500, function () {window.location.hash = 'top'; });
//   });
// });

// $("[name=statoScheda]").on('change', function(){
//   initGallery($(this).val())
// })
//////////////////////