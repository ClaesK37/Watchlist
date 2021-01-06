<?php 

require_once('header.php');

//include CSS Style Sheet for index.php
echo "<link rel='stylesheet' type='text/css' href='presentation/css/index.css' />";
?>
<!-- ACTUAL BODY INDEX -->
<section class="container">
        <div class="welkom">
            <h3>Keep track of your watched films.</h3>
        </div>
</section>
<br>
<section class="container">
<h4>De Producties</h4>
    <ul class="list-group list-group-flush">
        <?php foreach($productions as $production) { 
            ?>
        <li class="list-group-item"><a href="productions.php?id=<?php print($production->getId());?>"><?php print($production->getNaam());?></a></li>
 
        <?php
        } ?>
    </ul>
    
</section>



<?php
require_once('footer.php');
?>