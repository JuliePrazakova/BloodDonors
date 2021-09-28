
<DOCTYPE!>
<html>
    <head> 
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="secondStyle.css">
    </head>
    <body>
        <article>
            <section class="border">
    <?php
        if (isset($_POST['btnSubmit'])) {   
            $subject = $_POST["blood"];
                if (empty($subject)) {
                    $subject = $_POST["plasma"];
                    }
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $email = $_POST["email"];
                $day = $_POST["day"] . ". ";
                $month = $_POST["month"] . " ";
                $year = $_POST["year"];
            $dateOfBirth = $day . $month . $year;
            $emailDate = $_POST['visibleDate'];
            $selectedDate =  date('Y-m-d', strtotime($_POST['selectedDate']));
            $bloodType = $_POST["bloodtype"];            

            require 'confi-php.php';
        }
        else {
            //in case someone would attempt this page without index.php 
            header("Location: ../index.php");
            exit();
        }
    ?>
                    <div class="box-button">
                        <div class="button">
                            <h1>Shrnutí údajů</h1>
                        </div>  
                    </div>
                    <br>
                    <div style="display: flex">
                        <div class="sumUp-left" >
                            jméno: <br>
                            odběr:<br>
                            email:<br>
                            datum narození:<br>
                            datum odběru:<br>
                            krevní skupina:<br>
                        </div>
                        <div class="sumUp-right"> 
                            <?php echo $_POST["name"]; ?>     
                            <?php echo $_POST["surname"]; ?><br>
                            <?php echo $subject ?><br>
                            <?php echo $_POST["email"] ?><br>
                            <?php echo $dateOfBirth ?><br>
                            <?php echo $_POST["visibleDate"] ?><br>
                            <?php echo $_POST["bloodtype"] ?>
                        </div>
                    </div>
             <?php  
        $send = mail($to, $subject2, $body, $headers);
        if ($send) {
            echo '<div class="mail-msg"><h2>Byl Vám odeslán potvrzovací mail</h2></div>';
        }
        else {
            echo '<div class="mail-msg"><h2>Nezdařilo se zaslat potvrzovací mail</h2></div>';
        }         
        ?>
            </section>
        </article>
    </body>
</html>