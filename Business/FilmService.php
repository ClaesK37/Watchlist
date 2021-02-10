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

    public function getFilmByNaam(string $naam) {
        $filmDAO = new FilmDAO();
        return $filmDAO->getByNaam($naam);

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

    public function addNewFilm(string $naam, $jaar, string $duurtijd, string $hoofdacteur, string $hoofdactrice, int $categorieId, int $productionId ) {
        $filmDAO = new FilmDAO();
        return $filmDAO->create($naam, $jaar, $duurtijd, $hoofdacteur, $hoofdactrice, $categorieId, $productionId);
    }

    public function getHoofdacteur(string $hoofdacteur, string $hoofdactrice) {
        $filmDAO = new FilmDAO();
        return $filmDAO->searchByNaam($hoofdacteur, $hoofdactrice);
    }

    Public function dePaginas(int $id) : array {
        $filmDAO = new FilmDAO();
        $lijst = $filmDAO->paginaVerdeling($id);
        return $lijst;

    }

    Public function totaalRecords(int $id) {
        $filmDAO = new FilmDAO();
        $totalRecords = $filmDAO->totaalPaginas($id);
        return $totalRecords;
    }

    Public function dePaginas2(int $id) : array {
        $filmDAO = new FilmDAO();
        $lijst = $filmDAO->paginaVerdeling2($id);
        return $lijst;

    }

    Public function totaalRecords2(int $id) {
        $filmDAO = new FilmDAO();
        $totalRecords = $filmDAO->totaalPaginas2($id);
        return $totalRecords;
    }
}