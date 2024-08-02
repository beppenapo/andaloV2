<div id="footer" class="bg-dark py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <address class="">
          <ul>
            <li><strong>Gestione associata del servizio bibliotecario della Paganella</strong></li>
            <li><a href="https://goo.gl/maps/6MBna15XQ2C2" title="visualizza in Google Maps [link esterno]"><i class="fas fa-map-marker-alt fa-fw"></i>Piazzale Paganella, 3 38010 Andalo</a></li>
            <li><a href="tel:+390461589627"><i class="fas fa-phone-volume fa-fw"></i>tel. 0461/585275</a></li>
            <li><i class="fas fa-fax fa-fw"></i>fax 0461/589627</li>
            <li><a href="mailto:andalo@biblio.tn.it?subject=feedback" title="scrivici una mail"><i class="fas fa-at fa-fw"></i> andalo@biblio.tn.it</a></li>
            <li><a href="http://www.bibliopaganella.it" title="home page sito istituzionale [link esterno]" target="_blank"><i class="fas fa-link fa-fw"></i>www.bibliopaganella.it</a></li>
            <li><a href="https://www.facebook.com/Bibliopaganella" target="_blank" title="facebook page [link esterno]"><i class="fab fa-facebook-square fa-fw"></i>facebook</a></li>
            <li><a href="https://twitter.com/bibliopaganella" target="_blank" title="twitter page [link esterno]"><i class="fab fa-twitter-square fa-fw"></i>twitter</a></li>
          </ul>
        </address>
      </div>
      <div class="col-md-4">
        <div class="text-center">
          <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/" title="testo della licenza [link esterno]" target="_blank">
            <span class="mb-2 d-block">Quest'opera è distribuita con Licenza Creative Commons Attribuzione - Condividi allo stesso modo 4.0 Internazionale</span>
            <span class="d-block"><i class="fab fa-creative-commons fa-2x"></i><i class="fab fa-creative-commons-by fa-2x"></i><i class="fab fa-creative-commons-sa fa-2x"></i></span>
          </a>
        </div>
        <div class="mt-3 pt-3 border-top">
          <ul>
            <li><i class="far fa-copyright fa-fw"></i>2018 - <?php echo date('Y'); ?> Biblioteche della Paganella</li>
            <li><i class="far fa-lightbulb fa-fw"></i>ideato da: <a href="http://www.cooptesto.it/" title="home page Cooperativa TeSto [link esterno]" target="_blank">TeSto</a> </li>
            <li><i class="fas fa-code fa-fw"></i>creato da: <a href="http://www.arc-team.com" title="home page Cooperativa TeSto [link esterno]" target="_blank">Arc-Team</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-2 offset-md-2">
        <ul class="menuFooter">
          <li><a class="scroll animation" href="index.php">HOME</a></li>
          <li><a class="scroll animation" href="index.php#immagini">IMMAGINI</a></li>
          <li><a class="scroll animation" href="index.php#luoghi">LUOGHI</a></li>
          <li><a class="scroll animation" href="index.php#parole">PAROLE</a></li>
          <li><a class="scroll animation" href="index.php#autori">AUTORI</a></li>
          <li><a class="scroll animation" href="index.php#aboutus">ABOUT US</a></li>
          <li><a class="scroll animation" href="index.php#download">DOWNLOAD</a></li>
          <li><a class="scroll animation" href="index.php#credits">CREDITS</a></li>
          <?php if(isset($_SESSION['id_user'])){ ?>
            <li><a href="logout.php" class="scroll animation border-top py-2 d-block">LOGOUT</a></li>
          <?php }else{ ?>
            <li><a href="login.php" class="scroll animation border-top py-2 d-block">LOGIN</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col text-center">
        <img src="img/logo_biblio.png" class="img-fluid" alt="logo biblioteche della Paganella">
      </div>
    </div>
  </div>
</div>
