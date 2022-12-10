<?php
session_start();
if (!isset($_SESSION['id_user'])){ header("location:login.php");}
require 'vendor/autoload.php';
use Andalo\Area;
$obj = new Area;
$comuniList = $obj->comuniList();
$rubricaList = $obj->rubricaList();
?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <?php require('assets/meta.php'); ?>
    <?php require('assets/css.php'); ?>
    <link rel="stylesheet" href="css/aree.css">
  </head>
  <body>
    <?php require('assets/header.php'); ?>
    <?php require('assets/menu.php'); ?>
    <main class="pb-0" id="mainContainer">
      <div id="containerWrap">
        <div class="titlePage">
          <h6 class="m-0 text-uppercase">catalogo aree/ubicazioni</h6>
        </div>
        <div class="container">
          <div id="containerList">
            <div class="row">
              <div class="col text-center">
                <p class="mt-2">Aree visualizzate <span class="fw-bold" id="numAree"></span></p>
              </div>
            </div>
            <div class="row py-2">
              <div class="col-3 ps-2">
                <div class="ps-2">
                  <button type="button" class="btn btn-sm btn-fps" name="add" data-bs-toggle="modal" data-bs-target="#addArea"><i class="fa-solid fa-plus fa-fw"></i> nuova area</button>
                </div>
              </div>
              <div class="col-9">
                <div class="btn-toolbar float-end pe-2" role="toolbar">
                  <div class="input-group input-group-sm me-2">
                    <select class="form-select" id="tipo" name="filter"></select>
                  </div>
                  <div class="input-group input-group-sm me-2">
                    <select class="form-select" id="comune" name="filter"></select>
                  </div>
                  <div class="input-group input-group-sm me-2">
                    <select class="form-select" id="geometrie" name="filter">
                      <option value="0">tutte le schede</option>
                      <option value="1">geometrie presenti</option>
                      <option value="2">nessuna geometria</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <ul id="firstRow" class="list-group list-group-flush">
                  <li class="list-group-item riga"><span>id</span><span>tipo</span><span>area</span><span>localita</span><span>geometrie</span><span>action</span></li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="loading">
                  <i class="fa-solid fa-spinner fa-spin-pulse fa-5x mb-3"></i>
                  <h5>loading...</h5>
                </div>
                <ul id="listContainer" class="list-group list-group-flush"></ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <?php require('assets/form/newArea.php'); ?>

    <?php require('assets/footer.php'); ?>
    <?php require('assets/lib.html'); ?>
    <script src="js/aree.js" charset="utf-8"></script>
  </body>
</html>
