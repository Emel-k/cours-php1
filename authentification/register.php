<?php
// Démarrage de la session pour stocker les messages d'erreur ou de succès
session_start();

// Inclusion du fichier de configuration qui contient la connexion à la base de données
require 'config.php';

// Vérification si le formulaire a été soumis en méthode POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Nettoyage des entrées utilisateur pour éviter les espaces inutiles
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $mdp = trim($_POST['mdp']);
}

// Vérification que les champs ne sont pas vides et que l'email est valide
if (!empty($nom) && !empty($mdp) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

    // Vérification si l'email est déjà présent en base de données
    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->fetch()) {
        // Si un utilisateur avec cet email existe déjà, on affiche un message d'erreur
        $_SESSION["error"] = "Désolé, cet email existe déjà";
    } else {
        // Hachage du mot de passe avec bcrypt et un coût de salage de 10
        $hashedPassword = password_hash($mdp, PASSWORD_BCRYPT, ['cost' => 10]);

        // Préparation de la requête d'insertion de l'utilisateur
        $stmt = $pdo->prepare("INSERT INTO utilisateur (nom, prenom, email, mdp) VALUES (?,?,?,?)");

        // Exécution de la requête avec les valeurs de l'utilisateur
        if ($stmt->execute([$nom, $prenom, $email, $hashedPassword])) {
            // Enregistrement réussi, message de succès et redirection vers la page de connexion
            $_SESSION['message'] = "Inscription réussie";
            header("Location: login.php");
            exit();
        } else {
            // En cas d'échec de l'insertion, on stocke un message d'erreur
            $_SESSION['error'] = "Erreur lors de l'inscription";
        }
    }
} else {
    // Si les champs ne sont pas bien remplis, message d'erreur
    $_SESSION['error'] = "Veuillez remplir correctement les champs";
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

    <title>Inscription</title>
</head>
<body>

<h1>Inscription</h1>

<!-- Affichage des messages d'erreur ou de succès -->
<?php
if (isset($_SESSION['error'])) {
    echo "<p style='color:red;'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']); // Suppression du message après affichage
}

if (isset($_SESSION['message'])) {
    echo "<p style='color:green;'>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']); // Suppression du message après affichage
}
?>

<!-- Formulaire d'inscription -->
<form action="register.php" method="post" style="display: flex; flex-direction: column; border: 1px solid black; padding: 5px">

    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" required>

    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <label for="mdp">Mot de passe</label>
    <input type="password" id="mdp" name="mdp" required> <!-- Correction : type="password" pour masquer le mot de passe -->

    <button type="submit" style="width: 100px; height: 40px; margin: 0 auto; margin-top: 5px; border-radius: 25px">
        S'inscrire
    </button>

</form>

<!-- Lien vers la page de connexion -->
<a href="login.php" style="color: cornflowerblue">Déjà inscrit ? Connectez-vous</a>

</body>
</html>
