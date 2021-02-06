<?PHP
declare(strict_types = 1);

use Exceptions\TitelBestaatNietException;

spl_autoload_register();

require_once __DIR__.'/Entities/GebruikersAccount.php';
require_once __DIR__.'/business/FilmService.php';
require_once __DIR__.'/Business/CategorieService.php';
require_once __DIR__.'/entities/Film.php';



if (isset($_GET["action"]) && ($_GET["action"] === "process")) {
    try {
        $filmSvc = new FilmService();
        $film = $filmSvc->getFilmByNaam((string)$_POST["naam"]);
        include('presentation/zoekResultaat.php');
        exit(0);
    } catch (TitelBestaatNietException $ex) {
        header("location: titel.php?error=titelbestaatniet");
        exit(0);
    }

} else {
    if (isset($_GET["error"])) {
        $error = $_GET["error"];
    }

    include("presentation/titelForm.php");

}