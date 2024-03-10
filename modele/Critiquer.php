<?php

class Critiquer extends Database {
    public function getCritiquerByIdR($idR) {
        $resultat = array();

        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("select * from critiquer where idR=:idR");
            $req->bindValue(':idR', $idR, PDO::PARAM_INT);

            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getNoteMoyenneByIdR($idR) {
        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("select avg(note) from critiquer where idR=:idR");
            $req->bindValue(':idR', $idR, PDO::PARAM_INT);

            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return ($req->rowCount() > 0) ? $resultat["avg(note)"] : 0;
    }

    public function addCritique($idR, $mailU, $note, $critiquer) {
        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("insert into critiquer(idR, mailU, note, commentaire) values(:idR, :mailU, :note, :critiquer)");
            $req->bindValue(':idR', $idR, PDO::PARAM_INT);
            $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
            $req->bindValue(':critiquer', $critiquer, PDO::PARAM_STR);
            $req->bindValue(':note', $note, PDO::PARAM_INT);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function delCritique($idR, $mailU) {

        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("delete from critiquer where idR=:idR and mailU=:mailU");
            $req->bindValue(':idR', $idR,PDO::PARAM_INT);
            $req->bindValue(':mailU', $mailU,PDO::PARAM_STR);

            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }

    }

}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Programmation de test
    header('Content-Type:text/plain');

    $critiquerDb = new Critiquer();

    echo "\n getCritiquerByIdR(1) : \n";
    print_r($critiquerDb->getCritiquerByIdR(1));

    echo "\n getNoteMoyenneByIdR(1) : \n";
    print_r($critiquerDb->getNoteMoyenneByIdR(1));
}
