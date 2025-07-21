<?php
session_start();
require './config/config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$id_user = $_SESSION['user_id'];

$result = $conn->prepare("SELECT * FROM demandes WHERE id_user = ? ORDER BY date_demande DESC");
$result->bind_param("i", $id_user);
$result->execute();
$demandes = $result->get_result();
?>




<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Testimonials - AgriCulture Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- chatbot -->

  <?php include 'includes/chatbot.php'; ?>

   <!-- End Footer -->

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Marcellus:wght@400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: AgriCulture
  * Template URL: https://bootstrapmade.com/agriculture-bootstrap-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <!-- Ajoute ce style dans le <head> AVANT ton <link href="assets/css/main.css" rel="stylesheet"> -->
  <style>
  /* Style personnalisé pour le tableau de suivi */
  #servicesTable {
    font-size: 1.1rem;
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(0,0,0,0.07);
    margin-bottom: 0;
  }
  #servicesTable thead th {
    background: #485a64;
    color: #fff;
    font-weight: 600;
    font-size: 1.15rem;
    border: none;
    letter-spacing: 0.5px;
  }
  #servicesTable tbody tr {
    transition: background 0.2s;
  }
  #servicesTable tbody tr:hover {
    background: #f6fdf9;
  }
  #servicesTable td, #servicesTable th {
    padding: 1.1rem 1rem;
    vertical-align: middle;
    border-color: #e3e3e3;
  }
  #servicesTable .badge {
    font-size: 1rem;
    padding: 0.6em 1.1em;
    border-radius: 1.2em;
    letter-spacing: 0.03em;
  }
  @media (max-width: 767px) {
    #servicesTable th, #servicesTable td {
      padding: 0.7rem 0.5rem;
      font-size: 1rem;
    }
  }
  </style>
</head>

<body class="testimonials-page">

        <!-- ------------------ HEADER  ------------- -->

  <?php include 'includes/header.php'; ?>

      <!-- ------------------ HEADER  ------------- -->

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.webp);">
      <div class="container position-relative">
        <h1>Espace Client</h1>
        
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Acceuil</a></li>
            <li class="current">Espace Client</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    

    <!-- Suivi de vos demandes Section -->
    <section class="section" style="margin-top: 5rem;">
      <div class="container">
        <div class="section-title">
          <h2>Suivi de vos demandes</h2>
          <p>Historique de vos services</p>
        </div>
        <!-- Bouton PDF en haut -->
        <div class="d-flex justify-content-end mb-2">
          <button class="btn btn-success" id="downloadPdfBtn" type="button">
            <i class="bi bi-file-earmark-arrow-down"></i> Télécharger en PDF
          </button>
        </div>

        <!-- Filtre par statut -->
        <div class="mb-3 d-flex justify-content-end">
  <label for="filtreStatut" class="me-2">Filtrer par statut :</label>
  <select id="filtreStatut" class="form-select w-auto">
    <option value="">Tous</option>
    <option value="En attente">En attente</option>
    <option value="Traité">Traité</option>
    <option value="Echoué">Echoué</option>
  </select>
</div>


        <div class="table-responsive">
          <table class="table table-bordered align-middle" id="servicesTable">
            <thead class="table-light">
              <tr>
                <th>Id</th>
                <th>Services</th>
                <th>Date</th>
                <th>Status</th>
              </tr>
            </thead>

            <tbody id="demandesBody">
<?php
require './config/config.php';

if (!isset($_SESSION['user_id'])) {
    echo '<tr><td colspan="5" class="text-center text-muted">Veuillez vous connecter pour voir vos demandes.</td></tr>';
} else {
    $id_user = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT * FROM demandes WHERE id_user = ? ORDER BY date_demande DESC");
    $stmt->bind_param("i", $id_user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "<tr><td colspan='5' class='text-center text-muted'>Aucune demande enregistrée.</td></tr>";
    } else {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $service = htmlspecialchars($row['type_service']);
            $date = htmlspecialchars($row['date_demande']);
            $status = htmlspecialchars($row['status']);
            $id = $row['id_demande'];

            $badge = match($status) {
                'Traité' => 'success',
                'Echoué' => 'danger',
                'En attente' => 'warning text-dark',
                default => 'secondary',
            };

            echo "<tr>
                <td>{$i}</td>
                <td>{$service}</td>
                <td>{$date}</td>
                <td><span class='badge bg-{$badge}'>{$status}</span></td>
            </tr>";
            $i++;
        }
    }

    $stmt->close();
    $conn->close();
}
?>
</tbody>


          </table>
        </div>
        <nav>
          <ul class="pagination justify-content-end mt-3" id="tablePagination"></ul>
        </nav>
      </div>
    </section><!-- /Suivi de vos demandes Section -->

    

  </main>

              <!-- Footer -->

  <?php include 'includes/footer.php'; ?>

          <!-- End Footer -->



  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.8.2/jspdf.plugin.autotable.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
  document.getElementById('downloadPdfBtn').addEventListener('click', function() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    doc.text("Historique de vos services", 14, 15);
    doc.autoTable({
      html: '#servicesTable',
      startY: 25,
      styles: { font: "helvetica", fontSize: 10 },
      headStyles: { fillColor: [22, 101, 48] }
    });

    doc.save('services-client.pdf');
  });
  </script>
  <script>
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('downloadPdfBtn').addEventListener('click', function() {
    // Utilise la version UMD de jsPDF
    const doc = new window.jspdf.jsPDF();

    doc.text("Historique de vos services", 14, 15);
    doc.autoTable({
      html: '#servicesTable',
      startY: 25,
      styles: { font: "helvetica", fontSize: 10 },
      headStyles: { fillColor: [22, 101, 48] },
      // Ignore les balises span dans les cellules
      didParseCell: function (data) {
        if (data.cell.raw && data.cell.raw.querySelector) {
          const span = data.cell.raw.querySelector('span');
          if (span) data.cell.text = [span.textContent];
        }
      }
    });

    doc.save('services-client.pdf');
  });
});
</script>

<!-- ----------------script pour le tableau de suivi----------------------- -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // PAGINATION TABLEAU
  const rowsPerPage = 10;
  const table = document.getElementById('servicesTable');
  const tbody = table.querySelector('tbody');
  const rows = Array.from(tbody.querySelectorAll('tr'));
  const pagination = document.getElementById('tablePagination');

  function showPage(page) {
    const start = (page - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    rows.forEach((row, i) => {
      row.style.display = (i >= start && i < end) ? '' : 'none';
    });
  }

  function renderPagination() {
    const pageCount = Math.ceil(rows.length / rowsPerPage);
    pagination.innerHTML = '';
    if (pageCount <= 1) return;
    for (let i = 1; i <= pageCount; i++) {
      const li = document.createElement('li');
      li.className = 'page-item';
      const a = document.createElement('a');
      a.className = 'page-link';
      a.href = '#';
      a.textContent = i;
      a.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelectorAll('#tablePagination .page-item').forEach(el => el.classList.remove('active'));
        li.classList.add('active');
        showPage(i);
      });
      li.appendChild(a);
      if (i === 1) li.classList.add('active');
      pagination.appendChild(li);
    }
  }

  // Initialisation
  showPage(1);
  renderPagination();

  // PDF EXPORT (corrigé pour ne prendre que les lignes visibles)
  document.getElementById('downloadPdfBtn').addEventListener('click', function() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    doc.text("Historique de vos services", 14, 15);

    // Clone le tableau et ne garde que les lignes visibles
    const tableClone = table.cloneNode(true);
    const cloneTbody = tableClone.querySelector('tbody');
    Array.from(cloneTbody.querySelectorAll('tr')).forEach((tr, i) => {
      if (rows[i].style.display === 'none') tr.remove();
    });

    doc.autoTable({
      html: tableClone,
      startY: 25,
      styles: { font: "helvetica", fontSize: 10 },
      headStyles: { fillColor: [22, 101, 48] },
      didParseCell: function (data) {
        if (data.cell.raw && data.cell.raw.querySelector) {
          const span = data.cell.raw.querySelector('span');
          if (span) data.cell.text = [span.textContent];
        }
      }
    });

    doc.save('services-client.pdf');
  });
});
</script>

<!-- ----------------script pour filtrer les services par statut----------------------- -->
 <script>
document.addEventListener('DOMContentLoaded', () => {
  const selectFiltre = document.getElementById('filtreStatut');
  const rows = document.querySelectorAll('#servicesTable tbody tr');

  selectFiltre.addEventListener('change', () => {
    const filtre = selectFiltre.value.toLowerCase();

    rows.forEach(row => {
      const statut = row.querySelector('td:last-child').textContent.toLowerCase();
      row.style.display = (filtre === '' || statut === filtre) ? '' : 'none';
    });
  });
});
</script>


</body>

</html>













