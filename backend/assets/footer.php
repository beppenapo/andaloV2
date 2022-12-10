<?php $logged = isset($_SESSION['id_user']) ? 'y' : 'n'; ?>
<footer data-log="<?php echo $logged; ?>" class="text-center text-white bg-dark py-1">
  <div class="container">
    <div class="row">
      <div class="col">
        <small>Quest'opera è pubblicata con licenza <a rel="license" class="fps-link-footer" href="http://creativecommons.org/publicdomain/zero/1.0/">Public Domain - CC0</a></small>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <small>Copyleft 2012-<?php echo(date(Y)); ?> <a rel="dct:publisher" class="fps-link-footer" href="http://lefontiperlastoria.it/"><span property="dct:title">Coop.TeSto</span></a></small>
      </div>
    </div>
    <?php if(!isset($_SESSION['id_user'])){ ?>
    <div class="row">
      <div class="col">
        <a class="fps-link-footer" aria-current="page" href="login.php">login</a>
      </div>
    </div>
    <?php } ?>
  </div>
</footer>
