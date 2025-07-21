<?php
session_start();
require './config/config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Rediriger vers connexion si pas connecté
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_SESSION['user_id'];
    $contenu = trim($_POST['message'] ?? '');

    if (empty($contenu) || strlen($contenu) < 10) {
        $_SESSION['error'] = "Le témoignage est trop court.";
        header('Location: client.php#testimonials');
        exit();
    }

    $date_temoignage = date('Y-m-d');
    $status = 'disabled'; // statut par défaut

    $stmt = $conn->prepare("INSERT INTO temoignages (id_user, contenu, date_temoignage, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $id_user, $contenu, $date_temoignage, $status);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Merci pour votre témoignage, il sera publié après validation.";
    } else {
        $_SESSION['error'] = "Une erreur est survenue, veuillez réessayer.";
    }
    $stmt->close();
    $conn->close();

    header('Location: client.php#testimonials');
    exit();
}
?>
