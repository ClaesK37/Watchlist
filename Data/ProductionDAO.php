<?php
//Data/GenreDAO
declare(strict_types = 1);

require_once __DIR__ . '/DBConfig.php';
require_once __DIR__ . '/../entities/Production.php';

use Exceptions\ProductionBestaatException;

class ProductionDAO {
    public function getAll(): Array {
        $sql = "select productionId, director from productions order by director";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        $lijst = array();
        foreach($resultSet as $rij) {
            $production = new Production((int)$rij["productionId"], $rij["director"]);
            array_push($lijst, $production);
        }
        $dbh = null;
        return $lijst;
    }

    public function paginaVerdeling(): Array {

        if (isset($_GET["page"]) && $_GET["page"]!="") {
            $page = $_GET["page"];
        } else {
            $page = 1;
        }
        $totaalPerPagina = 8;
        $offset = ($page-1) * $totaalPerPagina;
        $previous = $page - 1;
        $next = $page + 1;
        $adjacents = "2";
        $sql = "select * from productions";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->query($sql);
        $totalRecords = $stmt->rowcount();
        $totaalPaginas = ceil($totalRecords / $totaalPerPagina);
        $second_last = $totaalPaginas - 1;
      
       // var_dump($totaalPerPagina);
       // var_dump($totalRecords);
        //var_dump($totaalPaginas);

        $sql2 = "select * from productions limit $offset, $totaalPerPagina";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql2);
        $lijst = array();
        foreach($resultSet as $rij) {
            $production = new Production((int)$rij["productionId"], $rij["director"]);
            array_push($lijst, $production);
        }
        $dbh = null;
        return $lijst;      
    }

    public function getById(int $id) {
        $sql = "select productionId, director from productions where productionId = :id";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$rij) {
            return null;
        } else {
        $production = new Production((int)$rij["productionId"], (string)$rij["director"]);
        $dbh = null;
        return $production;
        }

        
    }

    public function create(string $naam) {
        $bestaandeProduction = $this->getbyName($naam);
        if (!is_null($bestaandeProduction)) {
            throw new ProductionBestaatException();
        }
    
        $sql = "insert into productions (director) values (:director)";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':director' => $naam));
        $productionId = $dbh->lastInsertId();
        $dbh = null;
        $production = new Production((int)$productionId, $naam);
        return $production;
    }         

    public function getByName(string $naam): ?Production {
        $sql = "select productionId, director from productions where director = :director";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':director' => $naam));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$rij) {
            return null;
        } else {
            $production = new Production((int)$rij["productionId"], $rij["director"]);
            return $production;
        }
    }

   
}