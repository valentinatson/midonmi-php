
<?php
require './config/config.php'; // Connexion à ta BDD

if (!isset($_GET['id_article'])) {
    header('Location: blog.php');
    exit;
}

$id_article = (int) $_GET['id_article'];

// Récupérer les infos de l’article
$stmt = $conn->prepare("SELECT * FROM articles WHERE id_article = ?");
$stmt->bind_param("i", $id_article);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();

if (!$article) {
    echo "Article non trouvé.";
    exit;
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Blog Details - AgriCulture Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- chatbot -->

  <?php include 'includes/chatbot.php'; ?>

   <!-- End Footer -->

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
<!-- Modal de réponse -->
<div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="replyForm">
        <div class="modal-header">
          <h5 class="modal-title" id="replyModalLabel">Répondre</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="replyContent" class="form-label">Votre réponse</label>
            <textarea class="form-control" id="replyContent" rows="4" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Envoyer</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        </div>
      </form>
    </div>
  </div>
</div>


<body class="blog-details-page">

        <!-- ------------------ HEADER  ------------- -->

  <?php include 'includes/header.php'; ?>

      <!-- ------------------ HEADER  ------------- -->


      <!-- -------------------------------formulaire d'envoi de commentaire---------------------------- -->

      <form action="add_comment.php" method="POST" class="mt-4">
  <input type="hidden" name="id_article" value="<?= $article['id_article'] ?>">
  <div class="mb-3">
    <label for="contenu">Ajouter un commentaire</label>
    <textarea name="contenu" class="form-control" required></textarea>
  </div>
  <button type="submit" class="btn btn-success">Envoyer</button>
</form>


      <!-- -------------------------------formulaire d'envoi de commentaire---------------------------- -->


  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.webp);">
      <div class="container position-relative">
        <h1>Blog Details</h1>
        
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Acceuil</a></li>
            <li class="current">Blog Details</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-12">

          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container">

              <article class="article">

                <div class="post-img">
                  <img src="/dashboard/<?= htmlspecialchars($article['image']) ?>" class="img-fluid" alt="">
                </div>

                <h2 class="title"><?= htmlspecialchars($article['titre']) ?></h2>

                <div class="meta-top">
                  <ul>
                    
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">11 Janvier 2025</time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Commentaires</a></li>
                  </ul>
                </div><!-- End meta top -->

                <div class="content">
                  <p>
                    Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                    Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.

                    Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.
                  </p>

                  <div class="text-center">
                      <button id="commentArticleBtn" class="btn btn-primary">Commenter</button>
                  </div>
                  
                  

                </div><!-- End post content -->

                

              </article>

            </div>
          </section><!-- /Blog Details Section -->

          <!-- Blog Comments Section -->

          


          <section id="blog-comments" class="blog-comments section">

            <div class="container">
          <?php
          $stmt = $conn->prepare("
              SELECT c.*, u.nom AS auteur 
              FROM commentaires c 
              JOIN users u ON c.id_user = u.id_user 
              WHERE c.id_article = ? AND c.status = 'active'
              ORDER BY c.date_commentaire DESC
          ");
          $stmt->bind_param("i", $id_article);
          $stmt->execute();
          $comments = $stmt->get_result();
          ?>
              <h4 class="comments-count"><?= $comments->num_rows ?> Commentaires</h4>

<?php while ($comment = $comments->fetch_assoc()): ?>
<div class="comment">
  <h5><?= htmlspecialchars($comment['auteur']) ?></h5>
  <time><?= $comment['date_commentaire'] ?></time>
  <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>

  <!-- RÉPONSES ADMIN -->
  <?php
  $stmtRep = $conn->prepare("
  
    SELECT r.*, a.nom_admin 
    FROM reponses r
    JOIN admins a ON r.id_admin = a.id_admin
    WHERE r.id_commentaire = ?
  ");
  if (!$stmtRep) {
      die("Erreur de préparation de la requête : " . $conn->error);
  }
  

  $stmtRep->bind_param("i", $comment['id_commentaire']);
  $stmtRep->execute();
  $reponses = $stmtRep->get_result();
  ?>

  <?php while ($rep = $reponses->fetch_assoc()): ?>
    <div class="comment comment-reply">
      <h5><?= htmlspecialchars($rep['nom_admin']) ?> (Admin)</h5>
      <time><?= $rep['date_reponse'] ?></time>
      <p><?= nl2br(htmlspecialchars($rep['contenu'])) ?></p>
    </div>
  <?php endwhile; ?>
</div>
<?php endwhile; ?>


            </div>

          </section><!-- /Blog Comments Section -->

         <hr><br><br>

        </div>

        

      </div>
    </div>

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
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const replyButtons = document.querySelectorAll('.reply');
    const replyModal = document.getElementById('replyModal');
    const replyTextarea = document.getElementById('replyContent');
    const replyModalLabel = document.getElementById('replyModalLabel');
    const modal = new bootstrap.Modal(replyModal);

    replyButtons.forEach(button => {
      button.addEventListener('click', function (e) {
        e.preventDefault();
        const comment = button.closest('.comment');
        const authorName = comment.querySelector('h5 a')?.textContent || "l'utilisateur";
        replyModalLabel.textContent = `Répondre à ${authorName}`;
        replyTextarea.value = '';
        modal.show();
      });
    });

        // Bouton pour commenter l'article
    const commentArticleBtn = document.getElementById('commentArticleBtn');
    commentArticleBtn.addEventListener('click', function () {
      replyModalLabel.textContent = "Commenter l’article";
      replyTextarea.value = '';
      modal.show();
    });


    document.getElementById('replyForm').addEventListener('submit', function (e) {
      e.preventDefault();
      const content = replyTextarea.value.trim();
      if (content) {
        
        modal.hide();
      } else {
        alert("Veuillez écrire une réponse.");
      }
    });
  });
</script>



</body>

</html>