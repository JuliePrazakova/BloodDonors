<!DOCTYPE html>
<html>
    <head>
        <title>DarujKrev.cz</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="secondStyle.css">
    </head>
    <body>
        <header>
            <div class="logo">DarujKrev.cz</div>
        </header>
        <form method="POST" action="log-in.php"  >
            <div class="hospital-box">
                <div class="hospital-box-div"><h1>DarujKrev.cz</h1></div>
                <div>
                    <input type="text" placeholder="Přihlašovací jméno" class="form-box" name="username" required>
                </div>
                <div>
                    <input type="password" class="form-box" placeholder="Heslo" name="password" required>
                </div>
                <div class="hospital-box-btnSub"> 
                    <input type="submit" name="login-submit" class="btSub-hospital" value="Přihlásit">
                </div>
            </div>
        </form> 
        <footer>
            <div>Designed by Julie Pražáková</div>
            <span> Registrační systém 2020</span>
        </footer>
    </body>
</html>