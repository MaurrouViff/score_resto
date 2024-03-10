<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/Resto.php";
include_once "$racine/modele/Photo.php";

// recuperation des donnees GET, POST, et SESSION
$authentification = new Authentification();
// appel des fonctions permettant de recuperer les donnees utiles a l'affichage
$restoManager = new Resto();
$photoManager = new Photo();
$listeRestos = $restoManager->getRestos();

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Liste des restaurants répertoriés";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueListeRestos.php";
include "$racine/vue/pied.html.php";


?>