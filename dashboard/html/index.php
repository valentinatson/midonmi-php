<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>MIDONMI</title>

	<!-- Boxicons -->
	<link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />

	<!-- Ton CSS -->
	<link rel="stylesheet" href="../css/style.css" />
</head>
<body>

	<?php include 'includes/sidebar.php'; ?>

	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' style="font-size: 30px; font-weight: 600;"></i>

			<form action="#" class="form-input">
				<!-- Barre de recherche future -->
			</form>

			<input type="checkbox" id="switch-mode" hidden />
			<label for="switch-mode" class="switch-mode"></label>

			<a href="#" class="profile">
				<h1 style="border: 1px solid #FFF2C6; padding: 0.5rem; border-radius: 5px; background: #FFF2C6;">
					Dark/Light
				</h1>
			</a>
		</nav>

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<h1>Tableau de bord</h1>
			</div>

			<?php include 'includes/carte_header.php'; ?>

			<!-- FORMULAIRE -->
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h1>Publier un nouvel article</h1>
						<button id="toggleFormBtn" class="btn-toggle">+</button>
					</div>

					<form action="forms/ajouter-article.php" method="POST" enctype="multipart/form-data">

						<div class="form-group">
							<label for="title">Titre de l'article</label>
							<input type="text" id="title" name="titre" placeholder="Titre..." required />
						</div>

						<div class="form-group">
							<label for="image">Image</label>
							<input type="file" name="image" required>

						</div>

						<div class="form-group">
							<label for="content">Contenu</label>
							<textarea id="content" name="contenu" rows="12" placeholder="Rédigez votre article ici..." required></textarea>
						</div>

						<div class="form-actions">
							<button type="submit" name="submit" class="btn-submit">Publier</button>

						</div>
					</form>
				</div>
			</div>

			<!-- ARTICLES EXEMPLE -->
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h1>Articles publiés</h1>
					</div>

          <style>
            .badge {
    padding: 5px 10px;
    border-radius: 15px;
    color: white;
    font-size: 0.8em;
    display: inline-block;
    margin-left: 10px;
}

.badge-success {
    background-color: green;
}

.badge-danger {
    background-color: red;
}

          </style>

					<div class="article-preview">
						<!-- Exemple d'article (à remplacer dynamiquement avec PHP) -->
						<?php
require '../../config/config.php';

$sql = "SELECT id_article, titre, image, contenu, date_article, status FROM articles ORDER BY date_article DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0):
    while ($row = $result->fetch_assoc()):
        $titre = htmlspecialchars($row['titre']);
        $contenu = htmlspecialchars(substr($row['contenu'], 0, 120)) . "...";
        $date = date('d M Y', strtotime($row['date_article']));
        $imagePath = "../" . $row['image'];
        $status = $row['status'];
?>
    <div class="article-card" id="article-<?= $row['id_article'] ?>">
        <img src="<?= $imagePath ?>" alt="Image article" class="article-image" />
        <div class="article-content">
            <h3><?= $titre ?></h3>
            <p class="article-date"><?= $date ?></p>
            <p><?= $contenu ?></p>
            <div class="article-actions">
                <a href="blog-details.php?id=<?= $row['id_article'] ?>" class="btn-read">Lire plus</a>
                <button class="btn-delete" onclick="supprimerArticle(this, <?= $row['id_article'] ?>)">Supprimer</button>

                <span class="badge <?= $status === 'active' ? 'badge-success' : 'badge-danger' ?>"
                      onclick="toggleStatus(<?= $row['id_article'] ?>, '<?= $status ?>')"
                      style="cursor:pointer;">
                    <?= ucfirst($status) ?>
                </span>
            </div>
        </div>
    </div>
<?php
    endwhile;
else:
    echo "<p>Aucun article publié pour le moment.</p>";
endif;
$conn->close();
?>


						<!-- ... autres articles -->
					</div>
				</div>
			</div>
		</main>
	</section>

	<!-- Scripts -->
	<script src="../js/script.js"></script>

	<script>
		document.getElementById("blogForm").addEventListener("submit", function (e) {
			e.preventDefault();
			const formData = new FormData(this);

			fetch("forms/ajouter-article.php", {
				method: "POST",
				body: formData,
			})
			.then(res => res.json())
			.then(data => {
				if (data.status === "success") {
					alert("Article publié avec succès !");
					this.reset();
				} else {
					alert("Erreur : " + (data.message || "Inconnue"));
				}
			})
			.catch(() => {
				alert("Erreur lors de l'envoi du formulaire.");
			});
		});
	</script>

	<script>
		const toggleBtn = document.getElementById("toggleFormBtn");
		const blogForm = document.getElementById("blogForm");

		toggleBtn.addEventListener("click", () => {
			blogForm.classList.toggle("collapsed");
			toggleBtn.textContent = blogForm.classList.contains("collapsed") ? "+" : "−";
		});
	</script>

	<script>
		function supprimerArticle(btn) {
			if (confirm("Voulez-vous vraiment supprimer cet article ?")) {
				const articleCard = btn.closest(".article-card");
				articleCard.remove(); // Suppression visuelle
				// TODO : envoyer une requête pour supprimer dans la base
			}
		}
	</script>

    <!-- ----------------------Le JavaScript pour changer le statut sans recharger la page---------------------- -->
    <script>
function toggleStatus(id, currentStatus) {
    const newStatus = currentStatus === 'active' ? 'disabled' : 'active';

    fetch('changer-statut-article.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `id_article=${id}&status=${newStatus}`
    })
    .then(res => res.text())
    .then(response => {
        if (response === 'success') {
            const badge = document.querySelector(`#article-${id} .badge`);
            badge.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
            badge.classList.toggle('badge-success');
            badge.classList.toggle('badge-danger');
        } else {
            alert("Erreur lors de la mise à jour du statut.");
        }
    })
    .catch(() => alert("Erreur réseau."));
}
</script>



</body>
</html>
