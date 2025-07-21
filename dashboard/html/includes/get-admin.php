<?php
require '../../../config/config.php';

// On suppose qu'il n'y a qu'un seul admin
$result = $conn->query("SELECT id_admin, nom, email FROM admins LIMIT 1");
echo json_encode($result->fetch_assoc());
