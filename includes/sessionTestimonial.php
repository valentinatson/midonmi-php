<section class="testimonials-12 testimonials section" id="testimonials">
  <div class="container section-title" data-aos="fade-up">
    <h2>Ce que nos clients disent de nous</h2>
    <p>Découvrez les témoignages de nos clients satisfaits qui ont bénéficié de nos services au Togo.</p>
    <div style="text-align: center; margin-top: 2%;">
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#testimonialModal">
        Ajouter un témoignage
      </button>
    </div>
  </div>

  <?php
if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success text-center">'.htmlspecialchars($_SESSION['success']).'</div>';
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger text-center">'.htmlspecialchars($_SESSION['error']).'</div>';
    unset($_SESSION['error']);
}
?>


  <div class="testimonial-wrap">
    <div class="container">
      <div class="row">
        <?php
        require './config/config.php';

        // Récupérer uniquement les témoignages actifs
        $sql = "SELECT t.contenu, t.date_temoignage, u.nom, u.prenom 
                FROM temoignages t
                JOIN users u ON t.id_user = u.id_user
                WHERE t.status = 'active'
                ORDER BY t.date_temoignage DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0):
          while ($row = $result->fetch_assoc()):
        ?>
          <div class="col-md-6 mb-4 mb-md-4">
            <div class="testimonial">
              <img src="assets/img/testimonials/testimonials-1.jpg" alt="Testimonial author" />
              <blockquote>
                <p><?= htmlspecialchars($row['contenu']) ?></p>
              </blockquote>
              <p class="client-name"><?= htmlspecialchars($row['prenom'] . ' ' . $row['nom']) ?></p>
            </div>
          </div>
        <?php
          endwhile;
        else:
        ?>
          <p class="text-center">Aucun témoignage disponible pour le moment.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<!-- Modal Bootstrap -->
<div class="modal fade" id="testimonialModal" tabindex="-1" aria-labelledby="testimonialModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="ajouter_temoin.php" method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="testimonialModalLabel">Ajouter un témoignage</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="message" class="form-label">Votre témoignage</label>
          <textarea name="message" id="message" class="form-control" rows="5" required minlength="10" placeholder="Écrivez votre témoignage ici..."></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </div>
    </form>
  </div>
</div>
