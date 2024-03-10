<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/Authentification.php";
include_once "$racine/modele/Utilisateur.php";
include_once "$racine/modele/TypeCuisine.php";
include_once "$racine/modele/Resto.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=profil","label"=>"Consulter mon profil");
$menuBurger[] = Array("url"=>"./?action=updProfil","label"=>"Modifier mon profil");
$authentification = new Authentification();
$utilisateur = new Utilisateur();
$restoManager = new Resto();
$typeCuisine = new TypeCuisine();
// recuperation des donnees GET, POST et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
if ($authentification->isLoggedOn()){
    $mailU = $authentification->getMailULoggedOn();
    $util = $utilisateur->getUtilisateurByMailU($mailU);
    
    $mesRestosAimes = $restoManager->getRestosAimesByMailU($mailU);
    
    $mesTypeCuisineAimes = $typeCuisine->getTypesCuisinePreferesByMailU($mailU);
    // traitement si necessaire des donnees recuperees


    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Mon profil";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueMonProfil.php";
    include "$racine/vue/pied.html.php";
}
else{
    $titre = "Mon profil";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pied.html.php";
}
