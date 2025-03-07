<?php
// Démarrage de la session pour accéder aux variables de session
session_start();

// Destruction de toutes les données de la session en cours
session_destroy();

// Redirection vers la page de connexion après la déconnexion
header("Location: login.php");
exit(); // Assure que le script s'arrête immédiatement après la redirection
