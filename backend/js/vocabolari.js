$(document).ready(function() {
  $("#elenco .list-group-item").on('click', function(){
    $("#elenco .list-group-item").removeClass('active')
    $(this).addClass('active')
  })

  $("[name='tab']").on('click', function(){
    let tab = $(this).data('tab');
    viewTab(tab);
  })
});

function viewTab(tab){
  $.ajax({
    url: 'api/vocabolari.php',
    type: 'POST',
    dataType: 'json',
    data: {trigger: 'getValue', tab:tab}
  })
  .done(function(data) {
    let wrap = $("#viewTabDiv .list-group")
    wrap.html('');
    $("[name=addVal]").html('')
    data.forEach((el, i) => {
      let li = $("<li/>", {class:'list-group-item'}).appendTo(wrap)
      let def = $("<div/>",{class:'testo'}).appendTo(li)
      let defInput = $("<input/>",{class:'form-control form-control-sm', type:'text', name:'defInput'}).val(el.value).appendTo(def)
      let btnGroup = $("<div/>", {class:'btn-group'}).appendTo(li)
      let modBtn = $("<button/>",{type:'button', class:'btn btn-sm btn-white modBtn animated', title:'modifica valore'})
        .html('<i class="fa-solid fa-pen text-primary"></i>')
        .on('click', function(){ modValue(tab, el.value, defInput.val()) })
        .appendTo(btnGroup)
      let resetBtn = $("<button/>",{type:'button', class:'btn btn-sm btn-white modBtn animated', title:'reimposta valore iniziale'})
        .html('<i class="fa-solid fa-rotate text-primary"></i>')
        .on('click', function(){ defInput.val(el.value) })
        .appendTo(btnGroup)
      let delBtn = $("<button/>",{type:'button', class:'btn btn-sm btn-white modBtn animated', title:'elimina valore'})
        .html('<i class="fa-solid fa-trash-can text-danger"></i>')
        .on('click', function(){ delValue(tab, el.value) })
        .appendTo(btnGroup)
    });
    // let liForm = $("<li/>", {class:'list-group-item'}).appendTo(wrap)
    let form = $("[name=addVal]")
    form.appendTo("#viewTabDiv")
    let addInputGroup = $("<div/>",{class:'input-group input-group-sm my-3'}).appendTo(form)
    $("<input/>",{type:'text', class:'form-control', placeholder:'inserisci un nuovo valore', name:'newDef'}).prop('required', true).appendTo(addInputGroup)
    $("<button/>",{class:'btn btn-success', type:'submit'})
      .appendTo(addInputGroup)
      .text('salva')
      .on('click',function(e){addVal(form, e, tab)})
  });
}

function addVal(form, e, tab){
  let isvalidate = form[0].checkValidity();
  if (isvalidate) {
    e.preventDefault();
    let trigger = 'addVal';
    let val = $("[name=newDef]").val();
    let dati={tab:tab,val:val};
    ajax(trigger, dati);
  }
}

function modValue(tab, old, mod){
  if (old == mod) {
    alert('la definizione non è stata modificata perciò non verrà salvata')
  }else {
    let check = confirm('stai modificando la definizione "'+old+'" in "'+mod+'".\nConferma la scelta per eseguire la modifica')
    if (check) {
      let trigger = 'modVal';
      let dati = {tab:tab, old:old, mod:mod}
      ajax(trigger, dati);
    }
  }
}

function delValue(tab, val){
  let check = confirm('stai eliminado la definizione "'+val+'".\nL\'azione non può essere annullata e potrebbe corrompere i dati presenti nel database in maniera irreversibile!\nVuoi procedere?')
  if (check) {
    let trigger = 'delVal';
    let dati = {tab:tab, val:val}
    ajax(trigger, dati);
  }
}

function ajax(trigger, dati){
  $.ajax({
    url: 'api/vocabolari.php',
    type: 'POST',
    dataType: 'json',
    data: {trigger: trigger, dati}
  })
  .done(function(data){
    alert(data.msg);
    viewTab(dati.tab);
  })
}
