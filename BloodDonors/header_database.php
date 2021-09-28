<?php
//in case user would access the page not from login-system
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
<?php
//if the user is admin, theres is a posibility to add an account
    if ($_SESSION['userUid'] == 'admin') {
        echo '<header>
                <div class="logo">DarujKrev.cz</div>
                <div id="admin">
                    <form method="post" action="signupForm.php">   
                        <button type="submit">přidat účet</button>
                    </form>
                    <form method="post" action="logout.php">   
                        <button type="submit" >odhlásit se</button>
                    </form>
                </div>
              </header>';
    }
    else {
       echo '<header>
                <div class="logo">DarujKrev.cz</div>
                <div id="admin">
                    <form method="post" action="logout.php">   
                        <button type="submit">odhlásit se</button>
                    </form>
                </div>
             </header>';
    }
?>
            <div class="database-top"> Databáze objednaných dárců plasmy a krve</div>
            <form action="#" method="post">
                <div class="searchBar"> 
   Krevní skupiny: <select name="btSort">
                        <option value="">Všechny</option >
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="0+">0+</option>
                        <option value="0-">0-</option>
                    </select>
         Darováno: <select  name="display">
                        <option value="">Obojí</option >
                        <option value="plasma">plasma</option>
                        <option value="krev">krev</option>
                    </select>
                     <label>
                         <input type="checkbox" class="checkbox" value="old" name="old"> Zobrazit i staré záznamy
                     </label>
                     <input type="submit" value="HLEDAT" class="btnSbt" onclick="document.getElementById('first').style.display = 'none'" >
                </div>
           </form>
    </body>
</html>