<?php
//head
//header
require_once "header.php";
//include CSS Style Sheet for index.php
echo "<link rel='stylesheet' type='text/css' href='presentation/css/login.css' />";
echo "<link rel='stylesheet' type='text/css' href='presentation/css/headerfooter.css' />";
?>
<section class="container">
    <div class="welkom">
        <h3><?php
        if ($error == "" && isset($_SESSION["gebruiker"])) {
            echo "u bent ingelogd.";
        } else if ($error != "") {
            echo "<span style=\"color:red;\">" . $error . "</span>";
        }

        ?></h3>

    </div>
</section>
<?Php
if (!isset($_SESSION["gebruiker"]))
        { ?>
<div class="container">
    <div class="row">
        <div class="col-md">
        </div>
        <div class="col-md mb-3">
            <h3 style="text-align:center" class="mt-3 mb-3">Login</h3>
            <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                    <label for="emailInput">Email Adres</label>
                    <input type="email" class="form-control" id="emailInput" aria-describedby="emailHelp" name="emailadres" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="paswordInput">Password</label>
                    <input type="password" class="form-control" id="paswordInput" name="password" required>
                </div>
                <input type="hidden" name="action" value="login">
                <button type="submit" class="btn btn-primary" name="btnLogin">Login</button>
            </form>

            <br>
            <a href="./register.php" class="registerLink"> >> create new account << </a>
        </div>
        <div class="col-md">
        </div>
    </div>
</div>
<?PHP
} 
?>

<?PHP
require_once 'footer.php';
?>
