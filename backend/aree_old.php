<?php session_start(); ?>
<!doctype html>
<html lang="it">
  <head>
    <?php require_once("assets/meta.php"); ?>
    <link href="lib/jquery-ui-1.11.4/jquery-ui.min.css" type="text/css" rel="stylesheet" media="screen" />
    <link href="css/scheda.css" type="text/css" rel="stylesheet" media="screen" />
    <link rel="stylesheet" href="css/aree.css">
  </head>
  <body>
    <div class="loading"><i class="fas fa-circle-notch fa-spin fa-5x"></i></div>
    <div id="container">
      <div id="wrap">
        <?php if (isset($_SESSION['id_user'])){require_once("inc/sessione.php"); }?>
        <div id="content">
          <?php require_once('inc/logoHub.php'); ?>
          <div id="livelloScheda">
            <ul>
              <li id="catalogoTitle" class="livAttivo">ELENCO AREE</li>
            </ul>
          </div>
          <div id="skArcheoContent">
            <div class="inner primo">
              <div>
                <?php if(isset($_SESSION['id_user'])) {require_once("inc/areeNew.php"); } ?>
                <div id="tableHeader">
                  <div id="legendaWrap">
                    <legend id="legenda">
                      <span id="legText"></span>
                      <span id="legNum"></span>
                    </legend>
                  </div>
                  <div id="filtriWrap">
                    <select id="t" name="t" class="filtri">
                      <option value="" disabled selected>--filtra tipologia--</option>
                      <option value="1">area di interesse</option>
                      <option value="2">ubicazione</option>
                    </select>
                    <select class="filtri" name="c" id="c">
                      <option value="" disabled selected>--filtra comune--</option>
                    </select>
                    <select class="filtri" name="g" id="g">
                      <option value="2" disabled selected>--filtra geometrie--</option>
                      <option value="1">presenti</option>
                      <option value="0">assenti</option>
                    </select>
                    <button type="button" class="resetFilter" title="annulla filtro"><i class="fas fa-trash-alt"></i></button>
                  </div>
                </div>
                <table id="catalogoTable">
                  <thead>
                    <tr>
                      <th style="width:20px"></th>
                      <th style="width:20px">ID</th>
                      <th style="width:100px">TIPO</th>
                      <th style="width:230px">AREA</th>
                      <th style="width:400px">LOCALITÀ</th>
                      <th style="width:100px; text-align:center">GEOMETRIE</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div id="footer"><?php require_once ("inc/footer.php"); ?></div>
      </div>
    </div>
    <div id="dialog"></div>
    <script type="text/javascript" src="lib/jquery-core/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="lib/jquery-ui-1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script type="text/javascript" src="lib/funzioni.js"></script>
    <script type="text/javascript" src="js/function.js"></script>
    <script type="text/javascript" src="js/aree_list.js"></script>
  </body>
</html>
