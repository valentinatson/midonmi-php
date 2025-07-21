<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion - MIDONMI</title>
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
    .login-container {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
      padding: 0px 22px 22px 22px;
      max-width: 380px;
      width: 100%;
      text-align: center;
    }
    .login-container .logo {
      width: 80%;
      margin-bottom: 18px;
    }
    .login-title {
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
      color: #74848c;
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
      color: #74848c;
    }
    .btn-login {
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
    .btn-login:hover {
      background: #74848c;
      color: #fff;
    }
    .form-link {
      display: block;
      margin-top: 10px;
      color: #74848c;
      text-decoration: none;
      font-size: 0.98rem;
      transition: color 0.2s;
    }
    .form-link:hover {
      text-decoration: underline;
      color: #485a64;
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
      .login-container {
        padding: 32px 10px;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <img src="assets/img/logo.png" alt="MIDONMI" class="logo">
    <div class="login-title">Connexion</div>

    

      <!-- Ajoute method="POST" et action="login_process.php" dans le form -->
    
    <form id="loginForm" method="POST" action="login_process.php">
      <div class="input-group">
        <span class="input-group-text"><i class="bi bi-person"></i></span>
        <input type="text" class="form-control" id="login" name="login" placeholder="Adresse e-mail ou téléphone" required>
      </div>
      <span class="error-message" id="loginError"></span>
      <div class="input-group">
        <span class="input-group-text"><i class="bi bi-lock"></i></span>
        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
      </div>
      <span class="error-message" id="passwordError"></span>
      <button type="submit" class="btn btn-login">Se connecter</button>
      <a href="#" class="form-link">Mot de passe oublié ?</a>
      <a href="signup.php" class="form-link">Créer un compte</a>
    </form>
  </div>
  <!-- <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
      e.preventDefault();
      let valid = true;

      // Réinitialiser les messages d'erreur
      document.getElementById('loginError').textContent = '';
      document.getElementById('passwordError').textContent = '';

      // Récupérer les valeurs
      const login = document.getElementById('login').value.trim();
      const password = document.getElementById('password').value;

      // Validation du login (email ou téléphone)
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      const phoneRegex = /^[0-9\s\-\+]{8,}$/;
      if (!emailRegex.test(login) && !phoneRegex.test(login)) {
        document.getElementById('loginError').textContent = "Veuillez entrer un e-mail ou un téléphone valide.";
        valid = false;
      }

      // Validation du mot de passe
      if (password.length < 6) {
        document.getElementById('passwordError').textContent = "Le mot de passe doit contenir au moins 6 caractères.";
        valid = false;
      }

      if (valid) {
        // Ici, vous pouvez envoyer le formulaire ou afficher un message de succès
        alert('Connexion réussie !');
        // this.submit(); // Décommentez pour soumettre réellement le formulaire
      }
    });
  </script> -->
</body>
</html>