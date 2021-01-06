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
        <h4>Nieuwe ingave:</h4>
        <div class="row">
            <div class="col-md">
                <div class="nieuw">
                <?php
                if (isset($error) && ($error === "titelbestaat")) {
                ?>
                    <p style="color: red">Titel bestaat al!</p>
                <?php
                }
                ?>
                </div>
                <form method="post" action="nieuweFilm.php?action=process">
                    <table>
                        <tr>
                            <td>Titel:</td>
                            <td>
                                <input type="text" name="txtNaam" />
                            </td>
                        </tr>
                        <tr>
                            <td>Jaar:</td>
                            <td>
                                <input type="text" name="txtJaar" />
                            </td>
                        </tr>
                        <tr>
                            <td>Duurtijd:</td>
                            <td>
                                <input type="text" name="txtDuurtijd" />
                            </td>
                        </tr>
                        <tr>
                            <td>Acteur/Actrice 1:</td>
                            <td>
                                <input type="text" name="txtHoofdacteur" />
                            </td>
                        </tr>
                        <tr>
                            <td>Acteur/Actrice 2:</td>
                            <td>
                                <input type="text" name="txtHoofdactrice" />
                            </td>
                        </tr>
                        <tr>
                            <td>Gezien:</td>
                            <td>
                                <input type="checkbox" name="txtGezien" />
                            </td>
                        </tr>           
                        
                        <tr>
                        <td>Categorie:</td>
                            <td>
                                <select name="selCategorie">
                                    <?php
                                    foreach ($categories as $categorie) {
                                    
                                        ?>
                                        <option value="<?php print($categorie->getId());?>">
                                            <?php print($categorie->getNaam());?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                        <td>Production:</td>
                            <td>
                                <select name="selProduction">
                                    <?php
                                    foreach ($productions as $production) {
                                    
                                        ?>
                                        <option value="<?php print($production->getId());?>">
                                            <?php print($production->getNaam());?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
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