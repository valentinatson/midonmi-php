



<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - MIDONMI</title>
  <meta name="description" content="">
  <meta name="keywords" content="">


  <!-- chatbot -->

  <?php include 'includes/chatbot.php'; ?>

   <!-- End chatbot -->


  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="./assets/css/main.css" rel="stylesheet">


</head>

<body class="index-page">

      <!-- ------------------ HEADER  ------------- -->

  <?php include 'includes/header.php'; ?>

      <!-- ------------------ HEADER  ------------- -->

  <main class="main">

    <!-- Hero Section -->


  <?php include 'includes/sessionHero.php'; ?>


    <!-- /Hero Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>NOS SERVICES</h2>
        <p>NOUS SOMMES TOUJOURS DISPONIBLE POUR VOUS</p>
      </div><!-- End Section Title -->

      
        <!-- partieService -->

  <?php include 'includes/partieService.php'; ?>

        <!-- End partieService -->

    <!-- About 3 Section -->
    <section id="about-3" class="about-3 section">

      <div class="container">
        <div class="row gy-4 justify-content-between align-items-center">
          <div class="col-lg-6 order-lg-2 position-relative" data-aos="zoom-out">
            <img src="assets/img/b1.jpg" alt="Image" class="img-fluid">
            <!-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn">
              <span class="play"><i class="bi bi-play-fill"></i></span>
            </a> -->
          </div>
          <div class="col-lg-5 order-lg-1" data-aos="fade-up" data-aos-delay="100">
            <h2 class="content-title mb-4">
              MIDONMI vous simplifie la vie
            </h2>
            <p class="mb-4">
              MIDONMI est une entreprise de services qui a pour but de vous accompagner dans vos différents projets et démarches au Togo. MIDONMI est là pour vous aider dans:
            </p>
            <ul class="list-unstyled list-check">
              <li>
                le suivi de vos travaux de construction
              </li>
              <li>
                le recouvrement de vos loyers
              </li>
              <li>la gestion de vos courses</li>
              <li>le retrait et remise d'argent ou colis à vos proches</li>
              <li>les formalités administratives d'achat de terrains sécurisés</li>
              <li>la recherche de maisons et chambres à louer pour vos séjours au Togo</li>
            </ul>

            <p><a href="#" class="btn-cta">Cliquez pour un service ?</a></p>
          </div>
        </div>
      </div>
    </section><!-- /About 3 Section -->

    <!-- Services 2 Section -->
    <section id="services-2" class="services-2 section dark-background">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Nos Services</h2>
        <p>
          MIDONMI vous rends service dans les meilleurs délais et avec professionnalisme.
        </p>
      </div><!-- End Section Title -->

      <div class="services-carousel-wrap">
        <div class="container">
          <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                },
                "navigation": {
                  "nextEl": ".js-custom-next",
                  "prevEl": ".js-custom-prev"
                },
                "breakpoints": {
                  "320": {
                    "slidesPerView": 1,
                    "spaceBetween": 40
                  },
                  "1200": {
                    "slidesPerView": 3,
                    "spaceBetween": 40
                  }
                }
              }
            </script>
            <button class="navigation-prev js-custom-prev">
              <i class="bi bi-arrow-left-short"></i>
            </button>
            <button class="navigation-next js-custom-next">
              <i class="bi bi-arrow-right-short"></i>
            </button>
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="service-item">
                  
                  <img src="assets/img/b2.png" alt="Image" class="img-fluid">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="service-item">

                  <img src="assets/img/hero_5.jpg" alt="Image" class="img-fluid">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="service-item">

                  <img src="assets/img/b10.jpg" alt="Image" class="img-fluid">
                </div>
              </div>

              <div class="swiper-slide">
                <div class="service-item">

                  <img src="assets/img/b9.jpg" alt="Image" class="img-fluid">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="service-item">

                  <img src="assets/img/b15.jpg" alt="Image" class="img-fluid">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="service-item">

                  <img src="assets/img/b16.jpg" alt="Image" class="img-fluid">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="service-item">

                  <img src="assets/img/19.jpg" alt="Image" class="img-fluid">
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </section><!-- /Services 2 Section -->

    <!-- Testimonials Section -->
    <?php include 'includes/sessionTestimonial.php'; ?>
    <!-- /Testimonials Section -->

    

    <!-- Call To Action Section -->


  <?php include 'includes/newsletter.php'; ?>


    <!-- /Call To Action Section -->

  </main>


            <!-- Footer -->

  <?php include 'includes/footer.php'; ?>

          <!-- End Footer -->



  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
<!-- Fenêtre modale pour demande de service personnalisé -->
<!-- <div class="modal fade" id="autreServiceModal" tabindex="-1" aria-labelledby="autreServiceModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="autreServiceForm">
        <div class="modal-header">
          <h5 class="modal-title" id="autreServiceModalLabel">Demande de service personnalisé</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
          </div>
          <div class="mb-3">
            <label for="prenoms" class="form-label">Prénoms</label>
            <input type="text" class="form-control" id="prenoms" name="prenoms" required>
          </div>
          <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone</label>
            <input type="tel" class="form-control" id="telephone" name="telephone" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="service" class="form-label">Service demandé</label>
            <textarea class="form-control" id="service" name="service" rows="3" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Soumettre</button>
        </div>
      </form>
    </div>
  </div>
</div> -->

<!-- <script>
// Ouvre la modale au clic sur le bouton "Cliquez pour tout autre service"
document.addEventListener('DOMContentLoaded', function() {
  const btn = document.querySelector('.btn-cta');
  if(btn) {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      const modal = new bootstrap.Modal(document.getElementById('autreServiceModal'));
      modal.show();
    });
  }

  const form = document.getElementById('autreServiceForm');
  if (!form) return;

  // Ajoute dynamiquement les messages d'erreur sous chaque input si pas déjà présents
  ['nom','prenoms','telephone','email','service'].forEach(id => {
    const input = document.getElementById(id);
    if (input && !input.nextElementSibling?.classList?.contains('invalid-feedback')) {
      const span = document.createElement('div');
      span.className = 'invalid-feedback';
      input.parentNode.appendChild(span);
    }
    if (input) input.removeAttribute('required');
  });

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    let valid = true;

    form.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
    if (form.querySelector('.form-success')) form.querySelector('.form-success').remove();

    const nom = form.nom.value.trim();
    const prenoms = form.prenoms.value.trim();
    const tel = form.telephone.value.trim();
    const email = form.email.value.trim();
    const service = form.service.value.trim();

    if (!nom) {
      valid = false;
      form.nom.classList.add('is-invalid');
      form.nom.nextElementSibling.textContent = "Le nom est requis.";
    } else {
      form.nom.classList.remove('is-invalid');
    }

    if (!prenoms) {
      valid = false;
      form.prenoms.classList.add('is-invalid');
      form.prenoms.nextElementSibling.textContent = "Les prénoms sont requis.";
    } else {
      form.prenoms.classList.remove('is-invalid');
    }

    if (!tel.match(/^\+?\d{8,15}$/)) {
      valid = false;
      form.telephone.classList.add('is-invalid');
      form.telephone.nextElementSibling.textContent = "Numéro de téléphone invalide.";
    } else {
      form.telephone.classList.remove('is-invalid');
    }

    if (!email.match(/^[\w\.-]+@[\w\.-]+\.\w{2,}$/)) {
      valid = false;
      form.email.classList.add('is-invalid');
      form.email.nextElementSibling.textContent = "Adresse email invalide.";
    } else {
      form.email.classList.remove('is-invalid');
    }

    if (!service) {
      valid = false;
      form.service.classList.add('is-invalid');
      form.service.nextElementSibling.textContent = "Veuillez décrire le service souhaité.";
    } else {
      form.service.classList.remove('is-invalid');
    }

    if (valid) {
      const success = document.createElement('div');
      success.className = 'form-success text-success mt-3';
      success.textContent = "Message soumis";
      form.appendChild(success);
      setTimeout(() => {
  const modalInstance = bootstrap.Modal.getInstance(document.getElementById('autreServiceModal'));
  if (modalInstance) modalInstance.hide();

  // Attends que la fermeture soit bien terminée
  setTimeout(() => {
    form.reset();
    form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    if(form.querySelector('.form-success')) form.querySelector('.form-success').remove();

    // Force suppression complète du backdrop et scroll bloquant
    document.body.classList.remove('modal-open');
    document.body.style.overflow = '';
    document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());

  }, 500); // suffisant pour laisser Bootstrap finir l’animation
}, 1800);

    }
  });

  form.querySelectorAll('input, textarea').forEach(input => {
    input.addEventListener('input', function() {
      this.classList.remove('is-invalid');
      if(this.nextElementSibling?.classList?.contains('invalid-feedback')) {
        this.nextElementSibling.textContent = '';
      }
    });
  });

  // Supprime le masque si la modale est fermée manuellement (croix ou clic extérieur)
  const modalEl = document.getElementById('autreServiceModal');
  modalEl.addEventListener('hidden.bs.modal', function () {
    document.body.classList.remove('modal-open');
    document.body.classList.remove('overflow-hidden');
    document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
    document.body.style.overflow = '';

  });
});
</script> -->

 <!-- script pour le boutton Connexion/Déconnexion -->
<!-- <script>
  document.addEventListener("DOMContentLoaded", function () {
    const loginLogoutBtn = document.getElementById("loginLogoutBtn");

    // Vérifie l'état de connexion
    function updateButton() {
      const isLoggedIn = localStorage.getItem("loggedIn") === "true";
      loginLogoutBtn.textContent = isLoggedIn ? "Logout" : "Login";
    }

    // Gère le clic sur le bouton
    loginLogoutBtn.addEventListener("click", function (e) {
      e.preventDefault();
      const isLoggedIn = localStorage.getItem("loggedIn") === "true";

      if (isLoggedIn) {
        // Déconnexion
        localStorage.setItem("loggedIn", "false");
        alert("Vous êtes maintenant déconnecté !");
      } else {
        // Connexion simulée (tu peux ouvrir une modale ici si tu veux)
        localStorage.setItem("loggedIn", "true");
        alert("Connexion réussie !");
      }

      updateButton();
    });

    // Mise à jour initiale du bouton
    updateButton();
  });
</script> -->

</body>

</html>