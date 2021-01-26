<?php
//Data/FilmDAO
declare(strict_types = 1);


require_once __DIR__.'/DBConfig.php';
require_once __DIR__.'/../entities/Film.php';
require_once __DIR__.'/../entities/Categorie.php';
require_once __DIR__.'/../entities/Production.php';

use Exceptions\ActeurBestaatNietException;
use Exceptions\TitelBestaatException;

class FilmDAO {
    public function getAll(): Array {
        $sql = "select filmId, naam, jaar, duurtijd, hoofdacteur, hoofdactrice, gezien from films";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach($resultSet as $rij) {
            $film = new Film((int)$rij["filmId"], (string)$rij["naam"], $rij["jaar"], (string)$rij["duurtijd"], (string)$rij["hoofdacteur"], (string)$rij["hoofdactrice"], (bool)$rij["gezien"]);
            array_push($lijst, $film);
        }
        $dbh = null;
        return $lijst;
    }
    
    public function getById(int $id) {
        $sql = "select filmId, naam, jaar, duurtijd, hoofdacteur, hoofdactrice, gezien from films where filmId = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $film = new Film((int)$rij["filmId"], (string)$rij["naam"], $rij["jaar"], (string)$rij["duurtijd"], (string)$rij["hoofdacteur"], (string)$rij["hoofdactrice"], (bool)$rij["gezien"]);
        $dbh = null;
        return $film;
    }

    public function getByCategorie(int $id) : array {
        $sql = "select films.filmId, naam, jaar, duurtijd, hoofdacteur, hoofdactrice, gezien FROM films INNER JOIN filmcategorieen ON films.filmId = filmcategorieen.filmId where categorieId in (select categorieen.categorieId from categorieen where categorieen.categorieId = :id) order by naam";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $films = array();
        if ($resultSet) {
            foreach($resultSet as $rij) {
                $film = new Film((int)$rij["filmId"], (string)$rij["naam"], $rij["jaar"], (string)$rij["duurtijd"], (string)$rij["hoofdacteur"], (string)$rij["hoofdactrice"], (bool)$rij["gezien"]);
                array_push($films, $film);
            }
        }
        $dbh = null;
        return $films;
    }

    public function getByProduction(int $id) : array {
        $sql = "select films.filmId, naam, jaar, duurtijd, hoofdacteur, hoofdactrice, gezien FROM films INNER JOIN filmproductions ON films.filmId = filmproductions.filmId where productionId in (select productions.productionId from productions where productions.productionId = :id) order by naam";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $films = array();
        if ($resultSet) {
            foreach($resultSet as $rij) {
                $film = new Film((int)$rij["filmId"], (string)$rij["naam"], $rij["jaar"], (string)$rij["duurtijd"], (string)$rij["hoofdacteur"], (string)$rij["hoofdactrice"], (bool)$rij["gezien"]);
                array_push($films, $film);
            }
        }
        $dbh = null;
        return $films;
    }

    public function getRandom(int $quantity): array {
        $sql = "select filmId, naam, jaar, duurtijd, hoofdacteur, hoofdactrice, gezien FROM films order by RAND() limit :quantity";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_NUM);
        foreach ($data as $film) {
            list($filmId, $naam, $jaar, $duurtijd, $hoofdacteur, $hoofdactrice, $gezien) = $film;
            $films[$filmId] = new Film((int) $filmId, (string)$naam, $jaar, $duurtijd, (string)$hoofdacteur, (string)$hoofdactrice, (bool)$gezien);

        }
        $this->dbh = null;
        return $films;

    }

    public function create(string $naam, $jaar, string $duurtijd, string $hoofdacteur, string $hoofdactrice, bool $gezien, int $categorieId, int $productionId) {
        $bestaandFilm = $this->getByNaam($naam);
        if (!is_null($bestaandFilm)) {
            throw new TitelBestaatException();
        }

        $sql1 = "insert into films (naam, jaar, duurtijd, hoofdacteur, hoofdactrice, gezien) values (:naam, :jaar, :duurtijd, :hoofdacteur, :hoofdactrice, :gezien)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql1);
        $stmt->execute(array(':naam' => $naam, ':jaar' => $jaar, ':duurtijd' => $duurtijd, ':hoofdacteur' => $hoofdacteur, ':hoofdactrice' => $hoofdactrice, ':gezien' => $gezien));
        $filmId = $dbh->lastInsertId();
        $dbh = null;
        //$film = new Film ((int)$filmId, $naam, $jaar, $duurtijd, $hoofdacteur, $hoofdactrice, $gezien);
       // return $film;
        $sql = "insert into filmcategorieen (categorieId, filmId) values (:categorieId, :filmId)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':categorieId' => $categorieId, ':filmId' => $filmId));
        $dbh = null;
        $sql = "insert into filmproductions (filmId, productionId) values (:filmId, :productionId)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':filmId' => $filmId, ':productionId' => $productionId));
        $dbh = null;


    }

    public function getByNaam(string $naam) : ?Film {
        $sql = "select filmId, naam, jaar, duurtijd, hoofdacteur, hoofdactrice, gezien from films where naam = :naam";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':naam' =>$naam));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$rij) {
            return null;
        } else {
            $film = new Film ((int)$rij["filmId"], $rij["naam"], $rij["jaar"], $rij["duurtijd"], $rij["hoofdacteur"], $rij["hoofdactrice"], (bool)$rij["gezien"]);
            return $film;
        }
    }

    public function searchByNaam(string $hoofdacteur, string $hoofdactrice) : array {
        $sql = "select films.filmId, naam, jaar, duurtijd, hoofdacteur, hoofdactrice, gezien FROM films where hoofdacteur = :hoofdacteur or hoofdactrice = :hoofdactrice order by naam";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':hoofdacteur' => $hoofdacteur, ':hoofdactrice' => $hoofdactrice));
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$resultSet) {
            throw new ActeurBestaatNietException();
        } else {
            $films = array();
            foreach($resultSet as $rij) {
                $film = new Film((int)$rij["filmId"], (string)$rij["naam"], $rij["jaar"], (string)$rij["duurtijd"], (string)$rij["hoofdacteur"], (string)$rij["hoofdactrice"], (bool)$rij["gezien"]);
                array_push($films, $film);
            }
        }
        $dbh = null;
        return $films;
     
    }

    
}
