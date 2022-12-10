<?php
session_start();
if (!isset($_SESSION['id_user'])){ header("location:login.php");}
require 'vendor/autoload.php';
use Andalo\Scheda;
$obj = new Scheda;
?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <?php require('assets/meta.php'); ?>
    <?php require('assets/css.php'); ?>
    <link rel="stylesheet" href="css/catalogo.css">
  </head>
  <body>
    <?php require('assets/header.php'); ?>
    <?php require('assets/menu.php'); ?>
    <main class="pb-0" id="mainContainer">
      <div id="containerWrap">
        <div class="titlePage">
          <h6 class="m-0 text-uppercase">catalogo schede</h6>
        </div>
        <div class="container">
          <div id="containerList">
            <div class="row py-2">
              <div class="col-3">
                <small class="ps-2">Schede visualizzate <span class="fw-bold" id="numSchede"></span></small>
              </div>
              <div class="col-9">
                <div class="btn-toolbar float-end pe-2" role="toolbar">
                  <div class="input-group input-group-sm me-2">
                    <select class="form-select" id="livind" name="filter"><option value="0" selected="">tutte i tipi</option></select>
                  </div>
                  <div class="input-group input-group-sm me-2">
                    <select class="form-select" id="tpsch" name="filter"><option value="0" selected="">tutte le fonti</option></select>
                  </div>
                  <div class="input-group input-group-sm me-2">
                    <select class="form-select" id="fine" name="filter"><option value="0" selected="">tutte le schede</option></select>
                  </div>
                  <div class="btn-group btn-group-sm" role="group" aria-label="Third group">
                    <a href="#" id="csv" class="btn btn-light border" data-bs-toggle="tooltip" title="esporta dati in formato CSV">CSV</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <ul id="firstRow" class="list-group list-group-flush">
                  <li class="list-group-item riga">
                    <span>id</span><span>scheda</span><span>liv.ind.</span><span>oggetto</span><span>note</span><span>stato</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="list-group list-group-flush" id="listContainer"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php require('assets/footer.php'); ?>
    <?php require('assets/lib.html'); ?>
    <script src="js/catalogo.js" charset="utf-8"></script>
  </body>
</html>
