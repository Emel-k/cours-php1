<?php
/* Class voiture
    *Caractéristiques : marque, modéle, année état : en panne, reparée
    *on utilise :
    *des propriéte privees pour l'encapsulation
    *un constructeur pour initialiser les objets
    * des getters pour accéder aux données et des setters pour les modifier
 */

class Voiture {
    //propriétés privées
    private $marque;
    private $modele;
    private $annee;
    private $etat;


    //Constructeur : initialisation de la voiture

    public function __construct($marque, $modele, $annee, $etat = "en panne") {

        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->etat = $etat;
    }

    //Getter pour la marque
    public function getMarque()
    {
        return $this->marque;
    }
    public function getModele()
    {
        return $this->modele;
    }
    public function getAnnee()
    {
        return $this->annee;
    }
    public function getEtat()
    {
        return $this->etat;
    }

    //Setter pour modifier l'etat de la voiture

    public function setEtat($nouvelEtat){
        $this->etat =$nouvelEtat;
    }

    //Affichage des détails de la voiture
    public function afficerDetails(){
        echo"Voiture : " . $this->marque . " " . $this->modele . "(" . $this->annee . ")  - Etat : " . $this->etat . "<br>";
    }



}

/* Class Mécanicien
    *Caractéristiques : nom
    *on utilise :
    *un constructeur pour initialiser le mécanicien
    * une méthode pour réparer la voiture (changement d'etat de la voiture)
    * une methode pour afficher le nom du mécanicien
 */

class Mecanicien {
    //propriétés privées
    private $nom;

    //constructeur

    public function __construct($nom){
        $this->nom =$nom;
    }

    //Methode pour réparer une voiture. C'est le mécanicien qui répare la voiture

    public function reparerVoiture(Voiture $voiture){
        echo "Le mécanicien " . $this->nom . " répare la voiture : " . $voiture->getMarque() . "<br>";
        $voiture->setEtat("réparée");
    }

    //Methode pour afficher le nom du mécanicien
    public function afficherNom (){
        echo 'Mécanicien : ' . $this->nom . "<br>";
    }
}





//Exemple

//Création d'une voiture
$maVoiture = new Voiture ("Skoda", "Scala", 2020);

//Récuperer la marque de la voiture
$maMarqueVoiture = $maVoiture->getMarque();
//var_dump($maMarqueVoiture);

//Affichage des détails de la voiture
$maVoiture->afficerDetails();

//Création d'un mécanicien
$monMecanicien = new Mecanicien('Jean');

//Afficher le nom du ùécanicien
$monMecanicien->afficherNom();

//Le mécanicien répare la voiture
$monMecanicien->reparerVoiture($maVoiture);

//Affichage des détails de la voiture
$maVoiture->afficerDetails();