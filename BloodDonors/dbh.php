<?php
/*
   $host = "sql2.webzdarma.cz";
    $dbUsername = "darujkreveuw6933";
    $dbPassword = "Beruska2";
    $dbname = "darujkreveuw6933";
  */
  
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "darujkrev";

       //create connection     
    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbname); 
        
if (!$conn) {
          
    die("Connection failed: ".mysqli_connect_error());
} 
 