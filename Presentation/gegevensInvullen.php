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
        <p>Vul je gegevens in:</p>
    </div>
</section>


<div class="row">

<div class="col-md">
</div>
<!-- INDIEN NOG GEEN NAAM OPGEGEVEN (na eerste login) hier zijn enkele velden verplicht-->
<div class="col-md mb-3">
<h3 style="text-align:center" class="mt-3 mb-3">Vul in:</h3>
    <form class="form" method="post" action="gegevens.php?action=process">
        <div class="form-group">
            <label for="voornaam" class="">Voornaam: </label>
            <input type="text" class="form-control" name="voornaam" placeholder="Voornaam" required>
        </div>
        <div class="form-group">
            <label for="achternaam" class="">Familienaam: </label>
            <input type="text" class="form-control" name="familienaam" placeholder="Achternaam" required>
        </div>
        <div class="form-group">
            <label for="functie" class="">Favoriet Genre: </label>
            <input type="text" class="form-control" name="favorietGenre">
        </div>
        <div class="form-group">
            <label for="naam" class="">Favoriete Film: </label>
            <input type="text" class="form-control" name="favorietFilm">
        </div>
        <div class="form-group">
            <input type="hidden" name="gebruikersAccountId" value="<?= $gebruiker->getId(); ?>">
        </div>
        <div>
            <input type="hidden" name="action" value="voegtoe">
            <button type="submit" class="btn btn-primary">Voeg toe</button>
        </div>
    </form>
</div>
<div class="col-md">
</div>

</div>


<?php
// footer
require_once "footer.php";
?>