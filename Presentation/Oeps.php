<?php
//head
//header
require_once "header.php";
require_once 'Entities/GebruikersAccount.php';
//include CSS Style Sheet for index.php
echo "<link rel='stylesheet' type='text/css' href='presentation/css/index.css' />";
$msg = '<div class="alert alert-danger" role="alert">Beste Bezoeker, Gelieve eerst in te loggen aub!</div>';
if (!isset($_SESSION["gebruiker"])) {
    print($msg);
 
    exit;
}
$gebruiker = unserialize($_SESSION["gebruiker"], ["GebruikersAccount"]);
?>


<!-- ACTUAL BODY INDEX -->
<section class="container">
        <div class="welkom">
            <h3>Welkom <?php print($gebruiker->getEmail());?></h3>
        </div>
</section>
<br>
<section class="container">
    <h4>Deze film toevoegen aan je gekeken lijst:</h4>
    <div class="row">
    <div class="col-md">
    <div class="alert-danger">
            Oeps!
            <div>Er ging iets fout, deze film heb je al een keertje toegevoegd.
            Probeer een andere film toe te voegen.</div>
    </div>
    <br>
    
</section>

<?php
// footer
require_once "footer.php";
?>