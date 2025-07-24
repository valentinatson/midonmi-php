<?php
require '../../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $status = $_POST['status'];

    $allowedStatuses = ['En attente', 'Traité', 'Echoué'];
    if (!in_array($status, $allowedStatuses)) {
        http_response_code(400);
        echo "Statut invalide.";
        exit;
    }

    $stmt = $conn->prepare("UPDATE demandes SET status = ? WHERE id_demande = ?");
    $stmt->bind_param("si", $status, $id);
    if ($stmt->execute()) {
        echo "OK";
    } else {
        http_response_code(500);
        echo "Erreur SQL";
    }
}
?>
