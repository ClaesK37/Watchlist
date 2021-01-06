<?php
spl_autoload_register();
session_start();
require_once("Entities/GebruikersAccount.php");

$error = "";

if (isset($_POST["btnRegistreer"])) {
    $emailAdres = "";
    $paswoord = "";
    $paswoordHerhaal = "";

    if (!empty($_POST["emailadres"])) {
        $emailAdres = $_POST["emailadres"];
    } else {
        $error .= "Het e-mailadres moet ingevuld worden.<br>";
    }
    if (!empty($_POST["password1"]) && !empty($_POST["password2"])) {
        $paswoord = $_POST["password1"];
        $paswoordHerhaal = $_POST["password2"];
    } else {
        $error .= "Beide wachtwoordvelden moeten ingevuld worden.<br>";
    }
    if ($error == "") {
       try {
            $gebruiker = new GebruikersAccount(null, $emailAdres, $paswoord); 
            $gebruiker->setEmail($emailAdres);
            $gebruiker->setPaswoord($paswoord,
            $paswoordHerhaal);
            $gebruiker = $gebruiker->register();
            $_SESSION["gebruiker"] = serialize($gebruiker);
            header('Location: profiel.php');
        } catch (OngeldigEmailadresException $e) {
            $error .= "Het ingevulde e-mailadres is geen geldig e-mailadres.<br>";
        } catch (WachtwoordenKomenNietOvereenException $e) {
            $error .= "De ingevulde wachtwoorden komen niet overeen.<br>";
        } catch (GebruikerBestaatAlException $e) {
            $error .= "Er bestaat al een gebruiker met dit e-mailadres.<br>";
        }
    }
}


include("presentation/register.php");
?>
