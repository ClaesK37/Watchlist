<?php
declare(strict_types=1);

require_once 'Data/DBConfig.php';
require_once 'Exceptions/Exceptions.php';


class GebruikersAccount {
    private $gebruikersAccountId;
    private $emailAdres;
    private $paswoord;

    public function __construct($gebruikersAccountId = null, $emailAdres = null, $paswoord = null) {
    //public function __construct($gebruikersAccountId, string $emailAdres,string $paswoord) {
        $this->gebruikersAccountId = $gebruikersAccountId;
        $this->emailAdres = $emailAdres;
        $this->paswoord = $paswoord;
    }

    public function getId() {
        return $this->gebruikersAccountId;
    }

    public function getEmail() {
        return $this->emailAdres;
    }
    
    public function getPaswoord() {
        return $this->paswoord;
    }


    public function setEmail($emailAdres) {
        if (!filter_var($emailAdres, FILTER_VALIDATE_EMAIL)) {
            throw new OngeldigEmailadresException();
        }
        $this->emailadres = $emailAdres;
    }

    public function setPaswoord($paswoord, $paswoordHerhaal) {
        if ($paswoord !== $paswoordHerhaal) {
            throw new WachtwoordenKomenNietOvereenException();
        }
        $this->paswoord = password_hash($paswoord, PASSWORD_DEFAULT);
    }

    public function emailReedsInGebruik() {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("SELECT * FROM gebruikersaccounts WHERE emailadres = :emailadres");
        $stmt->bindValue(":emailadres", $this->emailAdres);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        $dbh = null;
        return $rowCount;
    } 

    public function register() {
        $rowCount = $this->emailReedsInGebruik();
        if ($rowCount > 0) {
        throw new GebruikerBestaatAlException();
        }
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("INSERT INTO gebruikersaccounts (emailadres, paswoord) VALUES (:emailadres, :paswoord)");
        $stmt->bindValue(":emailadres", $this->emailAdres);
        $stmt->bindValue(":paswoord", $this->paswoord);
        $stmt->execute();
        $laatsteNieuweId = $dbh->lastInsertId();
        $dbh = null;
        $this->gebruikersAccountId = $laatsteNieuweId;
        return $this;
    } 

    public function login() {
        $rowCount = $this->emailReedsInGebruik();
        if ($rowCount == 0) {
            throw new GebruikerBestaatNietException();
        }

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("SELECT gebruikersAccountId, paswoord FROM gebruikersaccounts WHERE emailadres = :emailadres");
        $stmt->bindValue(":emailadres", $this->emailAdres);
        $stmt->execute();
        $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
        $isWachtwoordCorrect = password_verify($this->paswoord, $resultSet["paswoord"]);
        if (!$isWachtwoordCorrect) {
        throw new WachtwoordIncorrectException();
        }
        $this->gebruikersAccountId = $resultSet["gebruikersAccountId"];
        $dbh = null;
        return $this; 
    }
    
}