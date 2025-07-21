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
					<h1>Mes Messages</h1>
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
									<th>ID</th>
									<th>Nom</th>
									<th>Prénom</th>
									<th>Email</th>
									<th>Message</th>
									<th>Date</th>
								</tr>
							</thead>
								<tbody id="userTableBody">
								<!-- rempli dynamiquement -->
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
	let messages = [];
	const rowsPerPage = 7;
	let currentPage = 1;

	async function fetchMessages() {
		const response = await fetch("includes/load-messages.php");
		messages = await response.json();
		renderTable(currentPage);
	}

	function renderTable(page, search = "") {
		const tbody = document.getElementById("userTableBody");
		tbody.innerHTML = "";

		const filtered = messages.filter(m =>
			m.nom.toLowerCase().includes(search) ||
			m.prenom.toLowerCase().includes(search) ||
			m.email.toLowerCase().includes(search) ||
			m.message.toLowerCase().includes(search)
		);

		const start = (page - 1) * rowsPerPage;
		const end = start + rowsPerPage;

		filtered.slice(start, end).forEach(msg => {
			tbody.innerHTML += `
				<tr>
					<td>${msg.id_message}</td>
					<td>${msg.nom}</td>
					<td>${msg.prenom}</td>
					<td>${msg.email}</td>
					<td>${msg.message}</td>
					<td>${msg.date_envoi}</td>
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

	document.getElementById("searchInput").addEventListener("input", function() {
		renderTable(1, this.value.toLowerCase());
	});

	document.addEventListener("DOMContentLoaded", fetchMessages);
</script>

</body>
</html>
