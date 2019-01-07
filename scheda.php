<?php
session_start();
require("class/scheda.class.php");
$scheda = new Scheda(intval($_POST['scheda']));
$getInfo = $scheda->getScheda();
$info=$getInfo[0];
if (!$info['sog_titolo'] || $info['sog_titolo'] == '-' || $info['sog_titolo'] == '') {
  $titolo = substr($info['path'],0,-4);
} else {
  $titolo = $info['sog_titolo'];
}
?>
<!doctype html>
<html lang="it">
  <head>
    <?php require('inc/meta.php'); ?>
    <?php require('inc/css.php'); ?>
    <style media="screen">
      .imgWrap{position: relative; z-index: 10;}
      .imgOverlay{position: absolute;top: 0;left: 0;bottom: 0;right: 0;background: rgba(0,0,0,.5); z-index: 20;}
    </style>
  </head>
  <body class="bg-light">
    <?php require('inc/header.php'); ?>
    <div class="maintitle" id="home">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="text-dark"><?php echo $titolo; ?></h1>
          </div>
        </div>
      </div>
    </div>

    <div class="mainScope border-top border-bottom m-0">
      <div class="container">
        <div class="row">
          <div class="col col-md-6">
            <div class="imgWrap">
              <img src="foto/<?php echo $info['path']; ?>" class="img-fluid" alt="">
              <div class="imgOverlay">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php require('inc/footer.php'); ?>
    <?php require('inc/lib.php'); ?>
  </body>
</html>
