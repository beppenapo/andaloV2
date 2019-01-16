<!doctype html>
<html lang="it">
  <head>
    <?php require('inc/meta.php'); ?>
    <?php require('inc/css.php'); ?>
  </head>
  <body>
    <?php require('inc/header.php'); ?>
    <div class="maintitle" id="home">
      <div class="container">
        <div class="row">
          <div class="col">
            <h1 class="text-dark">PROGETTO MEMORIA</h1>
            <h6 class="text-dark">FOTOTECA DOCUMENTARIA DELL'ALTOPIANO DELLA PAGANELLA</h6>
            <img src="img/headerBg.jpg" class="img-fluid mt-3" alt="Coscritti 1914">
          </div>
        </div>
      </div>
    </div>
    <div class="mainScope pt-5 border-top border-bottom">
      <div class="container">
        <div class="row">
          <div class="col-4">
            <div class="text-center">
              <h2 class="ancora pointer scroll animation" data-id="immagini">
                <span class="d-block">IMMAGINI</span>
                <i class="fas fa-caret-down fa-3x"></i>
              </h2>
            </div>
          </div>
          <div class="col-4">
            <div class="text-center">
              <h2 class="ancora pointer scroll animation" data-id="luoghi">
                <span class="d-block">LUOGHI</span>
                <i class="fas fa-caret-down fa-3x"></i>
              </h2>
            </div>
          </div>
          <div class="col-4">
            <div class="text-center">
              <h2 class="ancora pointer scroll animation" data-id="parole">
                <span class="d-block">PAROLE</span>
                <i class="fas fa-caret-down fa-3x"></i>
              </h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p class="pt-2" id="mainText">La fototeca è una piattaforma informatica dove sono progressivamente pubblicate tutte le scansioni digitali delle fotografie storiche dell’Altopiano della Paganella. La raccolta delle fotografie storiche (1870-1970) è iniziata nel 2002 con la realizzazione di un archivio di documenti fotografici raccolti presso privati, famiglie di residenti e turisti, archivi pubblici e privati, istituzioni, musei. Nel mese di febbraio 2016 si è conclusa la raccolta di circa 6.500 pezzi e la pubblicazione di 8 volumi fotografici. L’intento del progetto è duplice: innanzitutto salvare dalla distruzione o dall'oblio tutti i documenti fotografici relativi all'Altopiano ed alla sue persone, in secondo luogo permettere la condivisione di tutto il materiale raccolto in forma digitale con l'intera Comunità secondo i principi etici del creative commons.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div id="mainSection">
      <div class="container">
        <div class="row mb-2">
          <div class="col pb-2">
            <h2 class="" id="immagini">
              <i class="far fa-image"></i>
              IMMAGINI
              <i class="fas fa-angle-double-up float-right pointer scroll" data-id="home"></i>
            </h2>
          </div>
        </div>
      </div>
      <hr class="text-dark mt-0">
      <div class="container-fluid">
        <div class="row wrapImg mb-5"></div>
      </div>
      <div class="container">
        <div class="row mb-2">
          <div class="col">
            <h2 class="pb-2" id="luoghi">
              <i class="fas fa-map-signs pr-2"></i>
              LUOGHI
              <i class="fas fa-angle-double-up float-right pointer scroll" data-id="home"></i>
            </h2>
          </div>
        </div>
      </div>
      <hr class="text-dark mt-0">
      <div class="container">
        <div class="row mb-5">
          <div class="col text-center">
            <form class="form geoTagContent" action="index.php" method="post" name="geoTagForm"></form>
          </div>
        </div>
      </div>
      <hr class="text-dark mt-0">
      <div class="container">
        <div class="row mb-2">
          <div class="col">
            <h2 class="pb-2" id="parole">
              <i class="fas fa-hashtag pr-2"></i>
              PAROLE
              <i class="fas fa-angle-double-up float-right pointer scroll" data-id="home"></i>
            </h2>
          </div>
        </div>
      </div>
      <hr class="text-dark mt-0">
      <div class="container">
        <div class="row mb-2">
          <div class="col">
            <h2 class="pb-2" id="aboutus">
              <i class="fas fa-hashtag pr-2"></i>
              ABOUT US
              <i class="fas fa-angle-double-up float-right pointer scroll" data-id="home"></i>
            </h2>
          </div>
        </div>
      </div>
      <hr class="text-dark mt-0">
      <div class="container">
        <div class="row mb-2">
          <div class="col">
            <h2 class="pb-2" id="download">
              <i class="fas fa-hashtag pr-2"></i>
              DOWNLOAD
              <i class="fas fa-angle-double-up float-right pointer scroll" data-id="home"></i>
            </h2>
          </div>
        </div>
      </div>
      <hr class="text-dark mt-0">
      <div class="container">
        <div class="row mb-2">
          <div class="col">
            <h2 class="pb-2" id="credits">
              <i class="fas fa-hashtag pr-2"></i>
              CREDITS
              <i class="fas fa-angle-double-up float-right pointer scroll" data-id="home"></i>
            </h2>
          </div>
        </div>
      </div>
    </div>
    <?php require('inc/footer.php'); ?>
    <?php require('inc/lib.php'); ?>
    <script src="lib/echo.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>
