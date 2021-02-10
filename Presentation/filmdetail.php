<?php 

require_once 'header.php';

//include CSS Style Sheet for index.php
echo "<link rel='stylesheet' type='text/css' href='presentation/css/index.css' />";

?>
<!-- ACTUAL BODY INDEX -->
<section class="container">
        <div class="welkom">
            <h3></h3>
        </div>
</section>

<br>
<div class="container" id="filmdetail">
  <h1>Filmdetail!</h1>

    <!-- Stack the columns on mobile by making one full-width and the other half-width -->
    <div class="row">
        <div class="col-md-8"><h3><b>Filmtitel:</b></h3></div>
        <div class="col-6 col-md-4"><h3><b>Jaar:</b></h3></div>
    </div>
    <div class="row">
        <div class="col-md-8"><?php print($film->getNaam());?></div>
        <div class="col-6 col-md-4"><?php print($film->getJaar());?></div>
    </div>
    <br>
    <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
    <div class="row">
        <div class="col-6 col-md-4"><b>Duurtijd (uur.min):</b></div>
        <div class="col-6 col-md-4"><b>Acteur/Actrice</b></div>
        <div class="col-6 col-md-4"><b>Acteur/Actrice</b></div>
    </div>
    <div class="row">
        <div class="col-6 col-md-4"><?php print(number_format ($film->getDuurtijd(), 2));?></div>
        <div class="col-6 col-md-4"><?php print($film->getHoofdacteur());?></div>
        <div class="col-6 col-md-4"><?php print($film->getHoofdactrice());?></div>
    </div>
    <div class="row">
        <div class="col-6 col-md-4"><b>Toevoegen aan Wishlist</b></div>
        <div class="col-6 col-md-4"><b>Toevoegen aan Gezien</b></div>
        <div class="col-6 col-md-4"></div>
    </div>
    <div class="row">
        <div class="col-6 col-md-4">
          <p class="reviewMaken"><a href="wishlist.php?id=<?php print ($film->getId());?>"><i class="fa fa-heart"></i></a></p>
        </div>
        <div class="col-6 col-md-4">
          <p class="reviewMaken"><a href="gezien.php?id=<?php print ($film->getId());?>"><i class="fa fa-eye"></i></a></p>
        </div>
        <div class="col-6 col-md-4"></div>
    </div>
    <br>
    

    <!-- Columns are always 50% wide, on mobile and desktop -->
  <h1>Reviews!</h1>

    <div class="test">
      <?php if ((isset($reviews)) && (count($reviews) > 0)) :  ?>
          <?php foreach ($reviews as $review) : ?>
            <div class="row">
              <div class="col-4"><b>Score</b>
                <p>
                  <?php if ($review->getScore() == 5) { ?>
                    <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                    <?php
                  } elseif ($review->getScore() == 4) { ?>
                    <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                    <?php
                  } elseif ($review->getScore() == 3) { ?>
                    <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                    <?php
                  } elseif ($review->getScore() == 2) { ?>
                    <p><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                    <?php
                  } elseif ($review->getScore() == 1) { ?>
                    <p><i class="fa fa-star"></i></p>
                    <?php
                  }
                  ?>
                  </p>
              </div>
              <div class="col-4"><b>Date</b>
                <p><?= $review->getDate() ?></p>
            </div>
            <div class="col-4"><b>Nickname</b>
                <p><?= $review->getNickname() ?></p>
            </div>
            </div>
            <div class="row" id="test">
              <div class="col-6"><b>Commentaar:</b>
                <p><?= $review->getCommentaar() ?></p>
              </div>
            </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div>
              <p><b>No reviews posted</b></p>
            </div>
          <?php endif; ?>

          <p class="reviewMaken"><a href="review.php?id=<?php print ($film->getId());?>">Review Maken</a></p>
          
    </div>
</div>


<?php
require_once 'footer.php';
?>