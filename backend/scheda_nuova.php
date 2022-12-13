<?php
session_start();
if (!isset($_SESSION['id_user'])){ header("location:login.php");}
require 'vendor/autoload.php';
use \Andalo\Scheda;
$obj = new Scheda;
$tipo = $_GET["tpsch"]==10 ? 3 : 1;
$liste = $obj->getListeGeneriche();
$liste['ricerca'] = $obj->getListaRicerche();
$liste['aree'] = $obj->getListaAree($tipo);
$liste['ubi'] = $obj->getListaAree(2);
// print_r($liste['aree']);
?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <?php require('assets/meta.php'); ?>
    <?php require('assets/css.php'); ?>
    <link rel="stylesheet" href="css/scheda_nuova.css">
  </head>
  <body>
    <?php require('assets/header.php'); ?>
    <?php require('assets/menu.php'); ?>
    <div id="tip">
      <div class="alert alert-dismissible" role="alert">
        <div class="alert-body mb-5">
          <i class="fa-solid fa-lightbulb"></i> <span></span>
        </div>
        <div class="alert-btn text-center invisible">
          <a href="" id="nuovaScheda" class="btn btn-success btn-sm">visualizza scheda</a>
          <a href="catalogo.php" class="btn btn-success btn-sm">catalogo schede</a>
        </div>
      </div>
    </div>
    <main class="pb-0" id="mainContainer">
      <div id="containerWrap">
        <div class="titlePage">
          <h6 class="m-0 text-uppercase">stai inserendo una nuova scheda <?php echo $_GET['def']; ?></h6>
        </div>
        <div class="container">
          <form name="addScheda" id="addScheda">
            <input type="hidden" name="dgn_tpsch" value="<?php echo $_GET['tpsch'] ?>" data-table="scheda">
            <div id="campi_obbligatori" class="">
              <h6>dati generali</h6>
              <small class="fw-bold">* campi obbligatori</small>
            </div>
            <div class="row mt-3">
              <div class="col-md-4">
                <label for="livello" class="fw-bold">* livello scheda</label>
                <select id="livello" name="livello" data-table="scheda" class="form-select" required>
                  <option value="" disabled>--seleziona livello--</option>
                  <option value="1">1</option>
                  <option value="2" selected>2</option>
                  <option value="3">3</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="dgn_numsch" class="fw-bold">* numero scheda</label>
                <input type="text" name="dgn_numsch" id="dgn_numsch" class="form-control" data-table="scheda" value="" required>
              </div>
              <div class="col-md-4">
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
                <label for="dgn_dnogg" class="fw-bold">* definizione oggetto</label>
                <input type="text" name="dgn_dnogg" id="dgn_dnogg" class="form-control" data-table="scheda" value="" required>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="dgn_note">note</label>
                <textarea name="dgn_note" id="dgn_note" class="form-control" data-table="scheda" value="" rows="5"></textarea>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-3">
                <label>compilatore</label>
                <input type="text" name="" value="<?php echo $_SESSION['nome']. ' '.$_SESSION['cognome']; ?>" class="form-control"  disabled>
                <input type="hidden" name="compilatore" value="<?php echo $_SESSION['id_user']; ?>" data-table="scheda">
              </div>
              <div class="col-md-3">
                <label>data compilazione</label>
                <input type="date" name="" class="form-control" value="<?php echo date("Y-m-d"); ?>" disabled>
                <input type="hidden" name="data_compilazione" value="<?php echo date("Y-m-d"); ?>" data-table="scheda">
              </div>
            </div>
            <div class="accordion accordion-flush" id="sezioniForm">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-cronologia" aria-expanded="false" aria-controls="flush-cronologia">dettaglio cronologia</button>
                </h2>
                <div id="flush-cronologia" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <div class="row">
                      <div class="col-md-3">
                        <label for="cro_iniz" data-bs-toggle="tooltip" data-bs-placement="top" title="campo numerico, massimo 4 cifre, lettere e simboli non verranno accettati e potrebbero generare errori"><i class="fas fa-info-circle"></i> cronologia iniziale</label>
                        <input type="number" min="0" max="<?php echo date(Y);  ?>" name="cro_iniz" id="cro_iniz" class="form-control" data-table="cronologia" value="0" step="1">
                      </div>
                      <div class="col-md-3">
                        <label for="cro_fin" data-bs-toggle="tooltip" data-bs-placement="top" title="campo numerico, massimo 4 cifre, lettere e simboli non verranno accettati e potrebbero generare errori"><i class="fas fa-info-circle"></i> cronologia finale</label>
                        <input type="number" min="0" max="<?php echo date(Y); ?>" name="cro_fin" id="cro_fin" class="form-control" data-table="cronologia" value="<?php echo date(Y); ?>" step="1">
                      </div>
                      <div class="col-md-3">
                        <label for="cro_spec">cronologia specifica</label>
                        <input type="text" name="cro_spec" id="cro_spec" class="form-control" data-table="cronologia" value="">
                      </div>
                      <div class="col-md-3">
                        <label for="cro_motiv">motivazione</label>
                        <select class="form-select" name="cro_motiv" id="cro_motiv" data-table="cronologia">
                          <option value="">--seleziona valore--</option>
                          <?php
                          foreach ($liste['lista_cro_motiv'] as $key => $value) {
                            echo "<option value='".$value['id']."'>".$value['definizione']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="cro_note">note cronologia</label>
                        <textarea name="cro_note" id="cro_note" rows="3" class="form-control" data-table="cronologia"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-compilazione" aria-expanded="false" aria-controls="flush-compilazione">compilazione</button>
                </h2>
                <div id="flush-compilazione" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <div class="row">
                      <div class="col">
                        <p class="tip-text">Scegli la ricerca o il progetto per il quale si sta compilando la presente scheda.</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="cmp_id">Denominazione ricerca</label>
                        <select class="form-select" id="cmp_id" name="cmp_id" data-table="scheda">
                          <option value="">--seleziona ricerca--</option>
                          <?php
                          foreach ($liste['ricerca'] as $opt) {
                            $sel = $opt['id'] == 1 ? 'selected': '';
                            echo "<option value='".$opt['id']."' ".$sel.">".$opt['denric']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="cmp_note">note compilazione</label>
                        <textarea name="cmp_note" id="cmp_note" class="form-control" data-table="scheda" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-provenienza" aria-expanded="false" aria-controls="flush-provenienza">provenienza dati</button>
                </h2>
                <div id="flush-provenienza" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <div class="row">
                      <div class="col">
                        <p class="tip-text">Scegli la ricerca o il progetto dal quale provengono i dati che hanno permesso la compilazione della presente scheda.</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="prv_id">Denominazione ricerca</label>
                        <select class="form-select" id="prv_id" name="prv_id" data-table="scheda">
                          <option value="">--seleziona ricerca--</option>
                          <?php
                          foreach ($liste['ricerca'] as $opt) {
                            $sel = $opt['id'] == 1 ? 'selected': '';
                            echo "<option value='".$opt['id']."' ".$sel.">".$opt['denric']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="prv_note">note provenienza dati</label>
                        <textarea name="prv_note" id="prv_note" class="form-control" data-table="scheda" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-area" aria-expanded="false" aria-controls="flush-area">area di interesse</button>
                </h2>
                <div id="flush-area" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <div class="row">
                      <div class="col">
                        <p class="tip-text">Se vuoi aggiungere un'area alla scheda devi selezionare un valore dalla lista e aggiungere una motivazione, altrimenti lascia la sezione vuota.</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <label for="ai">area di interesse</label>
                      </div>
                      <div class="col-md-4">
                        <label for="motivo_ai">motivazione area</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-7">
                        <select class="form-select" id="ai" name="ai">
                          <option value="">--seleziona area--</option>
                          <?php
                          foreach ($liste['aree'] as $item) {
                            echo "<option value='".$item['id']."'>".$item['area']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="col-md-5">
                        <div class="input-group input-group-sm mb-3">
                          <select class="form-select" id="motivo_ai" name="motivo_ai">
                            <option value="">--seleziona valore--</option>
                            <?php
                            foreach ($liste['lista_ai_motiv'] as $item) {
                              echo "<option value='".$item['id']."'>".$item['definizione']."</option>";
                            }
                            ?>
                          </select>
                          <button class="btn btn-secondary" type="button" name="addAreaBtn"><i class="fas fa-plus" data-bs-toggle="tooltip" data-bs-placement="top" title="Dopo aver selezionato area e motivazione, clicca per confermare le scelte a aggiungere l'area al record"></i></button>
                        </div>
                      </div>
                    </div>
                    <div id="areeWrap"></div>
                    <div class="row">
                      <div class="col">
                        <label for="noteai" data-bs-toggle="tooltip" data-bs-placement="top" title="per compilare le note devi selezionare almeno 1 area"><i class="fas fa-info-circle"></i> note area di interesse</label>
                        <textarea name="noteai" id="noteai" class="form-control" data-table="scheda" rows="3" disabled></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-ubicazione" aria-expanded="false" aria-controls="flush-ubicazione">ubicazione</button>
                </h2>
                <div id="flush-ubicazione" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <div class="row">
                      <div class="col-md-7">
                        <label for="id_area">anagrafica ubicazione</label>
                        <select class="form-select" id="id_area" name="id_area" data-table="aree_scheda">
                          <option value="">--seleziona valore--</option>
                          <?php
                          foreach ($liste['ubi'] as $item) {
                            $sel = $item['id'] == 2 ? 'selected': '';
                            echo "<option value='".$item['id']."' ".$sel.">".$item['area']." - ".$item['nome']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="col-md-5">
                        <label for="id_motivazione">motivazione ubicazione</label>
                        <select class="form-select" id="id_motivazione" name="id_motivazione" data-table="aree_scheda">
                          <option value="">--seleziona valore--</option>
                          <?php
                          foreach ($liste['lista_ai_motiv'] as $item) {
                            $sel = $item['id'] == 2 ? 'selected': '';
                            echo "<option value='".$item['id']."' ".$sel.">".$item['definizione']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="noteubi">note ubicazione</label>
                        <textarea name="noteubi" id="noteubi" class="form-control" data-table="scheda" rows="3">La scansione fotografica originale a grande formato è conservata in digitale presso gli archivi della biblioteca.</textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-anagrafica" aria-expanded="false" aria-controls="flush-anagrafica">anagrafica</button>
                </h2>
                <div id="flush-anagrafica" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <div class="row">
                      <div class="col">
                        <p class="tip-text">Scegli un sogetto dalla rubrica generale.</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="ana_id">nome</label>
                        <select class="form-select" id="ana_id" name="ana_id" data-table="scheda">
                          <option value="">--seleziona valore--</option>
                          <?php
                          foreach ($liste['anagrafica'] as $item) {
                            echo "<option value='".$item['id']."'>".$item['nome']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="ana_note">note sul soggetto relative alla nuova scheda</label>
                        <textarea name="ana_note" id="ana_note" class="form-control" data-table="scheda" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-consultabilita" aria-expanded="false" aria-controls="flush-consultabilita">consultabilita</button>
                </h2>
                <div id="flush-consultabilita" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <div class="row">
                      <div class="col-md-7">
                        <label for="consultabilita">consultabilità</label>
                        <textarea name="consultabilita" id="consultabilita" class="form-control" data-table="consultabilita" rows="4"></textarea>
                        <label for="orario">orario</label>
                        <textarea name="orario" id="orario" class="form-control" data-table="consultabilita" rows="4">Per gli orari aggiornati visita il sito internet:
http://www.bibliopaganella.it/</textarea>
                      </div>
                      <div class="col-md-5">
                        <label>servizi</label>
                        <?php
                        foreach ($liste['lista_cre_servizi'] as $item) {
                          $checked = $item['id'] == 7 || $item['id'] == 8 ? 'checked' : '';
                          echo "<div class='form-check'>";
                          echo "<input class='form-check-input' type='checkbox' value='".$item['definizione']."' name='servizi' id='servizio".$item['id']."' data-table='consultabilita' ".$checked.">";
                          echo "<label class='form-check-label text-lowercase' for='servizio".$item['id']."'>".$item['definizione']."</label>";
                          echo "</div>";
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-conservazione" aria-expanded="false" aria-controls="flush-conservazione">stato di conservazione</button>
                </h2>
                <div id="flush-conservazione" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <div class="row">
                      <div class="col">
                        <label for="scn_id">stato conservazione</label>
                        <select class="form-select w-auto" id="scn_id" name="scn_id" data-table="scheda">
                          <option value="">--seleziona valore--</option>
                          <?php
                          foreach ($liste['lista_stato_conserv'] as $item) {
                            echo "<option value='".$item['id']."'>".$item['definizione']."</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label for="scn_note">note stato conservazione</label>
                        <textarea name="scn_note" id="scn_note" class="form-control" data-table="scheda" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-correlate" aria-expanded="false" aria-controls="flush-correlate">schede correlate</button>
                </h2>
                <div id="flush-correlate" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <div class="row">
                      <div class="col">
                        <p class="tip-text">Inizia a digitare il nome della scheda da associare (es. "ARCHEO-").</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mainData">
                        <div id="schedeWrap">
                          <button type="button" name="skCorrDelBtn" class="btn btn-sm tag-div animated" title="elimina tag"><span>FOTOGR-I-0001</span><span><i class="fas fa-times" aria-hidden="true"></i></span></button>
                        </div>
                        <div class="form-div">
                          <label for="schede-list" class="formLabel">schede diponibili</label>
                          <input class="form-control" name="schede-list" id="schede-list" list="schede">
                          <datalist id="schede"></datalist>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-tag" aria-expanded="false" aria-controls="flush-tag">tag</button>
                </h2>
                <div id="flush-tag" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <div class="row">
                      <div class="col">
                        <p class="tip-text">Aggiungi le <strong>parole chiave</strong> scegliendole dall'elenco in basso. Inizia a digitare le prime lettere della parola per filtrare l'elenco</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mainData">
                        <div id="tagWrap"></div>
                        <div class="form-div">
                          <label for="tag-list" class="formLabel">Tag diponibili</label>
                          <input class="form-control" name="tag-list" id="tag-list" list="tags">
                          <datalist id="tags"></datalist>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-note" aria-expanded="false" aria-controls="flush-note">note generali</button>
                </h2>
                <div id="flush-note" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <div class="row">
                      <div class="col">
                        <label for="note">note</label>
                        <textarea name="note" id="note" rows="8" class="form-control" data-table="scheda"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item border-bottom">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-statoScheda" aria-expanded="false" aria-controls="flush-statoScheda">stato scheda</button>
                </h2>
                <div id="flush-statoScheda" class="accordion-collapse collapse">
                  <div class="accordion-body">
                    <div class="row mb-3">
                      <div class="col-lg-4">
                        <p class="tip-text"><i class="fa-solid fa-circle-question" data-bs-toggle="tooltip" title="Vuoi chiudere subito la scheda o preferisci lasciarla aperta e chiuderla in un secondo momento?"></i> Chiudi scheda</p>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="fine" id="aperta" value="1" data-table="scheda" checked>
                          <label class="form-check-label text-lowercase" for="aperta">lascia aperta</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="fine" id="chiusa" value="2" data-table="scheda">
                          <label class="form-check-label text-lowercase" for="chiusa">chiudi scheda</label>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <p class="tip-text"><i class="fa-solid fa-circle-question" data-bs-toggle="tooltip" title="Vuoi rendere pubblicamente visibile la scheda o preferisci prima effettuare una revisione dei dati?"></i> Pubblica scheda</p>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="pubblica" id="pubblica" value="t" data-table="scheda">
                          <label class="form-check-label text-lowercase" for="pubblica">pubblica scheda</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="pubblica" id="privata" value="f" data-table="scheda" checked>
                          <label class="form-check-label text-lowercase" for="privata">non pubblicare ancora</label>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="row">
                      <div class="col">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="fine" id="aperta" value="1" data-table="scheda" checked>
                          <label class="form-check-label text-lowercase" for="aperta">lascia aperta</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="fine" id="chiusa" value="2" data-table="scheda">
                          <label class="form-check-label text-lowercase" for="chiusa">chiudi scheda</label>
                        </div>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="row my-5">
              <div class="col">
                <button type="submit" class="btn btn-sm btn-secondary" name="submit">salva dati</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>
    <?php require('assets/footer.php'); ?>
    <?php require('assets/lib.html'); ?>
    <script src="js/schedaAdd.js" charset="utf-8"></script>
  </body>
</html>
