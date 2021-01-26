<?PHP
declare(strict_types = 1);

use Exceptions\ActeurBestaatNietException;

spl_autoload_register();

require_once __DIR__.'/Entities/GebruikersAccount.php';
require_once __DIR__.'/business/FilmService.php';
require_once __DIR__.'/Business/CategorieService.php';
require_once __DIR__.'/entities/Film.php';



if (isset($_GET["action"]) && ($_GET["action"] === "process")) {
    try {
        $filmSvc = new FilmService();
        $films = $filmSvc->getHoofdacteur((string)$_POST["hoofdacteur"], (string)$_POST["hoofdactrice"]);
        include('presentation/toonresultaat.php');
        exit(0);
    } catch (ActeurBestaatNietException $ex) {
        header("location: zoeken.php?error=acteurbestaatniet");
        exit(0);
    }

} else {
    if (isset($_GET["error"])) {
        $error = $_GET["error"];
    }

    include("presentation/zoekenForm.php");

}

