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
			<i class='bx bx-menu' ></i>
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
				 <h1 style="border: 1px solid #FFF2C6; padding: 0.5rem; border-radius: 5px; background: #FFF2C6;">
					Dark/Light
				 </h1>
			</a>
		</nav>
		<!-- NAVBAR -->

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Témoignages</h1>
					
				</div>
				
				
				
				
				
				
				
				
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a> -->
			</div>

			
									<!-- ---------------------------------------------------------------- -->

			<!-- CARTE header -->
			<?php include 'includes/carte_header.php'; ?>
			<!-- CARTE header -->
									<!-- ---------------------------------------------------------------- -->												
			







			



			





			

			<!-- Tableau Demande de services -->
			<div class="table-data">
  <div class="order">
    <div class="head">
      <h1>Liste des témoignages</h1>
    </div>

<div class="testimonial-list" id="temoignageContainer">
  <!-- témoignages injectés par JS -->
</div>


    </div>
  </div>
</div>





		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	



	<style>
		.badge-actif {
  background: #C6F6D5;
  color: #1A7F37;
  padding: 5px 10px;
  border-radius: 5px;
  cursor: pointer;
}

.badge-desactive {
  background: #FED7D7;
  color: #C53030;
  padding: 5px 10px;
  border-radius: 5px;
  cursor: pointer;
}

	</style>


<script>
  async function chargerTemoignages() {
    const response = await fetch("includes/load-temoignages.php");
    const temoignages = await response.json();

    const container = document.getElementById("temoignageContainer");
    container.innerHTML = "";

    temoignages.forEach(t => {
      const badgeClass = t.status === "active" ? "badge-actif" : "badge-desactive";
      const badgeText = t.status === "active" ? "Actif" : "Désactivé";

      const div = document.createElement("div");
      div.className = "testimonial-card";
      div.innerHTML = `
        <p><strong>Nom & Prénoms :</strong> <span>${t.nom}</span> <span>${t.prenom}</span></p>
        <p><strong>Témoignage :</strong> ${t.contenu}</p>
		<p><strong>Date :</strong> ${t.date_temoignage}</p>
        <span class="badge ${badgeClass}" onclick="changerStatut(${t.id_temoignage}, this)">${badgeText}</span>
      `;
      container.appendChild(div);
    });
  }

  async function changerStatut(id, el) {
    const nouveauStatut = el.classList.contains("badge-desactive") ? "active" : "disabled";

    const response = await fetch("includes/toggle-temoignage.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `id=${id}&status=${nouveauStatut}`
    });

    const result = await response.json();

    if (result.success) {
      el.classList.toggle("badge-actif");
      el.classList.toggle("badge-desactive");
      el.textContent = nouveauStatut === "active" ? "Actif" : "Désactivé";
    } else {
      alert("Erreur lors du changement de statut");
    }
  }

  document.addEventListener("DOMContentLoaded", chargerTemoignages);
</script>


	


</body>
</html>	