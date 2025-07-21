<?php
session_start();
require_once '/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_admin = $_SESSION['admin_id']; // admin connecté
    $id_commentaire = $_POST['id_commentaire'];
    $contenu = trim($_POST['contenu']);

    if ($contenu) {
        $stmt = $conn->prepare("INSERT INTO reponses (id_commentaire, id_admin, contenu, date_reponse) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("iis", $id_commentaire, $id_admin, $contenu);
        $stmt->execute();
    }

    // Optionnel : retrouver l'article lié
    $stmt = $conn->prepare("SELECT id_article FROM commentaires WHERE id_commentaire = ?");
    $stmt->bind_param("i", $id_commentaire);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    $id_article = $row['id_article'];

    header("Location: blog-details.php?id_article=$id_article");
}
?>
