<?php
session_start();
?>
<!doctype html>
<html lang="it">
  <head>
    <?php require('inc/meta.php'); ?>
    <?php require('inc/css.php'); ?>
    <link rel="stylesheet" href="css/gallery.css">
  </head>
  <body class="bg-light" id="top">
    <?php 
      require('inc/header.php'); 
      require('inc/loader.html'); 
      if (isset($_GET['filtro'])) { echo "<input type='hidden' name='getFiltro' value='".$_GET['filtro']."'/>"; }
      if (isset($_GET['tag'])) { echo "<input type='hidden' name='getTag' value='".$_GET['tag']."'/>"; } 
      if (isset($_GET['val'])) { echo "<input type='hidden' name='getVal' value='".$_GET['val']."'/>"; } 
    ?>
    <div class="topBtn animation">
      <div class="rounded-circle scroll-gallery" data-id="top">
        <i class="fas fa-angle-double-up fa-3x pointer"></i></div>
      </div>
    <div class="maintitle text-center" id="home">
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
            <div class="btn-group btn-group-sm" role="group">
              <input type="radio" class="btn-check" name="statoScheda" id="chiuse" value="2" autocomplete="off" checked>
              <label class="btn btn-outline-secondary" for="chiuse">schede complete</label>
              
              <input type="radio" class="btn-check" name="statoScheda" id="aperte" value="1" autocomplete="off">
              <label class="btn btn-outline-secondary" for="aperte">schede in lavorazione</label>

              <?php if(isset($_SESSION['id_user'])){?>
              <input type="radio" class="btn-check" name="statoScheda" id="nascoste" value="false" autocomplete="off">
              <label class="btn btn-outline-secondary" for="nascoste">schede non pubblicate</label>
              <?php } ?>
              <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#galleryTip" aria-expanded="false" aria-controls="galleryTip">?</button>
            </div>
            <div class="collapse mt-3" id="galleryTip">
              <div class="card card-body">Le "schede complete" rappresentano tutti i record che sono controllati e convalidati e che, quindi, risultano "completi",le "schede in lavorazione" sono tutti quei record ancora in fase di elaborazione o in attesa di convalida, i cui dati seppur incompleti possono tuttavia risultare di rilevante interesse scientifico. Le schede "non pubblicate", a differenza delle altre, sono visibili solo ai compilatori.</div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p class="h3 text-center" id="statfilter"></p>
          </div>
        </div>
        <div class="row wrapImg mb-3" id="wrapImg"></div>
        <div class="row mb-3" id="loadingAlert"><h3></h3></div>
      </div>
    </div>
    <div id="scrollAnchor"></div>
    <?php require('inc/footer.php'); ?>
    <?php require('inc/lib.php'); ?>
    <script src="js/gallery.js"></script>
  </body>
</html>
