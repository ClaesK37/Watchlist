<?php 

require_once('header.php');

//include CSS Style Sheet for index.php
echo "<link rel='stylesheet' type='text/css' href='presentation/css/index.css' />";
?>
<!-- ACTUAL BODY INDEX -->
<section class="container">
        <div class="welkom">
            <br>
            <h3>Keep track of your watched films.</h3>
        </div>
</section>
<br>
<section class="container">
    <h4>De categorieën</h4>
    <div class="categoryButton row">

        <?php foreach($categories as $categorie) { 
            ?>
            <button type="button"  class="btn btn-dark">
                <a href="films.php?id=<?php print($categorie->getId());?>"><?php print($categorie->getNaam());?></a>
            </button>
           
        <?php
        } ?>
    </div>
    <br><br>
    
</section>



<?php
require_once('footer.php');
?>