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

<section id="test" class="container clearfix">
    <h4>Find out more:</h4>
    <div class="row productenLijst d-flex justify-content-center">

        <?php foreach($films as $film) { ?>
        <div class="col">
            <div class="productKader">
                <div><img src="presentation/img/gear.jpg" alt="filmalt" class="filmalt"></div>
                <p class="productNaam midden"><a href="filmdetail.php?id=<?php print ($film->getId());?>"><?php print($film->getNaam());?> <i class="fa fa-play"></i></a></p>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<br>

<?php
require_once('footer.php');
?>