<?php 
use Exceptions\AlGezienException;
require_once 'header.php';
require_once 'Entities/GebruikersAccount.php';
require_once 'business/FilmService.php';


//include CSS Style Sheet for index.php
echo "<link rel='stylesheet' type='text/css' href='presentation/css/index.css' />";

?>

<!-- ACTUAL BODY INDEX -->
<section class="container">
    <div class="welkom">
        <h3>Je persoonlijke profielpagina.</h3>
        <p>Welkom: <?php print $gebruiker->getEmail();?></p>
    </div>
</section>
<br>
<section class="container" id="wishlist">
    <h1>Profiel.</h1>

    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
    <div class="row">
        <div class="col-6 col-md-4"><b>GebruikersNummer :</b></div>
        <div class="col-6 col-md-4"><b>Voornaam:</b></div>
        <div class="col-6 col-md-4"><b>Familienaam:</b></div>
        
    </div>
    <div class="row">
        <div class="col-6 col-md-4"><?php print $persoon->getId();?></div>
        <div class="col-6 col-md-4"><?php print $persoon->getVoornaam();?></div>
        <div class="col-6 col-md-4"><?php print $persoon->getFamilienaam();?></div>

    </div>
    <br><br>
    <!-- Columns are always 50% wide, on mobile and desktop -->
    <div class="row">
    <div class="col-6 col-md-4"><b></b></div>
        <div class="col-6 col-md-4"><b>Favoriete Film:</b></div>
        <div class="col-6 col-md-4"><b>Favoriet Genre:</b></div>
    </div>
    <div class="row">
        <div class="col-6 col-md-4"></div>
        <div class="col-6 col-md-4"><?php print $persoon->getfavorietFilm();?></div>
        <div class="col-6 col-md-4"><?php print $persoon->getfavorietGenre();?></div>
    </div>

    <br>


    <h1>Wishlist!</h1>
    <b>Graag nog te kijken!</b>
    <div class="row">
    <?php if ((isset($wishlists)) && (count($wishlists) > 0)) : ?>
    <?php foreach ($wishlists as $wishlist) : ?>
            <table class="table table-striped border">
                <tr>
                    <td class="col-md-4">
                        <?= $wishlist->getDate()?>
                        
                    </td>
                    <td class="col-md-10">
                        <?php 
                    
                            $test = $wishlist->getFilmId();
                            $filmService = new FilmService();
                            $film = $filmService->getFilmById($test);
                        ?>
                        <?= $film->getNaam()?>
                    </td>
                    <td class="col-md-4">
                        <a class="verwijder" href="verwijderWishListItem.php?id=<?php print($wishlist->getId());?>"><b>X</b></a>
                    </td>
                </tr>
            </table>
 
    <?PHP endforeach; ?>
    </div>
    <?PHp else: ?>
        <div>
            <p><b>No WishListItems posted</b></p>
        </div>
    <?php endif; ?>
    
    </section>

<?php
// footer
require_once "footer.php";
?>