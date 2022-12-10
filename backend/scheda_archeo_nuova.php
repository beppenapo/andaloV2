<?php
session_start();
if (!isset($_SESSION['id_user'])){ header("location:login.php");}
require 'vendor/autoload.php';
use \Andalo\Scheda;
$obj = new Scheda;
$scheda = $_GET["id"];
$scheda = $obj->getScheda($_GET["id"]);
// print_r($scheda);
?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <?php require('assets/meta.php'); ?>
    <?php require('assets/css.php'); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
    <link rel="stylesheet" href="css/schedaMod.css">
  </head>
  <body>
    <input type="hidden" name="id_scheda" value="<?php echo $scheda['scheda']['id']; ?>">
    <input type="hidden" name="livelloScheda" value="<?php echo $scheda['scheda']['livello']; ?>">
    <?php require('assets/header.php'); ?>
    <?php require('assets/menu.php'); ?>
    <main class="pb-0" id="mainContainer">
      <div id="containerWrap">
        <div class="titlePage">
          <h6 class="m-0 text-uppercase" id="liv1">primo livello</h6>
          <h6 class="m-0 text-uppercase" id="liv2">secondo livello</h6>
          <h6 class="m-0 text-uppercase" id="liv3">terzo livello</h6>
        </div>
        <div class="container">
          <form name="modScheda" id="modScheda">
            <div class="navScheda p-3">
              <div class="btn-group btn-group-sm" role="group">
                <button type="button" id="stampa" class="btn btn-outline-secondary"><i class="fas fa-print fa-fw"></i> stampa</button>
                <button type="button" id="elimina" class="btn btn-outline-secondary"><i class="fas fa-trash-can fa-fw"></i> elimina scheda</button>
              </div>
            </div>
            <div id="campi_obbligatori" class="">
              <h6>dati generali</h6>
            </div>
            <div class="row mt-3">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
                    <label for="dgn_numsch" class="fw-bold">numero scheda</label>
                    <input type="text" name="dgn_numsch" id="dgn_numsch" class="form-control" data-table="scheda" value="" required>
                  </div>
                  <div class="col-md-6">
                    <label for="dgn_tpsch">tipo scheda</label>
                    <select name="dgn_tpsch" id="dgn_tpsch" class="form-control" data-table="scheda">

                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <label for="dgn_dnogg" class="fw-bold">* definizione oggetto</label>
                    <input type="text" name="dgn_dnogg" id="dgn_dnogg" class="form-control" data-table="scheda" value="" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="cro_spec">cronologia specifica</label>
                    <input type="text" name="cro_spec" id="cro_spec" class="form-control" data-table="cronologia" value="">
                  </div>
                  <div class="col-md-6">
                    <label for="dgn_livind" class="fw-bold">* livello individuazione dati</label>
                    <select id="dgn_livind" name="dgn_livind" data-table="scheda" class="form-select" required>
                      <option vaue="" selected disabled>--seleziona livello--</option>
                      <?php
                      foreach ($liste['lista_dgn_livind'] as $key => $value) {
                        echo "<option value='".$value['id']."'>".$value['definizione']."</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <label for="dgn_note">note</label>
                    <textarea name="dgn_note" id="dgn_note" class="form-control" data-table="scheda" value="" rows="5"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col">
                    <!-- <div class="d-flex justify-content-between"> -->
                    <div class="">
                      <div class="btn-group btn-group-sm mb-1" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="switchMedia" id="switchFotoBtn" autocomplete="off" checked>
                        <label class="btn btn-outline-secondary text-lowercase" for="switchFotoBtn"><i class="fas fa-camera fa-fw"></i> foto</label>

                        <input type="radio" class="btn-check" name="switchMedia" id="switchMappaBtn"
                        autocomplete="off">
                        <label class="btn btn-outline-secondary text-lowercase" for="switchMappaBtn"><i class="fas fa-map-location-dot fa-fw"></i> mappa</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div id="switchWrap">
                      <div id="imgDiv" class="bg-white">
                        <div class="btn-group-vertical btn-group-sm mb-1" role="group">
                          <button type="button" class="btn btn-outline-secondary"><i class="fas fa-upload" data-bs-toggle="tooltip" data-bs-placement="right" title="carica una nuova foto"></i></button>
                          <button type="button" class="btn btn-outline-secondary"><i class="fas fa-magnifying-glass-plus"></i></button>
                          <button type="button" class="btn btn-outline-secondary"><i class="fas fa-trash-can"></i></button>
                        </div>
                      </div>
                      <div id="map"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion accordion-flush" id="sezioniForm">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-cronologia" aria-expanded="false" aria-controls="flush-cronologia">dettaglio cronologia</button>
                </h2>
                <div id="flush-cronologia" class="accordion-collapse collapse">
                  <div class="accordion-body">
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-compilazione" aria-expanded="false" aria-controls="flush-compilazione">compilazione</button>
                </h2>
                <div id="flush-compilazione" class="accordion-collapse collapse">
                  <div class="accordion-body">
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-provenienza" aria-expanded="false" aria-controls="flush-provenienza">provenienza dati</button>
                </h2>
                <div id="flush-provenienza" class="accordion-collapse collapse">
                  <div class="accordion-body">
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-area" aria-expanded="false" aria-controls="flush-area">area di interesse</button>
                </h2>
                <div id="flush-area" class="accordion-collapse collapse">
                  <div class="accordion-body">
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-ubicazione" aria-expanded="false" aria-controls="flush-ubicazione">ubicazione</button>
                </h2>
                <div id="flush-ubicazione" class="accordion-collapse collapse">
                  <div class="accordion-body">
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-anagrafica" aria-expanded="false" aria-controls="flush-anagrafica">anagrafica</button>
                </h2>
                <div id="flush-anagrafica" class="accordion-collapse collapse">
                  <div class="accordion-body">
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-consultabilita" aria-expanded="false" aria-controls="flush-consultabilita">consultabilita</button>
                </h2>
                <div id="flush-consultabilita" class="accordion-collapse collapse">
                  <div class="accordion-body">
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-conservazione" aria-expanded="false" aria-controls="flush-conservazione">stato di conservazione</button>
                </h2>
                <div id="flush-conservazione" class="accordion-collapse collapse">
                  <div class="accordion-body">
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-correlate" aria-expanded="false" aria-controls="flush-correlate">schede correlate</button>
                </h2>
                <div id="flush-correlate" class="accordion-collapse collapse">
                  <div class="accordion-body">
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-tag" aria-expanded="false" aria-controls="flush-tag">aggiungi tag</button>
                </h2>
                <div id="flush-tag" class="accordion-collapse collapse">
                  <div class="accordion-body">
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-note" aria-expanded="false" aria-controls="flush-note">note generali</button>
                </h2>
                <div id="flush-note" class="accordion-collapse collapse">
                  <div class="accordion-body">
                  </div>
                </div>
              </div>
              <div class="accordion-item border-bottom">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-statoScheda" aria-expanded="false" aria-controls="flush-statoScheda">stato scheda</button>
                </h2>
                <div id="flush-statoScheda" class="accordion-collapse collapse">
                  <div class="accordion-body">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>
    <?php require('assets/footer.php'); ?>
    <?php require('assets/lib.html'); ?>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   <script src="js/leaflet-bing-layer.js" charset="utf-8"></script>
    <script src="js/schedaMod.js" charset="utf-8"></script>
  </body>
</html>
