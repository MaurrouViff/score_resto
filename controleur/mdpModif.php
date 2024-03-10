<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/Authentification.php";
include_once "$racine/modele/Utilisateur.php";
include_once "$racine/modele/Resto.php";
include_once "$racine/modele/Aimer.php";
include_once "$racine/modele/TypeCuisine.php";
$idR = $_GET["idR"];
$aimer = new Aimer();
$authentification = new Authentification();
$typeCuisine = new TypeCuisine();
$mailU = $authentification->getMailULoggedOn();



$listeDesCuisine = $typeCuisine->getTypesCuisine();
$pseudoU = "";
$lesTypesCuisine = $typeCuisine->getTypesCuisineByIdR($idR);

// Création du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=profil","label"=>"Consulter mon profil");

// Récupération des données GET, POST et SESSION
// Changement de mot de passe
if (isset($_POST["new_passwd"]) && isset($_POST["new_passwd2"])) {
    $mdpU = $_POST["new_passwd"];
    $mdpU2 = $_POST["new_passwd2"];
    if ($mdpU == $mdpU2) {
        $resultat = array();
        try {
            $cnx = connexionPDO();
            $mdpUCrypt = crypt($mdpU, "sel");
            $req = $cnx->prepare("UPDATE utilisateur SET mdpU=:mdpU WHERE mailU=:mailU");
            $req->bindValue(":mdpU", $mdpUCrypt, PDO::PARAM_STR);
            $req->bindValue(":mailU", $mailU, PDO::PARAM_STR);
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}

// Changement de pseudo
if (isset($_POST["pseudoU"])) {
    $pseudoU = $_POST["pseudoU"];
    try {
        if (empty($pseudoU == "")) {
            $cnx = connexionPDO();
            $req = $cnx->prepare("UPDATE utilisateur SET pseudoU=:pseudoU WHERE mailU=:mailU");
            $req->bindValue(":pseudoU", $pseudoU, PDO::PARAM_STR);
            $req->bindValue(":mailU", $mailU, PDO::PARAM_STR);
            $req->execute();
            echo "Le pseudo a été mis à jour !";
        }
    } catch (PDOException $e) {
        echo "<h1> Erreur :" . $e->getMessage() . "</h1>";
    }
}

// Appel des fonctions permettant de récupérer les données utiles à l'affichage
if ($authentification->isLoggedOn()) {

    $mailU = $authentification->getMailULoggedOn();
    $utilisateur = new Utilisateur();
    $util = $utilisateur->getUtilisateurByMailU($mailU);

    $resto = new Resto();
    $mesRestosAimes = $resto->getRestosAimesByMailU($mailU);

    $typeCuisine = new TypeCuisine();
    $mesTypeCuisineAimes = $typeCuisine->getTypesCuisinePreferesByMailU($mailU);

    // Traitement si nécessaire des données récupérées

    // Appel du script de vue qui permet de gérer l'affichage des données
    $titre = "Modifier mon compte";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueMdpModif.php";
    include "$racine/vue/pied.html.php";
} else {
    header("Location: ./");
}
