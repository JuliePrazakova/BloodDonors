<?php

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
        
if  (empty($subject) || empty($name) || empty($surname) ||empty($email) ||empty($dateOfBirth) ||empty($selectedDate) ||empty($bloodType)) {
     header("Location: ../maturita/index.php?error=emptyfields");
     exit();
 }
elseif (!preg_match("/^[a-zA-Zá-žÁ-Ž]*$/", $name) && !preg_match("/^[a-zA-Zá-žÁ-Ž]*$/", $surname) ) {
    header("Location: ../maturita/index.php?error=invalidinfo");
     exit();  
}

elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {    
    header("Location: ../maturita/index.php?error=invalidemail");
     exit();   
}
elseif (!preg_match("/^[a-zA-Zá-žÁ-Ž]*$/", $name)) {
    header("Location: ../maturita/index.php?error=invalidname");
     exit(); 
}
elseif (!preg_match("/^[a-zA-Zá-žÁ-Ž]*$/", $surname)) {
    header("Location: ../maturita/index.php?error=invalidsurname");
     exit(); 
}
else {
  //part for email sending
    $to = $email;
    $email2 = 'julpraza@gmail.com';
    $subject2 = 'Objednání oběru krve';
    $body = '<html>
                <body>
                    <h2>Objednaný termín darování krve</h2>
                    <hr>
                    <p>Jméno: '.$name.' '.$surname.'</p>
                    <p>Email: '.$email.'</p>
                    <p>Datum narození: '.$dateOfBirth.'</p>
                     <p>Krevní skupina: '.$bloodType.'</p>
                    <p>Zvolené datum odběru: '.$emailDate.'</p>
                    <p>Chci darovat: '.$subject.'</p>
                </body>
            </html>';
    //headers of the email
    $headers  = "From: DarujKrev.cz <".$email2.">\r\n";
    $headers .= "Reply-To: ".$email."\r\n";
    $headers .= "NINE-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset-utf-8";

  //inserting inputs into database   
    require 'dbh.php';   
    
    $INSERT = "INSERT Into donors (name, surname, subject, dateOfBirth, email, bloodType, selectedDate) values(?, ?, ?, ?, ?, ?, ?)";
   
    $stmt = $conn->prepare($INSERT);  
    $stmt->bind_param("sssssss", $name, $surname, $subject, $dateOfBirth, $email, $bloodType, $selectedDate);
    $stmt->execute();
    echo "<div class='confi-Top'><h3>Termín byl zarezervován</h3></div>";              
}
$stmt->close();
$conn->close();