<?PHP
declare(strict_types = 1);
spl_autoload_register();
session_start();

//needed for categorie-menu
require_once __DIR__.'/Business/CategorieService.php';

$categorieService = new CategorieService();
$categories = $categorieService->getCategorieOverzicht();

include("presentation/categorieKeuze.php");