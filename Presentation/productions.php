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
            <h3>Gekozen filmstudio:</h3>
        </div>
</section>
<br>
<section class="container">
    <div class="gekozenProductie">
    <h4></h4>
    <div class="categoryButton row">
        <?php
            $html = '<div class="col ';
            $html .= str_replace(" ","",$production->getNaam());
            $html .= '">';            
            $html .= $production->getNaam();
            $html .= '</a></div>';
            print($html);
        ?>       
  </div>

    <div class="row productenLijst d-flex ">
        <!-- HIER VERSCHIJNEN DE ARTIKELS VAN DE (SUB)CATEGORIE -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nummer</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Jaar</th>
                    <th scope="col">Gezien</th>
                </tr>
            </thead>
            <tbody id="tabel">
                <?php foreach ($films as $film) { ?>
                <tr>
                <th scope="row"><?php print($film->getId()); ?></th>
                <td><p><a href="filmdetail.php?id=<?php print ($film->getId());?>"><?php print($film->getNaam()); ?></a></p></td>
                <td><?php print($film->getJaar()); ?></p></td>
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