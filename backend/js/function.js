//NOTE: gestione menù laterale
let log = $("body>footer").data('log');
const spinner = "<i class='fas fa-circle-notch fa-spin fa-3x'></i>";
//tooltip init
const toolTipOpt = {container: 'body', boundary: 'viewport', html: true}
let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl, toolTipOpt)
})

if (screen.width >= 992 ) {
  if (log == 'y') {
    $("body>main, body>footer").addClass('mainWidth')
    $("body>nav#userMenu").addClass('open');
  }else {
    $("body>main, body>footer").removeClass('mainWidth');
    $("body>nav#userMenu").addClass('closed');
  }
}else {
  $("body>nav#userMenu").addClass('closed');
  $(document).on("click", function () {
    if ($("body>nav#userMenu").hasClass('open')) {
      $("body>nav#userMenu").toggleClass('open closed').toggleClass('shadow-lg');
    }
  });
  $("body").on('click', '[name=toggleMenu]', function(event) {
    event.preventDefault();
    event.stopPropagation();
    $("body>nav#userMenu").toggleClass('open closed').toggleClass('shadow-lg');
  });
  $("body>nav#userMenu").on("click", function (event) { event.stopPropagation(); });
}



function buildAreeList(dati){
  $(".loading").css("visibility","visible");
  table = $("#catalogoTable>tbody");
  table.html('');
  data={}
  data.comune = dati[0];
  data.tipo = dati[1];
  data.totGeom = dati[2];
  data.trigger = 'getAree';
  $.ajax({
    url: 'api/area.php',
    type: 'POST',
    dataType: 'json',
    data: data,
    success: function(data){
      console.log(data);
      $("#legNum").text(data.length);
      if (data.length == 0) {
        tr = $("<tr/>").appendTo(table);
        $("<td/>",{colspan:6, class:'noData'}).html("<h2>Nessuna scheda con questi parametri</h2>").appendTo(tr);
      }
      data.forEach(function(v,i){
        let buttonText = (parseInt(v.tot) == 0) ? 'Inserisci' : 'Modifica';
        let buttonTitle = buttonText + ((parseInt(v.tipo) == 1) ? ' geometria' : ' ubicazione');
        let tipo = (parseInt(v.tipo) == 1) ? 'area di interesse' : 'ubicazione';
        let handleGeom = $("<button/>",{name:'handleGeomBut'});
        let localizzazione = v.indirizzo;

        handleGeom.text(buttonText).prop('title', buttonTitle).on('click', function(){
          opt={};
          opt.id = v.id;
          opt.area = v.area;
          opt.tipo = v.tipo;
          opt.punti = v.punti;
          opt.tab = 'punto';
          opt.loc = v.indirizzo;
          $.redirectPost('drawGeom.php', opt);
        });

        tr = $("<tr/>").appendTo(table);
        icoMod = $("<i/>",{class:'fas fa-edit'});
        mod = $("<button/>",{type:'button', name:'modGeom', value:v.id, title:'modifica scheda'}).html(icoMod).on('click', function() {
          datiModifica = {};
          datiModifica.id = v.id;
          datiModifica.tipo = v.tipo;
          datiModifica.area = v.area;
          datiModifica.script = (v.tipo==2) ? "areaUbi_update.php" : "areaCarto_update.php";
          modArea(datiModifica);
        });
        $("<td/>").append(mod).appendTo(tr);
        $("<td/>").text(v.id).appendTo(tr);
        $("<td/>").text(tipo).appendTo(tr);
        $("<td/>").html(v.area).appendTo(tr);
        $("<td/>").html(localizzazione).appendTo(tr);
        $("<td/>").css("text-align","center").append(handleGeom).appendTo(tr)
      })
      $(".loading").css("visibility","hidden");
    }
  });
}

function modArea(dati){
  $.ajax({
    url: 'inc/form_update/'+dati.script,
    type: 'POST',
    data: {id:dati.id, area:dati.area},
    success: function(data){
      $("#dialog").html(data);
      $("#dialog").dialog({resizable:false, modal:true, width: 700, title: "Modifica area "+dati.area });
    }
  });
}

function filtroComune(){
  $.ajax({
    url: 'api/area.php',
    type: 'POST',
    dataType: 'json',
    data: {trigger:'comuniList'},
    success: function(data){
      data.forEach(function(v){
        $("<option/>",{text:v.comune}).val(v.id).appendTo('#c');
      })
    }
  });
}


// jquery extend function
$.extend({
  redirectPost: function(location, args){
    const form = $('<form></form>');
    form.attr("method", "post");
    form.attr("action", location);
    $.each( args, function( key, value ) {
      let field = $('<input></input>');
      field.attr("type", "hidden");
      field.attr("name", key);
      field.attr("value", value);
      form.append(field);
    });
    $(form).appendTo('body').submit();
  }
});

//$.redirectPost('workPage.php', {id: v.id});
