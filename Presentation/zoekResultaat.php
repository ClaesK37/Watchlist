<?php
//head
//header
session_start();
require_once "header.php";
require_once 'Entities/GebruikersAccount.php';
//include CSS Style Sheet for index.php
echo "<link rel='stylesheet' type='text/css' href='presentation/css/index.css' />";

?>


<!-- ACTUAL BODY INDEX -->
<section class="container">
    <div class="welkom">
        <h3></h3>
    </div>
</section>
<br>
<section class="container">
    <h4>Gevonden Resultaat</h4>
    <div class="row productenLijst d-flex ">
         <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
        <div class="resultaat">
            <h3><a href="filmdetail.php?id=<?php print ($film->getId());?>"><?php print($film->getNaam()); ?></a></h3>
            
            
            
            <div class="row row-cols-4">
                <div class="col"></div>
                <div class="col"><b>Nummer</b></div>
                <div class="col"><?php print($film->getId()); ?></div>
                <div class="col"></div>            
            </div>

            <div class="row row-cols-4">
                <div class="col"></div>
                <div class="col"><b>Jaar</b></div>
                <div class="col"><?php print($film->getJaar()); ?></div>
                <div class="col"></div>
            </div>
            <div class="row row-cols-4">
                <div class="col"></div>
                <div class="col"><b>Hoofdacteur/trice 1</b></div>
                <div class="col"><?php print($film->getHoofdacteur()); ?></div>
                <div class="col"></div>
            </div>
            <div class="row row-cols-4">
                <div class="col"></div>
                <div class="col"><b>Hoofdacteur/trice 2</b></div>
                <div class="col"><?php print($film->getHoofdactrice()); ?></div>
                <div class="col"></div>
            </div>
        </div>
         <br>
    </div>
    <br>
    <button><a href="titel.php">Terug naar Zoeken.</a></button>
    <br>
    <p></p>
</section>




<?php
// footer
require_once "footer.php";
?>