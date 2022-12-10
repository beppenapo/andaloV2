<?php
session_start();
if (!isset($_SESSION['id_user'])){ header("location:login.php");}
require 'vendor/autoload.php';
use \Andalo\Vocabolari;
$obj = new Vocabolari;
$tabs = $obj->getTables();
?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <?php require('assets/meta.php'); ?>
    <?php require('assets/css.php'); ?>
    <link rel="stylesheet" href="css/vocabolari.css">
  </head>
  <body>
    <?php require('assets/header.php'); ?>
    <?php require('assets/menu.php'); ?>
    <main class="pb-0" id="mainContainer">
      <!-- <div id="containerWrap"> -->
        <div class="container-fluid mt-5">
          <div class="row">
            <div class="col-md-4">
              <div class="accordion" id="elenco">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="vocabolari">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#liste-valori" aria-expanded="true" aria-controls="liste-valori">Liste valori</button>
                  </h2>
                  <div id="liste-valori" class="accordion-collapse collapse show" aria-labelledby="vocabolari" data-bs-parent="#elenco">
                    <div class="accordion-body">
                      <div class="list-group list-group-flush">
                        <?php foreach ($tabs as $tab) {
                          $disabled=$tooltip='';
                          $t = $tab['etichetta'];
                          if (!$tab['etichetta']) {
                            $disabled = 'disabled';
                            $tooltip = 'data-bs-toggle="tooltip" data-bs-placement="right" title="lista presente nel database ma non utilizzata. Per attivarla contatta l\'amminstratore di sistema"';
                            $t = $tab['tabella'];
                          }
                          echo '<span '.$tooltip.'><button type="button" name="tab" data-tab="'.$tab['tabella'].'" class="list-group-item list-group-item-action" '. $disabled.'>'.$t.'</button></span>';
                        } ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="geolocalizzazione">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#liste-luoghi" aria-expanded="false" aria-controls="liste-luoghi">
                      Elenchi geografici
                    </button>
                  </h2>
                  <div id="liste-luoghi" class="accordion-collapse collapse" aria-labelledby="geolocalizzazione" data-bs-parent="#elenco">
                    <div class="accordion-body">
                      <div class="list-group list-group-flush">
                        <button type="button" class="list-group-item list-group-item-action">Stato</button>
                        <button type="button" class="list-group-item list-group-item-action">Provincia</button>
                        <button type="button" class="list-group-item list-group-item-action">Comune</button>
                        <button type="button" class="list-group-item list-group-item-action">Località</button>
                        <button type="button" class="list-group-item list-group-item-action">Indirizzo</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card" id="viewTabDiv">
                <div class="card-header">
                  <h6 class="fw-bold">seleziona una tabella per modificarne i valori contenuti</h6>
                </div>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Attenzione!!! La modifica o l'eliminazione di un valore di un vocabolario può avere ripercussioni sull'integrità dei dati. Modificare o eliminare un valore solo se si è sicuri!!!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <ul class="list-group list-group-flush overflow-auto"></ul>
                <form name="addVal"></form>
              </div>
            </div>
          </div>
        </div>
      <!-- </div> -->
    </main>
    <?php require('assets/footer.php'); ?>
    <?php require('assets/lib.html'); ?>
    <script src="js/vocabolari.js" charset="utf-8"></script>
  </body>
</html>
