<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.resto.inc.php";
include_once "$racine/modele/bd.photo.inc.php";
include_once "$racine/modele/bd.critiquer.inc.php";
// recuperation des donnees GET, POST, et SESSION


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage
$listeRestos = getRestos();
$bestRestos = getRestosByScore();


// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Les 4 meilleurs restaurants";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueMeilleurResto.php";
include "$racine/vue/pied.html.php";
