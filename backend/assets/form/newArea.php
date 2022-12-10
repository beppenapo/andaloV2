<div class="modal fade" id="addArea">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Nuova area</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="addAreaForm" name="addAreaForm">
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row mb-3">
              <div class="col-lg-4">
                <label for="newTipo" class="col-form-label">tipo area:</label>
                <select id="newTipo" name="newTipo" class="form-select form-select-sm" required>
                  <option value="">--scegli dalla lista--</option>
                  <option value="1">area di interesse</option>
                  <option value="2">ubicazione</option>
                  <option value="3">cartografia</option>
                </select>
              </div>
              <div class="col-lg-8">
                <label for="newNome" class="col-form-label">nome area:</label>
                <input type="text" name="newNome" id="newNome" class="form-control form-control-sm" value="" required>
              </div>
            </div>
            <div id="areaFormWrap" class="tipoForm">
              <div class="row">
                <div class="col">
                  <small class="text-secondary"><i class="fas fa-bulb"></i> Definisci l'area geograficamente selezionando un Comune e le rispettive Località. Seleziona un Comune precedentemente selezionato per continuare ad aggiungere nuovo Località</small>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-4">
                  <label for="newComune" class="col-form-label">Comune:</label>
                  <select class="form-select form-select-sm" name="newComune" id="newComune">
                    <option value="">--scegli Comune--</option>
                    <?php foreach ($comuniList as $comune) {
                      echo '<option value="'.$comune['id'].'">'.$comune['comune'].'</option>';
                    } ?>
                  </select>
                </div>
                <div class="col-lg-6">
                  <div class="">
                    <label for="selLocalita" class="col-form-label">Località:</label>
                    <select class="form-select form-select-sm" name="selLocalita" id="selLocalita" disabled></select>
                  </div>
                </div>
              </div>
              <div id="areaWrap"></div>
            </div>
            <div id="ubicazioneFormWrap" class="tipoForm">
              <div class="row mb-3">
                <div class="col-lg-3">
                  <label for="ubiComune" class="col-form-label">Comune:</label>
                  <select class="form-select form-select-sm" name="ubiComune" id="ubiComune">
                    <option value="">--scegli Comune--</option>
                    <?php foreach ($comuniList as $comune) {
                      echo '<option value="'.$comune['id'].'">'.$comune['comune'].'</option>';
                    } ?>
                  </select>
                </div>
                <div class="col-lg-5">
                  <label for="ubiIndirizzo" class="col-form-label">Indirizzo:</label>
                  <select class="form-select form-select-sm" name="ubiIndirizzo" id="ubiIndirizzo">
                    <option value="">--scegli indirizzo--</option>
                  </select>
                </div>
                <div class="col-4">
                  <label for="ubiRubrica" class="col-form-label">Riferimento rubrica:</label>
                  <select class="form-select form-select-sm" name="ubiRubrica" id="ubiRubrica">
                    <option value="">--scegli riferimento--</option>
                    <?php foreach ($rubricaList as $item) {
                      echo '<option value="'.$item['id'].'">'.$item['nome'].'</option>';
                    } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col text-center" id="newAreaLoading">
                <i class="fa-solid fa-spinner fa-2x fa-spin-pulse"></i>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="alert text-center" id="newAreaMsg"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">salva</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">annulla</button>
        </div>
      </form>
    </div>
  </div>
</div>
