<?php
require_once '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom     = htmlspecialchars(trim($_POST["nom"]));
    $prenom  = htmlspecialchars(trim($_POST["prenom"]));
    $email   = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO messages_contact (nom, prenom, email, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nom, $prenom, $email, $message);

        if ($stmt->execute()) {
            echo "OK"; // attendu par validate.js
        } else {
            http_response_code(500);
            echo "Erreur lors de l'enregistrement du message.";
        }

        $stmt->close();
        $conn->close();
    } else {
        http_response_code(400);
        echo "Veuillez remplir tous les champs.";
    }
} else {
    http_response_code(403);
    echo "Méthode non autorisée.";
}
?>
