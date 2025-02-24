<?php

//Démmarage de la session $_SESSION
session_start();

//Verification de la soumission du formulaire via la méthode post

if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
    // $name = $_POST['name'];
    //$name = isset($_POST['name']);
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";

    //Vérification que le champ n'est pas vide
    if ($name !== '') {
        //Stockage dans la session
        $_SESSION['message'] = "Merci $name ! ";

        //Redirection vers la même page
        header("Location: form.php"); //ne pas mettre d'espace entre location et les deux petits points
        exit();
    }else {
        //Message d'erreur
        $_SESSION['message'] = "Veuillez indiquer votre nom! ";

    }


}




?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intro ; Formulaire et session PHP</title>
</head>
<body>
<?php
//Affichage du message stocké en session s'il existe

if (isset($_SESSION['message'])) {
    echo "<p>" . htmlspecialchars($_SESSION['message']) . "</p>";
    unset($_SESSION['message']);
}

?>
<form action="form.php" method="post">
    <label for="name"> Nom</label>
        <input type="text" id="name" name="name" required>
    <button type="submit">Envoyer</button>
</form>
</body>
</html>