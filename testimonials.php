

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Testimonials - AgriCulture Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- chatbot -->

  <?php include 'includes/chatbot.php'; ?>

   <!-- End chatbot -->

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Marcellus:wght@400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: AgriCulture
  * Template URL: https://bootstrapmade.com/agriculture-bootstrap-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="testimonials-page">

        <!-- ------------------ HEADER  ------------- -->

  <?php include 'includes/header.php'; ?>

      <!-- ------------------ HEADER  ------------- -->

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.webp);">
      <div class="container position-relative">
        <h1>Nos Témoignages</h1>
        
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Acceuil</a></li>
            <li class="current">Nos Témoignages</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

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


  <!-- Modal Ajouter un Témoignage -->
<div class="modal fade" id="testimonialModal" tabindex="-1" aria-labelledby="testimonialModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="testimonialModalLabel">Ajouter un témoignage</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" enctype="multipart/form-data">
          <div class="row g-3">
            <!-- <div class="col-md-6">
              <label for="nomTemoin" class="form-label">Nom complet</label>
              <input type="text" class="form-control" id="nomTemoin" name="nom" placeholder="Votre nom" required>
            </div>
            <div class="col-md-6">
              <label for="photoTemoin" class="form-label">Photo (facultatif)</label>
              <input type="file" class="form-control" id="photoTemoin" name="photo" accept="image/*">
            </div> -->
            <div class="col-12">
              <label for="messageTemoin" class="form-label">Votre témoignage</label>
              <textarea class="form-control" id="messageTemoin" name="message" rows="4" placeholder="Exprimez votre satisfaction..." required></textarea>
            </div>
          </div>
          <div class="text-end mt-4">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Envoyer le témoignage</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Initialize AOS
      AOS.init();

      // Initialize Swiper
      var swiper = new Swiper('.swiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });

      // Initialize GLightbox
      const lightbox = GLightbox({
        selector: '.glightbox',
      });
    });
  </script>
</body>

</html>