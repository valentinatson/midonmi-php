<?php
require '../../../config/config.php';

$nom = trim($_POST['nom'] ?? '');

if ($nom !== '') {
    $stmt = $conn->prepare("INSERT INTO types_services (nom) VALUES (?)");
    $stmt->bind_param("s", $nom);
    if ($stmt->execute()) {
        echo "✅ Type de service ajouté.";
    } else {
        echo "❌ Erreur ou nom déjà existant.";
    }
    $stmt->close();
} else {
    echo "❌ Nom vide.";
}

$conn->close();
