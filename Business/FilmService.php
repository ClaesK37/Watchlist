<?php
//Business/FilmService.php

declare(strict_types = 1);
require_once __DIR__.'/../Data/FilmDAO.php';

class FilmService {

    public function getFilmOverzicht() : array {
        $filmDAO = new FilmDAO();
        $lijst = $filmDAO->getAll();
        return $lijst;
    }

    public function getFilmById(int $id) {
        $filmDAO = new FilmDAO();
        return $filmDAO->getById($id);

    }

    public function getFilmByCategorie(int $id) {
        $filmDAO = new FilmDAO();
        return $filmDAO->getByCategorie($id);
    }

    public function getFilmByProduction(int $id) {
        $filmDAO = new FilmDAO();
        return $filmDAO->getByProduction($id);
    }

    public function getRandomFilms(int $quantity) {
        $filmDAO = new FilmDAO();
        return $filmDAO->getRandom($quantity);
    }

    public function addNewFilm(string $naam, $jaar, string $duurtijd, string $hoofdacteur, string $hoofdactrice, bool $gezien, int $categorieId, int $productionId ) {
        $filmDAO = new FilmDAO();
        return $filmDAO->create($naam, $jaar, $duurtijd, $hoofdacteur, $hoofdactrice, $gezien, $categorieId, $productionId);
    }

}