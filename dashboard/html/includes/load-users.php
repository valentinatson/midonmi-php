<?php
require '../../../config/config.php'; // adapte le chemin selon ton arborescence

$sql = "SELECT id_user, nom, prenom, email, phone, date_creation FROM users ORDER BY date_creation DESC";
$result = $conn->query($sql);

$users = [];

if ($result && $result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$users[] = $row;
	}
}

header('Content-Type: application/json');
echo json_encode($users);
$conn->close();
?>
