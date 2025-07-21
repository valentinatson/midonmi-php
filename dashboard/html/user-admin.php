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
					<h1>User Admin</h1>
					
				</div>

			</div>

			
									<!-- ---------------------------------------------------------------- -->

			<!-- CARTE header -->
			<?php include 'includes/carte_header.php'; ?>
			<!-- CARTE header -->
									<!-- ---------------------------------------------------------------- -->												
			



			
			<div class="table-data">
  <div class="order">
  <div class="head">
    <h3>Modifier les informations de l'administrateur</h3>
  </div>


  
  <form id="formAdmin" method="POST">
  <h3>Modifier mes informations</h3>
  <div>
    <label for="nomAdmin">Nom :</label>
    <input type="text" id="nomAdmin" name="nom" required />
  </div>
  <div>
    <label for="emailAdmin">Email :</label>
    <input type="email" id="emailAdmin" name="email" required />
  </div>
  <div>
    <label for="passwordAdmin">Mot de passe :</label>
    <input type="password" id="passwordAdmin" name="password" placeholder="Laisser vide pour ne pas changer" />
  </div>
  <input type="hidden" name="id_admin" id="idAdmin" />
  <button type="submit">Mettre à jour</button>
</form>

<div id="messageAdminUpdate"></div>


</div>


			</div>

<hr style="margin: 40px 0;">

<div class="table-data">
  <div class="order">
    <div class="head">
      <h3>Ajouter un type de service</h3>
    </div>
    <form id="addServiceForm" style="display: flex; gap: 10px; padding: 20px; flex-wrap: wrap;">
      <input type="text" id="serviceName" placeholder="Nom du service" required
             style="flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 8px;">
      <button type="submit"
              style="padding: 10px 16px; background-color: #0d6efd; color: white; border: none; border-radius: 8px; cursor: pointer;">
        Ajouter
      </button>
    </form>

    <div class="head" style="margin-top: 30px;">
      <h3>Liste des types de services</h3>
    </div>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="serviceTableBody">
          <!-- Rempli dynamiquement -->
        </tbody>
      </table>
    </div>
  </div>
</div>





		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../js/script.js"></script>

    <script>
document.getElementById("formAdmin").addEventListener("submit", async function(e) {
  e.preventDefault();

  const formData = new FormData(this);

  const response = await fetch("includes/update-admin.php", {
    method: "POST",
    body: formData
  });

  const result = await response.json();
  const msg = document.getElementById("messageAdminUpdate");

  if (result.success) {
    msg.textContent = "Informations mises à jour avec succès.";
    msg.style.color = "green";
  } else {
    msg.textContent = "Erreur : " + result.message;
    msg.style.color = "red";
  }
});

// Chargement des infos admin au chargement
window.addEventListener("DOMContentLoaded", async () => {
  const response = await fetch("includes/get-admin.php");
  const admin = await response.json();

  if (admin) {
    document.getElementById("idAdmin").value = admin.id_admin;
    document.getElementById("nomAdmin").value = admin.nom;
    document.getElementById("emailAdmin").value = admin.email;
  }
});
</script>

   

<!-- --------------------------script pour la gestion des services-------------------------- -->
<script>
  async function fetchServices() {
    const res = await fetch("includes/load-services.php");
    const data = await res.json();
    const tbody = document.getElementById("serviceTableBody");
    tbody.innerHTML = "";

    data.forEach(service => {
      tbody.innerHTML += `
        <tr>
          <td>${service.id}</td>
          <td>${service.nom}</td>
          <td><button onclick="deleteService(${service.id})" style="background-color:red;color:white;border:none;padding:6px 10px;border-radius:6px;">Supprimer</button></td>
        </tr>
      `;
    });
  }

  document.getElementById("addServiceForm").addEventListener("submit", async function(e) {
    e.preventDefault();
    const nom = document.getElementById("serviceName").value.trim();
    if (nom === "") return;

    const res = await fetch("includes/add-service.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `nom=${encodeURIComponent(nom)}`
    });

    const result = await res.text();
    alert(result);
    document.getElementById("serviceName").value = "";
    fetchServices();
  });

  async function deleteService(id) {
    if (!confirm("Supprimer ce service ?")) return;

    const res = await fetch("includes/delete-service.php?id=" + id);
    const result = await res.text();
    alert(result);
    fetchServices();
  }

  document.addEventListener("DOMContentLoaded", fetchServices);
</script>



	
    







</body>
</html>