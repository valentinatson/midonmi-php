<?php
require '../../../config/config.php'; // ajuste le chemin si besoin

$sql = "SELECT id_message, nom, prenom, email, message, date_envoi FROM messages_contact ORDER BY date_envoi DESC";
$result = $conn->query($sql);

$messages = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($messages);

$conn->close();
?>
