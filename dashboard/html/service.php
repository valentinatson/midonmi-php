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
			<form action="#" onsubmit="return false">
				<div class="form-input">
					<input type="search" id="searchInput" placeholder="Rechercher...">
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
					<h1>Demande de Services</h1>
					
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
        <div class="head" style="display: flex; align-items: center; justify-content: space-between;">
            <h1>Demande de services</h1>
            <button id="downloadPdfBtn" class="btn-download" style="background:#485a64;color:#fff;border:none;padding:8px 18px;border-radius:8px;display:flex;align-items:center;gap:7px;cursor:pointer;">
                <i class='bx bxs-cloud-download'></i>
                Télécharger PDF
            </button>
        </div>
        <div class="table-responsive" id="tableToDownload">
            <table class="table" id="table-demandes">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prénoms</th>
                        <th>Services</th>
                        <th>Téléphone</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="serviceTableBody">
                    <!-- Rempli par JS -->
                </tbody>
            </table>
        </div>
        <nav>
            <ul class="pagination justify-content-center" id="pagination">
                <!-- Pagination JS -->
            </ul>
        </nav>
    </div>
</div>

<style>
    .table-responsive {
        overflow-x: auto;
        margin-bottom: 10px;
    }
    .table th, .table td {
        vertical-align: middle !important;
        text-align: center;
    }
    .badge {
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.95em;
        font-weight: 600;
    }
    .badge-attente { background: #ffe082; color: #856404; }
    .badge-traite { background: #c8e6c9; color: #256029; }
    .badge-echoue { background: #ffcdd2; color: #b71c1c; }
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 6px;
        margin-top: 18px;
        user-select: none;
    }
    .pagination .page-item {
        display: inline-block;
    }
    .pagination .page-link {
        border: none;
        background: #f3f3f3;
        color: #485a64;
        border-radius: 12px;
        margin: 0 2px;
        padding: 8px 16px;
        font-size: 1rem;
        font-weight: 600;
        box-shadow: 0 2px 8px 0 #485a6412;
        transition: background 0.2s, color 0.2s, box-shadow 0.2s, transform 0.1s;
        outline: none;
        cursor: pointer;
        position: relative;
    }
    .pagination .page-link:hover, .pagination .page-link:focus {
        background: #e0eafc;
        color: #198754;
        transform: translateY(-2px) scale(1.07);
        box-shadow: 0 4px 16px 0 #19875422;
        text-decoration: none;
    }
    .pagination .active .page-link {
        background: linear-gradient(90deg, #198754 60%, #485a64 100%);
        color: #fff;
        font-weight: 700;
        box-shadow: 0 4px 16px 0 #19875433;
        transform: scale(1.12);
        border: none;
    }
    @media (max-width: 500px) {
        .pagination .page-link {
            padding: 7px 10px;
            font-size: 0.95rem;
        }
    }
</style>

<script>
fetch('includes/get_demandes.php') // Assure-toi que le chemin est bon
  .then(response => response.json())
  .then(data => {
    const tbody = document.querySelector('#table-demandes tbody');
    tbody.innerHTML = ''; // Nettoie d'abord le tbody

    data.forEach(demande => {
      const row = document.createElement('tr');

      row.innerHTML = `
        <td>${demande.id}</td>
        <td>${demande.nom}</td>
        <td>${demande.prenom}</td>
        <td>${demande.service}</td>
        <td>${demande.tel}</td>
        <td>${demande.date}</td>
        <td>${demande.status}</td>
      `;

      tbody.appendChild(row);
    });
  })
  .catch(error => console.error('Erreur lors du chargement des données :', error));
</script>

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../js/script.js"></script>
	<script src="../js/chart.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
	<script>
    document.getElementById('downloadPdfBtn').addEventListener('click', function () {
        const tableDiv = document.getElementById('tableToDownload');
        html2canvas(tableDiv).then(canvas => {
            const imgData = canvas.toDataURL('image/png');
            const pdf = new window.jspdf.jsPDF('l', 'mm', 'a4');
            const pageWidth = pdf.internal.pageSize.getWidth();
            const pageHeight = pdf.internal.pageSize.getHeight();
            const imgWidth = pageWidth - 20;
            const imgHeight = canvas.height * imgWidth / canvas.width;
            pdf.addImage(imgData, 'PNG', 10, 10, imgWidth, imgHeight);
            pdf.save('demande_services.pdf');
        });
    });
</script>

<!-- Modale de confirmation -->
<div id="modalConfirmation" class="modal" style="display:none;">
  <div class="modal-content">
    <p>Voulez-vous vraiment changer le statut de cette demande ?</p>
    <div class="modal-buttons">
      <button id="confirmerBtn" class="confirm">Oui</button>
      <button id="annulerBtn" class="cancel">Non</button>
    </div>
  </div>
</div>

<style>
  .modal {
    position: fixed;
    z-index: 9999;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background-color: rgba(0,0,0,0.5);
    display: flex; align-items: center; justify-content: center;
  }

  .modal-content {
    background: #fff;
    padding: 2rem;
    border-radius: 10px;
    text-align: center;
    max-width: 400px;
    width: 90%;
  }

  .modal-buttons {
    margin-top: 1.5rem;
    display: flex;
    justify-content: center;
    gap: 1rem;
  }

  .confirm {
    background-color: #198754;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
  }

  .cancel {
    background-color: #ccc;
    color: #000;
    padding: 8px 16px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
  }
</style>



<script>
    function filterDemandes(query) {
  query = query.toLowerCase();
  return demandes.filter(d =>
    d.nom.toLowerCase().includes(query) ||
    d.prenoms.toLowerCase().includes(query) ||
    d.service.toLowerCase().includes(query) ||
    d.tel.toLowerCase().includes(query) ||
    d.date.toLowerCase().includes(query) ||
    d.status.toLowerCase().includes(query)
  );
}

function renderTable(page, data = demandes) {
  const tbody = document.getElementById('serviceTableBody');
  tbody.innerHTML = '';
  const start = (page - 1) * rowsPerPage;
  const end = start + rowsPerPage;
  const pageData = data.slice(start, end);

  pageData.forEach(demande => {
    tbody.innerHTML += `
      <tr>
        <td>${demande.id}</td>
        <td>${demande.nom}</td>
        <td>${demande.prenoms}</td>
        <td>${demande.service}</td>
        <td>${demande.tel}</td>
        <td>${demande.date}</td>
        <td>${getBadge(demande.status, demande.id)}</td>
      </tr>
    `;
  });

  document.querySelectorAll('.status-badge').forEach(badge => {
    badge.addEventListener('click', function () {
      selectedDemandeId = parseInt(this.getAttribute('data-id'));
      document.getElementById('modalConfirmation').style.display = 'flex';
    });
  });
}

function renderPagination(data = demandes) {
  const totalPages = Math.ceil(data.length / rowsPerPage);
  const pagination = document.getElementById('pagination');
  pagination.innerHTML = '';

  for (let i = 1; i <= totalPages; i++) {
    pagination.innerHTML += `
      <li class="page-item${i === currentPage ? ' active' : ''}">
        <a class="page-link" href="#" onclick="gotoPage(${i});return false;">${i}</a>
      </li>
    `;
  }
}

function gotoPage(page, filteredData = demandes) {
  currentPage = page;
  renderTable(currentPage, filteredData);
  renderPagination(filteredData);
}

// Initialisation
let filteredDemandes = demandes;
document.addEventListener('DOMContentLoaded', function() {
  renderTable(currentPage);
  renderPagination();

  const searchInput = document.getElementById('searchInput');
  searchInput.addEventListener('input', function () {
    filteredDemandes = filterDemandes(this.value);
    currentPage = 1;
    renderTable(currentPage, filteredDemandes);
    renderPagination(filteredDemandes);
  });

  window.gotoPage = (page) => gotoPage(page, filteredDemandes);
});

</script>


</body>
</html>