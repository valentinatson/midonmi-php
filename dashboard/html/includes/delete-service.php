<?php
require '../../../config/config.php';

$id = intval($_GET['id'] ?? 0);

if ($id > 0) {
    $conn->query("DELETE FROM types_services WHERE id = $id");
    echo "🗑️ Supprimé avec succès.";
} else {
    echo "❌ ID invalide.";
}

$conn->close();
