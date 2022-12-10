<?php
session_start();
if (!isset($_SESSION['id_user'])){ header("location:login.php");}
?>
<!doctype html>
<html lang="it">
  <head>
    <?php require('assets/meta.php'); ?>
    <?php require('assets/css.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css">
    <link rel="stylesheet" href="css/drawGeom.css">
  </head>
  <body>
    <?php require('assets/header.php'); ?>
    <?php require('assets/menu.php'); ?>
    <main class="pb-0" id="mainContainer">
      <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>">
      <input type="hidden" name="tipo" value="<?php echo $_POST['tipo'] ?>">
      <input type="hidden" name="area" value="<?php echo $_POST['area'] ?>">
      <div class="map" id="map">
        <div id="titleGeom"></div>
        <div class="card" id="selectGeom">
          <div class="card-body">
            <form class="row g-3 align-items-center">
              <div class="col-12">
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-sm btn-primary" name="zoom" id="zoomIn" value="1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="aumenta lo zoom">
                    <i class="fas fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-sm btn-primary" name="zoom" id="zoomOut" value="0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="diminuiscsi lo zoom">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-sm btn-primary" name="resetZoom" data-bs-toggle="tooltip" data-bs-placement="bottom" title="torna allo zoom iniziale">
                    <i class="fas fa-home"></i>
                  </button>
                </div>
              <!-- </div>
              <div class="col-12"> -->
                <div class="btn-group" role="group" id="pulsantiDiv">
                  <select class="form-select form-select-sm" id="drawGeom" name="mapControl" data-bs-toggle="tooltip" data-bs-placement="bottom" title="seleziona la geometria da disegnare">
                    <option value="">-- geometria --</option>
                    <option value="point">punto</option>
                    <option value="line">linea</option>
                    <option value="poly">poligono</option>
                  </select>
                  <input type="radio" class="btn-check" name="mapControl" id="pan" value="pan" autocomplete="off" checked>
                  <label class="btn btn-sm btn-primary" for="pan" data-bs-toggle="tooltip" data-bs-placement="bottom" title="sposta la mappa"><i class="far fa-hand-paper"></i></label>
                  <input type="radio" class="btn-check" name="mapControl" id="modifica" value="modify" autocomplete="off" disabled>
                  <label class="btn btn-sm btn-primary" for="modifica" data-bs-toggle="tooltip" data-bs-placement="bottom" title="modifica geometrie"><i class="fas fa-pencil-alt"></i></label>
                  <input type="radio" class="btn-check" name="mapControl" id="elimina" value="remove" autocomplete="off" disabled>
                  <label class="btn btn-sm btn-primary" for="elimina" data-bs-toggle="tooltip" data-bs-placement="bottom" title="elimina geometrie"><i class="fas fa-trash-alt"></i></label>
				</div>
				<div class="btn-group" role="group" id="salvaGeometria">
                  <input type="button" class="btn-check" value="Save" autocomplete="off" disabled>
                  <label class="btn btn-sm btn-primary" for="salva" data-bs-toggle="tooltip" data-bs-placement="bottom" title="salva modifiche"><i class="fas fa-save"></i></label>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div id="panel" class="card">
          <div class="card-body">
            <div class="form-check">
              <label class="form-check-label" for="baseLayer0">
                <input class="form-check-input" type="radio" name="baseLayer" value="osm" id="baseLayer0" checked >OpenStreetMap
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label" for="baseLayer1">
                <input class="form-check-input" type="radio" name="baseLayer" value="Aerial" id="baseLayer1">Satellite (Bing)
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label" for="baseLayer2">
                <input class="form-check-input" type="radio" name="baseLayer" value="AerialWithLabelsOnDemand" id="baseLayer2">Satellite con etichette (Bing)
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label" for="vectorLayer">
                <input class="form-check-input" type="checkbox" name="vectorLayer" id="vectorLayer" checked>Geometrie presenti
              </label>
            </div>
          </div>
        </div>
      </div>
      <div id="overlay">
        <button type="button" class="btn btn-sm btn-light" id="remove">Cancella</button>
      </div>
    </main>
    <?php require('assets/footer.php'); ?>
    <?php require('assets/lib.html'); ?>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/build/ol.js"></script>
    <script src="js/drawGeom.js" charset="utf-8"></script>
  </body>
</html>
