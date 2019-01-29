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
            <p class="pt-2 mainText">La fototeca è una piattaforma informatica dove sono progressivamente pubblicate tutte le scansioni digitali delle fotografie storiche dell’Altopiano della Paganella. La raccolta delle fotografie storiche (1870-1970) è iniziata nel 2002 con la realizzazione di un archivio di documenti fotografici raccolti presso privati, famiglie di residenti e turisti, archivi pubblici e privati, istituzioni, musei. Nel mese di febbraio 2016 si è conclusa la raccolta di circa 6.500 pezzi e la pubblicazione di 8 volumi fotografici. L’intento del progetto è duplice: innanzitutto salvare dalla distruzione o dall'oblio tutti i documenti fotografici relativi all'Altopiano ed alla sue persone, in secondo luogo permettere la condivisione di tutto il materiale raccolto in forma digitale con l'intera Comunità secondo i principi etici del creative commons.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div id="mainSection">
      <div class="container">
        <div class="row my-2">
          <div class="col pb-2">
            <h2 class="" id="immagini">
              <i class="far fa-image"></i>
              IMMAGINI
              <i class="fas fa-angle-double-up float-right pointer scroll" data-id="home"></i>
            </h2>
          </div>
        </div>
      </div>

      <div class="container-fluid mb-5">
        <div class="row wrapImg"></div>
      </div>

      <div class="my-2 border-bottom">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="py-2" id="luoghi">
                <i class="fas fa-map-signs pr-2"></i>
                LUOGHI
                <i class="fas fa-angle-double-up float-right pointer scroll" data-id="home"></i>
              </h2>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-2 mb-5">
        <div class="row">
          <div class="col text-center">
            <form class="form geoTagContent" action="gallery.php" method="post" name="geoTagForm">
              <?php
              foreach ($tagList['geotag'] as $tag) {
                echo "<label class='tag geotag animation rounded' style='font-size:".$tag['size']."px' data-id='".$tag['id']."' data-filtro='geotag' data-tag='".$tag['tag']."'>".$tag['tag']."<span>".$tag['schede']."</span></label>";
              }
              ?>
            </form>
          </div>
        </div>
      </div>

      <div class="my-2 border-bottom">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="py-2" id="parole">
                <i class="fas fa-hashtag pr-2"></i>
                PAROLE
                <i class="fas fa-angle-double-up float-right pointer scroll" data-id="home"></i>
              </h2>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-2 mb-5">
        <div class="row">
          <div class="col text-center">
            <form class="form geoTagContent" action="gallery.php" method="post" name="geoTagForm">
              <?php
              foreach ($tagList['tag'] as $tag) {
                echo "<label class='tag textag animation rounded' style='font-size:".$tag['size']."px' data-id='".$tag['id']."' data-filtro='tag' data-tag='".$tag['tag']."'>".$tag['tag']."<span>".$tag['schede']."</span></label>";
              }
              ?>
            </form>
          </div>
        </div>
      </div>

      <div class="my-2 border-bottom">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="py-2" id="aboutus">
                ABOUT US
                <i class="fas fa-angle-double-up float-right pointer scroll" data-id="home"></i>
              </h2>
            </div>
          </div>
        </div>
      </div>


      <div class="container mt-2 mb-5">
        <div class="row">
          <div class="col">
            <p class="pt-2 mainText">
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

      <div class="my-2 border-bottom">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="py-2" id="download">
                DOWNLOAD
                <i class="fas fa-angle-double-up float-right pointer scroll" data-id="home"></i>
              </h2>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-2 mb-5">
        <div class="row">
          <div class="col">
            <p class="pt-2 mainText">
              Le immagini qui pubblicate in media risoluzione sono disponibili al download gratuito senza formalità. La biblioteca conserva i files originali ad alta definizione. Gli interessati possono chiederne copia alla Biblioteca che la rilascerà previa dichiarazione di assenza di scopo di lucro. In tutti i casi, qualora l'immagine venisse stampata o comunque riprodotta, va obbligatoriamente dichiarata la proprietà attraverso la formula:
            </p>
            <p class="border border-dark bg-light rounded text-center p-3">Progetto Memoria - Fototeca documentaria dell’Altopiano della Paganella.<br>
            Proprietà delle BIBLIOTECHE DELLA PAGANELLA - ANDALO (TN).</p>
          </div>
        </div>
      </div>

      <div class="my-2 border-bottom">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="py-2" id="credits">
                CREDITS
                <i class="fas fa-angle-double-up float-right pointer scroll" data-id="home"></i>
              </h2>
            </div>
          </div>
        </div>
      </div>

      <div class="container mt-2 mb-5">
        <div class="row">
          <div class="col">
            <p class="pt-2 mainText">
              Il <strong>Progetto Memoria - Fototeca documentaria dell'Altopiano della Paganella</strong> è stato reso possibile grazie al finanziamento dalla <strong>Fondazione Cassa di Risparmio di Trento e Rovereto</strong> (bando 2016). La realizzazione della banca dati e dei sistemi informatici di gestione e visualizzazione delle informazioni raccolte è frutto del lavoro della <strong>Cooperativa TeSto</strong> (Alberto Cosner) e di <strong>Arc-Team</strong> (Giuseppe Naponiello). I ricercatori che hanno partecipato al progetto sono stati numerosi: Angelo Longo (Cooperativa TeSto), Alessia Zeni, Anna Beber, Cinzia Perlot, Erika Maines, Filippo Frizzera, Giuliano Mattarelli, Martina Mottes, Jacopo Osti. Vanno inoltre ringraziate la <strong>Fondazione Museo storico del Trentino</strong>, la <strong>Comunità di Primiero e della Alta Valsugana e Bersntol</strong>: parte del codice informatico del database è derivato dal progetto <strong>Fonti per la storia e dall'Archivio iconografico dei paesaggi di Comunità</strong>.
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
  </body>
</html>
