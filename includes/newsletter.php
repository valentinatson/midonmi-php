<section id="call-to-action" class="call-to-action section light-background">
  <div class="content">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h3>S'INSCRIRE À NOTRE LETTRE D'INFORMATION</h3>
          <p class="opacity-50">
            Pour plus d'informations sur nos services, n'hésitez pas à vous inscrire à notre lettre d'information. Vous serez informé de nos dernières actualités et offres spéciales.
          </p>
        </div>

        <div class="col-lg-6">
          <?php
          if (session_status() === PHP_SESSION_NONE) session_start();
          if (isset($_SESSION['newsletter_message'])) {
              echo '<div class="alert alert-info text-center" role="alert" style="margin-bottom: 20px;">' . $_SESSION['newsletter_message'] . '</div>';
              unset($_SESSION['newsletter_message']);
          }
          ?>

          <!-- ✅ SUPPRIME action et method ici -->
          <form id="newsletterForm" class="form-subscribe" style="border-radius: 15px;">
  <div class="form-group d-flex align-items-stretch">
    <input type="email" name="email" class="form-control h-100" placeholder="Enter your e-mail" required>
    <input type="submit" class="btn btn-secondary px-4" value="S'inscrire">
  </div>
  <div class="loading" style="display: none;">Chargement...</div>
  <div class="error-message text-danger" style="display: none;"></div>
  <div class="sent-message text-success" style="display: none;">
    Votre demande d'abonnement a été envoyée. Merci !
  </div>
</form>

        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.querySelector('#newsletterForm').addEventListener('submit', function(e) {
  e.preventDefault();

  const form = this;
  const emailInput = form.querySelector('input[name="email"]');
  const email = emailInput.value.trim();
  const errorDiv = form.querySelector('.error-message');
  const successDiv = form.querySelector('.sent-message');
  const loadingDiv = form.querySelector('.loading');

  errorDiv.style.display = "none";
  successDiv.style.display = "none";
  loadingDiv.style.display = "block";

  fetch('forms/newsletter.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `email=${encodeURIComponent(email)}`
  })
  .then(response => response.text())
  .then(response => {
    loadingDiv.style.display = "none";
    if (response.trim() === "success") {
      successDiv.style.display = "block";
      emailInput.value = "";
    } else {
      errorDiv.textContent = response;
      errorDiv.style.display = "block";
    }
  })
  .catch(() => {
    loadingDiv.style.display = "none";
    errorDiv.textContent = "Une erreur est survenue.";
    errorDiv.style.display = "block";
  });
});
</script>
