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


$gebruikersAccountId = $gebruiker->getId();


$PersoonService = new PersoonService();
$persoon = $PersoonService->getPersoonByAccountId($gebruikersAccountId);



include("presentation/profiel.php");

?> 