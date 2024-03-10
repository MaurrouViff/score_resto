<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/Authentification.php";

// Création d'une instance de Authentification
$authentification = new Authentification();

// Récupération des données GET, POST et SESSION

// Appel des fonctions permettant de récupérer les données utiles à l'affichage

// Traitement si nécessaire des données récupérées
$authentification->logout();

// Appel du script de vue qui permet de gérer l'affichage des données
$titre = "Authentification";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueAuthentification.php";
include "$racine/vue/pied.html.php";

