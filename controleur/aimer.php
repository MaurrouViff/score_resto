<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/Aimer.php";
$authentification = new Authentification();
$aimerManager = new Aimer();

// recuperation des donnees GET, POST, et SESSION
$idR = $_GET["idR"];


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage



$mailU = $authentification->getMailULoggedOn();
if ($mailU != "") {
    $aimer = $aimerManager->getAimerById($mailU, $idR);

// traitement si necessaire des donnees recuperees
    ;
    if ($aimer == false) {
        $aimerManager->addAimer($mailU, $idR);
    } else {
        $aimerManager->delAimer($mailU, $idR);
    }
}

// redirection vers le referer
header('Location: ' . $_SERVER['HTTP_REFERER']);
