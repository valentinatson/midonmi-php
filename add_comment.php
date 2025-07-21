<?php
session_start();
require_once './config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_SESSION['user_id']; // Assure-toi que l'utilisateur est connecté
    $id_article = $_POST['id_article'];
    $contenu = trim($_POST['contenu']);

    if ($contenu) {
        $stmt = $conn->prepare("INSERT INTO commentaires (id_article, id_user, contenu, date_commentaire) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("iis", $id_article, $id_user, $contenu);
        $stmt->execute();
    }

    header("Location: blog-details.php?id_article=$id_article");
}
?>
