<?php
require '../../../config/config.php'; // Ajuste le chemin selon ton arborescence

$sql = "SELECT id, email, date_inscription FROM newsletter ORDER BY date_inscription DESC";
$result = $conn->query($sql);

$newsletters = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $newsletters[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($newsletters);

$conn->close();
?>
