<nav id="userMenu">
  <ul class="accordion accordion-flush" id="accordion-menu">
    <li>
      <a href="home.php" class="d-block m-0 mainLink animated" title="home" data-bs-toggle="tooltip" data-bs-placement="left"><i class="fas fa-home fa-fw" aria-hidden="true"></i> home</a>
    </li>
    <li>
      <a href="webgis.php" class="d-block m-0 mainLink animated" title="accedi alla mappa" data-bs-toggle="tooltip" data-bs-placement="left"><i class="fas fa-map-marker-alt fa-fw" aria-hidden="true"></i> mappa</a>
    </li>
    <li>
      <p class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#pageList" aria-expanded="false" aria-controls="pageList" id="pageHeading">
          <i class="fas fa-desktop fa-fw" aria-hidden="true"></i> pagine
      </p>
      <ul class="subMenu accordion-collapse collapse" id="pageList" aria-labelledby="pageHeading" data-bs-parent="#accordion-menu">
        <li>
          <a href="progetto.php" class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="informazioni sul progetto"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> progetto</a>
        </li>
        <li>
          <a href="fonti.php" class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="scopri le fonti documentarie disponibili"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> fonti</a>
        </li>
        <li>
          <a href="istruzioni.php" class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="guida alla navigazione del portale"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> istruzioni</a>
        </li>
        <li>
          <a href="webgisPage.php" class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="strumenti disponibili"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> strumenti</a>
        </li>
        <li>
          <a href="staff.php" class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="conosci il gruppo di lavoro"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> team</a>
        </li>
        <li>
          <a href="progCorr.php" class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="progetti correlati"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> progetti correlati</a>
        </li>
      </ul>
    </li>
    <?php if (isset($_SESSION['id_user'])) {?>
    <li>
      <p class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accountList" aria-expanded="false" aria-controls="accountList" id="accountHeading">
          <i class="fas fa-user fa-fw" aria-hidden="true"></i> account
      </p>
      <ul class="subMenu accordion-collapse collapse" id="accountList" aria-labelledby="accountHeading" data-bs-parent="#accordion-menu">
        <li>
          <a href="account.php" class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="modifica i tuoi dati personali"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> dati personali</a>
        </li>
        <li>
          <a href="#" class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="modifica la tua password"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> modifica password</a>
        </li>
      </ul>
    </li>
    <li>
      <p class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#cataloghiList" aria-expanded="false" aria-controls="cataloghiList" id="cataloghiHeading">
        <i class="fas fa-archive fa-fw" aria-hidden="true"></i> cataloghi
      </p>
      <ul class="subMenu accordion-collapse collapse" id="cataloghiList" aria-labelledby="cataloghiHeading" data-bs-parent="#accordion-menu">
        <li>
          <a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="test" href="ricerca.php"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> ricerche</a>
        </li>
        <li>
          <a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="test" href="catalogo.php"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> schede</a>
        </li>
        <li>
          <a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="test" href="rubrica.php"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> rubrica</a>
        </li>
        <li>
          <a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="test" href="aree.php"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> aree/ubicazioni</a>
        </li>
      </ul>
    </li>
    <li>
      <p class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#schedeList" aria-expanded="false" aria-controls="schedeList" id="schedeHeading">
        <i class="fas fa-database fa-fw" aria-hidden="true"></i> nuova scheda
      </p>
      <ul class="subMenu accordion-collapse collapse" id="schedeList" aria-labelledby="schedeHeading" data-bs-parent="#accordion-menu">
        <li><a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="aggiungi una nuova fonte archeologica" href="scheda_nuova.php?tpsch=6&def=archeologica"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> archeologica</a></li>
        <li><a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="aggiungi una nuova fonte architettonica" href="scheda_nuova.php?tpsch=8&def=architettonica"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> architettonica</a></li>
        <li><a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="aggiungi una nuova fonte archivistica" href="scheda_nuova.php?tpsch=4&def=archivistica"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> archivistica</a></li>
        <li><a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="aggiungi una nuova fonte bibliografica" href="scheda_nuova.php?tpsch=5&def=bibliografica"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> bibliografica</a></li>
        <li><a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="aggiungi una nuova fonte cartografica" href="scheda_nuova.php?tpsch=10&def=cartografica"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> cartografica</a></li>
        <li><a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="aggiungi una nuova fonte fotografica" href="scheda_nuova.php?tpsch=7&def=fotografica"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> fotografica</a></li>
        <li><a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="aggiungi una nuova fonte materiale" href="scheda_nuova.php?tpsch=2&def=fonte materiale"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> materiale</a></li>
        <li><a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="aggiungi una nuova fonte orale" href="scheda_nuova.php?tpsch=1&def=fonte orale"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> orale</a></li>
        <li><a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" title="aggiungi una nuova fonte storico-artistica" href="scheda_nuova.php?tpsch=9&def=storico artistica"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> storico-artistica</a></li>
      </ul>
    </li>
    <li>
      <p class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#listeList" aria-expanded="false" aria-controls="listeList" id="listeHeading"><i class="fas fa-list-alt fa-fw" aria-hidden="true"></i> liste</p>
      <ul class="subMenu accordion-collapse collapse" id="listeList" aria-labelledby="listeHeading" data-bs-parent="#accordion-menu">
        <li><a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" href='vocabolari.php' title="gestisci un vocabolario"><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> vocabolari</a></li>
        <li><a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" href='stato.php' title='gestisci lista Stato'><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> Stato</a></li>
        <li><a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" href='provincia.php' title='gestisci lista Provincia'><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> Provincia</a></li>
        <li><a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" href='comune.php' title='gestisci lista Comune'><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> Comune</a></li>
        <li><a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" href='localita.php' title='gestisci lista Localita'><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> Localita</a></li>
        <li><a class="animated" data-bs-toggle="tooltip" data-bs-placement="left" href='indirizzo.php' title='gestisci lista Indirizzo'><i class="fas fa-chevron-right fa-fw" aria-hidden="true"></i> Indirizzo</a></li>
      </ul>
    </li>
    <li>
      <a href="utenti.php" class="d-block m-0 mainLink animated" title="gestisci utenti" data-bs-toggle="tooltip" data-bs-placement="left"><i class="fas fa-user-friends fa-fw" aria-hidden="true"></i> utenti</a>
    </li>
    <li>
      <a href="notepad.php" class="d-block m-0 mainLink animated" title="notepad" data-bs-toggle="tooltip" data-bs-placement="left"><i class="fas fa-comment-alt fa-fw" aria-hidden="true"></i> notepad</a>
    </li>
    <li><a href='inc/loginScript.php?login=no' class="d-block m-0 mainLink animated" data-bs-toggle="tooltip" data-bs-placement="left" title='Chiudi la tua sessione di lavoro'><i class="fas fa-power-off fa-fw" aria-hidden="true"></i> logout</a></li>
  <?php } ?>
  </ul>

</nav>
