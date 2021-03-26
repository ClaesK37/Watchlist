<?PHP
declare(strict_types = 1);
spl_autoload_register();
session_start();
//needed for production-menu
require_once __DIR__.'/Business/ProductionService.php';

$productionService = new ProductionService();
$totalRecords = $productionService->totaalRecords();

$productionService = new ProductionService();
$productions = $productionService->dePaginas();

include("presentation/Studios.php");