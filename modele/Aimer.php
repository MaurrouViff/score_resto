<?php

class Aimer extends Database {
    public function getAimerById($mailU, $idR) {
        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("SELECT * FROM aimer WHERE mailU = :mailU AND idR = :idR");
            $req->bindValue(':idR', $idR, PDO::PARAM_INT);
            $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);

            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function addAimer($mailU, $idR) {
        $resultat = -1;
        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("INSERT INTO aimer (mailU, idR) VALUES (:mailU, :idR)");
            $req->bindValue(':idR', $idR, PDO::PARAM_INT);
            $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);

            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function delAimer($mailU, $idR) {
        $resultat = -1;
        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("DELETE FROM aimer WHERE idR = :idR AND mailU = :mailU");
            $req->bindValue(':idR', $idR, PDO::PARAM_INT);
            $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);

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

    // Création de l'instance de la classe Aimer
    $aimer = new Aimer();

    // Test de la méthode getAimerById
    echo "\n getAimerById(mailU, idR) : \n";
    print_r($aimer->getAimerById("mathieu.capliez@gmail.com", 1));

    // Test de la méthode addAimer
    echo "\n addAimer(\"mathieu.capliez@gmail.com\",1) : \n";
    print_r($aimer->addAimer("mathieu.capliez@gmail.com", 1));
}
