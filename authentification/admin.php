<?php
// Démarre une session PHP (nécessaire pour utiliser les variables de session)
session_start();

// Vérifie si l'utilisateur est connecté en regardant s'il y a une session active
if (!isset($_SESSION['utilisateur'])) {
    // Si l'utilisateur n'est pas connecté, redirige vers la page de connexion
    header("Location: login.php");
    exit(); // Arrête l'exécution du script après la redirection
}

// Récupère les informations de l'utilisateur depuis la session
$utilisateur = $_SESSION['utilisateur'];
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Déclaration de l'encodage des caractères pour éviter les problèmes d'affichage -->
    <meta charset="UTF-8">

    <!-- Configuration du viewport pour un affichage responsive -->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- Compatibilité avec Internet Explorer -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dashboard</title>
</head>
<body>

<!-- Affiche un message de bienvenue avec le prénom et le nom de l'utilisateur -->
<h2>Bienvenue <?= htmlspecialchars($utilisateur['prenom']) ?> <?= htmlspecialchars($utilisateur['nom']) ?></h2>

<!-- Lien permettant à l'utilisateur de se déconnecter -->
<a href="logout.php">Se déconnecter</a>

</body>
</html>
