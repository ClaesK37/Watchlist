<?php 
require_once('header.php');

//include CSS Style Sheet for index.php
echo "<link rel='stylesheet' type='text/css' href='presentation/css/index.css' />";

?>
<!-- ACTUAL BODY INDEX -->
<section class="container">
    <div class="welkom">
        <h3>Je persoonlijke profielpagina.</h3>
    </div>
</section>

<section class="container">
    <hr>
 
    <!--AFHANKELIJK VAN WAT AL IS INGEGEVEN ONDERSTAANDE 1 vd 2 GEVEN-->
    <!-- INDIEN AL INGEGEVEN STAAT HIER JE NAAM + ACHTERNAAM -->


    <div class="container">
        <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
        <div class="row">
            <div class="col-6 col-md-4"><b>Familienaam :</b></div>
            <div class="col-6 col-md-4"><b>Voornaam:</b></div>
            <div class="col-6 col-md-4"><b>Emailadres:</b></div>
        </div>
        <div class="row">
            <div class="col-6 col-md-4">testgegevens</div>
            <div class="col-6 col-md-4"></div>
            <div class="col-6 col-md-4"></div>
        </div>
        <br><br>
        <!-- Columns are always 50% wide, on mobile and desktop -->
        <div class="row">
            <div class="col-6">Favoriete Film:</div>
            <div class="col-6">Favoriet Genre:</div>
        </div>
        <div class="row">
            <div class="col-6"></div>
            <div class="col-6"></div>
        </div>
    </div>
    <hr>
    <div class="container">
    <div class="row">
        <div class="col-md">
        </div>
        <!-- INDIEN NOG GEEN NAAM OPGEGEVEN (na eerste login) hier zijn enkele velden verplicht-->
        <div class="col-md mb-3">
        <h3 style="text-align:center" class="mt-3 mb-3">Vul in:</h3>
            <form class="form" method="post" action="<?php $_SERVER["PHP_SELF"]?>">
                <div class="form-group">
                    <label for="voornaam" class="">Voornaam: </label>
                    <input type="text" class="form-control" id="voornaam" placeholder="Voornaam" name="voornaam" required>
                </div>
                <div class="form-group">
                    <label for="achternaam" class="">Familienaam: </label>
                    <input type="text" class="form-control" id="achternaam" placeholder="Achternaam" name="familienaam" required>
                </div>
                <div class="form-group">
                    <label for="functie" class="">Favoriet Genre: </label>
                    <input type="text" class="form-control" id="functie" name="favoGenre">
                </div>
                <div class="form-group">
                    <label for="naam" class="">Favoriete Film: </label>
                    <input type="text" class="form-control" id="naam" name="favoFilm">
                </div>
                <div>
                    <input type="hidden" name="action" value="voegtoe">
                    <button type="submit" class="btn btn-primary">Voeg toe</button>
                </div>
                <span class="voegAdresToeSpan">(Velden met een * zijn verplicht)</span>

            </form>

        </div>
        <div class="col-md">
        </div>
    </div>
</div>
    
</section>

<?php
// footer
require_once "footer.php";
?>