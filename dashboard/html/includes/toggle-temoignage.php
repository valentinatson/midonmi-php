<?php
require '../../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $status = $_POST['status'];

    // Validation du statut
    if (!in_array($status, ['active', 'disabled'])) {
        echo json_encode(['success' => false, 'message' => 'Statut invalide']);
        exit;
    }

    $stmt = $conn->prepare("UPDATE temoignages SET status = ? WHERE id_temoignage = ?");
    $stmt->bind_param("si", $status, $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
