<?php
session_start();
require("class/scheda.class.php");
$scheda = new Scheda(intval($_GET['scheda']));
$getInfo = $scheda->getScheda();
$path=$getInfo['list']['path'];
$drop = array('path');
foreach ($drop as $x) { unset($getInfo['list'][$x]); }
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
      .feedBackLink{color:#d39e00;}
      .feedBackLink:hover{color:#987200;}
      .sendFeedback{font-weight: bold; background: #d39e00; color: #fff; box-shadow: 0 5px 10px rgba(0,0,0,.6);}
      .sendFeedback:hover{box-shadow: none;color: #fff;}
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
            <ul id="testregex">
              <?php foreach ($getInfo['list'] as $el) {?>
                <li class="mb-2"><?php echo $el; ?></li>
              <?php } ?>
            </ul>
            <small><a href="#feedback" class="p-2 animation rounded pointer border-0 sendFeedback">inviaci un commento su questa foto</a></small>
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
                echo "<div id='img".$key."' data-id='".$val['id']."' class='col-4 col-md-3 col-xl-2 p-0 imgDiv'>";
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
        <div class="row" id="feedback">
          <div class="col">
            <p class="border-bottom py-2 mt-5 font-weight-bold">Ci piacerebbe sapere cosa ne pensi di questa foto</p>
            <p>Utilizza il form per comunicarci eventuali errori che hai riscontrato nei dati inerenti la foto visualizzata, per aggiungere nuove informazioni in tuo possesso, o semplicemente per darci il tuo parere.<br>Se deciderai di aiutarci a migliorare il nostro database te ne saremo grati e ti assicuriamo che i tuoi dati non saranno resi pubblici né saranno ceduti a servizi esterni<br>
            Per saperne di più leggi la nostra <a href="privacy.php" class="feedBackLink animation" target="_blank" title="pagina in cui vengono descritti i termini di servizio dei dati condivisi">informativa sulla privacy</a></p>
            <p>Se vuoi mandarci una foto o altro materiale che ritieni possa arricchire l'archivio, scrivi a <a href="mailto:biblioteche.paganella@gmail.com" class="feedBackLink animation">biblioteche.paganella@gmail.com</a></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <form class="form" name="feedbackForm">
              <input type="hidden" name="scheda" class="form-control" value="<?php echo $_GET['scheda']; ?>">
              <small>Tutti i campi sono obbligatori</small>
              <div class="form-row">
                <div class="col-6">
                  <input type="text" name="nome" value="" class="form-control form-control-sm" placeholder="Nome" required>
                </div>
                <div class="col-6">
                  <input type="email" name="email" value="" class="form-control form-control-sm" placeholder="Email">
                </div>
              </div>
              <div class="form-row mt-2">
                <div class="col">
                  <textarea name="commento" rows="8" cols="40" class="form-control form-control-sm" placeholder="Messaggio" value="" required></textarea>
                </div>
              </div>
              <div class="form-row mt-2">
                <div class="col">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="privacy" value="1" required>
                    <label class="form-check-label" for="privacy"><small>Ok! Ho letto l'<a href="privacy.php" class="feedBackLink animation" target="_blank" title="pagina in cui vengono descritti i termini di servizio dei dati condivisi">informativa sulla privacy</a></small></label>
                  </div>
                </div>
              </div>
              <div class="form-row mt-2">
                <div class="col-xs-12 col-md-4 mb-3">
                  <button type="submit" class="btn-sm w-100 p-2 animation rounded pointer border-0 sendFeedback">Invia</button>
                </div>
                <div class="col-xs-12 col-md-8">
                  <div class="feedbackMsg alert alert-success py-1"><small>Il tuo commento è stato inviato, grazie per la tua collaborazione!</small></div>
                  <div class="feedbackMsg alert alert-danger py-1"><small>Abbiamo riscontrato problemi nell'invio del tuo messaggio! Riprova o manda una mail a biblioteche.paganella@gmail.com</small></div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="imgModal" tabindex="-1" role="dialog" aria-labelledby="imgModal" aria-hidden="true">
      <div class="modalWrap">
        <div class="btnWrap text-center clearfix">
          <div class="btn-group btn-group-sm px-2" role="group" aria-label="modalBtn">
            <button type="button" name="dgnNumschBtn" class="btn btn-dark" disabled><strong><?php echo preg_replace('/<strong[^>]*?>([\\s\\S]*?)<\/strong>/','\\1', $getInfo['list']['dgn_numsch']); ?></strong></button>
            <button type="button" name="dtcBtn" class="btn btn-dark d-none d-lg-inline-block" disabled><strong><?php echo preg_replace('/<span[^>]*?>([\\s\\S]*?)<\/span>/','\\1', $getInfo['list']['dtc']); ?></strong></button>
            <a href="foto/<?php echo $path; ?>" class="btn btn-light" title="scarica immagine" download><i class="fas fa-download"></i> scarica</a>
            <button type="button" class="btn btn-light" name="closeModal" title="chiudi immagine"><i class="fas fa-times"></i> chiudi</button>
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
        $(".feedbackMsg").hide()
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
        $("#sendFeedback").on('click',function(e){
          form = $("[name=feedbackForm]");
          isvalidate = form[0].checkValidity();
          if (isvalidate) {
            e.preventDefault()
            data={}
            dati={}
            data['oop']={file:'global.class.php',classe:'General',func:'feedback'}
            campi = form.find(".form-control")
            $.each(campi,function(i,v){ dati[v.name]=v.value })
            data['dati']=dati
            $.ajax({ url: connector, type: type, dataType: dataType, data:data})
            .done(function(data) {
              console.log(data);
              $(".feedbackMsg.alert-success").fadeIn(500,fadeout(".feedbackMsg.alert-success"))
            })
            .fail(function(error) {
              console.log(error);
              $(".feedbackMsg.alert-danger").fadeIn(500,fadeout(".feedbackMsg.alert-danger"))
            })
            .always(function() { console.log("complete"); });
          }
        })
      });

      function fadeout(el){ setInterval(function(){ $(el).fadeOut(500) },3000); }
    </script>
  </body>
</html>
