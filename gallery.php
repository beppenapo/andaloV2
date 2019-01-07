<!doctype html>
<html lang="it">
  <head>
    <?php require('inc/meta.php'); ?>
    <?php require('inc/css.php'); ?>
  </head>
  <body class="bg-light">
    <?php require('inc/header.php'); ?>
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

    <div class="mainScope border-top border-bottom">
      <div class="container">
        <div class="row">
          <?php
          $test = isset($_POST) ? print_r($_POST) : 'no data';
          echo $test;
          ?>
        </div>
      </div>
    </div>
    <div id="mainSection" class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h2 class="pb-2 border-bottom" id="immagini">
            <i class="far fa-image pr-2"></i>
            IMMAGINI
            <i class="fas fa-angle-double-up float-right pointer scroll" data-id="home"></i>
          </h2>
        </div>
      </div>
      <div class="row wrapImg px-3 mb-5"></div>
    </div>
    <?php require('inc/footer.php'); ?>
    <?php require('inc/lib.php'); ?>
  </body>
</html>
