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

    <form action="review.php?action=process" method="POST">
                <h4>Post a review</h4>
                <div class="form-group">
                    <label for="nickname">Nickname</label>
                    <input type="text" class="form-control" name="nickname" aria-describedby="nickname" required>
                </div>
                <div class="form-group">
                    <label for="score">Score</label>
                    <input type="number" class="form-control" min="1" max="10" name="score" required>
                </div>
                <div class="form-group">
                    <label for="datum">Date</label>
                    <input type="date" class="form-control" name="datum" required>
                </div>
                <div class="form-group">
                    <label for="commentaar">Commentaar</label>
                    <input type="text" class="form-control" name="commentaar" maxlength="100" required>
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