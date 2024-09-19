<?php
session_start();
// require("class/scheda.class.php");
// $scheda = new Scheda(intval($_GET['scheda']));
// $getInfo = $scheda->getScheda();
// $path=$getInfo['list']['path'];
// $drop = array('path');
// foreach ($drop as $x) { unset($getInfo['list'][$x]); }
// $fotoApi = 'https://www.bibliopaganella.org/foto_small/';
?>
<!doctype html>
<html lang="it">
  <head>
    <?php require('inc/meta.php'); ?>
    <?php require('inc/css.php'); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <link rel="stylesheet" href="css/scheda.css">
    <link rel="stylesheet" href="css/gallery.css">
  </head>
  <body class="bg-light">
    <input type="hidden" name="item" value="<?php echo $_GET['scheda']; ?>">
    <?php 
      require('inc/header.php'); 
      require('inc/loader.html'); 
    ?>
    <div class="maintitle bg-white">
      <div class="container">
        <div class="row">
          <div class="col">
            <p class="text-dark titleScheda m-0" id="titolo"></p>
          </div>
        </div>
      </div>
    </div>

    <div class="mainScope border-top border-bottom py-5">
      <div class="container">
      <?php if(isset($_SESSION['id_user'])){ ?>
        <div class="row mb-4">
          <div class="col">
            <a href="updateRecord.php?item=<?php echo $_GET['scheda']; ?>" class="btn btn-sm btn-secondary">modifica</a>
            <button type="button" name="delScheda" class="btn btn-sm btn-danger">elimina</button>
          </div>
        </div>
        <?php } ?>
        <div class="row">
          <div class="col-xs-12 col-md-7 mb-5">
            <div class="imgWrap text-center mb-2">
              <img src="" class="img-fluid" alt="" id="fotoPath">
              <div class="imgOverlay animation pointer"><i class="fas fa-expand"></i></div>
            </div>
            <div id="smallMap"></div>
            <div id="tagDiv" class="my-3 py-2 border-bottom"></div>
            <div id="geoTagDiv" class="my-3 py-2 border-bottom"></div>
          </div>
          <div class="col-xs-12 col-md-5">
            <ul id="testregex"></ul>
            <?php if(isset($_SESSION['id_user'])){ ?>
            <p class="mb-0">Collocazione:</p>
            <p id="fot_collocazione"></p>
            <?php } ?>
            <small><a href="#feedback" class="p-2 animation rounded pointer border-0 sendFeedback">inviaci un commento su questa foto</a></small>
          </div>
        </div>
        <div class="row" id="fotoWrap">
          <div class="col">
            <p class="border-bottom py-2">Altre foto simili che potrebbero interessarti</p>
          </div>
        </div>
        <div class="row wrapImg mb-3" id="wrapImg"></div>
        <div class="row" id="feedback">
          <div class="col">
            <p class="border-bottom py-2 mt-5 font-weight-bold">Ci piacerebbe sapere cosa ne pensi di questa foto</p>
            <p>Utilizza il form per comunicarci eventuali errori che hai riscontrato nei dati inerenti la foto visualizzata, per aggiungere nuove informazioni in tuo possesso, o semplicemente per darci il tuo parere.<br>Se deciderai di aiutarci a migliorare il nostro database te ne saremo grati e ti assicuriamo che i tuoi dati non saranno resi pubblici né saranno ceduti a servizi esterni<br>
            Per saperne di più leggi la nostra <a href="privacy.php" class="feedBackLink animation" target="_blank" title="pagina in cui vengono descritti i termini di servizio dei dati condivisi">informativa sulla privacy</a></p>
            <p>Se vuoi mandarci una foto o altro materiale che ritieni possa arricchire l'archivio, scrivi a <a href="mailto:andalo@biblio.tn.it" class="feedBackLink animation">andalo@biblio.tn.it</a></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8">
            <form class="form" name="feedbackForm">
              <input type="hidden" name="scheda" class="form-control" value="<?php echo $_GET['scheda']; ?>">
              <small>Tutti i campi sono obbligatori</small>
              <div class="row">
                <div class="col-6">
                  <input type="text" name="nome" value="" class="form-control form-control-sm" placeholder="Nome" required>
                </div>
                <div class="col-6">
                  <input type="email" name="email" value="" class="form-control form-control-sm" placeholder="Email">
                </div>
              </div>
              <div class="row mt-2">
                <div class="col">
                  <textarea name="commento" rows="8" cols="40" class="form-control form-control-sm" placeholder="Messaggio" value="" required></textarea>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="privacy" value="1" required>
                    <label class="form-check-label" for="privacy"><small>Ok! Ho letto l'<a href="privacy.php" class="feedBackLink animation" target="_blank" title="pagina in cui vengono descritti i termini di servizio dei dati condivisi">informativa sulla privacy</a></small></label>
                  </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-xs-12 col-md-4 mb-3">
                  <button type="submit" class="btn-sm w-100 p-2 animation rounded pointer border-0 sendFeedback">Invia <i id="feedbackLoader" class="fa-solid fa-spinner fa-spin-pulse"></i></button>
                </div>
                <div class="col-xs-12 col-md-8">
                  <div class="feedbackMsg alert alert-success py-1" id="sendOk"></div>
                  <div class="feedbackMsg alert alert-danger py-1" id="sendError"></div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="" id="imgModal">
      <div id="modalContent">
        <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" id="modalImgDescription" class="btn btn-dark" disabled></button>
          <a href="" class="btn btn-light" id="downloadImg" title="scarica immagine" download><i class="fas fa-download"></i> scarica</a>
          <button type="button" id="closeModal" class="btn btn-light" title="chiudi immagine"><i class="fas fa-times"></i> chiudi</button>
        </div>
        <div id="imgModalContainer"></div>
      </div>
    </div>   
    <?php require('inc/footer.php'); ?>
    <?php require('inc/lib.php'); ?>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="js/leaflet-bing-layer.js"></script>
    <script src="js/scheda.js"></script>
  </body>
</html>
