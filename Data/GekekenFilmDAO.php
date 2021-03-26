<?php
//Data/GekekenFilmDAO
declare(strict_types = 1);

require_once __DIR__.'/DBConfig.php';
require_once __DIR__.'/../entities/GekekenFilm.php';
require_once __DIR__.'/../entities/Film.php';
require_once __DIR__.'/../entities/Persoon.php';


use Exceptions\AlGezienException;

class GekekenFilmDAO {
    public function getAllByPersoon($gebruikersAccountId) : Array {
        $sql = "select gezienId, filmId, gezien.gebruikersAccountId, gezien from gezien join gebruikersaccounts on gebruikersaccounts.gebruikersAccountId = gezien.gebruikersAccountId where gebruikersaccounts.gebruikersAccountId = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $gebruikersAccountId));
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $gekekenfilms = array();
        if ($resultSet) {
            foreach($resultSet as $rij) {
                $gekekenfilm = new gekekenFilm((int)$rij["gezienId"], (int)$rij["filmId"], (int)$rij["gebruikersAccountId"], (bool)$rij["gezien"]);
                array_push($gekekenfilms, $gekekenfilm);
            }
        }
        $dbh = null;
        return $gekekenfilms;
    }


    public function create($filmId, $gebruikersAccountId, $gezien) {
        $sql = "select gezienId, filmId, gebruikersAccountId, gezien from gezien where filmId = :id and gebruikersAccountId = :gebruikersAccountId";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $filmId, ':gebruikersAccountId' => $gebruikersAccountId));
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
        if ($resultSet) {
            throw new AlGezienException();
        } 

        $sql = "insert into gezien (filmId, gebruikersAccountId, gezien) values (:filmId, :gebruikersAccountId, :gezien)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':filmId' => $filmId, ':gebruikersAccountId' => $gebruikersAccountId, ':gezien' => $gezien));
        $gezienId = $dbh->lastInsertId();
        $dbh = null;
        $gekekenfilm = new GekekenFilm((int)$gezienId, (int)$filmId, (int)$gebruikersAccountId, (bool)$gezien);
        return $gekekenfilm;

    }

    


    public function GetAll(): Array {
        $sql ="select gezienId, filmId, gebruikersAccountId, gezien from gezien";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $gekekenfilms = array();
        if ($resultSet) {
            foreach($resultSet as $rij) {
                $gekekenfilm = new gekekenFilm((int)$rij["gezienId"], (int)$rij["filmId"], (int)$rij["gebruikersAccountId"], (bool)$rij["gezien"]);
                array_push($gekekenfilms, $gekekenfilm);
            }
        }
        $dbh = null;
        return $gekekenfilms;
    }

    public function getByFilmId(int $filmId) {
        $sql ="select gezienId, filmId, gebruikersAccountId, gezien from gezien where filmId = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $filmId));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $gekekenfilm = new GekekenFilm((int)$rij["gezienId"], (int)$rij["filmId"], (int)$rij["gebruikersAccountId"], (bool)$rij["gezien"]);
        $dbh = null;
        return $gekekenfilm;
    }
}
