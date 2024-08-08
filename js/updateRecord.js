$(document).ready(function() {
  const scheda = parseInt($("[name=scheda]").val());
  const form = $("[name='aggiornaSchedaForm']")[0];
  let tab = [];
  let field = [];
  let val = [];

  function initScheda() {
    fetch('api/endpoint_scheda.php', {
      method: ajaxType,
      headers: headerJson,
      body: JSON.stringify({ trigger: 'getScheda', id: scheda }),
    })
    .then(response => response.json())
    .then(data => {
      if (data.scheda.length === 0) { return; }
      data.liste.dtc_icol.forEach(opt => {
        let option = $("<option/>", { text: opt.definizione }).val(opt.definizione).appendTo('[name=dtc_icol]');
        if (data.scheda[0].dtc_icol == opt.definizione) { option.prop('selected', true); }
      });
      data.liste.dtc_mattec.forEach(opt => {
        let option = $("<option/>", { text: opt.definizione }).val(opt.definizione).appendTo('[name=dtc_mattec]');
        if (data.scheda[0].dtc_mattec == opt.definizione) { option.prop('selected', true); }
      });
      data.liste.dtc_ffile.forEach(opt => {
        let option = $("<option/>", { text: opt.definizione }).val(opt.definizione).appendTo('[name=dtc_ffile]');
        if (data.scheda[0].dtc_ffile == opt.definizione) { option.prop('selected', true); }
      });
      data.liste.tags.forEach(opt => {
        $("<option/>", { text: opt.tag }).val(opt.tag).appendTo('#tagListOption');
      });
      if (data.tags && data.tags.length > 0) {
        data.tags.forEach(tag => {
          let ico = '<i class="fa-solid fa-xmark ms-2"></i>';
          $("<button/>", { type: 'button', class: 'btn btn-sm btn-info text-white me-1', title: 'elimina tag' })
            .html(tag.tag + ico)
            .appendTo("#tagListDiv")
            .on('click', function() {
              if (confirm('Stai per eliminare la tag "' + tag.tag + '" se confermi, la parola chiave non sarà più associata al record')) {
                let result = manageTag({ trigger: 'removeTag', scheda: scheda, tag: tag.tag });
                result.then(data => {
                  if (data.error == 0){$(this).remove();} else {showError(data.output);}
                }).catch(error => showError(error));
              }
            });
        });
      }
      console.log(data.scheda);
      
      data.scheda.forEach(item => {
        $("#title").text(item.dgn_dnogg);
        $("#imgPreview").attr("src","foto/"+item.path)
        $("[name=dgn_numsch]").val(item.dgn_numsch);
        $("[name=dgn_dnogg]").val(item.dgn_dnogg);
        $("[name=cro_spec]").val(item.cro_spec);
        $("[name=sog_titolo]").val(item.sog_titolo);
        $("[name=sog_sogg]").val(item.sog_sogg);
        $("[name=sog_autore]").val(item.sog_autore);
        $("[name=note]").val(item.note);
        $("[name=sog_note]").val(item.sog_note);
        $("[name=sog_notestor]").val(item.sog_notestor);
        $("[name=alt_note]").val(item.alt_note);
        $("[name=dtc_misfd]").val(item.dtc_misfd);
        let statoTxt = item.fine == 1 ? 'in lavorazione' : 'chiusa';
        $("#statoSchedaText > span").text(statoTxt);
        $("[name=fine]").each(function() { if ($(this).val() == item.fine) { $(this).prop('checked', true); } });
        let pubblicaTxt = item.pubblica === true ? "la scheda è pubblica, se vuoi che non sia visibile nella gallery deseleziona il pulsante in basso, potrai sempre accedere alla scheda selezionando l'opzione 'schede in lavorazione' visibile nella gallery, puoi modificare questa opzione in qualsiasi momento" : "la scheda non è accessibile ai visitatori del sito ma solo agli utenti di sistema, clicca sul pulsante in basso per renderla accessibile pubblicamente, puoi modificare questa opzione in qualsiasi momento";
        $("#pubblicaSchedaText").text(pubblicaTxt);
        setPubblicaLabel(item.pubblica);
        $("[name=pubblica]").prop('checked', item.pubblica).on('change', function() {
          let stato = $(this).is(':checked');
          setPubblicaLabel(stato);
        });
      });
    })
    .catch(error => console.error('Errore nel caricamento della scheda:', error))
    .finally(() => {$("#loading").fadeOut('fast');});
  }

  function manageTag(dati) {
    return fetch('api/endpoint_scheda.php', {
      method: ajaxType, 
      headers: headerJson, 
      body: JSON.stringify(dati)
    })
    .then(response => response.json())
    .catch(error => {
      console.error('errore:', error);
      throw error;
    });
  }

  function showError(message) {
    $("#errorToast .toast-body").html(message);
    $("#errorToast").toast('show');
    $('#tagList').val('');
  }
  function showOutput(message) {
    $("#outputToast .toast-body").html(message);
    $("#outputToast").toast('show');
  }

  function setPubblicaLabel(stato) {
    let pubblicaLabel = stato === true ? 'la scheda sarà visibile nella gallery' : 'la scheda sarà visibile solo agli utenti registrati';
    $("#pubblicaLabel").text(pubblicaLabel);
  }

  function hideToast() { $(".toast").hide(); }

  function salva(e) {
    if (form.checkValidity()) {
      e.preventDefault();
      const fd = new FormData();
      fd.append('trigger', 'updateScheda')
      fd.append('scheda', scheda)
      if(fotoInput.files.length > 0){
        fd.append("file", fotoInput.files[0], fotoInput.files[0].name);
      }
      buildData(fd)
      $("#loading").fadeIn('fast');
      fetch('api/endpoint_scheda.php', {
        method: ajaxType, 
        body: fd
      })
      .then(response => response.json())
      .then(data => {
        $("#loading").fadeOut('fast', function() {
          if(data.error == 0){
            showOutput(data.output)
            setTimeout(function() {
              window.location.href = "scheda.php?scheda=" + scheda
            }, 3000);
          }else{
            showError(data.output);
          }
        });
      })
      .catch(error => console.error('Errore nel caricamento della scheda:', error));
    }
  }

  function buildData(fd) {
    $("[data-table]").each(function() {
      if ($(this).is("input:text") ||
          $(this).is("input[type=number]") ||
          $(this).is("select") ||
          $(this).is("textarea")) {
        if (!$(this).is(':disabled')) {
          if ($(this).val()) {
            let field = $(this).attr('id');
            let val = $(this).val();
            fd.append(field,val);
          }
        }
      }
      if ($(this).is(':checkbox')) {
        let val = $(this).is(':checked');
        let field = $(this).attr('id');
        fd.append(field,val);
      }

      if ($(this).is("input:radio")) {
        if ($(this).is(":checked")) {
          let val = parseInt($(this).val());
          let field = $(this).attr('name');
          fd.append(field,val);
        }
      }
    });
  }


  const fotoInput = document.getElementById('foto');
  fotoInput.addEventListener('change', event => {
    if(fotoInput.files.length > 0){
      previewFoto(fotoInput)
    }
  })

  document.querySelectorAll('[data-bs-dismiss="toast"]').forEach(button => {
    button.addEventListener('click', hideToast);
  });

  $('#tagList').on('change', function() {
    const value = $(this).val().trim();
    const options = $('#tagListOption option');
    if ($('#tagListDiv button:contains("' + value + '")').length > 0) {
      showError('attenzione, la tag "' + value + '" è già presente');
      return;
    }
    options.each(function() {
      const v = $(this).val();
      console.log([v, value]);
      
      if (v === value) {
        let result = manageTag({ trigger: 'addTag', scheda: scheda, tag: value });
        result.then(data => {
          console.log(data);
          
          if (data.error == 0) {
            let ico = '<i class="fa-solid fa-xmark ms-2"></i>';
            const button = $('<button/>', { type: 'button', class: 'btn btn-sm btn-info text-white me-1', title: 'elimina tag' })
            .html(value + ico)
            .appendTo('#tagListDiv')
            .on('click', function() {
              if (confirm('Stai per eliminare la tag "' + value + '" se confermi, la parola chiave non sarà più associata al record')) {
                let result = manageTag({ trigger: 'removeTag', scheda: scheda, tag: value });
                result.then(data => {
                  if (data.error == 0) {$(this).remove();} else {showError(data.output);}
                }).catch(error => showError(error));
              }
            });
            $('#tagList').val('');
          } else {
            showError(data.output);
          }
        }).catch(error => showError(error));
        return false;
      }
    });
  });
  $("[name='modificaBtn']").on('click', function(e) { salva(e); });
  initScheda();
});
