<?php
require '../../../config/config.php';

$sql = "SELECT id, nom FROM types_services ORDER BY nom ASC";
$res = $conn->query($sql);

$data = [];
while ($row = $res->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
$conn->close();
