<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    <a href="index.php" class="logo d-flex align-items-center">
      <img src="assets/img/logo.png" alt="AgriCulture">
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="index.php" class="active">Accueil</a></li>
        <li><a href="services.php">Nos Services</a></li>
        <li><a href="client.php">Espace client</a></li>
        <li><a href="blog.php">Blog/FAQ</a></li>

        <li class="dropdown"><a href="#"><span>À propos</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="testimonials.php">Témoignages</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </li>

        <li>
  <?php if (isset($_SESSION['user_id'])): ?>
    <a href="logout.php" class="btn btn-danger" style="margin-left: 10px; padding-right: 15px; font-size: large; border-radius: 15px; padding-top: 5px; padding-bottom: 5px; color: white;">Déconnexion</a>
  <?php else: ?>
    <a href="login.php" class="btn btn-secondary" style="margin-left: 10px; padding-right: 15px; font-size: large; border-radius: 15px; padding-top: 5px; padding-bottom: 5px; color: white;">Connexion</a>
  <?php endif; ?>
</li>


        <!-- <?php if (isset($_SESSION['user_nom'])): ?>
  <li><span class="nav-link">Bonjour, <?= htmlspecialchars($_SESSION['user_nom']) ?></span></li>
<?php endif; ?> -->


      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>
</header>














<!-- <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="AgriCulture">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Acceuil</a></li>
          <li><a href="services.php">Nos Services</a></li>
          <li><a href="client.php">Espace client</a></li>
          <li><a href="blog.php">Blog/FAQ</a></li>
          
          <li class="dropdown"><a href="#"><span>À propos</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="testimonials.php">Témoignages</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </li>
          <li >
            <button id="loginLogoutBtn" class="btn btn-secondary" style="margin-left: 10px; cursor: pointer; font-size: large;" data-bs-toggle="modal" data-bs-target="#loginModal" href="login.php">
              login
            </button>
          </li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        
      </nav>

    </div>
  </header> -->