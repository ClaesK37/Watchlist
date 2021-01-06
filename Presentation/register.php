<?php
//head
//header
require_once "header.php";

if ($error == "" && isset($_SESSION["gebruiker"])) {
    echo "U bent succesvol geregistreerd.";
} else if ($error != "") {
    echo "<span style=\"color:red;\">" . $error . "</span>";
}
if (!isset($_SESSION["gebruiker"]))
{
    ?>

<div class="container">
    <div class="row">
        <div class="col-md">
        </div>
        <div class="col-md mb-3">
            <h3 style="text-align:center" class="mt-3 mb-3">Register</h3>
            <form id="registerForm" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                    <label for="emailInput">Email Adres</label>
                    <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" name="emailadres" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="paswordInput1">Password</label>
                    <input type="password" class="form-control" id="paswordInput1" name="password1" required>
                </div>
                <div class="form-group">
                    <label for="paswordInput2">Repeat Password</label>
                    <input type="password" class="form-control" id="paswordInput2" name="password2" required>
                </div>
                <input type="hidden" name="btnRegistreer" value="register">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <br>
            
        </div>
        <div class="col-md">
        </div>
    </div>
</div>
<?PHP
}
?>

<?php
require_once('footer.php');
?>