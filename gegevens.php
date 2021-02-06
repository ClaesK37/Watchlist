<?php
session_start();
spl_autoload_register();
require_once ("Entities/GebruikersAccount.php");
require_once ('business/PersoonService.php');

$msg = '<div class="alert alert-danger" role="alert">Beste Bezoeker, Gelieve eerst in te loggen aub!</div>';
if (!isset($_SESSION["gebruiker"])) {
    print($msg);
 
    exit;
}
$gebruiker = unserialize($_SESSION["gebruiker"], ["GebruikersAccount"]);


var_dump($gebruiker);
var_dump($gebruiker->getId());

if ((isset($_GET['action'])) && ($_GET['action'] === 'process')) {
    $PersoonService = new PersoonService();
    $PersoonService->addPersoon((string)$_POST["voornaam"], (string)$_POST["familienaam"], (int)$_POST["gebruikersAccountId"], (string)$_POST["favorietGenre"], (string)$_POST["favorietFilm"]);
    header("location: ./profiel.php");
    exit();
}




include("presentation/gegevensInvullen.php");

?> 