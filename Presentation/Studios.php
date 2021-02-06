<?php 

require_once('header.php');
require_once('Data/ProductionDAO.php');
require_once('Business/ProductionService.php');

//include CSS Style Sheet for index.php
echo "<link rel='stylesheet' type='text/css' href='presentation/css/index.css' />";
if (isset($_GET["page"]) && $_GET["page"]!="") {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$totaalPerPagina = 8;
$offset = ($page-1) * $totaalPerPagina;
$previous = $page - 1;
$next = $page + 1;
$adjacents = "2";
$totaalPaginas = ceil($totalRecords / $totaalPerPagina);
$second_last = $totaalPaginas - 1;
    
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

    <br>
    <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
        <strong>Page <?php echo $page." of ".$totaalPaginas; ?></strong>
    </div>
    <br>
 
    <nav aria-label="Page navigation example">   
        <ul class="pagination justify-content-center">
                <li class="page-item">
                    <?php if($page > 1){
                    echo "<li class='page-item'><a class='page-link' href='studios.php?page=1'>First Page</a></li>";
                    } ?>
                </li>
                                   
                <li class="page-item" <?php if($page <= 1){ echo "class='disabled'"; } ?>>
                    <a class='page-link' <?php if($page > 1){ 
                        echo "href='studios.php?page=$previous'";
                    } ?>>Previous </a>
                </li>
                    
                <li <?php if($page >= $totaalPaginas){
                echo "class='disabled'";
                } ?>>
                <a  class='page-link' <?php if($page < $totaalPaginas) {
                echo "href='studios.php?page=$next'";
                } ?>>Next </a>
                </li>
                
                <?php if($page < $totaalPaginas){
                echo "<li><a class='page-link' href='studios.php?page=$totaalPaginas'>Last</a></li>";
                } ?>
        </ul>
    </nav>
    
    </div> 
     

</section>





<?php
require_once('footer.php');
?>