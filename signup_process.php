<?php
require './config/config.php'; // contient ta connexion à MySQL

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = trim($_POST['lastname']);
    $prenom = trim($_POST['firstname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // sécurisation

    // Vérifie si l'email existe déjà
    $check = $conn->prepare("SELECT id_user FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "Cet email est déjà utilisé. <a href='signup.php'>Retour</a>";
        exit();
    }

    $check->close();

    // Insertion dans la base de données
    $sql = "INSERT INTO users (nom, prenom, email, phone, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nom, $prenom, $email, $phone, $password);

    if ($stmt->execute()) {
    echo "<script>
        alert('Inscription réussie !');
        window.location.href = 'login.php';
    </script>";
    exit();
} else {
    echo "Erreur : " . $stmt->error;
}


    $stmt->close();
    $conn->close();
}
?>
