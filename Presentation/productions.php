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
<section class="container">
  
   
        <div id="gekozenProductie" class="categoryButton row">
            <?php
                $html = '<div style="color:darkolivegreen;" class="col ';
                $html .= str_replace(" ","",$production->getNaam());
                $html .= '">';            
                $html .= $production->getNaam();
                $html .= '</a></div>';
                print($html);
            ?>       
        </div>
    <?php
        if (isset($_GET["page"]) && $_GET["page"]!="") {
            $page = $_GET["page"];
        } else {
            $page = 1;
        }
        $totaalPerPagina = 10;
        $offset = ($page-1) * $totaalPerPagina;
        $previous = $page - 1;
        $next = $page + 1;
        $adjacents = "2";
        $totaalPaginas = ceil($totalRecords / $totaalPerPagina);
        $second_last = $totaalPaginas - 1;

        $testId = $production->getId();
    ?>

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
                <td> <?php foreach ($gekekenFilms as $gekekenFilm) { ?>
                    <?php 
                    if (($gekekenFilm->getGebruikersAccountId() === 1) && ($gekekenFilm->getFilmId() === $film->getId()))  { ?>
                        <i id="mama" class="fa fa-female"></i>
                           <?Php 
                    } elseif (($gekekenFilm->getGebruikersAccountId() === 2) && ($gekekenFilm->getFilmId() === $film->getId())) { ?>
                        <i id="papa" class="fa fa-male"></i>
                           <?Php 
                    } elseif (($gekekenFilm->getGebruikersAccountId() === 3) && ($gekekenFilm->getFilmId() === $film->getId())) { ?>
                        <i id="theo" class="fa fa-male"></i>
                            <?php 
                    } elseif (($gekekenFilm->getGebruikersAccountId() === 4) && ($gekekenFilm->getFilmId() === $film->getId())) { ?>
                        <i id="leia" class="fa fa-female"></i>
                            <?php 
                    }
                 }    ?> 
               
                </td>
                </tr>
  
                <?PHP } ?>
            </tbody>
         </table>

         <br>
         <div>
         <strong>Page <?php echo $page." of ".$totaalPaginas; ?></strong>
         </div>
        <br>
        <nav aria-label="Page navigation example">   
            <ul class="pagination justify-content-center">
                 <li class="page-item">
                    <?php if($page > 1){
                    echo "<li class='page-item'><a class='page-link' href='productions.php?id=$testId&page=1'>First Page</a></li>";
                    } ?>
                </li>
                                   
                <li class="page-item" <?php if($page <= 1){ echo "class='disabled'"; } ?>>
                    <a class='page-link' <?php if($page > 1){ 
                        echo "href='productions.php?id=$testId&page=$previous'";
                    } ?>>Previous </a>
                </li>
                    
                <li <?php if($page >= $totaalPaginas){
                echo "class='disabled'";
                } ?>>
                <a  class='page-link' <?php if($page < $totaalPaginas) {
                echo "href='productions.php?id=$testId&page=$next'";
                } ?>>Next </a>
                </li>
                
                <?php if($page < $totaalPaginas){
                echo "<li><a class='page-link' href='producions.php?id=$testId&page=$totaalPaginas'>Last</a></li>";
                } ?>
            </ul>
        </nav>
    </div>
    <br>
    <button ><a class="terug" href="studios.php">Terug naar Studios.</a></button>
    <br>
    <p></p> 

</section>




<?php
// footer
require_once "footer.php";
?>