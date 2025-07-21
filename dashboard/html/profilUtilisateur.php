<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../css/style.css">
	<title>MIDONMI</title>
</head>
<body>
	<!-- SIDEBAR -->
		<?php include 'includes/sidebar.php'; ?>
	<!-- SIDEBAR -->

	<section id="content">
		<nav>
			<i class='bx bx-menu'></i>
			<form action="#">
				<div class="form-input">
					<input type="search" id="searchInput" placeholder="Rechercher...">
					<button><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="profile"><h1>VA</h1></a>
		</nav>

		<main>
			<div class="head-title">
				<div class="left">
					<h1>Gestion utilisateur</h1>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Liste des utilisateurs</h3>
					</div>
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Id</th>
									<th>Nom</th>
									<th>Prénoms</th>
									<th>Email</th>
									<th>Téléphone</th>
									<th>Date de création</th>
								</tr>
							</thead>
							<tbody id="userTableBody">
								<!-- rempli par JS -->
							</tbody>
						</table>
					</div>
					<nav>
						<ul class="pagination" id="pagination"></ul>
					</nav>
				</div>
			</div>
		</main>
	</section>

	<script>
	let utilisateurs = [];
	const rowsPerPage = 7;
	let currentPage = 1;

	// Fonction pour charger les vrais utilisateurs depuis le fichier PHP
	async function fetchUtilisateurs() {
		try {
			const response = await fetch("includes/load-users.php"); // adapte le chemin si besoin
			utilisateurs = await response.json();
			renderTable(currentPage);
		} catch (error) {
			console.error("Erreur lors du chargement des utilisateurs :", error);
		}
	}

	function renderTable(page, search = "") {
		const tbody = document.getElementById("userTableBody");
		tbody.innerHTML = "";

		let filtered = utilisateurs.filter(u => {
			return (
				u.nom.toLowerCase().includes(search) ||
				u.prenom.toLowerCase().includes(search) ||
				u.email.toLowerCase().includes(search) ||
				u.phone.toLowerCase().includes(search)
			);
		});

		const start = (page - 1) * rowsPerPage;
		const end = start + rowsPerPage;

		filtered.slice(start, end).forEach(user => {
			tbody.innerHTML += `
				<tr>
					<td>${user.id_user}</td>
					<td>${user.nom}</td>
					<td>${user.prenom}</td>
					<td>${user.email}</td>
					<td>${user.phone}</td>
					<td>${new Date(user.date_creation).toLocaleDateString('fr-FR')}</td>
				</tr>
			`;
		});

		renderPagination(filtered.length);
	}

	function renderPagination(totalItems) {
		const totalPages = Math.ceil(totalItems / rowsPerPage);
		const pagination = document.getElementById("pagination");
		pagination.innerHTML = "";

		for (let i = 1; i <= totalPages; i++) {
			const activeClass = i === currentPage ? 'class="active"' : "";
			pagination.innerHTML += `<li ${activeClass}><a href="#" onclick="changePage(${i})">${i}</a></li>`;
		}
	}

	function changePage(page) {
		currentPage = page;
		renderTable(currentPage, document.getElementById("searchInput").value.toLowerCase());
	}

	document.getElementById("searchInput").addEventListener("input", function () {
		renderTable(1, this.value.toLowerCase());
	});

	// Charger les données après chargement du DOM
	document.addEventListener("DOMContentLoaded", fetchUtilisateurs);
</script>

</body>
</html>
