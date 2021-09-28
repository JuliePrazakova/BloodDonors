<?php
session_start();

if (!isset($_SESSION['userUid'])) {
    header("Location: ../maturita/hospital.php?new");
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="secondStyle.css">
    </head>
    <body>      
        <header>
            <div class="logo">DarujKrev.cz</div>
            <div id="admin">
                <form method="post" action="signupForm.php"> 
                    <button type="submit">přidat účet</button>
                </form>
                <form method="post" action="logout.php">   
                    <button type="submit" >odhlásit se</button>
                </form>
            </div>
        </header>
        <section class="signup-form">
            <div class="signup-form-top"><h1>Přidejte uživatele</h1>
  <?php
     if (isset($_GET['error'])){
        if ($_GET['error'] == "emptyfields") {
            echo '<div class="error">Vyplňte všechny údaje</div>';
        }
        else if ($_GET['error'] == "invalidlogin") {
            echo '<div class="error">Zadané jméno je neplatné</div>';
        }
        else if ($_GET['error'] == "passwordcheck") {
            echo '<div class="error">Hesla se neshodují</div>';
        }
     }
     elseif (isset($_GET['signup'])) {
         echo '<div class="success">Uživatel byl přidán</div>';
        }
?>  
            </div>
            <form action="signup.php" method="post">
                <input type="text" name="login" placeholder="Jméno"><br>
                <input type="password" name="pwd" placeholder="Heslo"><br>
                <input type="password" name="pwd-repeat" placeholder="Zopakujte heslo"><br>
                <button type="submit" name="signup-submit">Přidat</button>
            </form>
        </section>
        <div class="back-to-dat">
            <div> 
                <a href="database.php">Zpět do databáze</a>
            </div> 
        </div>
        <footer>
            <div>Designed by Julie Pražáková</div>
            <span> Registrační systém 2020</span>
        </footer>
    </body>
</html>
