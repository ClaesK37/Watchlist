<?php
session_start();
require_once ("Entities/GebruikersAccount.php");

if (!isset($_SESSION["gebruiker"])) {
 header("Location: profiel.php");
 exit;
}
$gebruiker = unserialize($_SESSION["gebruiker"], ["GebruikersAccount"]);
// einde van de pagina-specifieke logica 

?>
<?php
include("presentation/profiel.php");

?> 