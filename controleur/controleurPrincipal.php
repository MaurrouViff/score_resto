<?php

class MainController {

    private $actions;

    public function __construct() {
        $this->actions = array(
            "defaut" => "listeRestos.php",
            "liste" => "listeRestos.php",
            "detail" => "detailResto.php",
            "recherche" => "rechercheResto.php",
            "connexion" => "connexion.php",
            "deconnexion" => "deconnexion.php",
            "profil" => "monProfil.php",
            "cgu" => "cgu.php",
            "inscription" => "inscription.php",
            "updProfil" => "mdpModif.php",
            "listeMeilleursResto" => "meilleurResto.php",
            "aimer" => "aimer.php",
            "supprimerCritique" => "delCritique.php",
            "delResto" => "aimer.php",
            "delCuisine" => "deltypeCuisine.php",
            "addCuisine" => "addCuisine.php"
        );
    }

    public function execute($action) {
        if (array_key_exists($action, $this->actions)) {
            return $this->actions[$action];
        } else {
            return $this->actions["defaut"];
        }
    }
}

$controller = new MainController();
$action = "detail";
$page = $controller->execute($action);