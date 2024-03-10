<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/Resto.php";
include_once "$racine/modele/Photo.php";
include_once "$racine/modele/Critiquer.php";

// Création d'une instance de la classe Resto
$resto = new Resto();
$authentification = new Authentification();
// Récupération des données GET, POST et SESSION

// Appel des fonctions permettant de récupérer les données utiles à l'affichage
$listeRestos = $resto->getRestos();
$bestRestos = $resto->getRestosByScore();

// Traitement si nécessaire des données récupérées

// Appel du script de vue qui permet de gérer l'affichage des données
$titre = "Les 4 meilleurs restaurants";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueMeilleurResto.php";
include "$racine/vue/pied.html.php";
