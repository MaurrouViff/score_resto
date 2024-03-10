<?php

include "getRacine.php";
include "$racine/controleur/controleurPrincipal.php";
include_once "$racine/modele/Authentification.php"; // pour pouvoir utiliser isLoggedOn()

$controller = new MainController();

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "defaut";
}

$fichier = $controller->execute($action);
include "$racine/controleur/$fichier";