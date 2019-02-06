<?php
session_start();
require("class/global.class.php");
$list=new General;
if (!empty($_GET)) {
  $tag=$_GET['filtro'];
  $val = $tag == 'geotag' ? $_GET['val'] : $_GET['tag'];
  $filter=' immagini che hanno come '.$tag.' "'.$_GET['tag'].'"';
}else {
  $tag=null;
  $val=null;
  $filter=' immagini totali';
}
$img = $list->lazyLoad($tag,$val);
$filterTxt = count($img).$filter;
?>
<!doctype html>
<html lang="it">
  <head>
    <?php require('inc/meta.php'); ?>
    <?php require('inc/css.php'); ?>
  </head>
  <body class="bg-light" id="top">
    <?php require('inc/header.php'); ?>
    <div class="topBtn animation">
      <div class="rounded-circle scroll" data-id="top">
        <i class="fas fa-angle-double-up fa-3x pointer scroll"></i></div>
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
        <div class="row">
          <div class="col">
            <p class="h3 text-center statfilter"><?php echo $filterTxt; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col">
          </div>
        </div>
        <div class="row wrapImg mb-3">
          <?php
            foreach ($img as $key => $val) {
              if (isset($val['dgn_dnogg'])) {
                $titolo=$val['dgn_dnogg'];
              }elseif (!isset($val['dgn_dnogg']) && isset($val['sog_titolo'])) {
                $titolo=$val['sog_titolo'];
              }else {
                $titolo=substr($val['path'],0,-4);
              }
              echo "<div id='img".$key."' data-id='".$val['id']."' class='col-4 col-md-3 col-xl-2 p-0 imgDiv'>";
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
