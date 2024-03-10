<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/Resto.php";
include_once "$racine/modele/TypeCuisine.php";
include_once "$racine/modele/Photo.php";
include_once "$racine/modele/Critiquer.php";
include_once "$racine/modele/Aimer.php";
include_once "$racine/modele/Authentification.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"#top","label"=>"Le restaurant");
$menuBurger[] = Array("url"=>"#adresse","label"=>"Adresse");
$menuBurger[] = Array("url"=>"#photos","label"=>"Photos");
$menuBurger[] = Array("url"=>"#horaires","label"=>"Horaires");
$menuBurger[] = Array("url"=>"#crit","label"=>"Critiques");

$restoManager = new Resto();
$typeCuisineManager = new TypeCuisine();
$photoManager = new Photo();
$critiquerManager = new Critiquer();
$aimerManager = new Aimer();
$authentification = new Authentification();

// recuperation des donnees GET, POST, et SESSION
$idR = $_GET["idR"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$unResto = $restoManager->getRestoByIdR($idR);

$lesTypesCuisine = $typeCuisineManager->getTypesCuisineByIdR($idR);
$lesPhotos = $photoManager->getPhotosByIdR($idR);
$noteMoy = round($critiquerManager->getNoteMoyenneByIdR($idR), 0);
$mailU = $authentification->getMailULoggedOn();
$aimer = $aimerManager->getAimerById($mailU, $idR);
$critiques = $critiquerManager->getCritiquerByIdR($idR);



// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "detail d'un restaurant";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueDetailResto.php";
include "$racine/vue/pied.html.php";
