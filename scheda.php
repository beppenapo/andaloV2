<?php
session_start();
require("class/scheda.class.php");
$scheda = new Scheda(intval($_POST['scheda']));
// $scheda = new Scheda(intval(327));
$getInfo = $scheda->getScheda();
$path=$getInfo['list']['path'];
$idFoto=$getInfo['list']['id_foto'];
$drop = array('id_foto','path');
foreach ($drop as $x) { unset($getInfo['list'][$x]); }
?>
<!doctype html>
<html lang="it">
  <head>
    <?php require('inc/meta.php'); ?>
    <?php require('inc/css.php'); ?>
    <style media="screen">
      .imgWrap{position: relative; z-index: 10;}
      .imgOverlay{position: absolute;top: 0;left: 0;bottom: 0;right: 0;background: rgba(0,0,0,.5); opacity:0; z-index: 20;text-align: center;font-size: 5em; color: #fff;line-height:5em;}
      .imgOverlay:hover{opacity: 1;}
      .titleScheda{font-size: 3.5em;}
    </style>
  </head>
  <body class="bg-light">
    <?php require('inc/header.php'); ?>
    <div class="maintitle bg-white" id="home">
      <div class="container">
        <div class="row">
          <div class="col">
            <p class="text-dark titleScheda m-0"><?php echo $getInfo['list']['titolo']; ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="mainScope border-top border-bottom py-5">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-6">
            <div class="imgWrap mb-5">
              <img src="foto/<?php echo $path; ?>" class="img-fluid" alt="">
              <div class="imgOverlay animation pointer"><i class="fas fa-expand my-auto"></i></div>
            </div>
          </div>
          <div class="col-xs12 col-md-6">
            <ul>
              <?php foreach ($getInfo['list'] as $el) {?>
                <li class="mb-2"><?php echo $el; ?></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <?php require('inc/footer.php'); ?>
    <?php require('inc/lib.php'); ?>
  </body>
</html>
