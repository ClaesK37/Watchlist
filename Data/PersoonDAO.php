<?php
//Data/PersoonDAO
declare(strict_types = 1);


require_once __DIR__.'/DBConfig.php';
require_once __DIR__.'/../entities/Persoon.php';


class PersoonDAO {

    public function getById(int $persoonId) {
        $sql ="select persoonId, voornaam, familienaam, gebruikersAccountId, favorietGenre, favorietFilm from personen where persoonId = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $persoonId));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $persoon = new Persoon((int)$rij["persoonId"], (string)$rij["voornaam"], (string)$rij["familienaam"], (int)$rij["gebruikersAccountId"], (string)$rij["favorietGenre"], (string)$rij["favorietFilm"]);
        $dbh = null;
        return $persoon;
    }

    public function getByAccountId(int $gebruikersAccountId) {
        $sql ="select personen.persoonId, voornaam, familienaam, personen.gebruikersAccountId, favorietGenre, favorietFilm from personen join gebruikersaccounts on gebruikersaccounts.gebruikersAccountId = personen.gebruikersAccountId where gebruikersaccounts.gebruikersAccountId = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $gebruikersAccountId));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $persoon = new Persoon((int)$rij["persoonId"], (string)$rij["voornaam"], (string)$rij["familienaam"], (int)$rij["gebruikersAccountId"], (string)$rij["favorietGenre"], (string)$rij["favorietFilm"]);
        $dbh = null;
        return $persoon;
       
    }

    public function create($voornaam, $familienaam, $gebruikersAccountId, $favorietGenre, $favorietFilm) {
        $sql = "insert into personen (voornaam, familienaam, gebruikersAccountId, favorietGenre, favorietFilm) values (:voornaam, :familienaam, :gebruikersAccountId, :favorietGenre, :favorietFilm)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':voornaam' => $voornaam, ':familienaam' => $familienaam, ':gebruikersAccountId' => $gebruikersAccountId, ':favorietGenre' => $favorietGenre, ':favorietFilm' => $favorietFilm));
        $dbh = null;
    }

}