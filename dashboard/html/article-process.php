<?php
require_once '../../config/config.php'; // ou le chemin correct vers ta connexion DB

if (!isset($_GET['id_article']) || empty($_GET['id_article'])) {
    die("Erreur : pas d'id_article spécifié");
}

$id_article = (int) $_GET['id_article'];

// Récupération de l'article
$stmt = $conn->prepare("SELECT * FROM articles WHERE id_article = ?");
$stmt->bind_param("i", $id_article);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();

if (!$article) {
    die("Erreur : article non trouvé.");
}

// Récupération des commentaires
$stmt = $conn->prepare("
    SELECT c.*, u.nom, u.prenom 
    FROM commentaires c
    JOIN users u ON c.id_user = u.id_user
    WHERE c.id_article = ? AND c.status = 'active'
");
$stmt->bind_param("i", $id_article);
$stmt->execute();
$commentaires = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>
