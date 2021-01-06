<?PHP
declare(strict_types = 1);

use Exceptions\ProductionBestaatException;

spl_autoload_register();

require_once __DIR__.'/business/ProductionService.php';
require_once __DIR__.'/exceptions/exceptions.php';
require_once __DIR__.'/Entities/GebruikersAccount.php';

if (isset($_GET["action"]) && ($_GET["action"] === "process")) {
    try{
        $productionSvc = new ProductionService();
        $productionSvc->addNewProduction((string)$_POST["txtNaam"]);
        header("location: ./nieuweFilm.php");
        exit(0);
    } catch (ProductionBestaatException $ex) {
        header("location: nieuweProduction.php?error=naambestaat");
        exit(0);
    }
} else {

    if (isset($_GET["error"])) {
        $error = $_GET["error"];
    }
    include("presentation/nieuweProductionForm.php");
    

}