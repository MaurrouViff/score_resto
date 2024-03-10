<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}


$authentification = new Authentification();
$typeCuisine = new TypeCuisine();
$mailU = $authentification->getMailULoggedOn();
$aimerCuisine = $typeCuisine->getTypesCuisinePreferesByMailU($mailU);
$idTC = $_GET["idR"];



if ($aimerCuisine) {
    $typeCuisine->delTypeCuisine($idTC, $mailU);
} else {
    echo "Impossible à supprimer !";
}


// redirection vers le referer
header('Location: ' . $_SERVER['HTTP_REFERER']);
