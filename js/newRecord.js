$("#loading,#output").hide();
const form = $("[name=nuovaSchedaForm]")[0];
const fotoInput = document.getElementById('foto');
const logoPreview = document.getElementById('imgPreview');
const px = document.getElementById('imgPlaceholder').offsetWidth;
let errorCount = 0;

getListe()

$("#checkName").on('click',checkNum);
$("[type=submit]").on('click', (el) => {handleScheda(el)})

function handleScheda(el){
  if(form.checkValidity()){
    el.preventDefault();
    const fd = new FormData();
    let btn = document.getElementById("handleScheda");
    fd.append('trigger', btn.name)
    fd.append("file", fotoInput.files[0], fotoInput.files[0].name);
    $("[data-table").each(function(el){
      let field = $(this).attr('id');
      let val = $(this).val();
      if(val){fd.append(field,val);}
    });
    // for (const [key, value] of fd.entries()) { console.log(`${key}: ${value}`); }
    $("#loading").fadeIn('fast')
    fetch('api/endpoint_scheda.php', {
      method: ajaxType,
      // se passo anche un file non devo usare un header json ma multipart/form, che viene riconosciuto automaticamente dal server, quindi vasta il metodo e il body con i dati del FormData()
      // headers: headerJson,
      body: fd,
    })
    .then(response => response.json())
    .then(data => {
      console.log(data);
      $("#loading").fadeOut('fast', function(){
        $("#output p").text(data.output)
        $("#output").fadeIn('fast')
        setTimeout(function(){
          data.res==1 ? window.location.href="scheda.php?scheda="+data.id : $("#output").fadeOut('fast')
        }, 3000)
      })
    })
    .catch(error => console.error('Errore nel caricamento della scheda:', error))
    .finally(() => {});
  }
}

function checkNum(){
  let val = $("[name=dgn_numsch]").val();
  if(!val){
    alert('Devi prima inserire un valore');
    return;
  }

  fetch('api/endpoint_scheda.php', {
    method: ajaxType,
    headers: headerJson,
    body: JSON.stringify({trigger:'checkNum', scheda:val}),
  })
  .then(response => response.json())
  .then(data => {
    let check = data.length == 0 ? 'is-valid' : 'is-invalid';
    let cls = data.length == 0 ? 'text-success' : 'text-danger';
    let msg = data.length == 0 ? 'ok puoi usare il valore inserito' : 'Attenzione, numero scheda già presente';
    $("#dgn_numsch").removeClass( function(index, className) {
      return (className.match(/(^|\s)is-\S+/g) || []).join(' ');
    }).addClass(check);
    $("#numeroMsg").removeClass(function(index, className) {
      return (className.match(/(^|\s)text-\S+/g) || []).join(' ');
    }).addClass(cls).text(msg);
  })
  .catch(error => console.error('Errore nel controllo del nome:', error))
  .finally(() => {});
}

function getListe(){
  fetch('api/endpoint_scheda.php', {
    method: ajaxType,
    headers: headerJson,
    body: JSON.stringify({trigger:'liste'}),
  })
  .then(response => response.json())
  .then(data => {
    if (data.length === 0) {return;}
    data.dtc_icol.forEach(opt => {
      $("<option/>",{text:opt.definizione}).val(opt.definizione).appendTo('[name=dtc_icol]');
    });
    data.dtc_mattec.forEach(opt => {
      $("<option/>",{text:opt.definizione}).val(opt.definizione).appendTo('[name=dtc_mattec]');
    });
    data.dtc_ffile.forEach(opt => {
      $("<option/>",{text:opt.definizione}).val(opt.definizione).appendTo('[name=dtc_ffile]');
    });
  })
  .catch(error => console.error('Errore nel caricamento delle liste:', error))
  .finally(() => {});
}

function checkFileExists(file){
  fetch('api/endpoint_scheda.php', {
    method: ajaxType,
    headers: headerJson,
    body: JSON.stringify({trigger:'checkFileExists', file:file}),
  })
  .then(response => response.json())
  .then(data => {
    console.log(data);
    if(data.length > 0){
      $("#imgInfo > div").addClass('alert-danger').html('Attenzione, esiste già una foto con lo stesso nome.<a class="d-block" href="scheda.php?scheda='+data[0].id_scheda+'" target="_blank">visualizza scheda</a>');
      return;
    }
  })
  .catch(error => console.error('Errore nel controllo file:', error))
  .finally(() => {});
}

fotoInput.addEventListener('change', event => {
  if(fotoInput.files.length > 0){
    const fileReader = new FileReader();
    fileReader.onload = function handleLoad(){
      $("#imgInfo > div").removeClass(
        function(index, className){ return (className.match(/(^|\s)alert-\S+/g) || []).join(' ');}
      ).text('')
      $("#fileType").text(fotoInput.files[0].type);
      $("#fileSize").text(convertSize(fotoInput.files[0].size));
      checkFileExists(fotoInput.files[0].name)
      if(!fotoInput.files[0].type.includes('image/')){
        $("#imgInfo > div").addClass('alert-danger').text('Attenzione, il file non è di tipo immagine e pertanto non può essere caricato');
        return;
      }
      if(checkSize(fotoInput.files[0].size) > 50){
        $("#imgInfo > div").addClass('alert-danger').text('Attenzione, la foto supera le dimensioni consentite e pertanto non può essere caricata');
        return;
      }
      $("#imgInfo > div").addClass('alert-success').text('Ok, la foto può essere caricata');
      let img = new Image()
      img.src = fileReader.result;
      img.onload = function () {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        const originalWidth = img.naturalWidth;
        const originalHeight = img.naturalHeight;
        let newWidth,newHeight,aspectRatio;
        if(originalWidth > originalHeight){
          aspectRatio = originalWidth/originalHeight;
          newWidth = px;
          newHeight = newWidth/aspectRatio;
        }
        if(originalHeight > originalWidth){
          aspectRatio = originalHeight/originalWidth;
          newHeight = px;
          newWidth = newHeight/aspectRatio;
        }
        if(originalWidth == originalHeight){
          newWidth = px;
          newHeight = px;
        }    

        canvas.width = newWidth;
        canvas.height = newHeight;
    
        ctx.drawImage(img, 0, 0, newWidth, newHeight);
        logoPreview.src = canvas.toDataURL('image/png');
        $("#placeholder").remove()
      };

    }
    fileReader.readAsDataURL(fotoInput.files[0]);
  }
})

function convertSize(bytes) {
  const sizes = ['Bytes', 'KB', 'MB', 'GB'];
  const index = Math.floor(Math.log(bytes) / Math.log(1024));
  return (bytes / Math.pow(1024, index)).toFixed(2) + ' ' + sizes[index];
}

function checkSize(bytes){
  let mb = bytes / Math.pow(1024, 2).toFixed(2)
  return mb;
}