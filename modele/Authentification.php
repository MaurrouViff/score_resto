<?php
include_once 'Utilisateur.php';
class Authentification extends Utilisateur  {
    public function login($mailU, $mdpU) {
        if (!isset($_SESSION)) {
            session_start();
        }

        $util = $this->getUtilisateurByMailU($mailU);
        $mdpBD = ($util) ? $util["mdpU"] : "faux";

        if (trim($mdpBD) == trim(crypt($mdpU, $mdpBD))) {
            // le mot de passe est celui de l'utilisateur dans la base de données
            $_SESSION["mailU"] = $mailU;
            $_SESSION["mdpU"] = $mdpBD;
        }
    }

    public function logout() {
        if (!isset($_SESSION)) {
            session_start();
        }
        unset($_SESSION["mailU"]);
        unset($_SESSION["mdpU"]);
    }

    public function getMailULoggedOn() {
        if ($this->isLoggedOn()) {
            return $_SESSION["mailU"];
        } else {
            return "";
        }
    }

    public function isLoggedOn() {
        if (!isset($_SESSION)) {
            session_start();
        }

        $ret = false;

        if (isset($_SESSION["mailU"])) {
            $util = $this->getUtilisateurByMailU($_SESSION["mailU"]);
            if ($util["mailU"] == $_SESSION["mailU"] && $util["mdpU"] == $_SESSION["mdpU"]) {
                $ret = true;
            }
        }

        return $ret;
    }
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Programme principal de test
    header('Content-Type:text/plain');

    // Création de l'instance de la classe Authentification
    $auth = new Authentification();

    // Test de connexion
    $auth->login("test@bts.sio", "sio");
    if ($auth->isLoggedOn()) {
        echo "logged";
    } else {
        echo "not logged";
    }

    // Déconnexion
    $auth->logout();
}
