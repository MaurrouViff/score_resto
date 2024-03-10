<?php
include_once "modele/TypeCuisine.php";
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

$authentification = new Authentification();
$typeCuisine = new TypeCuisine();
$mailU = $authentification->getMailULoggedOn();
$idTC = $_GET["idCuisine"];


if (isset($_POST["confirmer"])) {
    $typeCuisine->addTypeCuisine($idTC, $mailU);
} else {
    echo "Déjà ajouté !";
}


// redirection vers le referer
header('Location: ' . $_SERVER['HTTP_REFERER']);