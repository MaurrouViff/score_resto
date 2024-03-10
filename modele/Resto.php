<?php

class Resto extends Database {
    public function getRestoByIdR($idR) {
        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("SELECT * FROM resto WHERE idR = :idR");
            $req->bindValue(':idR', $idR, PDO::PARAM_INT);

            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getRestos() {
        $resultat = array();

        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("SELECT * FROM resto");
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getRestosByNomR($nomR) {
        $resultat = array();

        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("SELECT * FROM resto WHERE nomR LIKE :nomR");
            $req->bindValue(':nomR', "%".$nomR."%", PDO::PARAM_STR);

            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getRestosByAdresse($voieAdrR, $cpR, $villeR) {
        $resultat = array();

        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("SELECT * FROM resto WHERE voieAdrR LIKE :voieAdrR AND cpR LIKE :cpR AND villeR LIKE :villeR");
            $req->bindValue(':voieAdrR', "%".$voieAdrR."%", PDO::PARAM_STR);
            $req->bindValue(':cpR', $cpR."%", PDO::PARAM_STR);
            $req->bindValue(':villeR', "%".$villeR."%", PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getRestosAimesByMailU($mailU) {
        $resultat = array();

        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("SELECT resto.* FROM resto, aimer WHERE resto.idR = aimer.idR AND mailU = :mailU");
            $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getRestosByScore($idR) {
        $resultat = array();

        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("SELECT * FROM resto WHERE idR = 1 OR idR = 2 OR idR = 3 OR idR = 4");
            $req->bindValue(':idR', $idR, PDO::PARAM_INT);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getRestoByType($type) {
        $resultat = array();

        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("SELECT r.* FROM resto r, proposer p WHERE r.idR = p.idR AND p.idTC = :idTC");
            $req->bindValue(':idTC', $type, PDO::PARAM_INT);
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

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

    // Création de l'instance de la classe Resto
    $resto = new Resto();


    echo "getRestos() : \n";
    print_r($resto->getRestos());

    // Test de la méthode getRestoByIdR
    echo "getRestoByIdR(1) : \n";
    print_r($resto->getRestoByIdR(1));

    // Test de la méthode getRestosByNomR
    echo "getRestosByNomR('charcut') : \n";
    print_r($resto->getRestosByNomR("charcut"));

    // Test de la méthode getRestosBy
}