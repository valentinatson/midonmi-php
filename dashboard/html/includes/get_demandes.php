<?php
require_once '../../../config/config.php'; // Assure-toi que ce fichier initialise bien $conn

$sql = "SELECT 
            d.id_demande AS id, 
            u.nom, 
            u.prenom, 
            d.type_service AS service, 
            u.phone AS tel, 
            d.date_demande AS date, 
            d.status 
        FROM demandes d 
        JOIN users u ON d.id_user = u.id_user 
        ORDER BY d.date_demande DESC";

$result = $conn->query($sql);

$demandes = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $demandes[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($demandes);
