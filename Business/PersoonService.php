<?php
//Business/PersoonService.php

declare(strict_types = 1);
require_once __DIR__.'/../Data/PersoonDAO.php';

class PersoonService {
    public function getPersoonById(int $persoonId) {
        $persoonDAO = new persoonDAO();
        return $persoonDAO->getById($persoonId);

    }

    public function getPersoonByAccountId(int $gebruikersAccountId) {
        $persoonDAO = new persoonDAO();
        return $persoonDAO->getByAccountId($gebruikersAccountId);

    }

    public function addPersoon(string $voornaam, string $familienaam, int $gebruikersAccountId, string $favorietGenre, string $favorietFilm) {
        $PersoonDAO = new PersoonDAO();
        return $PersoonDAO->create($voornaam, $familienaam, $gebruikersAccountId, $favorietGenre, $favorietFilm);
    }
}
