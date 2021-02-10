<?php
declare(strict_types=1);

require_once __DIR__.'/../data/GekekenFilmDAO.php';

class GekekenFilmService
{

    public function getPersoonGekeken(int $gebruikersAccountId) : ?array
    {
        $GekekenFilmDAO = new GekekenFilmDAO();
        return $GekekenFilmDAO->getAllbyPersoon($gebruikersAccountId);

    }

    public function addtoGezien($filmId, $gebruikersAccountId, $gezien) {
        $GekekenFilmDAO = new GekekenFilmDAO();
        return $GekekenFilmDAO->create($filmId, $gebruikersAccountId, $gezien);
    }

    public function getGekekenOverzicht(): Array {
        $GekekenFilmDAO = new GekekenFilmDAO();
        $lijst = $GekekenFilmDAO->GetAll();
        return $lijst;
    }

}