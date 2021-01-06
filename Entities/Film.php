<?php
//entities/Film.php
declare(strict_types=1);



class Film {
    private int $filmId;
    private string $naam;
    private $date;
    private string $duurtijd;
    private string $hoofdacteur;
    private string $hoofdactrice;
    private bool $gezien;

    public function __construct(int $filmId, string $naam, $date, string $duurtijd, string $hoofdacteur, string $hoofdactrice, bool $gezien) {
        $this->filmId = $filmId;
        $this->naam = $naam;
        $this->date = $date;
        $this->duurtijd = $duurtijd;
        $this->hoofdacteur = $hoofdacteur;
        $this->hoofdactrice = $hoofdactrice;
        $this->gezien = $gezien;
    }

    public function getId(): int {
        return $this->filmId;
    }

    public function getNaam() : string {
        return $this->naam;
    }

    public function getJaar() : string {
        return $this->date;
    }

    public function getDuurtijd(): string {     
        return $this->duurtijd;
    }

    public function getHoofdacteur(): string {     
        return $this->hoofdacteur;
    }

    public function getHoofdactrice(): string {     
        return $this->hoofdactrice;
    }

    public function getGezien(): bool {     
        return $this->gezien;
    }

    public function setNaam(string $naam) {
        $this->naam = $naam;
    }

    public function setJaar(DateTime $date) : void {
        $this->date = $date;
    }

    public function setDuurtijd(string $duurtijd) {     
      $this->duurtijd = $duurtijd;
    }

    public function setHoofdacteur(string $hoofdacteur) {     
      $this->hoofdacteur = $hoofdacteur;
    }

    public function setHoofdactrice(string $hoofdactrice) {     
        $this->hoofdactrice = $hoofdactrice;
    }

    public function setGezien(bool  $gezien) {     
        $this->gezien = $gezien;
    }

}
