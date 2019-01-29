wrapImgWidth();
observer.observe();
window.addEventListener("orientationchange", function() {
  window.setTimeout(function() { wrapImgWidth() }, 200);
}, false);
$(document).ready(function() {
  $('.imgDiv').on('click', function(event) {
    id = $(this).data('id');
    linkScheda(id)
  });
});
