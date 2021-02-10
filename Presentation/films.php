<?php
//head
//header
require_once "header.php";
require_once('Data/FilmDAO.php');
require_once('Business/FilmService.php');
require_once('Business/CategorieService.php');
require_once('Business/GekekenFilmService.php');

//include CSS Style Sheet for index.php
echo "<link rel='stylesheet' type='text/css' href='presentation/css/index.css' />";
?>
<!-- ACTUAL BODY INDEX -->
<section class="container">
        <div class="welkom">
            <h3>Gekozen categorie:.</h3>
        </div>
</section>
<section class="container">
    <h4></h4>
    <div class="categoryButton row">
        <?php
            $html = '<div style="color:darkolivegreen;" class="col ';
            $html .= str_replace(" ","",$categorie->getNaam());
            $html .= '">';            
            $html .= $categorie->getNaam();
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

    $testId = $categorie->getId();
   
    ?>
  
    <div class="row productenLijst d-flex ">
        <!-- HIER VERSCHIJNEN DE ARTIKELS VAN DE (SUB)CATEGORIE -->
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nummer</th>
                <th scope="col">Naam</th>
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
                <td><?php print($film->getHoofdacteur()); ?></p></td>
                <td><?php print($film->getHoofdactrice()); ?></p></td>
                
                <td> 
                <?php foreach ($gekekenFilms as $gekekenFilm) { ?>
                    <?php 
                    if (($gekekenFilm->getGebruikersAccountId() === 1) && ($gekekenFilm->getFilmId() === $film->getId()))  { ?>
                        <i id="mama" class="fa fa-female"></i>
                           <?Php 
                    } elseif (($gekekenFilm->getGebruikersAccountId() === 2) && ($gekekenFilm->getFilmId() === $film->getId())) { ?>
                        <i id="theo" class="fa fa-male"></i>
                           <?Php 
                    } elseif (($gekekenFilm->getGebruikersAccountId() === 3) && ($gekekenFilm->getFilmId() === $film->getId())) { ?>
                        <i id="papa" class="fa fa-male"></i>
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
                        echo "<li class='page-item'><a class='page-link' href='films.php?id=$testId&page=1'>First Page</a></li>";
                        } ?>
                    </li>
                                    
                    <li class="page-item" <?php if($page <= 1){ echo "class='disabled'"; } ?>>
                        <a class='page-link' <?php if($page > 1){ 
                            echo "href='films.php?id=$testId&page=$previous'";
                        } ?>>Previous </a>
                    </li>
                        
                    <li <?php if($page >= $totaalPaginas){
                    echo "class='disabled'";
                    } ?>>
                    <a  class='page-link' <?php if($page < $totaalPaginas) {
                    echo "href='films.php?id=$testId&page=$next'";
                    } ?>>Next </a>
                    </li>
                    
                    <?php if($page < $totaalPaginas){
                    echo "<li><a class='page-link' href='films.php?id=$testId&page=$totaalPaginas'>Last</a></li>";
                    } ?>
            </ul>
         </nav>
    </div>
    <br>
    <button ><a class="terug" href="CategorieKeuze.php">Terug naar Categorieen.</a></button>
    <br>
    <p></p>
</section>




<?php
// footer
require_once "footer.php";
?>