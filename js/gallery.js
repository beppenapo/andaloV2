wrapImgWidth();
observer.observe();
window.addEventListener("orientationchange", function() {
  window.setTimeout(function() { wrapImgWidth() }, 200);
}, false);
