<?php
include_once "modele/Critiquer.php";
session_start();
$critiquer = new Critiquer();
if (isset($_GET["idR"])) {
    $idR = $_GET["idR"];

    if (isset($_SESSION["mailU"])) {
        $mailU = $_SESSION["mailU"];

    } else {
        $mailU = $_COOKIE["mailU"];
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    };

    $critiquer->delCritique($idR, $mailU);
    header("Location: " . $_SERVER["HTTP_REFERER"]);

} else {
    $msg = "Erreur aucune critique n'a été supprimée ! ";
}
