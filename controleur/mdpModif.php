<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.typecuisine.inc.php";
include_once "$racine/modele/bd.resto.inc.php";
include_once "$racine/modele/bd.aimer.inc.php";


$pseudoU = "";
$mailU = getMailULoggedOn();

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=profil","label"=>"Consulter mon profil");

function delAimerList($mailU, $idR) {
    $resultat = array();

    try {
        $cnx = connexionPDO();

    } catch (PDOException $e) {

    }
}

function generate_hash($password, $cost=11){
    $salt=substr(base64_encode(openssl_random_pseudo_bytes(17)),0,22);
    $salt=str_replace("+",".",$salt);
    $param='$'.implode('$',array(
            "2y",
            str_pad($cost,2,"0",STR_PAD_LEFT),
            $salt
        ));

    return crypt($password,$param);
}


// recuperation des donnees GET, POST et SESSION
//Changement de mot de passe
if (isset($_POST["new_passwd"]) && $_POST["new_passwd2"]) {
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
        if (empty($pseudoU == "")){
        $cnx = connexionPDO();
        $req = $cnx->prepare("UPDATE utilisateur SET pseudoU=:pseudoU WHERE mailU=:mailU");
        $req->bindValue(":pseudoU", $pseudoU, PDO::PARAM_STR);
        $req->bindValue(":mailU", $mailU, PDO::PARAM_STR);
        $req->execute();
        echo "Le pseudo a été mis à jour !";
    }
    } catch (PDOException $e) {
        echo "<h1> Erreur :" .$e->getMessage()."</h1>";
    }
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage
if (isLoggedOn()){
    $mailU = getMailULoggedOn();
    $util = getUtilisateurByMailU($mailU);

    $mesRestosAimes = getRestosAimesByMailU($mailU);

    $mesTypeCuisineAimes = getTypesCuisinePreferesByMailU($mailU);
    // traitement si necessaire des donnees recuperees


    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Modifier mon compte";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueMdpModif.php";
    include "$racine/vue/pied.html.php";
}
else{
    header("Location: ./");
}

