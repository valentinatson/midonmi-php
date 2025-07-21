<?php
session_start();
require './config/config.php';

header('Content-Type: text/plain'); // Pour permettre une réponse propre en Ajax

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Vérifie que l'utilisateur est connecté
    if (!isset($_SESSION['user_id'])) {
        echo "not_authenticated";
        exit;
    }

    // Sécurité + récupération des données
    $user_id = $_SESSION['user_id'];
    $type_service = trim($_POST['type_service']);
    $custom_service = isset($_POST['custom_service']) ? trim($_POST['custom_service']) : null;
    $date_demande = date('Y-m-d');

    // Si "autre", remplace type_service par le texte personnalisé
    if ($type_service === "autre" && !empty($custom_service)) {
        $type_service = $custom_service;
    }

    if (empty($type_service)) {
        echo "missing_data";
        exit;
    }

    // Préparation de l’insertion SQL
    $stmt = $conn->prepare("INSERT INTO demandes (id_user, type_service, date_demande) VALUES (?, ?, ?)");
    
    if (!$stmt) {
        // Affiche l’erreur SQL si la préparation échoue
        echo "prepare_error: " . $conn->error;
        exit;
    }

    $stmt->bind_param("iss", $user_id, $type_service, $date_demande);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "execute_error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "invalid_method";
}
