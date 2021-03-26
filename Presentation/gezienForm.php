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
            <h3>Welkom <?php print($gebruiker->getEmail());?></h3>
        </div>
</section>
<br>
<section class="container">
    <h4>Deze film toevoegen aan je gekeken lijst:</h4>
    <div class="row">
    <div class="col-md">
    <form action="gezien.php?action=addGezien" method="POST">
       <table>
           <tr>
               <td>Gebruiker:</td>
               <td>
                   <input type="text" value="<?= $gebruiker->getId();?>" name="gebruikersAccountId" required>
               </td>
           </tr>
           <tr>
               <td>Filmnummer:</td>
               <td>
                    <input type="text" name="filmId" value="<?= $film->getId(); ?>" required>
               </td>
           </tr>
           <tr>
               <td>Gezien:</td>
               <td>
                   <input type="checkbox" name="gezien" required>
               </td>
           </tr>
           <tr>
               <td></td>
               <td><input type="submit" value="Toevoegen" class="btn btn-primary mb-3"></td>
           </tr>
       </table>                       
    </form>

    
</section>


<?php
// footer
require_once "footer.php";
?>