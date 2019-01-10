<?php
session_start();
require("class/global.class.php");
$list=new General;
$img = $list->lazyLoad();
?>
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
      <div class="container-fluid">
        <div class="row wrapImg">
          <?php
            foreach ($img as $key => $val) {
              if (!isset($val['sog_titolo']) || $val['sog_titolo'] == '-' || $val['sog_titolo'] == '') {$titolo = substr($val['path'],0,-4); }else {$titolo = $val['sog_titolo'];}
              echo "<div id='img".$key."' class='col-4 col-md-2 p-0 imgDiv'>";
                echo "<div class='imgContent animation lozad' data-background-image='foto_medium/".$val['path']."'></div>";
                echo "<div class='animation imgTxt d-none d-md-block'>";
                  echo "<p class='animation'>".$titolo."</p>";
                echo "</div>";
              echo "</div>";
            }
          ?>
        </div>
      </div>
    </div>
    <?php require('inc/footer.php'); ?>
    <?php require('inc/lib.php'); ?>
    <script src="js/gallery.js"></script>
  </body>
</html>
