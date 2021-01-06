<?php
//Data/GenreDAO
declare(strict_types = 1);


require_once __DIR__ . '/DBConfig.php';
require_once __DIR__ . '/../entities/Categorie.php';


class CategorieDAO {
    public function getAll(): Array {
        $sql = "select categorieId, naam from categorieen";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach($resultSet as $rij) {
            $categorie = Categorie::create((int)$rij["categorieId"], $rij["naam"]);
            array_push($lijst, $categorie);
        }
        $dbh = null;
        return $lijst;
    }

    public function getById(int $id) {
        $sql = "select categorieId, naam from categorieen where categorieId = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$rij) {
            return null;
        } else {
        $categorie = new Categorie((int)$rij["categorieId"], (string)$rij["naam"]);
        $dbh = null;
        return $categorie;
        }

        
    }
}