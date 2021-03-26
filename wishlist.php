<?php
spl_autoload_register();
require_once __DIR__.'/entities/Film.php';
require_once __DIR__.'/business/FilmService.php';
require_once __DIR__.'/entities/GebruikersAccount.php';

require_once __DIR__.'/business/WishlistService.php';

$FilmService = new FilmService();
if (isset($_GET["id"])) {
    $filmId = (int)$_GET["id"];
    $film = $FilmService->getFilmById($filmId);
}

if ((isset($_GET['action']) && $_GET['action'] === 'addToWishlist'))
 {

    $wishlistService = new WishlistService();
    $wishlistService->addtoWishlist((int)$_POST["filmId"], (int)$_POST["gebruikersAccountId"], (string)$_POST['datum'], (string)$_POST["reden"]);
    header("location: ./profiel.php");
    exit(0);  
    
}

require_once __DIR__.'/presentation/wishlistForm.php';