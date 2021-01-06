<?php
//Business/CategorieService.php

declare(strict_types = 1);

require_once __DIR__ .'/../entities/Categorie.php';
require_once __DIR__.'/../Data/CategorieDAO.php';

class CategorieService {

    public function getCategorieOverzicht() : array {
        $categorieDAO = new CategorieDAO();
        $lijst = $categorieDAO->getAll();
        return $lijst;
    }

    public function getCategorieById(int $id) {
        $categorieDAO = new CategorieDAO;
        return $categorieDAO->getById($id);
    }
}