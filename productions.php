<?PHP
declare(strict_types = 1);
spl_autoload_register();
session_start();

require_once __DIR__.'/Business/FilmService.php';
require_once __DIR__.'/Business/ProductionService.php';

$productionService = new ProductionService();
$filmService = new FilmService();

$production = $productionService->getProductionById((int)$_GET["id"]);

if (isset($_GET["id"])) {
    $filmService = new FilmService();
    $films = $filmService->getFilmByProduction((int)$_GET["id"]);
    if (empty($films)) {
        print("geen films in deze categorie!");

    }


}
include("presentation/productions.php");