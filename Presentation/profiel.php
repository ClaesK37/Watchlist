<?php 

require_once 'header.php';
require_once 'Entities/GebruikersAccount.php';

//include CSS Style Sheet for index.php
echo "<link rel='stylesheet' type='text/css' href='presentation/css/index.css' />";

?>

<!-- ACTUAL BODY INDEX -->
<section class="container">
    <div class="welkom">
        <h3>Je persoonlijke profielpagina.</h3>
        <p>Welkom: <?php print $gebruiker->getEmail();?></p>
        <p>Dit zijn jou gegevens.</p>
    </div>
</section>


<section class="container">

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
</section>

<?php
// footer
require_once "footer.php";
?>