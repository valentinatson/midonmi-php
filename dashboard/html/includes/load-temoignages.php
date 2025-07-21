<?php
require '../../../config/config.php'; // adapte le chemin selon ton arborescence

$sql = "SELECT t.id_temoignage, t.contenu, t.date_temoignage, t.status, u.nom, u.prenom 
        FROM temoignages t 
        JOIN users u ON t.id_user = u.id_user 
        ORDER BY t.date_temoignage DESC";

$result = $conn->query($sql);

$temoignages = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $temoignages[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($temoignages);

$conn->close();
?>
