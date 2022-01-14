$(document).ready(function() {
  $(".feedbackMsg").hide()
  $('.imgOverlay').on('click', function() {
    $('.imgModal').fadeIn('fast',function(){
      $('body').addClass('modal-open');
    });
  });
  $('[name=closeModal]').on('click', function() {
    $('.imgModal').fadeOut('fast',function(){
      $('body').removeClass('modal-open');
    });
  });
  $("button.sendFeedback").on('click',function(e){
    form = $("[name=feedbackForm]");
    isvalidate = form[0].checkValidity();
    if (isvalidate) {
      e.preventDefault()
      data={}
      dati={}
      data['oop']={file:'global.class.php',classe:'General',func:'feedback'}
      campi = form.find(".form-control")
      $.each(campi,function(i,v){ dati[v.name]=v.value })
      data['dati']=dati
      $.ajax({url: connector, type: type, dataType: dataType, data:data})
      .done(function(data) { $(".feedbackMsg.alert-success").fadeIn(500,fadeout(".feedbackMsg.alert-success")); })
      .fail(function(data) { $(".feedbackMsg.alert-danger").fadeIn(500,fadeout(".feedbackMsg.alert-danger"));})
      .always(function() { console.log("complete"); });
    }
  })
});

function fadeout(el){ setInterval(function(){ $(el).fadeOut(500) },3000); }
