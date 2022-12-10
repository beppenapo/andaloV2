$(document)
  .ajaxStart(function() {$(".loading").show()})
  .ajaxStop(function() {$(".loading").hide()})
let countLoc = 0;
console.log(countLoc);
let tipo = [];
let comune = [];
let container = $("#listContainer");
let numAree = $("#numAree");
$("[name=filter],.tipoForm").hide()
$("#geometrie").show()
$("[name=newTipo]").on('change', function(){
  let tipo = $(this).val() == 1 ? 'area' : 'ubicazione';
  let ubiComuneRequired = $(this).val() == 2 ? true : false
  $(".tipoForm").hide()
  $("#"+tipo+"FormWrap").show();
  $("#ubiComune").prop("required",ubiComuneRequired)
})
$("#newComune").on('change', function(){
  let v = $(this).val()
  let t = $(this).find('option:selected').text()
  let locVis = v ? false : true;
  $("#selLocalita").html('').prop("disabled", locVis);
  if(v){ localitaList(v) }
  if ($("#comune"+v).length == 0) { buildRow(v,t) }
})
$("#ubiComune").on('change', function(){
  let v = $(this).val()
  $("#ubiIndirizzo").html('');
  $("<option/>").val('').text('--scegli indirizzo--').appendTo('#ubiIndirizzo');
  $.ajax({
    url: 'api/area.php',
    type: 'POST',
    dataType: 'json',
    data: {trigger : 'indirizziList', comune:v}
  })
  .done(function(data) {
    if (data.length == 0) {
      alert('Nessuna indirizzo associato al Comune selezionato');
      return false;
    }
    data.forEach((item, i) => {
      let opt = $("<option/>").val(item.id).text(item.indirizzo).appendTo('#ubiIndirizzo');
    });
  })
})

$("body").on('change', '#selLocalita', function(){
  let val = $(this).val()
  let txt = $(this).find('option:selected').text()
  let com = $(this).find('option:selected').data('comune')
  if ($("#loc"+val).length > 0) {
    alert('Attenzione! Hai già associato questa località all\'area!');
    return false;
  }
  let btn = $("<button/>",{class:'btn btn-sm btn-fps mx-1 mb-1', name:'locSel', id:'loc'+val}).val(val).text(txt).appendTo('#comune'+com+' .locWrapDiv');
  $("<i/>",{class:'fas fa-times ps-2'}).appendTo(btn)
  btn.on('click', function(){ $(this).remove();})
})

$("#addAreaForm [type=submit]").on('click', function(e){ salvaArea(e); });
listaAree();

$('body').on('change','[name=filter]', function(){
  let tipo = $("#tipo").val() == 0 ? 'tipo != 0': 'tipo = '+ $("#tipo").val();
  let comune = $("#comune").val() == 0 ? 'comune != 0': 'comune = '+ $("#comune").val();
  let num = parseInt($("#geometrie").val());
  let geom;
  if(num == 0 ){geom = 'geom != -1';}
  else if (num == 1) {geom = 'geom != 0';}
  else { geom = 'geom = 0';}
  container.find('li').hide();
  container.find('li[data-'+tipo+'][data-'+comune+'][data-'+geom+']').show();
  numAree.text(container.find('li:visible').length)
})

$("#addArea").on('hidden.bs.modal', function(){
  $(".tipoForm").hide()
  $("#newTipo").val('')
  $("#newNome").val('')
  $("#newComune").val('')
  $("#ubiComune").val('')
  $("#ubiIndirizzo").val('')
  $("#ubiRubrica").val('')
  $("#areaWrap").html('')
  countLoc = 0
  console.log(countLoc);
})

function buildRow(v,t){
  countLoc++;
  let row = $("<div/>",{class:'row mb-2', id:'comune'+v}).appendTo('#areaWrap');
  let col1 = $("<div/>", {class:'col-lg-4'}).appendTo(row);
  let col2 = $("<div/>", {class:'col-lg-6'}).appendTo(row);
  let col3 = $("<div/>", {class:'col-lg-2'}).appendTo(row);
  let comune = $("<button/>",{class:'btn btn-sm btn-secondary form-control  disabled'}).val(v).text(t).appendTo(col1)
  let locWrapDiv = $("<div/>",{class:'locWrapDiv'}).appendTo(col2)
  let delRowBtn = $("<button/>", {class:'btn btn-sm btn-danger'}).html("<i class='fas fa-times'></i> rimuovi area").appendTo(col3)
  delRowBtn.on('click', function(){
    countLoc--;
    row.remove()
    console.log(countLoc);
  })
  console.log(countLoc);
}


function salvaArea(e){
  let form = $("#addAreaForm");
  let isvalidate = form[0].checkValidity();
  if (isvalidate) {
    e.preventDefault();
    if($("[name=newTipo]").val() != 2 && countLoc == 0){
      alert('Attenzione devi inserire almeno un Comune')
      return false
    }
    dati = {};
    dati.tipo = $("[name=newTipo]").val();
    dati.nome = $("[name=newNome]").val();
    if ($("[name=newTipo]").val() == 2) {
      dati.comune = $("[name=ubiComune]").val();
      if ($("[name=ubiIndirizzo]").val()) {dati.indirizzo = $("[name=ubiIndirizzo]").val()}
      if ($("[name=ubiRubrica]").val()) {dati.rubrica = $("[name=ubiRubrica]").val()}
    }else{
      dati.aree=[]
      $("#areaWrap > .row").each(function(index, el) {
        let comune = parseInt($(this).attr('id').substr(6))
        if($(this).find('[name=locSel]').length == 0){
          dati.aree.push({comune:comune})
        }else{
          $(this).find('[name=locSel]').each(function(index, el) {
            dati.aree.push({comune:comune,localita:el.value})
          });
        }
      });
    }
    $("#newAreaLoading").fadeIn('fast');
    $.ajax({
      url: 'api/area.php',
      type: 'POST',
      dataType: 'json',
      data: {trigger : 'addArea', dati}
    })
    .done(function(data) {
      $("#newAreaLoading").fadeOut('fast');
      let resClass = data.res == true ? 'alert-success' : 'alert-danger';
      let resMsg = data.res == true ? 'area inserita correttamente': 'errore durante l\'inserimento della nuova area \n '+data.msg;
      $("#newAreaMsg").addClass(resClass).text(resMsg);
      setTimeout(function(){
        form[0].reset();
        $("#newAreaMsg").removeClass(resClass).text('');
        $("#addArea").modal('hide');
        listaAree()
      },5000)
    })
    .fail(function(){console.log("errore salvataggio nuova area");});
  }
}

function listaAree(){
  container.html('');
  $.ajax({
    url: 'api/area.php',
    type: 'POST',
    dataType: 'json',
    data: {trigger:'areeList'},
    success: function(data){
      numAree.text(data.length)
      data.forEach(function(el,i){
        let tipoDef = el.tipo == 1 ? 'area' : 'ubicazione';
        tipo.push({tipo:el.tipo, definizione:tipoDef});
        comune.push({id:el.comuneid, comune:el.comune});
        let numGeom = el.tipo == 1 ? el.ai : el.ubi
        let li = $("<li/>")
          .attr({
            "data-tipo":el.tipo,
            "data-comune":el.comuneid,
            "data-geom":numGeom
          })
          .addClass('list-group-item riga')
          .appendTo(container);
        $("<span/>").text(el.id).appendTo(li);
        $("<span/>").text(tipoDef).appendTo(li);
        $("<span/>").text(el.nome).appendTo(li);
        let localita = el.localita !== '{NULL}' ? el.localita.replace('{',"(").replace('}',')') : '';
        $("<span/>").text(el.comune + localita).appendTo(li);
        $("<span/>").text(numGeom).appendTo(li);
        let act = $("<span/>",{class:'btn-group btn-group-sm'}).appendTo(li);
        let btn1 = $("<button/>",{type:'button', class:'btn btn-outline-secondary', name:'modGeom', title:'modifica dati'}).val(el.id).appendTo(act)
        let btn2 = $("<button/>",{type:'button', class:'btn btn-outline-secondary', name:'handleGeomBut', title:'modifica geometrie'}).appendTo(act)
        $("<i/>",{class:'fa-solid fa-pen-to-square'}).appendTo(btn1)
        $("<i/>",{class:'fa-solid fa-location-dot'}).appendTo(btn2)
        btn1.on('click', function() {
          datiModifica = {};
          datiModifica.id = el.id;
          datiModifica.tipo = el.tipo;
          datiModifica.area = el.nome;
          datiModifica.script = (el.tipo==2) ? "areaUbi_update.php" : "areaCarto_update.php";
          // modArea(datiModifica);
        });
        btn2.on('click', function(){ $.redirectPost('drawGeom.php', {id:el.id, tipo:tipoDef, area:el.nome});});
      })
      creaFiltri()
    }
  });
}

function localitaList(comune){
  $("<option/>").val('').text('--scegli localita--').appendTo('#selLocalita');
  $.ajax({
    url: 'api/area.php',
    type: 'POST',
    dataType: 'json',
    data: {trigger : 'localitaList', comune:comune}
  })
  .done(function(data) {
    if (data.length == 0) {
      $("#selLocalita").prop("disabled", true);
      alert('Nessuna località associata al Comune selezionato. Puoi comunque aggiungere solo il Comune');
      return false;
    }
    data.forEach((item, i) => {
      let opt = $("<option/>").attr("data-comune",comune).val(item.id).text(item.localita).appendTo('#selLocalita');
    });
  })
}

function creaFiltri(){
  let tipi = [...new Map(tipo.map(item => [item['tipo'], item])).values()];
  tipi.sort((a, b) => {let fa = a.tipo, fb = b.tipo; if (fa < fb) { return -1; } if (fa > fb) { return 1; } return 0;});

  let comuni = [...new Map(comune.map(item => [item['id'], item])).values()];
  comuni.sort((a, b) => {let fa = a.comune, fb = b.comune; if (fa < fb) { return -1; } if (fa > fb) { return 1; } return 0;});

  if (tipi.length > 1) {
    $("#tipo").html('');
    $("<option/>").val(0).text('tutti i tipi').prop("selected", true).appendTo($("#tipo"))
    tipi.forEach(function(el,i){ $("<option/>").val(el.tipo).text(el.definizione).appendTo($("#tipo")) })
    $("#tipo").show()
  }
  if (comuni.length > 1) {
    $("#comune").html('');
    $("<option/>").val(0).text('tutti i Comuni').prop("selected", true).appendTo($("#comune"))
    comuni.forEach(function(el,i){
      $("<option/>").val(el.id).text(el.comune).appendTo($("#comune"))
    })
    $("#comune").show()
  }
}
