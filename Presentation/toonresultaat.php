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
    <h4>Gevonden Resultaat</h4>
    <div class="row productenLijst d-flex ">
        <!-- HIER VERSCHIJNEN DE ARTIKELS VAN DE (SUB)CATEGORIE -->
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nummer</th>
                <th scope="col">Naam</th>
                <th scope="col">Jaar</th>
                <th scope="col">Duurtijd</th>
                <th scope="col">Acteur/Actrice</th>
                <th scope="col">Acteur/Actrice</th>
                <th scope="col">Gezien</th>
                </tr>
            </thead>
            <tbody id="tabel">
                <?php foreach ($films as $film) { ?>
                <tr>
                <th scope="row"><?php print($film->getId()); ?></p></th>
                <td><p class="jaar"><a href="filmdetail.php?id=<?php print ($film->getId());?>"><?php print($film->getNaam()); ?></a></p></td>
                <td><?php print($film->getJaar()); ?></p></td>
                <td><?php print($film->getDuurtijd()); ?></p></td>
                <td><?php print($film->getHoofdacteur()); ?></p></td>
                <td><?php print($film->getHoofdactrice()); ?></p></td>
                <td> <?php if ($film->getGezien() == 1) { ?>
                    <p><i class="fa fa-check"></i></p>
                    <?php } ?>
                </td>
                </tr>
  
                <?PHP } ?>
            </tbody>
         </table>

         <br>
    </div>
</section>




<?php
// footer
require_once "footer.php";
?>