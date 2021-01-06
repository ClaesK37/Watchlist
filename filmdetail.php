<?php
spl_autoload_register();
session_start();
require_once __DIR__.'/entities/Film.php';
require_once __DIR__.'/business/FilmService.php';
require_once __DIR__.'/business/CategorieService.php';
//require_once __DIR__.'/business/ProductionService.php';
require_once __DIR__.'/business/ReviewService.php';


$filmService = new FilmService();
$reviewService = new ReviewService();
//$productionService = new ProductionService();
if (isset($_GET["id"])) {

    $filmId = (int) $_GET["id"];
    $film = $filmService->getFilmById($filmId);
    $reviews = $reviewService->getFilmsReviews($filmId);

}

if ((isset($_GET['action'])) && ($_GET['action'] === 'process')) {
    $reviewService = new ReviewService();
    $reviewService->addReview((string)$_POST["nickname"], (int)$_POST['score'], (string)$_POST['commentaar'], (string)$_POST['datum'], (int) $_POST['filmId']);
    header("location: ./index.php");
    exit();

}

//$production = $productionService->getProductionById($filmId);



require_once __DIR__.'/presentation//filmdetail.php';