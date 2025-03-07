<?php
// Démarrer la session pour stocker les informations de l'utilisateur
session_start();

// Inclusion du fichier de configuration (contient la connexion à la base de données)
require 'config.php';

// Vérifie si le formulaire a été soumis en méthode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération et nettoyage des champs du formulaire
    $email = trim($_POST['email']); // Supprime les espaces inutiles
    $mdp = trim($_POST['mdp']); // Supprime les espaces inutiles

    // Vérifie si l'email est valide et que le mot de passe n'est pas vide
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($mdp)) { // ERREUR: $mot_de_passe est mal écrit, c'est $mdp ici

        // Prépare la requête pour récupérer l'utilisateur correspondant à l'email
        $stmt = $pdo->prepare('SELECT * FROM utilisateur WHERE email = ?');
        $stmt->execute([$email]);
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC); // Récupération des données sous forme de tableau associatif

        // Vérifie si un utilisateur a été trouvé et si le mot de passe est correct
        $passwordIsValid = password_verify($mdp, $utilisateur['mdp']);

        if ($utilisateur && $passwordIsValid) {
            // Stocke les informations de l'utilisateur dans la session
            $_SESSION['utilisateur'] = $utilisateur;

            // Redirige vers la page d'administration
            header("Location: admin.php");
            exit(); // Arrête l'exécution du script après la redirection
        } else {
            // Stocke un message d'erreur dans la session en cas d'identifiants incorrects
            $_SESSION['error'] = "Email ou mot de passe incorrect";
        }

    } else {
        // Stocke un message d'erreur si les champs ne sont pas remplis correctement
        $_SESSION['error'] = "Veuillez remplir correctement les champs";
    }
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <!-- Configuration du viewport pour un affichage responsive -->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- Compatibilité avec Internet Explorer -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Connexion</title>
</head>
<body>

<h1>Connexion</h1>

<?php
// Affichage des messages de succès ou d'erreur stockés en session
if (isset($_SESSION['message'])) {
    echo "<p style='color:green;'>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']); // Supprime le message après affichage
}

if (isset($_SESSION['error'])) {
    echo "<p style='color:red;'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']); // Supprime le message d'erreur après affichage
}
?>

<!-- Formulaire de connexion -->
<form method="post" action="login.php">

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>

    <label for="mdp">Mot de passe :</label>
    <input type="password" id="mdp" name="mdp" required> <!-- Correction : type="password" au lieu de "text" -->

    <button type="submit">Se connecter</button>

</form>

<!-- Lien vers la page d'inscription -->
<a href="register.php">Pas inscrit ? Inscrivez-vous !</a>

</body>
</html>
