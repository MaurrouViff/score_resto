<?php

class Photo extends Database {
    public function getPhotosByIdR($idR) {
        $resultat = array();

        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("select * from photo where idR=:idR");
            $req->bindValue(':idR', $idR, PDO::PARAM_INT);

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
    // Programmation de test
    header('Content-Type:text/plain');

    $photoDb = new Photo();

    echo "\n getPhotosByIdR(1) : \n";
    print_r($photoDb->getPhotosByIdR(1));
}
