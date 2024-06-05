let dataset = [];
//di default parti con le schede chiuse
initGallery(2)
window.addEventListener("orientationchange", function() {
  window.setTimeout(function() { wrapImgWidth() }, 200);
}, false);
$(document).ready(function() {
  $('.imgDiv').on('click', function(event) {
    id = $(this).data('id');
    linkScheda(id)
  });
  $('.scroll-gallery').on('click',function() {
    $root.animate({ scrollTop: $("#top").offset().top }, 500, function () {window.location.hash = 'top'; });
  });
});

$("[name=statoScheda]").on('change', function(){
  initGallery($(this).val())
})
