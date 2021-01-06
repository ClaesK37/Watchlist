<?php
//entities/Production.php
declare(strict_types=1);

class Production {
    private static $idMap = array();

    private int $productionId;
    private string $naam;

    public function __construct(int $productionId, string $naam) {
        $this->productionId = $productionId;
        $this->naam = $naam;
    }

    public static function create(int $productionId, string $naam) {
        if (!isset(self::$idMap[$productionId])) {
            self::$idMap[$productionId] = new Categorie ($productionId, $naam);
        }
        return self::$idMap[$productionId];
    }

    public function getId(): int {
        return $this->productionId;
    }

    public function getNaam() : string {
        return $this->naam;
    }

    public function setNaam(string $naam) {
        $this->naam = $naam;
    }

}