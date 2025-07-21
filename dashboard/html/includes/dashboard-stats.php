<?php
// Connexion à la base de données
$pdo = new PDO("mysql:host=localhost;dbname=midonmi", "root", "");

// Préparer les requêtes
$enCours = $pdo->query("SELECT COUNT(*) FROM demandes WHERE status = 'En attente'")->fetchColumn();
$traitees = $pdo->query("SELECT COUNT(*) FROM demandes WHERE status = 'Traité'")->fetchColumn();
$echouees = $pdo->query("SELECT COUNT(*) FROM demandes WHERE status = 'Echoué'")->fetchColumn();
$abonnes = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();

?>
