<?PHP
declare(strict_types = 1);
spl_autoload_register();
session_start();

//needed for overzicht films
require_once __DIR__.'/Business/FilmService.php';
$filmService = new filmService();
$films = $filmService->getRandomFilms(10);



include("presentation/index.php");

