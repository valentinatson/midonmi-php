<?php
session_start();
require './config/config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = trim($_POST['login']);
    $password = $_POST['password'];

    // Cas spécial pour admin
     if ($login === 'admin@gmail.com') {
        $stmt = $conn->prepare("SELECT id_admin, nom, password FROM admins WHERE email = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($id_admin, $nom, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                // SESSION nommée "id_admin" pour cohérence
                $_SESSION['id_admin'] = $id_admin;
                $_SESSION['admin_nom'] = $nom;

                echo "<script>
                    alert('Connexion admin réussie !');
                    window.location.href = '../dashboard/html';
                </script>";
                exit;
            } else {
                echo "<script>
                    alert('Mot de passe admin incorrect.');
                    window.location.href = 'login.php';
                </script>";
                exit;
            }
        } else {
            echo "<script>
                alert('Admin non trouvé.');
                window.location.href = 'login.php';
            </script>";
            exit;
        }
    }

    // Si ce n’est pas un admin, on vérifie côté utilisateur
    $isEmail = filter_var($login, FILTER_VALIDATE_EMAIL);
    $query = $isEmail 
        ? "SELECT id_user, nom, prenom, password FROM users WHERE email = ?" 
        : "SELECT id_user, nom, prenom, password FROM users WHERE phone = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id_user, $nom, $prenom, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id_user;
            $_SESSION['user_nom'] = $nom;
            $_SESSION['user_prenom'] = $prenom;

            echo "<script>
                alert('Connexion utilisateur réussie !');
                window.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Mot de passe incorrect.');
                window.location.href = 'login.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Aucun utilisateur trouvé avec ces informations.');
            window.location.href = 'login.php';
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
