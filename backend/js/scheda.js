$(document).ready(function() {
  let tagArr = [];
  $('#servizionessuno').attr('checked', 'checked');//checkbox servizi consultabilità
  $('.slide').hide();
  $('.sezioni').click(function(){
   $(this).next('.slide').slideToggle();
   $(this).toggleClass('sezAperta');
  });

  $("#schAssocCanc").hide();
  if(hub==1){$("tr.compilatoreLast").remove();}
  if(hub==2){
   $( "div.check:not([class~='bassa']), #note" ).hide();
   //$("#areaDefault").attr("val","1286,16");
   $("tr.compilatoreFirst").remove();
  }

  $( "#term" ).autocomplete({
      source: "inc/autocomplete.php",
      minLength: 2,
      select: function( event, ui ) {
        //alert(ui.item.id+'\n'+ui.item.value); return false;
        $("td#result").append("<div class='schAssoc' livello='"+ui.item.livello+"'tpsch='"+ui.item.tpsch+"' id='"+ui.item.id+"'>"+ui.item.value+"</div>");
        $(this).val("");
        numItems = $('.schAssoc').length;
        $('#numItems').text('Schede associate: '+numItems);
        $("#schAssocCanc").fadeIn('slow');
        event.preventDefault();
      }
    });

   $('#schAssocCanc').click(function(){
      $("div[class=schAssoc]:last").remove();
      numItems = $('.schAssoc').length;
      $('#numItems').text('Schede associate: '+numItems);
      if (numItems == 0) {$(this).fadeOut('slow');}
   });

   $("#areeWrap, #areeListCanc").hide();
    $("#areeAdd").click(function () {
        $("#areaDefault").remove();
        var id_area=$("#id_area").val();
        var motiv=$("#motiv_update").val();
        if(id_area == def || motiv == 3){return false; }
        else{
            $("#areeMsg").fadeOut('fast');
            var area = $( "#id_area option:selected" ).text();
            var motivTxt = $( "#motiv_update option:selected" ).text();
            $("#aree").append('<div class="areeList" val="'+id_area+','+motiv+'"><div class="areeListRecord"><label>'+area+'</label></div><div class="areeListRecord"><label>'+motivTxt+'</label></div></div>');
            $("#areeWrap, #areeListCanc").fadeIn('slow');
            areeFunc();
        }
    });

    $("#areeListCanc").click(function(){
        $("div[class=areeList]:last").remove();
        areeFunc();
    });

  $('.avviso').hide();
  $('#livello').change(function(){
    var livello_list = $(this).val();
    //alert(tpsch); return false;
    $.ajax({
     type: "POST",
     url: "inc/last_numsch.php",
     data: {livello_list:livello_list, tpsch:tpsch},
     cache: false,
     success: function(html){$("#last_numsch").html(html).fadeIn('slow');}
    });//ajax1
  });

  $('#cro_iniz').keyup(function(){
    var croTmp = $(this).val();
    $('#croTmp').fadeIn('slow').text('Valore permesso >= '+croTmp);
  });


////// CONTROLLO CAMPI /////////////////
  $('#cro_fin').blur(function(){
    //var checkCrono = $(this).text().length;
    var checkIniz = $('#cro_iniz').val();
    var checkFin = $('#cro_fin').val();
    if(checkFin < checkIniz){
       $(this).addClass('errore');
       alert("attenzione, valore non valido!"); return false;
    }else{
      $(this).removeClass('errore');
    }
  });

  $('#salva').click(function(){
    //////// TAB SCHEDA //////////////////////////////////////
    //dati generali
    var tpsch = $("#tpsch").val();
    var livello = $('#livello').val();
    var dgn_numsch = $('#dgn_numsch').val();
    var dgn_livind = $('#dgn_livind').val();
    var dgn_dnogg = $('#dgn_dnogg').val();
    var dgn_note = $('#dgn_note').val();
    var compilatore = $('#compilatore').val();
    var data_compilazione = $('#data_compilazione').val();

    //COMPILAZIONE
    var cmp_id = $('#cmp_id').val();
    cmp_id = (hub==2 && cmp_id==1)?'63': cmp_id;
    var cmp_note = $('#cmp_note').val();

    //PROVENIENZA
    var prv_id = (hub==2)?'1': $('#prv_id').val();
    var prv_note = $('#prv_note').val();

    //ANAGRAFICA
    var ana_id = $('#ana_id').val();
    var ana_note = $('#ana_note').val();

    //STATO DI CONSERVAZIONE
    var scn_id = $('#scn_id').val();
    var scn_note = $('#scn_note').val();

    //NOTE GENERALI
    var note_gen = $('#note_gen').val();
    var fine = $('input[name=fine]').val();

    //////// CRONOLOGIA //////////////////////////////////////
    var cro_iniz = $('#cro_iniz').val();
    var cro_fin = $('#cro_fin').val();
    var cro_spec = $('#cro_spec').val();
    var cro_motiv = $('#cro_motiv').val();
    var cro_note = $('#cro_note').val();

    //////// AREE_SCHEDA //////////////////////////////////////
    var areeList = '';
    $("div.areeList").each(function(){areeList += $(this).attr('val') + '|';});
    var noteAi = $('#noteAi').val();
    //alert(areeList); return false;

    //////// UBI_SCHEDA //////////////////////////////////////
    var motivubi_update = $('#motivubi_update').val();
    var ana_ubi = $('#ana_ubi').val();
    var noteUbi = $('#noteUbi').val();
    //////// CONSULTABILITA //////////////////////////////////////
    var consultabilita = $('#consultabilita').val();
    var orario = $('#orario').val();
    var servizi='';
    $("input[name=servizi]:checked").each(function () {
      var s = $(this).val();
      servizi+=s+', ';
    });
    //var id_servizi = $('#id_servizi').val();

    //////// TAB ALTRIF //////////////////////////////////////
    //creare array per i div.schAssoc
    var schAssoc ='';
    $("div.schAssoc").each(function(){
      var id = $(this).attr('id');
      var tpsch = $(this).attr('tpsch');
      var livello = $(this).attr('livello');
      schAssoc += id + ','+tpsch+','+livello+'|';
    });
    //alert(schAssoc+'\n'); return false;
    //ricordati di esplodere l'array nello script di inserimento!!!!
    var errori = '';
    if (!livello) {errori += '<li>LIVELLO</li>';$('#livello').addClass('errore');}else{$('#livello').removeClass('errore');}
    if (!dgn_numsch) {errori += '<li>NUMERO SCHEDA</li>';$('#dgn_numsch').addClass('errore');}else{$('#dgn_numsch').removeClass('errore');}
    if (!dgn_livind) {errori += '<li>LIVELLO INDIVIDUAZIONE DATI</li>';$('#dgn_livind').addClass('errore');}else{$('#dgn_livind').removeClass('errore');}
    if (!dgn_dnogg) {errori += '<li>DEFINIZIONE OGGETTO</li>';$('#dgn_dnogg').addClass('errore');}else{$('#dgn_dnogg').removeClass('errore');}
    if (ana_ubi!=1107 && motivubi_update == 20) {errori+= '<li>MOTIVAZIONE UBICAZIONE</li>';$('#motivubi_update').addClass('errore');}else {$('#motivubi_update').removeClass('errore');}
    if(errori){
   	  errori = '<h3>I seguenti campi sono obbligatori e vanno compilati:</h3><ol>' + errori;
      $("<div id='errorDialog'>" + errori + "</ol></div>").dialog({
        resizable: false,
        width: 'auto',
        title:'Errori',
        modal: true,
        buttons: {'Chiudi finestra': function() {$(this).dialog('close');} }
      });//dialog
      return false;
    }else{
      $.ajax({
        // url: 'inc/scheda_nuova_script.php',
        url: 'api/scheda.php',
        type: 'POST',
        dataType: 'json',
        data: {
          trigger:'addScheda',
          id_area:$("#id_area").val(),
          motiv:$("#motiv_update").val(),
          tpsch:tpsch,
          livello:livello,
          dgn_numsch:dgn_numsch,
          dgn_livind:dgn_livind,
          dgn_dnogg:dgn_dnogg,
          dgn_note:dgn_note,
          compilatore:compilatore,
          data_compilazione:data_compilazione,
          cmp_id:cmp_id,
          cmp_note:cmp_note,
          prv_id:prv_id,
          prv_note:prv_note,
          ana_id:ana_id,
          ana_note:ana_note,
          scn_id:scn_id,
          scn_note:scn_note,
          note_gen:note_gen,
          fine:fine,
          cro_iniz:cro_iniz,
          cro_fin:cro_fin,
          cro_spec:cro_spec,
          cro_motiv:cro_motiv,
          cro_note:cro_note,
          areeList:areeList,
          noteAi:noteAi,
          noteUbi:noteUbi,
          motivubi_update:motivubi_update,
          ana_ubi:ana_ubi,
          consultabilita:consultabilita,
          orario:orario,
          servizi:servizi,
          schAssoc:schAssoc,
          tags: tagArr
        },
        success: function(data){
          console.log(data);
          // $("#confirm").html(data);
          // $("#confirm").dialog({
          //   resizable: false,
          //   width:600,
          //   title:'Risultato query'
          // });
        }
      });
    }
  });

  $("[name=tag-list]").on('change', function(){
    let val = $(this).val();
    if (tagArr.indexOf(val) > -1) {
      alert('Attenzione: la tag '+val+' è già stata inserita!');
      $(this).val('');
      return false;
    }
    let div = $("<div/>",{class:'tag-div', title:'elimina tag'}).appendTo('#tagWrap');
    $("<span/>").text(val).appendTo(div);
    $("<span/>").text('x').appendTo(div);
    tagArr.push(val)
    console.log(tagArr);
    $(this).val('');
    div.on('click', function(){
      let tag = $(this).find('span').eq(0).text()
      let index = tagArr.indexOf(tag);
      if (index > -1) {tagArr.splice(index,1);}
      $(this).remove();
      console.log(tagArr);
    })
  })

  getTags()

});

function getTags(){
  $.ajax({
    url: 'api/scheda.php',
    type: 'POST',
    dataType: 'json',
    data: {trigger: 'getTags'}
  })
  .done(function(data) {
    let list = $("#tags");
    data.forEach((item, i) => {
      $("<option/>",{value:item.tag}).appendTo(list);
    });
  })
  .fail(function() { console.log("error"); })
  .always(function() { console.log("complete"); });

}
