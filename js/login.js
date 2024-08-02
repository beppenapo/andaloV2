$("#togglePwd").click(function() {
  $(this).find('i').toggleClass("fa-eye fa-eye-slash");
  let type = $("#pwd").attr("type") == "password" ? "text" : "password";
  $("#pwd").attr("type", type);
});

$("[name=submit]").on('click', function(e){
  form = $("form[name=loginForm]")
  isvalidate = $(form)[0].checkValidity()
  if (isvalidate) {
    e.preventDefault()
    dati={trigger:'login'}
    dati.email=$("[name=email]").val();
    dati.pwd=$("[name=password]").val();
    $.ajax({
      type: ajaxType,
      url: "api/endpoint_user.php",
      data: dati,
      dataType: dataType,
      success: function(data){
        let link, classe;
        if(data.indexOf('Errore!') != -1){
          classe='alert-danger';
          link = 'login.php';
        } else {
          classe='alert-success';
          link = 'index.php';
          localStorage.setItem('logged',true);
        }
        $(".outMsg").html(data);
        $(".output").addClass(classe);
        $("#countdowntimer").text('3');
        countdown(3,link);
      }
    });
  }
});
