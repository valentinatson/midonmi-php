<?php
require '../../../config/config.php';

$id = $_POST['id_admin'] ?? null;
$nom = $_POST['nom'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (!$id || !$nom || !$email) {
  echo json_encode(['success' => false, 'message' => 'Champs obligatoires manquants.']);
  exit;
}

$sql = "UPDATE admins SET nom = ?, email = ?" . ($password ? ", password = ?" : "") . " WHERE id_admin = ?";
$stmt = $conn->prepare($sql);

if ($password) {
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $stmt->bind_param("sssi", $nom, $email, $hashedPassword, $id);
} else {
  $stmt->bind_param("ssi", $nom, $email, $id);
}

if ($stmt->execute()) {
  echo json_encode(['success' => true]);
} else {
  echo json_encode(['success' => false, 'message' => 'Erreur lors de la mise à jour.']);
}
