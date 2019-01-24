<?php
session_start();
require("class/scheda.class.php");
$scheda = new Scheda(intval($_POST['scheda']));
$getInfo = $scheda->getScheda();
$info=$getInfo['scheda'][0];
$path = $info['path'];
$info = array_diff($info, ["-"]);
$idfoto=$info['id'];
$idscheda=$info['id_scheda'];
$del = array('id','id_scheda','foto2_vector','tipo','path');
foreach ($del as $v) {
  unset($info[$v]);
}
if (!isset($info['sog_titolo'])) {
  $titolo = substr($path,0,-4);
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
    <div class="maintitle bg-white" id="home">
      <div class="container">
        <div class="row">
          <div class="col">
            <p class="text-dark h1"><?php echo $titolo; ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="mainScope border-top border-bottom py-3">
      <div class="container">
        <div class="row">
          <div class="col col-md-6">
            <div class="imgWrap">
              <img src="foto/<?php echo $path; ?>" class="img-fluid" alt="">
              <div class="imgOverlay">

              </div>
            </div>
          </div>
          <div class="col col-md-6">
            <ul>
              <?php
              foreach (array_filter($info) as $key => $value) {
                echo "<li><span style='display:inline-block;width:150px;font-weight:bold;'>".$key."</span> <span class='d-inline-block'>".$value."</span></li>";
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <?php require('inc/footer.php'); ?>
    <?php require('inc/lib.php'); ?>
  </body>
</html>
