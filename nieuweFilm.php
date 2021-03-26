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


if (isset($_GET["action"]) && ($_GET["action"] === "process")) {
    try{
        $filmSvc = new FilmService();
        $filmSvc->addNewFilm((string)$_POST["txtNaam"], $_POST["txtJaar"], (string)$_POST["txtDuurtijd"], (string)$_POST["txtHoofdacteur"], (string)$_POST["txtHoofdactrice"], (int)$_POST["selCategorie"], (int)$_POST["selProduction"]);
        header("location: ./index.php");
        exit(0);
    } catch (TitelBestaatException $ex) {
        header("location: nieuweFilm.php?error=titelbestaat");
        exit(0);
    }
} else {
    $categorieService = new CategorieService();
    $categories = $categorieService->getCategorieOverzicht();

    $productionService = new ProductionService();
    $productions = $productionService->getProductionOverzicht();
    if (isset($_GET["error"])) {
        $error = $_GET["error"];
    }
    include("presentation/nieuweFilmForm.php");
    

}
