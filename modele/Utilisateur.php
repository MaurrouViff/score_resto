<?php
include_once "Database.php";
class Utilisateur extends Database {
    public function getUtilisateurs() {
        $resultat = array();
        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("SELECT * FROM utilisateur");
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getUtilisateurByMailU($mailU) {
        $resultat = array();
        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("SELECT * FROM utilisateur WHERE mailU=:mailU");
            $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function addUtilisateur($mailU, $mdpU, $pseudoU) {
        $resultat = false;
        try {
            $cnx = $this->getConnection();

            $mdpUCrypt = crypt($mdpU, "sel");
            $req = $cnx->prepare("INSERT INTO utilisateur (mailU, mdpU, pseudoU) VALUES (:mailU, :mdpU, :pseudoU)");
            $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
            $req->bindValue(':mdpU', $mdpUCrypt, PDO::PARAM_STR);
            $req->bindValue(':pseudoU', $pseudoU, PDO::PARAM_STR);

            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Programme principal de test
    header('Content-Type:text/plain');

    // Création de l'instance de la classe Utilisateur
    $utilisateur = new Utilisateur();

    // Test de la méthode getUtilisateurs
    echo "getUtilisateurs() : \n";
    print_r($utilisateur->getUtilisateurs());

    // Test de la méthode getUtilisateurByMailU
    echo "getUtilisateurByMailU(\"mathieu.capliez@gmail.com\") : \n";
    print_r($utilisateur->getUtilisateurByMailU("mathieu.capliez@gmail.com"));

    // Test de la méthode addUtilisateur
    echo "addUtilisateur('mathieu.capliez3@gmail.com', 'azerty', 'mat') : \n";
    print_r($utilisateur->addUtilisateur("mathieu.capliez3@gmail.com", "azerty", "mat"));
}

