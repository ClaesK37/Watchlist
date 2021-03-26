<?php
//entities/GekekenFilm.php
declare(strict_types=1);

class GekekenFilm {
    private int $gezienId;
    private int $filmId;
    private int $gebruikersAccountId;
    private bool $gezien;

  
    public function __construct(int $gezienId, int $filmId, int $gebruikersAccountId, bool $gezien) {
        $this->gezienId = $gezienId;
        $this->filmId = $filmId;
        $this->gebruikersAccountId = $gebruikersAccountId;
        $this->gezien = $gezien;
    }
    
    public function getId(): int {
        return $this->gezienId;
    }

    public function getFilmId() : int {
        return $this->filmId;
    }

    public function getGebruikersAccountId() : int {
        return $this->gebruikersAccountId;
    }

    public function getGezien() : bool {
        return $this->gezien;
    }

    public function setFilmId(int $filmId) {
        $this->filmId = $filmId;
    }

    public function setGebruikersAccountId(int $gebruikersAccountId) {
        $this->gebruikersAccountId = $gebruikersAccountId;
    }

    public function SetGezien(bool $gezien){
        $this->gezien = $gezien;
    }

}