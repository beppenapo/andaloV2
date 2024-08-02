<?php
session_start();
if(!isset($_SESSION['id_user'])){ header("Location: login.php");}
?>
<!doctype html>
<html lang="it">
  <head>
    <?php 
      require('inc/meta.php');
      require('inc/css.php'); 
    ?>
    <link rel="stylesheet" href="css/newRecord.css">
  </head>
  <body class="bg-light" id="top">
    <div id="output">
      <div class="rounded border">
        <p></p>
      </div>
    </div>
    <?php
      require('inc/header.php'); 
      require('inc/loader.html'); 
    ?>
    <div class="maintitle" id="home">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="text-dark">PROGETTO MEMORIA</h1>
            <h6 class="text-dark">FOTOTECA DOCUMENTARIA DELL'ALTOPIANO DELLA PAGANELLA</h6>
            <?php echo  "<p>".$_SERVER['DOCUMENT_ROOT']."foto/</p>"; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="container bg-white p-3 border rounded mb-5">
      <div class="row mb-5">
        <div class="col text-center">
          <h4 id="title">Crea una nuova scheda<br><small class="mt-3">* campi obbligatori</small></h4>
        </div>
      </div>
      <form name="nuovaSchedaForm" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col-5">
            <label for="foto" class="form-label">Aggiungi una foto</label>
            <input class="form-control" type="file" id="foto" accept="image/png, image/jpeg" required>
            <div class="form-label">Il file deve essere un jpg o png e non deve superare la dimensione di 50MB</div>
            <div id="imgInfo" class="mt-3">
              <p>Tipo di file: <span id="fileType"></span></p>
              <p>Dimensioni: <span id="fileSize"></span></p>
              <div class="alert"></div>
            </div>
          </div>
          <div class="col-6">
            <div id="imgPlaceholder" class="my-3">
              <div id="placeholder" class="bg-light"><h5>Image preview</h5><i class="fa-solid fa-image"></i></div>
              <img src="" alt="" id="imgPreview">
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-3">
            <label for="dgn_numsch" class="form-label">*Numero scheda:</label>
            <div class="input-group">
              <input type="text" name="dgn_numsch" id="dgn_numsch" class="form-control" data-table="scheda" required>
              <button class="btn btn-outline-secondary" type="button" id="checkName" data-bs-toggle="tooltip" data-bs-title="usa il pulsante per controllare che il numero assegnato non sia già presente, il controllo verrà comunque fatto al salavataggio della scheda"><i class="fa-solid fa-check-double"></i></button>
            </div>
            <div id="numeroMsg" class="form-label">Il numero deve essere univoco</div>
          </div>
          <div class="col-9">
            <label for="dgn_dnogg" class="form-label">* Titolo scheda:</label>
            <input type="text" name="dgn_dnogg" id="dgn_dnogg" class="form-control" data-table="scheda" required>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-4">
            <label for="sog_autore" class="form-label">* Autore:</label>
            <input type="text" name="sog_autore" id="sog_autore" class="form-control" data-table="foto2" required>
          </div>
          <div class="col-8">
            <label for="sog_titolo" class="form-label">* Titolo foto:</label>
            <input type="text" name="sog_titolo" id="sog_titolo" class="form-control" data-table="foto2" required>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="sog_sogg" class="form-label">* Soggetto:</label>
            <textarea class="form-control" name="sog_sogg" id="sog_sogg" rows="10" data-table="foto2" required></textarea>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-7">
            <label for="cro_spec" class="form-label">* Cronologia:</label>
            <input type="text" name="cro_spec" id="cro_spec" class="form-control" data-table="cronologia" required>
            <div class="form-label">Campo a testo libero, puoi inserire un anno preciso o un range di date</div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-2">
            <label for="dtc_icol" class="form-label">* Colore:</label>
            <select class="form-select" name="dtc_icol" id="dtc_icol" data-table="foto2" required></select>
          </div>
          <div class="col-5">
            <label for="dtc_mattec" class="form-label">* Tecnica:</label>
            <select class="form-select" name="dtc_mattec" id="dtc_mattec" data-table="foto2" required></select>
          </div>
          <div class="col-3">
            <label for="dtc_ffile" class="form-label">* Tipo file:</label>
            <select class="form-select" name="dtc_ffile" id="dtc_ffile" data-table="foto2" required></select>
          </div>
          <div class="col-2">
            <label for="dtc_misfd" class="form-label">* Dimensioni:</label>
            <input type="text" name="dtc_misfd" id="dtc_misfd" class="form-control" data-table="foto2" required>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12 mb-3">
            <label for="sog_note" class="form-label">Note foto:</label>
            <textarea class="form-control" name="sog_note" id="sog_note" rows="5" data-table="foto2"></textarea>
          </div>
          <div class="col-12 mb-3">
            <label for="sog_notestor" class="form-label">Note storiche:</label>
            <textarea class="form-control" name="sog_notestor" id="sog_notestor" rows="5" data-table="foto2"></textarea>
          </div>
          <div class="col-12">
            <label for="alt_note" class="form-label">Note generali:</label>
            <textarea class="form-control" name="alt_note" id="alt_note" rows="5" data-table="foto2"></textarea>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-4">
            <label>Compilatore</label>
            <input type="text" class="form-control" value="<?php echo $_SESSION['utente']; ?>" readonly>
            <input type="hidden" name="compilatore" id="compilatore" class="form-control" data-table="scheda" value="<?php echo $_SESSION['id_user']; ?>">
          </div>
          <div class="col-3">
            <label>Data compilazione</label>
            <input type="text"  name="data_compilazione" id="data_compilazione" class="form-control" data-table="scheda" value="<?php echo date('Y-m-d'); ?>" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" id="handleScheda" name="salvaScheda" class="btn btn-sm btn-secondary me-3">Salva dati</button>
            <a href="index.php" class="btn btn-sm btn-secondary">annulla salvataggio</a>
          </div>
        </div>
      </form>
    </div>
    
    <?php require('inc/footer.php'); ?>
    <?php require('inc/lib.php'); ?>
    
    <script src="js/newRecord.js" charset="utf-8"></script>
  </body>
</html>
