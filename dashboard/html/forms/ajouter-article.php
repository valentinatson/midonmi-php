<?php
// Affichage des erreurs pour debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../../config/config.php'; // adapte bien le chemin vers ton config.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ici tu peux définir un id_admin fixe ou null si tu n'as pas de session
    $id_admin = 1; // par défaut, ou NULL si tu veux

    $titre = trim($_POST['titre']);
    $contenu = trim($_POST['contenu']);
    $date_article = date('Y-m-d');

    if (empty($titre) || empty($contenu)) {
        echo "Veuillez remplir tous les champs obligatoires.";
        exit;
    }

    // Gestion facultative de l'image
    $imageForDB = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $targetDir = '../../uploads/';
        if (!is_dir($targetDir)) mkdir($targetDir, 0755, true);

        $imageName = time() . '_' . basename($_FILES['image']['name']);
        $targetFile = $targetDir . $imageName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imageForDB = 'uploads/' . $imageName; // chemin relatif à stocker en base
        } else {
            echo "Erreur lors du téléchargement de l'image.";
            exit;
        }
    }

    // Préparation de la requête
    $stmt = $conn->prepare("INSERT INTO articles (id_admin, titre, image, contenu, date_article) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $id_admin, $titre, $imageForDB, $contenu, $date_article);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Erreur SQL : " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

} else {
    echo "Erreur lors de l'envoi du formulaire.";
}
