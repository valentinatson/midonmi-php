

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - MIDONMI</title>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
    body {
      background: aliceblue;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Open Sans', Arial, sans-serif;
    }
    .signup-container {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
      padding: 0px 22px 22px 22px;
      max-width: 420px;
      width: 100%;
      text-align: center;
    }
    .signup-container .logo {
      width: 80%;
      margin-bottom: 18px;
    }
    .signup-title {
      font-size: 2rem;
      font-weight: 700;
      color: #485a64;
      margin-bottom: 18px;
    }
    .input-group {
      margin-bottom: 22px;
      position: relative;
    }
    .input-group-text {
      background: #f3f3f3;
      border-radius: 30px 0 0 30px;
      border: none;
      color: #485a64;
      font-size: 1.2rem;
      transition: background 0.2s;
    }
    .form-control {
      border-radius: 0 30px 30px 0;
      border: none;
      background: #f3f3f3;
      padding: 12px 18px;
      font-size: 1rem;
      box-shadow: none;
      transition: box-shadow 0.2s, background 0.2s;
    }
    .form-control:focus {
      background: #e0eafc;
      box-shadow: 0 0 0 2px #19875433;
      border: none;
    }
    .input-group:focus-within .input-group-text {
      background: #e0eafc;
      color: #b4bcc0
Crestline;
    }
    .btn-signup {
      background: #485a64;
      color: #fff;
      border: none;
      border-radius: 30px;
      padding: 12px 0;
      width: 100%;
      font-size: 1.1rem;
      font-weight: 600;
      transition: background 0.2s;
      margin-bottom: 10px;
      box-shadow: 0 2px 8px 0 #19875422;
    }
    .btn-signup:hover {
      background: #74848c;
      color: #fff;
    }
    .form-link {
      display: block;
      margin-top: 10px;
      color: #485a64;
      text-decoration: none;
      font-size: 0.98rem;
      transition: color 0.2s;
    }
    .form-link:hover {
      text-decoration: underline;
      color: #74848c;
    }
    .error-message {
      color: #d32f2f;
      font-size: 0.97rem;
      margin-bottom: 8px;
      text-align: left;
      padding-left: 10px;
      min-height: 18px;
      display: block;
    }
    @media (max-width: 500px) {
      .signup-container {
        padding: 32px 10px;
      }
    }
  </style>
</head>
<body>
  <div class="signup-container">
    <img src="assets/img/logo.png" alt="MIDONMI" class="logo">
    <div class="signup-title">Créer un compte</div>


      <!-- Ajoute method="POST" et action="signup_process.php" dans le form -->
    
      <form id="signupForm" method="POST" action="signup_process.php">
  <div class="input-group">
    <span class="input-group-text"><i class="bi bi-person"></i></span>
    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nom" required>
  </div>

  <div class="input-group">
    <span class="input-group-text"><i class="bi bi-person"></i></span>
    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Prénoms" required>
  </div>

  <div class="input-group">
    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
    <input type="email" class="form-control" id="email" name="email" placeholder="Adresse e-mail" required>
  </div>

  <div class="input-group">
    <span class="input-group-text"><i class="bi bi-phone"></i></span>
    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Téléphone" required>
  </div>

  <div class="input-group">
    <span class="input-group-text"><i class="bi bi-lock"></i></span>
    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
  </div>

  <button type="submit" class="btn btn-signup">S'inscrire</button>
  <a href="login.php" class="form-link">Déjà un compte ? Se connecter</a>
</form>

  </div>
  <!-- <script>
    document.getElementById('signupForm').addEventListener('submit', function(e) {
      e.preventDefault();
      let valid = true;

      // Réinitialiser les messages d'erreur
      document.getElementById('lastnameError').textContent = '';
      document.getElementById('firstnameError').textContent = '';
      document.getElementById('emailError').textContent = '';
      document.getElementById('phoneError').textContent = '';
      document.getElementById('passwordError').textContent = '';

      // Récupérer les valeurs
      const lastname = document.getElementById('lastname').value.trim();
      const firstname = document.getElementById('firstname').value.trim();
      const email = document.getElementById('email').value.trim();
      const phone = document.getElementById('phone').value.trim();
      const password = document.getElementById('password').value;

      // Validation du nom complet
      if (lastname.length < 2) {
  document.getElementById('lastnameError').textContent = 'Veuillez entrer votre nom.';
  valid = false;
}
if (firstname.length < 2) {
  document.getElementById('firstnameError').textContent = 'Veuillez entrer vos prénoms.';
  valid = false;
}

      // Validation de l'email
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        document.getElementById('emailError').textContent = 'Adresse e-mail invalide.';
        valid = false;
      }

      // Validation du téléphone (exemple simple)
      const phoneRegex = /^[0-9\s\-\+]{8,}$/;
      if (!phoneRegex.test(phone)) {
        document.getElementById('phoneError').textContent = 'Numéro de téléphone invalide.';
        valid = false;
      }

      // Validation du mot de passe
      if (password.length < 6) {
        document.getElementById('passwordError').textContent = 'Le mot de passe doit contenir au moins 6 caractères.';
        valid = false;
      }

      if (valid) {
  alert('Inscription réussie !');

  // Réinitialiser les champs
  document.getElementById('signupForm').reset();

  // Redirection vers la page de connexion après 1 seconde (facultatif)
  setTimeout(() => {
    window.location.href = 'login.html';
  }, 1000); // délai pour laisser voir l'alerte
}

    });
  </script> -->
</body>
</html>