$(document).ready(function() {
  let legenda = $("#legText");
  legenda.text("schede totali: ");
  buildAreeList([null,null,2]);
  filtroComune();

  $(".filtri").on('change', function() {
    var c = $("#c").val();
    var t = $("#t").val();
    var g = $("#g").val();
    if (g==null) {g=2;}
    var dati = [c,t,g];
    legenda.text('schede trovate: ');
    buildAreeList(dati);
    $(".resetFilter").fadeIn('fast');
  });
  $(".resetFilter").on('click', function() {
    legenda.text("schede totali: ");
    $(".filtri").each(function(){
      $(this).find('option:first').prop('selected',true);
    })
    buildAreeList([null,null,2]);
    $(this).fadeOut('fast');
  });

  $('.slide, #addArea, #rubrica,#indirizzo,#localita, .resetFilter').hide();
  $('.sezioni').click(function(){$('.slide').slideToggle();});
  $("#tipo").change(function () {
    var i=$(this).val();
    if (i==2) { $("#rubrica,#indirizzo").fadeIn("slow"); }else { $("#rubrica,#indirizzo").fadeOut("slow"); }
    $("#localita,#locTot").fadeOut('fast');
    $("#locTot").html('');
    $("#comuneCarto").val(15);
    $("select[name=rubrica]").val(3);
    $("select[name=indirizzo]").val(0);
    arrLoc=[];
  });
  $("select[name=comuneCarto]").change(function() {
    var obj = 0;
    var tipo = $("#tipo").val();
    var comId = $(this).val();
    if(tipo == 1 || tipo == 3){ loc(comId); }else{ubi(comId, obj);}
  });
  var arrLoc = new Array();
  $("#addArea").click(function(){
    var arrLocNome = new Array();
    var com = $("#comuneCarto option:selected").text();
    var comId = $("#comuneCarto").val();
    var checkLocChecked = $("input[name=localitaCartoCheck]:checked");
    var locLength = checkLocChecked.length;
    if (locLength==0){
      arrLocNome.push('nessuna località specifica');
      arrLoc.push({com: comId, loc:0});
    }else{
      checkLocChecked.each(function(){
        var nome = $(this).data('loc');
        var id = $(this).val();
        arrLocNome.push( nome);
        arrLoc.push({com: comId, loc:id});
      });
    }
    $("#locTot").append("<li><i class='fa fa-times removeArea' title='Elimina area'></i> Comune: "+com+", Località: <span class='idLoc' data-arrloc='"+arrLoc.join()+"'>"+arrLocNome.join(", ")+"</span></li>").show();
    $(".removeArea").click(function(){$(this).parent("li").remove();});
    $("#localita").fadeOut('fast');
    $("#comuneCarto").val(15);
  });
  $("button[name=salvaAree]").click(function(){
    var tipo = $("#tipo").val();
    var nome = $("#nomeArea").val();
    var comune = $("#comuneCarto").val();
    var rubrica = $("select[name=rubrica]").val();
    var indirizzo = $("select[name=indirizzo]").val();
    var l = $("#locTot li").length;
    if(tipo==0){ $("#test").text("Il campo tipologia area è obbligatorio"); return false; }
    if(!nome){ $("#test").text("Il campo nome area è obbligatorio"); return false; }
    if(comune == 15 && l == 0){ $("#test").text("Il campo Comune è obbligatorio"); return false; }
    if((tipo == 1 || tipo == 3) && comune != 15 && nome && l == 0){$("#test").text("Per il tipo di area scelto devi aggiungere almeno una località"); return false;}
    $.ajax({
      url: 'inc/areeIns.php',
      type: 'POST',
      data: {tipo:tipo, nome:nome, comune:comune, localita:arrLoc, rubrica:rubrica, indirizzo:indirizzo},
      success: function(data){ $("#test").html(data).delay(5000).fadeOut(function(){ location.reload(); }); }
    });
  });
});
