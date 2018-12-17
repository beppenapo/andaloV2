<!doctype html>
<html lang="en">
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
            <h1 class="text-light">PROGETTO MEMORIA</h1>
            <h6 class="text-light">FOTOTECA DOCUMENTARIA DELL'ALTOPIANO DELLA PAGANELLA</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="mainScope border-top border-bottom">
      <div class="container">
        <div class="row">
          <div class="col-4">
            <div class="rounded-circle border text-center float-right circleDiv cd1">
              <h2 class="text-light scroll animation" data-id="immagini"><i class="far fa-image fa-2x"></i><br>IMMAGINI</h2>
            </div>
          </div>
          <div class="col-4">
            <div class="rounded-circle border text-center mx-auto circleDiv cd2">
              <h2 class="text-light scroll animation" data-id="luoghi"><i class="fas fa-map-signs fa-2x"></i><br>LUOGHI</h2>
            </div>
          </div>
          <div class="col-4">
            <div class="rounded-circle border text-center float-left circleDiv cd3">
              <h2 class="text-light scroll animation" data-id="parole"><i class="fas fa-hashtag fa-2x"></i><br>PAROLE</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p class="pt-5">La fototeca è una piattaforma informatica dove sono progressivamente pubblicate tutte le scansioni digitali delle fotografie storiche dell’Altopiano della Paganella. La raccolta delle fotografie storiche relative all'Altopiano della Paganella (1870-1970) è iniziata nel 2002 con la realizzazione di un archivio di documenti fotografici raccolti presso privati, famiglie di residenti e turisti, archivi pubblici e privati, istituzioni, musei. Il materiale è stato digitalizzato e poi restituito ai singoli proprietari. Nel mese di febbraio 2016 si è conclusa la raccolta di circa 9.000 pezzi con la pubblicazione di ben 8 volumi fotografici distribuiti alla popolazione e l'inizio della costruzione della piattaforma web. L’intento del progetto è duplice: innanzitutto salvare dalla distruzione o dall'oblio tutti i documenti fotografici relativi all'Altopiano della Paganella, in secondo luogo permettere la condivisione di tutto il materiale raccolto in forma digitale con l'intera Comunità secondo i principi etici del creative commons.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div id="mainSection" class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h2 class="pb-2 border-bottom" id="immagini">
            <i class="far fa-image pr-2"></i>
            IMMAGINI
            <i class="fas fa-angle-double-up float-right pointer scroll" data-id="home"></i>
          </h2>
        </div>
      </div>
      <div class="row wrapImg px-3 mb-5"></div>
      <div class="row mb-2">
        <div class="col">
          <h2 class="pb-2 border-bottom" id="luoghi">
            <i class="fas fa-map-signs pr-2"></i>
            LUOGHI
            <i class="fas fa-angle-double-up float-right pointer scroll" data-id="home"></i>
          </h2>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col text-center">
          <form class="form geoTagContent" action="index.php" method="post" name="geoTagForm"></form>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col">
          <h2 class="pb-2 border-bottom" id="parole">
            <i class="fas fa-hashtag pr-2"></i>
            PAROLE
            <i class="fas fa-angle-double-up float-right pointer scroll" data-id="home"></i>
          </h2>
        </div>
      </div>
    </div>
    <?php require('inc/footer.php'); ?>
    <?php require('inc/lib.php'); ?>
    <script src="lib/echo.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>
