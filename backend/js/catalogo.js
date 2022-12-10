$(document)
.ajaxStart(function(){
  let div = $("<div/>",{id:'loading'});
  $("<div/>",{class:'fa-5x'}).html('<i class="fa-solid fa-cog fa-spin"></i>').appendTo(div)
  $("<h6/>").text('loading...').appendTo(div);
  div.prependTo('body')
})
.ajaxStop(function(){
  $("#loading").remove();
})
let livelli = [];
let tpschList = [];
let statoList = [];
let container = $("#listContainer");
$("[name=filter]").hide()
listaSchede();
$('body').on('change','[name=filter]', function(){
  var livello = $("#livind").val() == 0 ? 'livind != 0': 'livind = '+ $("#livind").val();
  var tipo = $("#tpsch").val() == 0 ? 'tipo != 0': 'tpsch = '+ $("#tpsch").val();
  var fine = $("#fine").val() == 0 ? 'fine != 0': 'fine = '+ $("#fine").val();
  container.find('a').hide();
  container.find('a[data-'+livello+'][data-'+tipo+'][data-'+fine+']').show();
  $("#numSchede").text(container.find('a:visible').length)
})

 $("#csv").click(function (event) {exportCSV.apply(this, [$('.list-group'), 'catalogo.csv']);});

function listaSchede(){
  let link = 'scheda_archeo.php?id=';
  $.ajax({
    url: 'api/scheda.php',
    type: 'POST',
    dataType: 'json',
    data: {trigger:'getSchede'},
    success: function(data){
      // console.log(data);
      $("#numSchede").text(data.length)
      data.forEach(function(el,i){
        livelli.push({livello:el.livello, definizione:el.definizione});
        tpschList.push({tpsch:el.tpsch, tipo:el.tipo});
        statoList.push({stato:el.fine, definizione: el.fine == 1 ? 'aperta' : 'chiusa' });
        let a = $("<a/>", {href:link+el.id, target:'_blank', title:'apri scheda'})
          .attr({
            "data-livind":el.livello,
            "data-fine":el.fine,
            "data-tpsch":el.tpsch
          })
          .addClass('list-group-item riga')
          .appendTo(container);
        $("<span/>").text(el.id).appendTo(a);
        $("<span/>").text(el.numsch).appendTo(a);
        $("<span/>").text(el.definizione).appendTo(a);
        $("<span/>").text(el.dnogg).appendTo(a);
        $("<span/>").text(el.note).appendTo(a);
        $("<span/>").text(el.fine == 1 ? 'aperta' : 'chiusa').appendTo(a);
      })
      creaFiltri()
    }
  });
}

function creaFiltri(){
  let livArr = [...new Map(livelli.map(item => [item['livello'], item])).values()];
  livArr.sort((a, b) => {let fa = a.livello, fb = b.livello; if (fa < fb) { return -1; } if (fa > fb) { return 1; } return 0;});

  let tpschArr = [...new Map(tpschList.map(item => [item['tpsch'], item])).values()];
  tpschArr.sort((a, b) => {let fa = a.tpsch, fb = b.tpsch; if (fa < fb) { return -1; } if (fa > fb) { return 1; } return 0;});

  let statoArr = [...new Map(statoList.map(item => [item['stato'], item])).values()];
  statoArr.sort((a, b) => {let fa = a.stato, fb = b.stato; if (fa < fb) { return -1; } if (fa > fb) { return 1; } return 0;});

  if (tpschArr.length > 1) {
    tpschArr.forEach(function(el,i){
      $("<option/>").val(el.tpsch).text(el.tipo).appendTo($("#tpsch"))
    })
    $("#tpsch").show()
  }
  if (statoArr.length > 1) {
    statoArr.forEach(function(el,i){
      $("<option/>").val(el.stato).text(el.definizione).appendTo($("#fine"))
    })
    $("#fine").show()
  }
  if (livArr.length > 1) {
    livArr.forEach(function(el,i){
      $("<option/>").val(el.livello).text(el.definizione).appendTo($("#livind"))
    })
    $("#livind").show()
  }
}

function exportCSV($list, filename) {
  var $rows = $list.find('.riga'),
  tmpColDelim = String.fromCharCode(11),
  tmpRowDelim = String.fromCharCode(0),
  colDelim = '","',
  rowDelim = '"\r\n"',
  csv = '"' + $rows.map(function (i, row) {
    var $row = $(row);
    var $cols = $row.find('span');
    return $cols.map(function (j, col) {
      var $col = $(col)
      var text = $col.text();
      return text.replace(/"/g, '""'); // escape double quotes
    }).get().join(tmpColDelim);
  })
  .get().join(tmpRowDelim)
  .split(tmpRowDelim)
  .join(rowDelim)
  .split(tmpColDelim)
  .join(colDelim) + '"',
  // Data URI
  csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

  $(this).attr({
    'download': filename,
    'href': csvData,
    'target': '_blank'
  });
 }
