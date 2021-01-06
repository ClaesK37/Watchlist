<?php
//entities/Categorie.php
declare(strict_types=1);

class Categorie {
    private static $idMap = array();

    private int $categorieId;
    private string $naam;

    public function __construct(int $categorieId, string $naam) {
        $this->categorieId = $categorieId;
        $this->naam = $naam;
    }

    public static function create(int $categorieId, string $naam) {
        if (!isset(self::$idMap[$categorieId])) {
            self::$idMap[$categorieId] = new Categorie ($categorieId, $naam);
        }
        return self::$idMap[$categorieId];
    }

    public function getId(): int {
        return $this->categorieId;
    }

    public function getNaam() : string {
        return $this->naam;
    }

    public function setNaam(string $naam) {
        $this->naam = $naam;
    }

}