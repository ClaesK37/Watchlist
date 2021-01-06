<?PHP
declare(strict_types = 1);

use Exceptions\TitelBestaatException;

spl_autoload_register();

require_once __DIR__.'/Business/CategorieService.php';
require_once __DIR__.'/entities/Film.php';
require_once __DIR__.'/entities/GebruikersAccount.php';
require_once __DIR__.'/business/FilmService.php';
require_once __DIR__.'/business/ProductionService.php';
require_once __DIR__.'/business/ReviewService.php';
require_once __DIR__.'/exceptions/exceptions.php';


$FilmService = new FilmService();
if (isset($_GET["id"])) {
    $filmId = (int)$_GET["id"];
    $film = $FilmService->getFilmById($filmId);
}

if (isset($_GET['action']) && ($_GET['action'] === 'process')) {
    $reviewService = new ReviewService();
    $reviewService->addReview((string)$_POST["nickname"], (int)$_POST['score'], (string)$_POST['commentaar'], (string)$_POST['datum'], (int)$_POST['filmId']);
    header("location: ./index.php");
    exit(0);

} else {
    $filmService = new FilmService();
    $films = $filmService->getFilmOverzicht();

    
    
}

require_once __DIR__.'/presentation/reviewForm.php';