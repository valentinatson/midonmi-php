<?php
require_once 'article-process.php'; // ajuste le chemin si besoin
?>




<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Le lien pour les icons Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<title>MIDONMI</title>
</head>
<body>
  

	<!-------------------------------------------------SIDEBAR--------------------------------------------->

	<!-- SIDEBAR -->
		<?php include 'includes/sidebar.php'; ?>
	<!-- SIDEBAR -->

	<!-------------------------------------------------CONTENT--------------------------------------------->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' style="font-size: 30px; font-weight: 600;"></i>
			<a href="#" class="nav-link"><!-- Categories --></a>
			<form action="#">
				<div class="form-input">
					<!-- <input type="search" placeholder="Search..."> -->
					<button  ><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<!-- <a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a> -->
			<a href="#" class="profile">
				<!-- <img src="img/people.png"> -->
				 <h1>VA</h1>
			</a>
		</nav>
		<!-- NAVBAR -->
<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Tableau de bord</h1>
					
				</div>

			</div>

			

<div class="table-data">
  <div class="order">
    <div class="head">
      
      <h1>Détails de l'article</h1>
      <a href="index.php" class="btn-retour">← Retour à la liste des articles</a>
      <style>
        .btn-retour {
  display: inline-block;
  margin: 20px 0;
  padding: 10px 20px;
  background-color: #2a2a72;
  color: white;
  border-radius: 5px;
  text-decoration: none;
  transition: background 0.3s ease;
}

.btn-retour:hover {
  background-color: #1a1a50;
}

      </style>
    </div>

    <div class="article-detail">
      <div class="article-main">
        <div class="article-image">
  <?php if (!empty($article['image'])): ?>
    <img src="../<?= htmlspecialchars($article['image']) ?>" alt="Image de l'article">
  <?php else: ?>
    <img src="../img/testimonials-1.jpg" alt="Image de l'article par défaut">
  <?php endif; ?>
</div>

        <div class="article-info">
  <h2 class="article-title"><?= htmlspecialchars($article['titre']) ?></h2>
  <p class="article-date">Publié le <?= $article['date_article'] ?></p>
  <div class="article-content">
    <p><?= nl2br(htmlspecialchars($article['contenu'])) ?></p>
  </div>
</div>

      </div>

      <hr style="margin: 2rem 0;">

      <div class="comments-section">
  <h3>Commentaires (<?= count($commentaires) ?>)</h3>

  <?php foreach ($commentaires as $comment): ?>
    <div class="comment-card">
      <p><strong><?= htmlspecialchars($comment['prenom'] . ' ' . $comment['nom']) ?></strong> (<?= $comment['date_commentaire'] ?>) :</p>
      <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>

      <div class="reponses">
        <?php
        // Charger les réponses de ce commentaire
        $stmt = $conn->prepare("
          SELECT r.*, a.nom 
          FROM reponses r 
          JOIN admins a ON r.id_admin = a.id_admin 
          WHERE r.id_commentaire = ?
        ");
        $stmt->bind_param("i", $comment['id_commentaire']);
        $stmt->execute();
        $reponses = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        foreach ($reponses as $reponse): ?>
          <div class="reponse-commentaire">
            <strong>Réponse admin :</strong>
            <p><?= nl2br(htmlspecialchars($reponse['contenu'])) ?></p>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="comment-actions">
        <button class="btn-repondre" onclick="afficherTextarea(this)">Répondre</button>
        <button class="btn-desactiver" onclick="desactiverCommentaire(this)">Désactiver</button>
      </div>
      <div class="reply-box"></div>
    </div>
  <?php endforeach; ?>
</div>

    </div>
  </div>
</div>







		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	



<script>
  function afficherTextarea(button) {
    const commentCard = button.closest(".comment-card");
    const replyBox = commentCard.querySelector(".reply-box");

    // Vérifie si le textarea existe déjà
    if (!replyBox.querySelector("textarea")) {
      replyBox.innerHTML = `
        <textarea class="reply-textarea" placeholder="Votre réponse..." rows="3"></textarea>
        <button class="btn-envoyer-reponse" onclick="envoyerReponse(this)">Envoyer</button>
      `;
    } else {
      replyBox.innerHTML = ""; // Si déjà affiché, on replie
    }
  }

  function envoyerReponse(button) {
    const replyBox = button.closest(".reply-box");
    const textarea = replyBox.querySelector("textarea");
    const texte = textarea.value.trim();

    if (texte !== "") {
      const response = document.createElement("div");
      response.classList.add("reponse-commentaire");
      response.innerHTML = `<strong>Réponse admin :</strong><p>${texte}</p>`;

      // Ajoute la réponse dans la section "reponses"
      const commentCard = replyBox.closest(".comment-card");
      const reponsesSection = commentCard.querySelector(".reponses");
      reponsesSection.appendChild(response);

      replyBox.innerHTML = ""; // Replie la zone après envoi
    }
  }

  function desactiverCommentaire(button) {
    const commentCard = button.closest(".comment-card");
    commentCard.classList.add("desactive");

    // Désactive les boutons
    commentCard.querySelectorAll("button").forEach(btn => {
      btn.disabled = true;
    });
  }
</script>




</body>
</html>