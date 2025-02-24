<?php

echo "Hello World!";


//Les variables

//Variable
$maVarible = "Hello";

//Constante
define('PRENOM', "Emel"); // ancienne methode

const AGE = 27;

//Chaine de caractere

$chaine = "Je suis l'une des chaines de caractères";
echo $chaine . "<br/>";

//Interpolation (comme la concaténation sauf qu'on utilise "")

$interpolation = "Chaine précèdente : $chaine"; // permet d'appeler la variable contraire à js ou il faut ${} mais si on met des simple quote ne pas oublier de mettre un anti /

//Booléen
$boolean = false; //or true

//Les tableaux


//Tableau indexé

$array = ["cooucou","je", 546, true];
print_r($array);

echo "Le troisieme élément du tableau est : " . $array[2] . "<br>";

//Tableau associatif (similaire objet JS)

$object = [
        "prenom" => "Emel",
        "age" => 27,
        "ville" => "Blois"
];

print_r($object);
echo "Ville : " . $object["ville"] . "<br/>";

//Les opérateurs arithméthiques

echo "Addition" . (4+8). "<br>";

//Les puissances

echo "Puissance" . (4**8) . "<br>";
echo "Puissance" . pow(4,5). "<br>";

//Les opérateurs d'affection

$total = 0;
echo "Total : $total<br>";

$total = $total + 1;
echo "Total : $total<br>";

$total++;
echo "Total : $total<br>";

$total += 4;
echo "Total : $total <br>";

//Les structures de contrôle (conditions)

$x = 4;
$y = 3;

if($x > $y){
    echo "X est plus grand que Y<br>";
}elseif ($x < $y){
    echo "Y est plusgrand que X<br>";
}else {
    echo "X et Y sont égaux<br>";
}

$bool = false;
if ($bool){
    echo " Bool est vrai";
}else {
    echo " Bool est faux";
}

if(!$bool){
    echo " Bool est faux mais l'inverse est vrai<br>";
}

//Comparaison

if ($x == $y) {
    echo "X et Y sont égaux en valeur<br>";
}

$x = 4;
$y = "4";
//On teste l'égalité en valeur et en type
if($x !== $y){
    echo "X et y sont différents en type (ou en valeur)<br>";
}

//Les opérateurs logiques ( || et &&)

if ($x < $y && $x >3){
    echo "Les deux conditions qont remplies<br>";
}

//Les structures itératives (Boucles)

for($i = 0; $i< 10; $i++){
    echo "i = $i<br>";
}
//Création d'un tableau avec la boucles for

$tabBoucle = [];
for ($i = 0; $i< 10; $i++ ){
    $tabBoucle[] = $i * 2;
}

print_r($tabBoucle);

// le console.log() sur php est var_dump()

//Lecteur du tableau avec foreach

foreach($tabBoucle as $valeur){
    echo "Valeur du tableau : $valeur<br>";
}

// les fonctions

//Déclarer une fonction

function maFunction() {
    echo "Ceci est une fonction";
}

maFunction();

//Fonction avec retour de valeur

function returnFunction() {
    $message = " coucou<br>";
    return $message;
}
$retour = returnFunction();
echo $retour;

// fonction annonyme

$returnFunction2 = function () {
    return "Fonction anonyme";
};

$retour2 = $returnFunction2();
echo "Retour de la focntion anonyme : $retour2<br>";


// Les fonction fléchées

$addition = fn($a, $b) => $a + $b;
echo "addition : " . $addition(2,6) . "<br>";








