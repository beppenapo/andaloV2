<?php
session_start();
?>
<!doctype html>
<html lang="it">
  <head>
    <?php require('inc/meta.php'); ?>
    <?php require('inc/css.php'); ?>
  </head>
  <body class="bg-light" id="top">
    <input type="hidden" name="filtro" value="<?php echo $_GET['filtro']; ?>">
    <input type="hidden" name="tag" value="<?php echo $_GET['tag']; ?>">
    <input type="hidden" name="val" value="<?php echo $_GET['val']; ?>">
    <?php require('inc/header.php'); ?>
    <div class="topBtn animation">
      <div class="rounded-circle scroll-gallery" data-id="top">
        <i class="fas fa-angle-double-up fa-3x pointer"></i></div>
      </div>
    <div class="maintitle" id="home">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="text-dark">PROGETTO MEMORIA</h1>
            <h6 class="text-dark">FOTOTECA DOCUMENTARIA DELL'ALTOPIANO DELLA PAGANELLA</h6>
          </div>
        </div>
      </div>
    </div>

    <div class="mainScope">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col text-center">
            <div class="btn-group btn-group-sm btn-group-toggle mb-3" data-toggle="buttons">
              <label class="btn btn-outline-secondary active">
                <input type="radio" name="statoScheda" value="2" autocomplete="off" checked> schede chiuse
              </label>
              <label class="btn btn-outline-secondary">
                <input type="radio" name="statoScheda" value="1" autocomplete="off"> schede in lavorazione
              </label>
              <button type="button" class="btn btn-outline-secondary" name="button" data-toggle="collapse" data-target="#galleryTip">?</button>
            </div>
            <div class="collapse" id="galleryTip">
              <div class="card card-body">Le "schede chiuse" rappresentano tutti i record che sono controllati e convalidati e che, quindi, risultano "completi", mentre per "schede in lavorazione" si intendono tutti quei record ancora in fase di elaborazione o in attesa di convalida, i cui dati seppur incompleti possono tuttavia risultare di rilevante interesse scientifico</div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p class="h3 text-center statfilter"></p>
          </div>
        </div>
        <div class="row loading">
          <div class="col text-center">
            <h1>Loading gallery ...</h1>
            <h6>L'elevato numero di foto da mostrare potrebbe richiedere ancora qualche secondo</h6>
          </div>
        </div>
        <div class="row wrapImg mb-3"></div>
      </div>
    </div>
    <?php require('inc/footer.php'); ?>
    <?php require('inc/lib.php'); ?>
    <script src="js/gallery.js"></script>
  </body>
</html>
