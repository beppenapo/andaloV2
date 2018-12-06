<!doctype html>
<html lang="en">
  <head>
    <?php require('inc/meta.php'); ?>
    <?php require('inc/css.php'); ?>
  </head>
  <body class="bg-light">
    <?php require('inc/header.php'); ?>
    <div class="maintitle">
      <h1 class="text-light">Biblioteche della Paganella<br/><small>Gestione associata del servizio bibliotecario della Paganella</small></h1>
    </div>
    <div id="mainSection" class="container-fluid">
      <div class="row mb-5">
        <div class="col">
          <h2 class="pb-2 border-bottom">Random images</h2>
        </div>
      </div>
      <div class="row wrapImg px-3 mb-5"></div>
      <div class="row mb-5">
        <div class="col">
          <h2 class="pb-2 border-bottom">Geotag</h2>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col">
          <h2 class="pb-2 border-bottom">Tag Cloud</h2>
        </div>
      </div>
    </div>
    <?php require('inc/footer.php'); ?>
    <?php require('inc/lib.php'); ?>
    <script src="js/index.js"></script>
  </body>
</html>
