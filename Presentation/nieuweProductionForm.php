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
        <h3>Welkom <?php echo $gebruiker->getEmail();?></h3>
    </div>
</section>
<br>
<section class="container">
        <h4>Nieuwe ingave:</h4>
        <div class="row">
            <div class="col-md">
                <div class="nieuw">
                <?php
                if (isset($error) && ($error === "naambestaat")) {
                ?>
                    <p style="color: red">Productienaam bestaat al!</p>
                <?php
                }
                ?>
                </div>
                <form method="post" action="nieuweProduction.php?action=process">
                    <table>
                        <tr>
                            <td>Productie:</td>
                            <td>
                                <input type="text" name="txtNaam" />
                            </td>
                        </tr>
                         
                        
                        <tr>
                            <td></td>
                            <td>
                            <input type="submit" value="Toevoegen" />
                            </td>
                        </tr>
                    </table>
                </form>
                    
            </div>
        </div>     
</section>


<?php
require_once('footer.php');
?>