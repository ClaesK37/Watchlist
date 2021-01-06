<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="javascript.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="presentation/css/headerfooter.css">
    <script src="presentation/js/cookie.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
    <title>Watchlist</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #9A1915;">
          <div class="container">
            <span class="navbar-brand mb-0 h1"><a class="navbar-brand" href="./" style="color: #FFFFFF; font-size: 1.5em">Watchlist</a></span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="./categorieKeuze.php">Genres</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="./Studios.php">Studios</a>
                      </li>
                      <!--<li class="nav-item">
                        <a class="nav-link" href="./nieuweFilm.php">Nieuwe Film</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="./nieuweProduction.php">Nieuwe Productie</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="">Zoeken</a>
                      </li>-->
                    </ul>
                 </div>

        
                  <div class="collapse navbar-collapse" id="navbarText">
                      <ul class="navbar-nav mr-auto">
                      </ul>
                      <?PHP if (!isset($_SESSION["gebruiker"])) { ?>
                      <a href="login.php" >Log in <i class="mr-1 fa fa-sign-in navTekst" alt="login"></i></a>
                      <?PHP } else { ?>
                      <a  href="profiel.php" >Profiel<i class="mr-1 fa fa-user navTekst" alt="Profiel"></i></a>
                      <a href="logout.php" >Logout<i class="mr-1 fa fa-sign-out navTekst" alt="signout"></i></a>
                      <?php } ?>
          
                        
                           <!-- <a  href="login.php?signout=true" >Sign out <i class="mr-1 fa fa-sign-out navTekst" alt="signout"></i></a>
                            ACCOUNT LINK-
                            <a  href="" >Profiel<i class="mr-1 fa fa-user navTekst" alt="Profiel"></i></a>

                  
                            <a href="login.php" >Log in <i class="mr-1 fa fa-sign-in navTekst" alt="login"></i></a> -->
                     
                    </div>
                  </div>
            </div>
        </nav>
 
          
    </header>
    <body>
    <section id="keuzeMenu" class="container">
        <div class="dropdown">
          <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            Extra Opties
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./nieuweFilm.php">Nieuwe Film</a></li>
            <li><a class="dropdown-item" href="./nieuweProduction.php">Nieuwe Productie</a></li>
            <li><a class="dropdown-item" href="#">Zoeken</a></li>
          </ul>
        </div>
    </section>
                            
    

                        