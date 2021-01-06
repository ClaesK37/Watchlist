<?php
session_start();

unset ($_SESSION["gebruiker"]);

require_once('presentation/header.php');
?>

<!-- ACTUAL BODY INDEX -->
<section class="container">
        <div class="welkom">
            <h3></h3>
        </div>
</section>
<br>
<section class="container">
        <h4>U bent uitgelogd.</h4>
        <div class="row">

        </div>     
</section>



<?PHP
require_once("presentation/footer.php");
?>