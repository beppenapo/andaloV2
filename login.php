<?php
session_start();
if(isset($_SESSION['id_user'])){ header("Location: index.php");}
?>
<!doctype html>
<html lang="it">
  <head>
    <?php require('inc/meta.php'); ?>
    <?php require('inc/css.php'); ?>
    <style>
      #mainDiv{min-height: 60vh; margin:100px auto;}
      form{width:500px; max-width: 80%; margin:0 auto; padding:20px;}
    </style>
  </head>
  <body class="bg-light" id="top">
    <?php require('inc/header.php'); ?>
    <div id="mainDiv">
      <div class="container">
        <div class="row">
          <div class="col text-center my-5">
            <h1 class="text-dark">PROGETTO MEMORIA</h1>
            <h6 class="text-dark">FOTOTECA DOCUMENTARIA DELL'ALTOPIANO DELLA PAGANELLA</h6>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <form class="bg-white border rounded" name="loginForm">
              <div class="form-group mb-3">
                <label for="email">Email</label>
                <div class="input-group">
                  <input type="email" id="email" name="email" class="form-control" value="" required>
                  <span class="input-group-text"><i class="fa-solid fa-at"></i></span>
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="pwd">Password</label>
                <div class="input-group">
                  <input type="password" name="password" id="pwd" value="" class="form-control" required>
                  <button class="btn btn-outline-secondary" type="button" id="togglePwd" data-bs-toggle="tooltip" title="visualizza password"><i class="fa-solid fa-eye"></i></button>
                </div>
              </div>
              <div class="alert output text-center mb-3">
                <label class="m-0 outMsg d-block"></label>
                <label id="countdowntimer" class="d-block text-center"></label>
              </div>
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php require('inc/footer.php'); ?>
    <?php require('inc/lib.php'); ?>
    <script src="js/login.js" charset="utf-8"></script>
  </body>
</html>
