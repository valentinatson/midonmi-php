<?php
require_once '../../../config/config.php'; // ou adapte selon ta structure

$sql = "SELECT nom FROM types_services";
$result = $conn->query($sql);

$services = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $services[] = $row['nom'];
    }
}

header('Content-Type: application/json');
echo json_encode($services);
