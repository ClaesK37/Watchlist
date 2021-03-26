<?php

use Exceptions\AlGezienException;

spl_autoload_register();
require_once __DIR__.'/entities/Film.php';
require_once __DIR__.'/business/FilmService.php';
require_once __DIR__.'/entities/GebruikersAccount.php';
require_once __DIR__.'/exceptions/exceptions.php';
require_once __DIR__.'/business/GekekenFilmService.php';

$FilmService = new FilmService();
if (isset($_GET["id"])) {
    $filmId = (int)$_GET["id"];
    $film = $FilmService->getFilmById($filmId);
}

if ((isset($_GET['action']) && $_GET['action'] === 'addGezien')) {
    try {
        $GekekenFilmService = new GekekenFilmService();
        $GekekenFilmService->addtoGezien((int)$_POST["filmId"], (int)$_POST["gebruikersAccountId"], (bool)$_POST["gezien"]);
        header("location: ./succes.php");

        exit;

    } catch (AlGezienException $ex) {
        header("location: oeps.php");


        exit(0);

    }   
} else {
    if (isset($_GET["error"])) {
        $error = $_GET["error"];
    }
    include('presentation/GezienForm.php');
}
    


