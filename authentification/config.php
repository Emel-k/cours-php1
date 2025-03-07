<?php
// Définition des informations de connexion à la base de données
$host = "localhost:3306";  // Adresse du serveur MySQL (localhost avec le port 3306)
$dbname = "briefphp";      // Nom de la base de données
$username = "root";        // Nom d'utilisateur MySQL (par défaut "root" sur MAMP/XAMPP)
$password = "root";        // Mot de passe MySQL (par défaut "root" sur MAMP, vide sur XAMPP)

try {
    // Création d'une connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Configuration de PDO pour afficher les erreurs sous forme d'exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Si une erreur se produit, afficher un message et arrêter le script
    die("Erreur de connexion : " . $e->getMessage());
}
