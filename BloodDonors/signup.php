<?php
//chcek it user accessed this page through hospital.php
    session_start();
    if (!isset($_SESSION['userUid'])) {
        header("Location: ../maturita/hospital.php?new");
        exit();
    }
    else {
        if (isset($_POST['signup-submit'])) {
            require 'dbh.php';
        
            $login = $_POST['login'];
            $password = $_POST['pwd'];
            $passwordRepeat = $_POST['pwd-repeat'];
        
            if (empty($login) || empty($password) || empty($passwordRepeat)) {
                header("Location: ../maturita/signupForm.php?error=emptyfields");
                exit();
            }
            else if (!preg_match("/^[a-zA-Z0-9]*$/", $login)) {
                header("Location: ../maturita/signupForm.php?error=invalidlogin");
                exit();
            }
            else if ($password !== $passwordRepeat) {
                header("Location: ../maturita/signupForm.php?error=passwordcheck");
                exit();
            }
    //chceck if the login name is not already existing
            else {
            $sql = "SELECT login FROM logins WHERE login=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../maturita/signupForm.php?error=sqlerror");
                exit();  
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $login);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0) {
                    header("Location: ../maturita/signupForm.php?error=usernametaken");
                    exit();   
                }
                else {
                    $sql = "INSERT INTO logins (login, password) VALUES (?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../maturita/signupForm.php?error=sqlerror");
                        exit();
                    }  
                    else {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "ss", $login, $hashedPwd);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        header("Location: ../maturita/signupForm.php?signup=success");
                        exit();
                    }    
                }
            }     
         }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
      }
    
    else { 
        header("Location: ../maturita/hospital.php?new");
        exit();
    }
}

