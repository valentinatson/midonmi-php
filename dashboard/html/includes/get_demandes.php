<?php
require '../../../config/config.php';

$sql = "SELECT d.id_demande AS id, u.nom, u.prenom AS prenoms, d.type_service AS service, u.phone AS tel, d.date_demande AS date, d.status
        FROM demandes d
        JOIN users u ON d.id_user = u.id_user
        ORDER BY d.id_demande DESC";

$result = $conn->query($sql);
$demandes = [];

while ($row = $result->fetch_assoc()) {
    $demandes[] = $row;
}

header('Content-Type: application/json');
echo json_encode($demandes);
?>
