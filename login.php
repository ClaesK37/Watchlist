<?PHP
declare(strict_types = 1);

session_start();
require_once("Entities/GebruikersAccount.php");
require_once('Exceptions/Exceptions.php');

$error = "";
if (isset($_POST["btnLogin"])) {
  $emailAdres = "";
  $paswoord = "";

    if (!empty($_POST["emailadres"])) {
     $emailAdres = $_POST["emailadres"];
    } else {
        $error .="Het e-mailadres moet ingevuld worden.<br>";
    }

    if (!empty($_POST["password"])) {
        $paswoord = $_POST["password"];
    } else {
        $error .="Het wachtwoord moet ingevuld worden.<br>";
    }

    if ($error == "") {
        try {
            $gebruiker = new GebruikersAccount(null, $emailAdres, $paswoord);
            $gebruiker = $gebruiker->login();
            $_SESSION["gebruiker"] = serialize($gebruiker);
        } catch (WachtwoordIncorrectException $e) {
            $error .= "Het wachtwoord is niet correct.<br>";
        } catch (GebruikerBestaatNietException $e) {
            $error .= "Er bestaat geen gebruiker met dit e- mailadres.<br>";
        }
   }
}

include("presentation/login.php");
?>


