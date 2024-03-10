<?php

class TypeCuisine extends Database {
    public function getTypesCuisine() {
        $resultat = array();

        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("SELECT * FROM typeCuisine");
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getTypesCuisinePreferesByMailU($mailU) {
        $resultat = array();

        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("SELECT typeCuisine.* FROM typeCuisine,preferer WHERE typeCuisine.idTC = preferer.idTC AND preferer.mailU = :mailU");
            $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getTypesCuisineNonPreferesByMailU($mailU) {
        $resultat = array();

        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("SELECT * FROM typeCuisine WHERE idTC NOT IN (SELECT typeCuisine.idTC FROM typeCuisine,preferer WHERE typeCuisine.idTC = preferer.idTC AND preferer.mailU = :mailU)");
            $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getTypesCuisineByIdR($idR) {
        $resultat = array();

        try {
            $cnx = $this->getConnection();
            $req = $cnx->prepare("SELECT typeCuisine.* FROM typeCuisine,proposer WHERE typeCuisine.idTC = proposer.idTC AND proposer.idR = :idR");
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
    // Programme principal de test
    header('Content-Type:text/plain');

    // Création de l'instance de la classe TypeCuisine
    $typeCuisine = new TypeCuisine();

    // Test de la méthode getTypesCuisine
    echo "getTypesCuisine() : \n";
    print_r($typeCuisine->getTypesCuisine());

    // Test de la méthode getTypesCuisinePreferesByMailU
    echo "getTypesCuisinePreferesByMailU(mailU) : \n";
    print_r($typeCuisine->getTypesCuisinePreferesByMailU("test@bts.sio"));

    // Test de la méthode getTypesCuisineNonPreferesByMailU
    echo "getTypesCuisineNonPreferesByMailU(mailU) : \n";
    print_r($typeCuisine->getTypesCuisineNonPreferesByMailU("test@bts.sio"));

    // Test de la méthode getTypesCuisineByIdR
    echo "getTypesCuisineByIdR(idR) : \n";
    print_r($typeCuisine->getTypesCuisineByIdR(4));
}
