<?php
require("class/global.class.php");
$tags=new General;
$tagList = $tags->tagList();
?>
<!doctype html>
<html lang="it">
  <head>
    <?php require('inc/meta.php'); ?>
    <?php require('inc/css.php'); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
    <link rel="stylesheet" href="css/L.Control.MousePosition.css">
  </head>
  <body>
    <?php require('inc/header.php'); ?>
    <div class="maintitle pt-5" id="home">
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
          <div class="col-3">
            <div class="text-center">
              <p class="ancora animation">IMMAGINI</p>
            </div>
          </div>
          <div class="col-3">
            <div class="text-center">
              <p class="ancora animation">LUOGHI</p>
            </div>
          </div>
          <div class="col-3">
            <div class="text-center">
              <p class="ancora animation">PAROLE</p>
            </div>
          </div>
          <div class="col-3">
            <div class="text-center">
              <p class="ancora animation">AUTORI</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col">
            <p class="pt-2 mainText text-justify">La fototeca è una piattaforma informatica dove sono progressivamente pubblicate tutte le scansioni digitali delle fotografie storiche dell’Altopiano della Paganella. La raccolta delle fotografie storiche (1870-1970) è iniziata nel 2002 con la realizzazione di un archivio di documenti fotografici raccolti presso privati, famiglie di residenti e turisti, archivi pubblici e privati, istituzioni, musei. Nel mese di febbraio 2016 si è conclusa la raccolta di circa 6.500 pezzi e la pubblicazione di 8 volumi fotografici. L’intento del progetto è duplice: innanzitutto salvare dalla distruzione o dall'oblio tutti i documenti fotografici relativi all'Altopiano ed alla sue persone, in secondo luogo permettere la condivisione di tutto il materiale raccolto in forma digitale con l'intera Comunità secondo i principi etici del creative commons.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div id="mainSection">
      <div class="pt-5" id="immagini">
        <div class="container">
          <div class="row my-2">
            <div class="col pb-2">
              <h2 class="">
                <i class="far fa-image"></i>
                IMMAGINI
                <a href="#home" class="text-dark float-right scroll" data-id="home">
                  <i class="fas fa-angle-double-up"></i>
                </a>
              </h2>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid mb-5">
        <div class="row wrapImg"></div>
      </div>

      <div class="pt-5" id="luoghi">
        <div class="my-2 border-bottom">
          <div class="container">
            <div class="row">
              <div class="col">
                <h2 class="py-2">
                  <i class="fas fa-map-signs pr-2"></i>
                  LUOGHI
                  <a href="#home" class="text-dark float-right scroll" data-id="home">
                    <i class="fas fa-angle-double-up"></i>
                  </a>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-2 mb-5">
        <div class="row">
          <div class="col text-center">
            <form class="form geoTagContent" action="gallery.php" method="get" name="geoTagForm">
              <?php
              foreach ($tagList['geotag'] as $tag) {
                echo "<label class='tag geotag animation rounded' style='font-size:".$tag['size']."px' data-id='".$tag['id']."' data-filtro='geotag' data-tag='".$tag['tag']."'>".$tag['tag']."<span class='d-none d-lg-inline-block'>".$tag['schede']."</span></label>";
              }
              ?>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div id="mapContent" class="bg-white">
              <div id="map" class="bg-white">
                <div id='loader' class="flex-center w-100 h-100"><i class="fas fa-spinner fa-spin fa-7x"></i></div>
                <div class="mySwitch">
                  <div class="input-group mb-1">
                    <input type="radio" name="baseLayer" value="thunderF" id="thunderF" class="mr-1" checked>
                    <label for="thunderF" class="m-0">Thunderforest</label>
                  </div>
                  <div class="input-group mb-1">
                    <input type="radio" name="baseLayer" value="osm" id="osm" class="mr-1">
                    <label for="osm" class="m-0">OpenStreetMap</label>
                  </div>
                  <div class="input-group">
                    <input type="checkbox" name="comunita" value="comunitaJson" id="comunitaJson" class="mr-1" checked>
                    <label for="comunitaJson" class="m-0">Comunità di Valle</label>
                  </div>
                </div>
              </div>
              <div id="panel" class="">
                <div class="panel-content">
                  <header id="nome-area" class="border-bottom h5"></header>
                  <section class="imgGallery"></section>
                  <footer class="border-top pointer closePanel">chiudi pannello <i class="fas fa-arrow-right"></i> </footer>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="pt-5" id="parole">
        <div class="my-2 border-bottom">
          <div class="container">
            <div class="row">
              <div class="col">
                <h2 class="py-2">
                  <i class="fas fa-hashtag pr-2"></i>
                  PAROLE
                  <a href="#home" class="text-dark float-right scroll" data-id="home">
                    <i class="fas fa-angle-double-up"></i>
                  </a>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-2 mb-5">
        <div class="row">
          <div class="col text-center">
            <form class="form geoTagContent" action="gallery.php" method="get" name="geoTagForm">
              <?php
                foreach ($tagList['tag'] as $tag) {
                  echo "<label class='tag textag animation rounded' style='font-size:".$tag['size']."px' data-id='".$tag['id']."' data-filtro='tag' data-tag='".$tag['tag']."'>".$tag['tag']."<span class='d-none d-lg-inline-block'>".$tag['schede']."</span></label>";
                }
              ?>
            </form>
          </div>
        </div>
      </div>

      <div class="pt-5" id="autori">
        <div class="my-2 border-bottom">
          <div class="container">
            <div class="row">
              <div class="col">
                <h2 class="py-2">
                  <i class="fas fa-users pr-2"></i>
                  AUTORI
                  <a href="#home" class="text-dark float-right scroll" data-id="home">
                    <i class="fas fa-angle-double-up"></i>
                  </a>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container mt-2 mb-5">
        <div class="row">
          <div class="col text-center">
            <form class="form geoTagContent" action="gallery.php" method="get" name="geoTagForm">
              <?php
                foreach ($tagList['autori'] as $tag) {
                  echo "<label class='tag geotag animation rounded' style='font-size:".$tag['size']."px' data-id='".$tag['id']."' data-filtro='autore' data-tag='".$tag['autore']."'>".$tag['autore']."<span class='d-none d-lg-inline-block'>".$tag['schede']."</span></label>";
                }
              ?>
            </form>
          </div>
        </div>
      </div>

      <div class="pt-5" id="aboutus">
        <div class="my-2 border-bottom">
          <div class="container">
            <div class="row">
              <div class="col">
                <h2 class="py-2">
                  ABOUT US
                  <a href="#home" class="text-dark float-right scroll" data-id="home">
                    <i class="fas fa-angle-double-up"></i>
                  </a>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-2 mb-5">
        <div class="row">
          <div class="col">
            <p class="pt-2 mainText text-justify">
              Il <strong>Progetto Memoria - Fototeca documentaria dell'Altopiano della Paganella</strong> è un progetto di documentazione storica delle Biblioteche della Paganella. La prima biblioteca sull'altopiano nasce ufficialmente il 4 settembre 1995 con l'entrata in servizio del primo bibliotecario. Dopo meno di quattro mesi viene aperta al pubblico la sede centrale di Andalo. Nel luglio del 1996 vengono aperte le sedi di Molveno e Fai della Paganella. Nel dicembre 1996 viene assunto un secondo bibliotecario, seguito da un terzo collega a tempo pieno nel febbraio 1997. La quarta sede della biblioteca viene aperta a Cavedago nell'aprile 1998, seguita nel 2003 dalla quinta a Spormaggiore: si dà così piena attuazione alla Convenzione istitutiva del Servizio Bibliotecario Intercomunale fra i comuni dell'Altopiano della Paganella. Dal 1° febbraio 2015 la biblioteca è gestita dalla Comunità della Paganella. Alla data attuale dispone di circa 48.500 documenti catalogati, compreso il considerevole patrimonio multimediale (4.700 dvd, 200 audiobook, 1.050 CD musicali, ebook).
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <img src="img/aboutus.jpg" class="img-fluid my-3 rounded" alt="logo sezione about us">
          </div>
        </div>
      </div>

      <div class="pt-5" id="download">
        <div class="my-2 border-bottom">
          <div class="container">
            <div class="row">
              <div class="col">
                <h2 class="py-2">
                  DOWNLOAD
                  <a href="#home" class="text-dark float-right scroll" data-id="home">
                    <i class="fas fa-angle-double-up"></i>
                  </a>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-2 mb-5">
        <div class="row">
          <div class="col">
            <p class="pt-2 mainText text-justify">
              Le immagini qui pubblicate in media risoluzione sono disponibili al download gratuito senza formalità. La biblioteca conserva i files originali ad alta definizione. Gli interessati possono chiederne copia alla Biblioteca che la rilascerà previa dichiarazione di assenza di scopo di lucro. In tutti i casi, qualora l'immagine venisse stampata o comunque riprodotta, va obbligatoriamente dichiarata la proprietà attraverso la formula:
            </p>
            <p class="border border-dark bg-light rounded text-center p-3">Progetto Memoria - Fototeca documentaria dell’Altopiano della Paganella.<br>
            Proprietà delle BIBLIOTECHE DELLA PAGANELLA - ANDALO (TN).</p>
          </div>
        </div>
      </div>

      <div class="pt-5" id="credits">
        <div class="my-2 border-bottom">
          <div class="container">
            <div class="row">
              <div class="col">
                <h2 class="py-2">
                  CREDITS
                  <a href="#home" class="text-dark float-right scroll" data-id="home">
                    <i class="fas fa-angle-double-up"></i>
                  </a>
                </h2>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-2 mb-5">
        <div class="row">
          <div class="col">
            <p class="pt-2 mainText text-justify">
              Il <strong>Progetto Memoria - Fototeca documentaria dell'Altopiano della Paganella</strong> è stato reso possibile grazie al finanziamento dalla <strong>Fondazione Cassa di Risparmio di Trento e Rovereto</strong> (bando 2016). La realizzazione della banca dati e dei sistemi informatici di gestione e visualizzazione delle informazioni raccolte è frutto del lavoro della <strong><a href="http://www.cooptesto.it/" title="home page [link esterno]" target="_blank" class="text-dark">Cooperativa TeSto</a></strong> (Alberto Cosner) e di <strong><a href="http://www.arc-team.com" title="home page [link esterno]" target="_blank"  class="text-dark">Arc-Team</a></strong> (Giuseppe Naponiello). I ricercatori che hanno partecipato al progetto sono stati numerosi: Angelo Longo (Cooperativa TeSto), Alessia Zeni, Anna Beber, Cinzia Perlot, Erika Maines, Filippo Frizzera, Giuliano Mattarelli, Martina Mottes, Jacopo Osti. Vanno inoltre ringraziate la <strong>Fondazione Museo storico del Trentino</strong>, la <strong>Comunità di Primiero e della Alta Valsugana e Bersntol</strong>: parte del codice informatico del database è derivato dal progetto <strong><a href="http://www.lefontiperlastoria.it/" title="home page [link esterno]" target="_blank"  class="text-dark">Fonti per la storia</a> e dall' <a href="http://www.altavalsugana.paesaggiocomunita.it/" title="home page [link esterno]" target="_blank"  class="text-dark">Archivio iconografico dei paesaggi di Comunità</a></strong>.
            </p>
          </div>
        </div>
        <div class="row my-5 pb-5">
          <div class="col text-center">
            <img src="img/logo_caritro.png" width="300" alt="">
          </div>
        </div>
      </div>
    </div>
    <?php require('inc/footer.php'); ?>
    <?php require('inc/lib.php'); ?>
    <script src="lib/echo.js"></script>
    <script src="js/index.js"></script>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js" charset="utf-8"></script>
    <script src="lib/L.Control.MousePosition.js"></script>
    <script src="json/comunita.js"></script>
    <script src="js/map.js"></script>
  </body>
</html>
