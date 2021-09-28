
<?php 
//connection with database  
    require 'dbh.php';   
//chceck if user didnt access this page other way than through hospital.php
    if(isset($_POST['login-submit'])) {
        $login=$_POST['username'];
        $password=$_POST['password'];
           
        $sql = "SELECT * FROM logins WHERE login=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../maturita/hospital.php?error=sqlerror");
            exit();
         }
        else {
            mysqli_stmt_bind_param($stmt, "s", $login);
            mysqli_stmt_execute($stmt);
         
            $result = mysqli_stmt_get_result($stmt);    
            if($row = mysqli_fetch_assoc($result)) {
                //hashed password for security                
                $pwdCheck = password_verify($password, $row['password']);
                if ($pwdCheck == false) {
                    header("Location: ../maturita/hospital.php?error=wrongpwd");
                    exit(); 
            }
                else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId']= $row['id'];
                    $_SESSION['userUid']= $row['login'];
                 
                    header("Location: ../maturita/database.php?login=sucess");
                    exit();
                }
                else {
                    header("Location: ../maturita/hospital.php?error=wrongpwd");
                    exit();   
                }
            }
            else{
                header("Location: ../maturita/hospital.php?error=nouser");
                exit();        
            }
        }
    }
else {
    header("Location: ../maturita/hospital.php");
    exit();             
}