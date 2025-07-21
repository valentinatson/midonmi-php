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
    </div>

    <div class="article-detail">
      <div class="article-main">
        <div class="article-image">
          <img src="../img/testimonials-1.jpg" alt="Image de l'article">
        </div>
        <div class="article-info">
          <h2 class="article-title">Le lotissage de terrain</h2>
          <p class="article-date">Publié le 12 Décembre 2025</p>
          <div class="article-content">
            <p>
              Cet article décrit les différentes étapes et règles du lotissement de terrain. Il explique les obligations administratives, les documents requis, les coûts associés et les pièges à éviter lors d’un achat de terrain destiné à être loti.
            </p>
          </div>
        </div>
      </div>

      <hr style="margin: 2rem 0;">

      <div class="comments-section">
        <h3>Commentaires (3)</h3>

        <div class="comment-card">
  <p><strong>Alice</strong> (2025-06-20) :</p>
  <p>Très bon article ! J’ai appris beaucoup sur le sujet.</p>
  
  <div class="reponses">
    <div class="reponse-commentaire">
      <strong>Réponse admin :</strong>
      <p>Merci Alice pour votre retour !</p>
    </div>
    <!-- Les nouvelles réponses s'ajouteront ici -->
  </div>

  <div class="comment-actions">
    <button class="btn-repondre" onclick="afficherTextarea(this)">Répondre</button>
    <button class="btn-desactiver" onclick="desactiverCommentaire(this)">Désactiver</button>
  </div>
  <div class="reply-box"></div>
</div>



        <div class="comment-card">
  <p><strong>Alice</strong> (2025-06-20) :</p>
  <p>Très bon article ! J’ai appris beaucoup sur le sujet.</p>
  
  <div class="reponses">
    <div class="reponse-commentaire">
      <strong>Réponse admin :</strong>
      <p>Merci Alice pour votre retour !</p>
    </div>
    <!-- Les nouvelles réponses s'ajouteront ici -->
  </div>

  <div class="comment-actions">
    <button class="btn-repondre" onclick="afficherTextarea(this)">Répondre</button>
    <button class="btn-desactiver" onclick="desactiverCommentaire(this)">Désactiver</button>
  </div>
  <div class="reply-box"></div>
</div>



        <div class="comment-card">
  <p><strong>Alice</strong> (2025-06-20) :</p>
  <p>Très bon article ! J’ai appris beaucoup sur le sujet.</p>
  
  <div class="reponses">
    <div class="reponse-commentaire">
      <strong>Réponse admin :</strong>
      <p>Merci Alice pour votre retour !</p>
    </div>
    <!-- Les nouvelles réponses s'ajouteront ici -->
  </div>

  <div class="comment-actions">
    <button class="btn-repondre" onclick="afficherTextarea(this)">Répondre</button>
    <button class="btn-desactiver" onclick="desactiverCommentaire(this)">Désactiver</button>
  </div>
  <div class="reply-box"></div>
</div>


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