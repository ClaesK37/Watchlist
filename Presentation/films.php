<?php
//head
//header
require_once "header.php";
//include CSS Style Sheet for index.php
echo "<link rel='stylesheet' type='text/css' href='presentation/css/index.css' />";
?>
<!-- ACTUAL BODY INDEX -->
<section class="container">
        <div class="welkom">
            <h3>Gekozen categorie:.</h3>
        </div>
</section>
<br>
<section class="container">
    <h4></h4>
    <div class="categoryButton row">
        <?php
            $html = '<div class="col ';
            $html .= str_replace(" ","",$categorie->getNaam());
            $html .= '">';            
            $html .= $categorie->getNaam();
            $html .= '</a></div>';
            print($html);
        ?>       
  </div>


    </div>
    <span>
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
</section>




<?php
// footer
require_once "footer.php";
?>