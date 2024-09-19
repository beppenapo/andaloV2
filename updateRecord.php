<?php
session_start();
if(!isset($_SESSION['id_user'])){ header("Location: login.php");}
?>
<!doctype html>
<html lang="it">
  <head>
    <?php require('inc/meta.php'); ?>
    <?php require('inc/css.php'); ?>
    <link rel="stylesheet" href="css/newRecord.css">
  </head>
  <body class="bg-light" id="top">
    <?php 
      require('inc/header.php'); 
      require('inc/loader.html'); 
    ?>
    <div class="maintitle bg-white my-4 border-bottom" id="home">
      <div class="container">
        <div class="row">
          <div class="col text-center my-2">
            <h1 class="text-dark">PROGETTO MEMORIA</h1>
            <h6 class="text-dark">FOTOTECA DOCUMENTARIA DELL'ALTOPIANO DELLA PAGANELLA</h6>
          </div>
        </div>
      </div>
    </div>

    <div class="container bg-white p-3 border rounded mb-5">
      <div class="row mb-5">
        <div class="col text-center">
          <h4>Stai modificando la scheda: <br> <span class="fw-bold mt-3" id="title"></span></h4>
        </div>
      </div>
      <form name="aggiornaSchedaForm" method="post">
        <input type="hidden" name="scheda" value="<?php echo $_GET['item']; ?>">
        <div class="row mb-3">
          <div class="col-6">
            <div id="imgPlaceholder" class="my-3">
              <img src="" alt="" class="img-fluid" id="imgPreview">
            </div>
          </div>
          <div class="col-5">
            <label for="foto" class="form-label">Sostituisci la foto</label>
            <input class="form-control" type="file" id="foto" accept="image/png, image/jpeg">
            <div class="form-label">Il file deve essere un jpg o png e non deve superare la dimensione di 50MB</div>
            <div id="imgInfo" class="mt-3">
              <p>Tipo di file: <span id="fileType"></span></p>
              <p>Dimensioni: <span id="fileSize"></span></p>
              <div class="alert"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="dgn_numsch" class="form-label">Numero scheda:</label>
            <input type="text" name="dgn_numsch" id="dgn_numsch" class="form-control" data-table="scheda" required>
          </div>
          <div class="col-md-9 mb-3">
            <label for="dgn_dnogg" class="form-label">Titolo scheda:</label>
            <input type="text" name="dgn_dnogg" id="dgn_dnogg" class="form-control" data-table="scheda" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="sog_autore" class="form-label">Autore:</label>
            <input type="text" name="sog_autore" id="sog_autore" class="form-control" data-table="foto2" required>
          </div>
          <div class="col-md-8 mb-3">
            <label for="sog_titolo" class="form-label">Titolo foto:</label>
            <input type="text" name="sog_titolo" id="sog_titolo" class="form-control" data-table="foto2" required>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="sog_sogg" class="form-label">Soggetto:</label>
            <textarea class="form-control" name="sog_sogg" id="sog_sogg" rows="10" data-table="foto2" required></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 mb-3">
            <label for="cro_spec" class="form-label">Cronologia:</label>
            <input type="text" name="cro_spec" id="cro_spec" class="form-control" data-table="cronologia" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-2 mb-3">
            <label for="dtc_icol" class="form-label">Colore:</label>
            <select class="form-select" name="dtc_icol" id="dtc_icol" data-table="foto2" required></select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="dtc_mattec" class="form-label">Tecnica:</label>
            <select class="form-select" name="dtc_mattec" id="dtc_mattec" data-table="foto2" required></select>
          </div>
          <div class="col-md-2 mb-3">
            <label for="dtc_ffile" class="form-label">Tipo file:</label>
            <select class="form-select" name="dtc_ffile" id="dtc_ffile" data-table="foto2" required></select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="dtc_misfd" class="form-label">Dimensioni:</label>
            <input type="text" name="dtc_misfd" id="dtc_misfd" class="form-control" data-table="foto2" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="note" class="form-label">Note generali:</label>
            <textarea class="form-control" name="note" id="note" rows="10" data-table="scheda"></textarea>
          </div>
          <div class="col-md-6 mb-3">
            <label for="sog_note" class="form-label">Note foto:</label>
            <textarea class="form-control" name="sog_note" id="sog_note" rows="10" data-table="foto2"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="sog_notestor" class="form-label">Note storiche:</label>
            <textarea class="form-control" name="sog_notestor" id="sog_notestor" rows="10" data-table="foto2"></textarea>
          </div>
          <div class="col-md-6 mb-3">
            <label for="alt_note" class="form-label">Altre note:</label>
            <textarea class="form-control" name="alt_note" id="alt_note" rows="10" data-table="foto2"></textarea>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <label for="fot_collocazione" class="form-label">Collocazione:</label>
            <input type="text" class="form-control" name="fot_collocazione" id="fot_collocazione" data-table="foto2">
          </div>
        </div>
        <div class="row my-4" id="tagDiv">
          <div class="col mb-3">
            <label for="tagList">Aggiungi tag</label>
            <input type="text" class="form-control w-auto" list="tagListOption" id="tagList" placeholder="cerca tag...">
            <datalist id="tagListOption"></datalist>
            <small class="form-text">inizia a digitare una parola chiave e clicca sulle opzioni suggerite per aggiungere il valore alla lista delle tags</small>
            <div id="tagListDiv" class="mt-3"></div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <p id="statoSchedaText">La scheda risulta "<span class="fw-bold"></span>", cambia il suo stato utilizzando i seguenti pulsanti</p>
            <div class="btn-group" role="group">
              <input type="radio" class="btn-check" name="fine" id="incompleta" value="1" data-table="scheda" autocomplete="off">
              <label class="btn btn-outline-secondary" for="incompleta">in lavorazione</label>

              <input type="radio" class="btn-check" name="fine" id="completa" value="2" data-table="scheda" autocomplete="off">
              <label class="btn btn-outline-secondary" for="completa">scheda chiusa</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <p id="pubblicaSchedaText"></p>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="pubblica" id="pubblica" data-table="scheda">
              <label class="form-check-label" for="pubblica" id="pubblicaLabel"></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" name="modificaBtn" class="btn btn-sm btn-secondary me-3">Salva dati</button>
            <a href="scheda.php?scheda=<?php echo $_GET['item']; ?>" class="btn btn-sm btn-secondary">torna alla scheda</a>
          </div>
        </div>
      </form>
    </div>

    <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
      <div id="outputToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body"></div>
      </div>
    </div>

    <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
      <div id="errorToast" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header"><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button></div>
        <div class="toast-body"></div>
      </div>
    </div>
    <?php require('inc/footer.php'); ?>
    <?php require('inc/lib.php'); ?>
    <script src="js/updateRecord.js" charset="utf-8"></script>
  </body>
</html>
