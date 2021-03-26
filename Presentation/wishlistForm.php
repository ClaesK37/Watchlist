<?php
//head
//header
session_start();
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
            <h3><?php print ($film->getNaam());?></h3>
        </div>
</section>
<br>
<div class="container">

    <form action="wishlist.php?action=addToWishlist" method="POST">
                <h4>Add to wishlist</h4>
                <div class="form-group">
                    <label for="nickname">Gebruiker</label>
                    <input type="text" class="form-control" value="<?= $gebruiker->getId();?>" name="gebruikersAccountId" aria-describedby="gebruiker" required>
                </div>
                <div class="form-group">
                    <label for="datum">Date</label>
                    <input type="date" class="form-control" name="datum" required>
                </div>
                <div class="form-group">
                    <label for="datum">Reden</label>
                    <input type="text" class="form-control" name="reden" required>
                </div>
                <div class="form-group">
                    <input type="hidden" name="filmId" value="<?= $film->getId(); ?>">
                </div>
                
                <div>
                <input type="submit" value="Toevoegen" class="btn btn-primary mb-3">
                </div>
                
    </form>
</div>


<?php
// footer
require_once "footer.php";
?>