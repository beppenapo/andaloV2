<div id="header">
  <div id="headerMenu">
    <div class="dropdown d-inline-block">
      <a class="dropdown-toggle animation mainMenu" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">HOME</a>
      <div class="dropdown-menu p-0" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item animation" href="index.php">HOME</a>
        <a class="dropdown-item animation" href="index.php#immagini">IMMAGINI</a>
        <a class="dropdown-item animation" href="index.php#luoghi">LUOGHI</a>
        <a class="dropdown-item animation" href="index.php#parole">PAROLE</a>
        <a class="dropdown-item animation" href="index.php#autori">AUTORI</a>
        <a class="dropdown-item animation" href="index.php#aboutus">ABOUT US</a>
        <a class="dropdown-item animation" href="index.php#download">DOWNLOAD</a>
        <a class="dropdown-item animation" href="index.php#credits">CREDITS</a>
      </div>
    </div>
    <a href="gallery.php" class="animation mainMenu">GALLERY</a>
  </div>
  <div id="headerSearch">
    <form class="form p-2" action="gallery.php" method="get">
      <div class="input-group input-group-sm">
        <input type="hidden" name="filtro" value="titolo">
        <input type="search" class="form-control" name="tag" id="txtSearch" placeholder="cerca nei titoli e nelle descrizioni" aria-label="cerca" aria-describedby="cercaBtnHeader" title="inserisci una o più parole separate da spazi" data-bs-toggle="tooltip" required>
        <button class="btn btn-secondary" type="submit" id="cercaBtnHeader"><i class="fa-solid fa-magnifying-glass"></i></button>
      </div>
    </form>
  </div>
  <div id="headerSideMenu" class="invisible">
    <a href="#" class="mainMenu" data-bs-toggle="offcanvas" data-bs-target="#userMenu"><i class="fa-solid fa-bars"></i></a>
  </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="userMenu">
  <div class="offcanvas-header bg-light">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body px-0">
    <div class="list-group list-group-flush">
      <div id="offcanvasMainMenu">
        <a class="list-group-item list-group-item-action list-group-item-light animation" href="index.php">home</a>
        <a class="list-group-item list-group-item-action list-group-item-light animation" href="gallery.php" >gallery</a>
        <a class="list-group-item list-group-item-action list-group-item-light animation" href="index.php#immagini">immagini</a>
        <a class="list-group-item list-group-item-action list-group-item-light animation" href="index.php#luoghi">luoghi</a>
        <a class="list-group-item list-group-item-action list-group-item-light animation" href="index.php#aboutus">about us</a>
        <a class="list-group-item list-group-item-action list-group-item-light animation" href="index.php#download">download</a>
        <a class="list-group-item list-group-item-action list-group-item-light animation" href="index.php#credits">credits</a>
      </div>
      <?php if(isset($_SESSION['id_user'])){ ?>
        <a href="newRecord.php" class="list-group-item list-group-item-action list-group-item-light animation">nuova scheda</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-light animation logoutBtn">logout</a>
      <?php }else{
        echo '<a href="login.php" class="list-group-item list-group-item-action list-group-item-light animation">login</a>';
      }?>
    </div>
  </div>
</div>
