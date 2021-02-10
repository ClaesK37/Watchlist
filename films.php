<?PHP
declare(strict_types = 1);
spl_autoload_register();
session_start();

require_once __DIR__.'/Business/FilmService.php';
require_once __DIR__.'/Business/CategorieService.php';
require_once __DIR__.'/Business/GekekenFilmService.php';
require_once __DIR__.'/entities/GebruikersAccount.php';
require_once __DIR__.'/entities/GekekenFilm.php';



$categorieService = new CategorieService();
$filmService = new FilmService();

$categorie = $categorieService->getCategorieById((int)$_GET["id"]);



if (isset($_GET["id"])) {
    $filmService = new FilmService();
    $films = $filmService->getFilmByCategorie((int)$_GET["id"]);

    $filmService = new FilmService();
    $totalRecords = $filmService->totaalRecords((int)$_GET["id"]);

    $filmService = new FilmService();
    $films = $filmService->dePaginas((int)$_GET["id"]);
    if (empty($films)) {
       // print("geen films in deze categorie!");

    }
    
    $gekekenFilmService = new GekekenFilmService();
    $gekekenFilms = $gekekenFilmService->getGekekenOverzicht();

}
include("presentation/films.php");