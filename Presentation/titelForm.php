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
        <h4>Zoeken:</h4>
        <div class="row">
            <div class="col-md">
            <div class="nieuw">
                <?php
                if (isset($error) && ($error === "titelbestaatniet")) {
                ?>
                    <p style="color: red">Filmtitel niet gevonden!</p>
                <?php
                }
                ?>
                </div>
                <form method="post" action="titel.php?action=process" >
                    <table>
                        <tr>
                            <td>Filmtitel:</td>
                            <td><input type="text" name="naam" placeholder="Search for film title"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value=">>"></td>
                        </tr>
                    
                    </table>
                    
                    
                </form>
         
                    
            </div>
        </div> 
        <br>
        

</section>

<?php
// footer
require_once "footer.php";
?>