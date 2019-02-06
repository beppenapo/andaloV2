<?php
session_start();
require("class/scheda.class.php");
$scheda = new Scheda(intval($_GET['scheda']));
$getInfo = $scheda->getScheda();
$path=$getInfo['list']['path'];
$idFoto=$getInfo['list']['id_foto'];
$drop = array('id_foto','path');
foreach ($drop as $x) { unset($getInfo['list'][$x]); }
// echo count($getInfo['tag']['geo']);
?>
<!doctype html>
<html lang="it">
  <head>
    <?php require('inc/meta.php'); ?>
    <?php require('inc/css.php'); ?>
    <style media="screen">
      .imgWrap{position: relative; z-index: 10;}
      .imgOverlay{position: absolute;top: 0;left: 0;bottom: 0;right: 0;background: rgba(0,0,0,.5); opacity:0; z-index: 20;font-size: 5em; color: #fff;}
      .imgOverlay:hover{opacity: 1;}
      .imgOverlay>i{position: absolute; top: 50%; left: 50%;transform: translate(-50%, -50%);}
    </style>
  </head>
  <body class="bg-light">
    <?php require('inc/header.php'); ?>
    <div class="maintitle bg-white">
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
          <div class="col-xs-12 col-md-7 mb-5">
            <div class="imgWrap text-center mb-2">
              <img src="foto/<?php echo $path; ?>" class="img-fluid" alt="">
              <div class="imgOverlay animation pointer"><i class="fas fa-expand"></i></div>
            </div>
            <div>
              <p class="border-bottom py-2"><i class="fas fa-tags"></i> Tag</p>
              <form class="form geoTagContent" action="gallery.php" method="get" name="geoTagForm">
              <?php
              foreach ($getInfo['tag']['tag'] as $k => $val) {
                echo "<button class='btn btn-info btn-sm mr-1 mb-1 tag' type='button' name='tagBtn' data-filtro='tag' data-id='".$k."' data-tag='".$val['tag']."'>".$val['tag']."</button>";
              }
              ?>
              </form>
            </div>
          </div>
          <div class="col-xs12 col-md-5">
            <ul>
              <?php foreach ($getInfo['list'] as $el) {?>
                <li class="mb-2"><?php echo $el; ?></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <?php if(!empty($getInfo['tag']['geo'])){?>
            <p class="border-bottom py-2">
              Altre foto di <?php echo $getInfo['tag']['geo'][0]['comune']; ?> che potrebbero interessarti
            </p>
            <?php
              foreach ($getInfo['tag']['geo'] as $key => $val) {
                if (!isset($val['sog_titolo']) || $val['sog_titolo'] == '-' || $val['sog_titolo'] == '') {$titolo = substr($val['path'],0,-4); }else {$titolo = $val['sog_titolo'];}
                echo "<div id='img".$key."' data-id='".$val['id_scheda']."' class='col-4 col-md-3 col-xl-2 p-0 imgDiv'>";
                  echo "<div class='imgContent animation lozad' data-background-image='foto_small/".$val['path']."'></div>";
                  echo "<div class='animation imgTxt d-none'>";
                    echo "<p class='animation'>".$titolo."</p>";
                  echo "</div>";
                echo "</div>";
              }
            }//if
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="imgModal" tabindex="-1" role="dialog" aria-labelledby="imgModal" aria-hidden="true">
      <div class="modalWrap">
        <div class="btnWrap text-center clearfix">
          <div class="btn-group btn-group-sm" role="group" aria-label="modalBtn">
            <button type="button" name="dgnNumschBtn" class="btn btn-outline-light" disabled><?php echo preg_replace('/<strong[^>]*?>([\\s\\S]*?)<\/strong>/','\\1', $getInfo['list']['dgn_numsch']); ?></button>
            <button type="button" name="dtcBtn" class="btn btn-outline-light" disabled><?php echo preg_replace('/<span[^>]*?>([\\s\\S]*?)<\/span>/','\\1', $getInfo['list']['dtc']); ?></button>
            <a href="foto/<?php echo $path; ?>" class="btn btn-light" title="salva immagine" download><i class="fas fa-download"></i></a>
            <button type="button" class="btn btn-light" name="closeModal"><i class="fas fa-compress-arrows-alt"></i></button>
          </div>
        </div>
        <div class="imgModalDiv" style="background-image:url('foto/<?php echo $path; ?>')"></div>
      </div>
    </div>
    <?php require('inc/footer.php'); ?>
    <?php require('inc/lib.php'); ?>
    <script src="js/gallery.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.imgOverlay').on('click', function() {
          $('.imgModal').fadeIn('fast',function(){
            $('body').addClass('modal-open');
          });
        });
        $('[name=closeModal]').on('click', function() {
          $('.imgModal').fadeOut('fast',function(){
            $('body').removeClass('modal-open');
          });
        });
      });
    </script>
  </body>
</html>
