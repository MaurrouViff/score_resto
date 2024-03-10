<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/Utilisateur.php";

// Création d'une instance de la classe Utilisateur
$utilisateur = new Utilisateur();
$authentification = new Authentification();
// Création du menu burger
$menuBurger = array();
$menuBurger[] = Array("url" => "./?action=connexion", "label" => "Connexion");
$menuBurger[] = Array("url" => "./?action=inscription", "label" => "Inscription");

$inscrit = false;
$msg = "";

// Récupération des données GET, POST et SESSION
if (isset($_POST["mailU"]) && isset($_POST["mdpU"]) && isset($_POST["pseudoU"])) {

    if ($_POST["mailU"] != "" && $_POST["mdpU"] != "" && $_POST["pseudoU"] != "") {
        $mailU = $_POST["mailU"];
        $mdpU = $_POST["mdpU"];
        $pseudoU = $_POST["pseudoU"];

        // Enregistrement des données
        $ret = $utilisateur->addUtilisateur($mailU, $mdpU, $pseudoU);
        if ($ret) {
            $inscrit = true;
        } else {
            $msg = "L'utilisateur n'a pas été enregistré.";
        }
    } else {
        $msg = "Renseigner tous les champs...";
    }
}

if ($inscrit) {
    // Appel du script de vue qui permet de gérer l'affichage des données
    $titre = "Inscription confirmée";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueConfirmationInscription.php";
    include "$racine/vue/pied.html.php";
} else {
    // Appel du script de vue qui permet de gérer l'affichage des données
    $titre = "Inscription problème";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueInscription.php";
    include "$racine/vue/pied.html.php";
}
