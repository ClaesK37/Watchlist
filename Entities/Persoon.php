<?php
//entities/Film.php
declare(strict_types=1);

class Persoon {
    private int $persoonId;
    private string $voornaam;
    private string $familienaam;
    private int $gebruikersAccountId;
    private string $favorietGenre;
    private string $favorietFilm;

    public function __construct(int $persoonId, string $voornaam, string $familienaam, int $gebruikersAccountId, string $favorietGenre, string $favorietFilm) {
        $this->persoonId = $persoonId;
        $this->voornaam = $voornaam;
        $this->familienaam = $familienaam;
        $this->gebruikersAccountId = $gebruikersAccountId;
        $this->favorietGenre = $favorietGenre;
        $this->favorietFilm = $favorietFilm;
    }

    public function getId() : int {
        return $this->persoonId;
    }

    public function getVoornaam() : string{
        return $this->voornaam;
    }

    public function getFamilienaam() : string{
        return $this->familienaam;
    }

    public function getGebruikersAccountId() : int{
        return $this->gebruikersAccountId;
    }

    public function getfavorietGenre() : string{
        return $this->favorietGenre;
    }

    public function getfavorietFilm() : string{
        return $this->favorietFilm;
    }

    public function setVoornaam(string $voornaam){
        $this->voornaam = $voornaam;
    }

    public function setFamilienaam(string $familienaam){
        $this->familienaam = $familienaam;
    }

    public function setFavorietGenre(string $favorietGenre){
        $this->favorietGenre = $favorietGenre;
    }

    public function setFavorietFilm(string $favorietFilm){
        $this->favorietFilm = $favorietFilm;
    }


}