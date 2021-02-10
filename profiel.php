<?php
session_start();
spl_autoload_register();
require_once ("Entities/GebruikersAccount.php");
require_once ('business/PersoonService.php');
require_once ('business/WishlistService.php');
require_once ('business/FilmService.php');

$msg = '<div class="alert alert-danger" role="alert">Beste Bezoeker, Gelieve eerst in te loggen aub!</div>';
if (!isset($_SESSION["gebruiker"])) {
    print($msg);
 
    exit;
}
$gebruiker = unserialize($_SESSION["gebruiker"], ["GebruikersAccount"]);


$gebruikersAccountId = $gebruiker->getId();


$PersoonService = new PersoonService();
$persoon = $PersoonService->getPersoonByAccountId($gebruikersAccountId);
$wishlistService = new WishlistService();
$wishlists = $wishlistService->getPersoonWishlist($gebruikersAccountId);




include("presentation/profiel.php");

?> 