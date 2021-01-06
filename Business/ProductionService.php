<?php
//Business/ProductionService.php

declare(strict_types = 1);

require_once __DIR__ .'/../entities/Production.php';
require_once __DIR__.'/../Data/ProductionDAO.php';

class ProductionService {

    public function getProductionOverzicht() : array {
        $productionDAO = new ProductionDAO();
        $lijst = $productionDAO->getAll();
        return $lijst;
    }

    public function getProductionById(int $id) {
        $productionDAO = new ProductionDAO;
        return $productionDAO->getById($id);
    }

    public function getByProduction(string $naam) {
        $productionDAO = new ProductionDAO();
        return $productionDAO->getByName($naam);

    }

    public function addNewProduction(string $naam) {
        $productionDAO = new ProductionDAO;
        $productionDAO->create($naam);
    }
}