<?php
//entities/Wishlistphp
declare(strict_types=1);

class Wishlist{
    private int $wishListItemId;
    private int $filmId;
    private int $gebruikersAccountId;
    private $date;
    private string $reden;
  
    public function __construct(int $wishListItemId, int $filmId, int $gebruikersAccountId, $date, string $reden) {
        $this->wishListItemId = $wishListItemId;
        $this->filmId = $filmId;
        $this->gebruikersAccountId = $gebruikersAccountId;
        $this->datum = $date;
        $this->reden = $reden;
    }
    
    public function getId(): int {
        return $this->wishListItemId;
    }

    public function getFilmId() : int {
        return $this->filmId;
    }

    public function getGebruikersAccountId() : int {
        return $this->gebruikersAccountId;
    }

    public function getDate() : string {
        return $this->datum;
    }

    public function getReden() : string {
        return $this->reden;
    }

    public function setFilmId(int $filmId) {
        $this->filmId = $filmId;
    }

    public function setGebruikersAccountId(int $gebruikersAccountId) {
        $this->gebruikersAccountId = $gebruikersAccountId;
    }

    public function setDate(DateTime $date) : void {
        $this->datum = $date;
    }

    public function SetReden(string $reden){
        $this->reden = $reden;
    }

}