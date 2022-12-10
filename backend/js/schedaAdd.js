let tagArr = [];
let areeArr = [];
let testArr = [];
let schedeArr = [];
schedeArr.push(["FOTOGR-I-0001",19,7,2]);
$("#tip").hide()
$(document).ready(function() {
  getTags();
  getSchede();

  $(".form-select, .form-control").addClass('form-select-sm')
  $("[name=submit]").on('click',function(e){ salvaScheda(e); });
  $("[name=tag-list]").on('change', function(){ tagList($(this).val()); })
  $("[name=schede-list]").on('change', function(){ schedeList($(this).val()); })
  $("[name='addAreaBtn']").on('click', addArea);
  $("#servizio4").on('click', function(){
    if($(this).is(':checked')){
      $("[name=servizi]").not("#servizio4").prop({'checked': false,'disabled':true});
    }else {
      $("[name=servizi]").not("#servizio4").prop({'disabled':false});
    }
  })
});

function addArea(){
  let area = parseInt($("[name='ai']").val());
  let areaTxt = $("[name='ai'] option:selected").text();
  let motivo = parseInt($("[name='motivo_ai']").val());
  let motivoTxt = $("[name='motivo_ai'] option:selected").text();
  if (!area && !motivo) {
    alert('Attenzione! Devi selezionare entrambi i valori!');
    return false;
  }
  if (area && !motivo) {
    alert('Attenzione! Devi selezionare una motivazione!');
    return false;
  }
  if (!area && motivo) {
    alert("Attenzione! Devi selezionare un'area!");
    return false;
  }
  let tipo = $("[name=dgn_tpsch]").val() == 10 ? 3 : 1;
  let a = [area,motivo,tipo];
  let testArr = areeArr.filter(function(item){ return item[0] == area && item[1] == motivo })
  if(testArr.length > 0){
    alert("Attenzione! La coppia area/motivazione scelta è gia presente nella lista delle aree aggiunte alla scheda");
    return false;
  }
  areeArr.push(a)
  let row = $("<div/>", {class:'row mb-2'}).appendTo('#areeWrap');
  let col8 = $("<div/>", {class:'col-md-8'}).appendTo(row);
  let col4 = $("<div/>", {class:'col-md-4'}).appendTo(row);
  $("<input/>", {class:'form-control form-control-sm'}).prop('disabled',true).val(areaTxt).appendTo(col8)
  let group = $("<div/>",{class:'input-group input-group-sm mb-3'}).appendTo(col4)
  $("<input/>", {class:'form-control'}).prop('disabled',true).val(motivoTxt).appendTo(group)
  $("<button/>", {class:'btn btn-danger', type:'button', name:'delAreaBtn', title:'annulla aggiunta area'})
    .html('<i class="fas fa-times"></i>')
    .appendTo(group)
    .on('click', function(){
      areeArr = areeArr.filter(el => el !== a);
      row.remove();
      areeArr.length > 0 ? $("#noteai").prop('disabled', false) : $("#noteai").prop('disabled', true)
    })
  $("[name='ai']").val('')
  $("[name='motivo_ai']").val('')

  areeArr.length > 0 ? $("#noteai").prop('disabled', false) : $("#noteai").prop('disabled', true)
}

function getTags(){
  $.ajax({url: 'api/scheda.php', type: 'POST', dataType: 'json', data: {trigger: 'getTags'}})
  .done(function(data) {
    let list = $("#tags");
    data.forEach((item, i) => { $("<option/>",{value:item.tag}).appendTo(list); });
  });
}
function getSchede(){
  $.ajax({url: 'api/scheda.php', type: 'POST', dataType: 'json', data: {trigger: 'getSchede'}})
  .done(function(data) {
    let list = $("#schede");
    data.forEach((item, i) => {
      $("<option/>",{value:item.numsch})
      .attr({"data-id":item.id, "data-tpsch":item.tpsch, "data-livello":item.livello})
      .appendTo(list);
    });
  });
}

function schedeList(numsch){
  let id = $('#schede [value="' + numsch + '"]').data('id')
  let tpsch = $('#schede [value="' + numsch + '"]').data('tpsch')
  let livello = $('#schede [value="' + numsch + '"]').data('livello')
  let testArr = schedeArr.filter(function(item){ return item[0] === numsch })
  if(testArr.length > 0){
    alert("Attenzione! La scheda "+numsch+" è gia presente nella lista delle schede aggiunte");
    $("[name=schede-list]").val('');
    return false;
  }
  let div = $("<button/>",{type:'button', name:'skCorrDelBtn', class:'btn btn-sm tag-div animated', title:'elimina tag'}).appendTo('#schedeWrap');
  $("<span/>").text(numsch).appendTo(div);
  $("<span/>").html('<i class="fas fa-times"></i>').appendTo(div);
  schedeArr.push([numsch,id,tpsch,livello]);
  $("[name=schede-list]").val('');
  console.log(schedeArr);
}
// div.on('click', function(){
$("body").on('click','[name=skCorrDelBtn]', function(){
  let txt = $(this).find('span').eq(0).text()
  schedeArr = schedeArr.filter(function(item){ return item[0] !== txt })
  $(this).remove();
  console.log(schedeArr);
})

function tagList(tag){
  if (tagArr.indexOf(tag) > -1) {
    alert('Attenzione: la tag '+tag+' è già stata inserita!');
    $("[name=tag-list]").val('');
    return false;
  }
  let div = $("<button/>",{class:'btn btn-sm tag-div animated', title:'elimina tag'}).appendTo('#tagWrap');
  $("<span/>").text(tag).appendTo(div);
  $("<span/>").html('<i class="fas fa-times"></i>').appendTo(div);
  tagArr.push(tag)
  $("[name=tag-list]").val('');
  div.on('click', function(){
    let item = $(this).find('span').eq(0).text()
    let index = tagArr.indexOf(item);
    if (index > -1) {tagArr.splice(index,1);}
    $(this).remove();
  })
}

function salvaScheda(e){
  const form = $("#addScheda");
  const trigger = 'addScheda';
  let isvalidate = form[0].checkValidity()
  if (isvalidate) {
    e.preventDefault();
    let dati={}
    let tab=[]
    let field = []
    let val = []

    $("[data-table]").each(function(){
      if ($(this).is("input[type=text]") || $(this).is("input[type=number]") || $(this).is("input[type=search]") || $(this).is("input[type=hidden]") || $(this).is("select") || $(this).is("textarea") || $(this).is("input[type=radio]:checked")) {
        if (!$(this).is(':disabled')) {
          let v = $(this).val();
          if (v) {
            tab.push($(this).data('table'));
            field.push({tab:$(this).data('table'),field:$(this).attr('name')});
            val.push({tab:$(this).data('table'),field:$(this).attr('name'),val:v});
          }
        }
      }
      if ($(this).is("input[type=checkbox]")) {
        let v = [];
        $("input[type=checkbox]:checked").each(function(){ v.push($(this).val()); });
        tab.push($(this).data('table'));
        field.push({tab:$(this).data('table'),field:$(this).attr('name')});
        val.push({tab:$(this).data('table'),field:$(this).attr('name'),val:v});
      }
    });

    if (tagArr.length > 0) {
      tab.push('tags')
      field.push({tab:'tags',field:'tags'})
      val.push({tab:'tags', field:'tags', val:tagArr})
    }
    if (areeArr.length > 0) {
      tab.push('aree_scheda');
      field.push({tab:'aree_scheda',field:'dati'})
      val.push({tab:'aree_scheda', field:'dati', val:areeArr})
    }
    if (schedeArr.length > 0) {
      tab.push('altrif');
      field.push({tab:'altrif',field:'dati'})
      val.push({tab:'altrif', field:'dati', val:schedeArr})
    }

    tab = tab.filter((v, p) => tab.indexOf(v) == p);
    $.each(tab,function(i,v){ dati[v]={} })
    $.each(field,function(i,v){ dati[v.tab][v.field]={} })
    $.each(val,function(i,v){ dati[v.tab][v.field]=v.val })
    $.ajax({
      url: 'api/scheda.php',
      type: "POST",
      dataType: 'json',
      data: {trigger : trigger,  dati}
    })
    .done(function(data){
      console.log(data);
      if (data.res == true) {
        $("#tip > .alert").toggleClass('alert-warning alert-success');
        $("#tip > .alert i").toggleClass('fa-lightbulb fa-check-double');
        $("#tip > .alert span").text(data.msg);
        $(".alert-btn").removeClass('invisible');
        $("#nuovaScheda").attr("href",'scheda_archeo.php?id='+data.scheda);
        $("#tip").fadeIn('fast');
      }
    })
    .fail(function(){console.log("error");});
  }
}
