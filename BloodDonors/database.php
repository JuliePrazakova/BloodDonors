<!DOCTYPE html>
<html>
<head>
    <title>DarujKrev.cz</title>
    <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="secondStyle.css">
    </head>
 <body>     
     <?php require 'header_database.php'; ?>
     
    <table id="customers">
        <tr>
            <th>Jméno</th>
            <th>Příjmení</th>
            <th>Datum narození</th>
            <th>Email</th>
            <th>Daroval</th>
            <th>Krevní skupina</th>
            <th>Datum odběru</th>
        </tr>
<?php  
     require 'dbh.php';   
// if the user clicked on a search button -> btSort = isset ---> then if user choose only actual or all(old) dates     
     if (isset($_POST['btSort'])) {
        if (!isset($_POST['old'])) {    
            $btSort = $_POST["btSort"];
            $display = $_POST['display'];
            if ($btSort == "") {
                if ($display == "") {
                    $sql = "SELECT * FROM donors WHERE DATE(selectedDate) >= DATE(NOW()) ORDER BY (selectedDate) ASC;";
                }
                else {
                    $sql = "SELECT * FROM donors WHERE subject = '".$display."' AND DATE(selectedDate) >= DATE(NOW()) ORDER BY (selectedDate) ASC;";
                }        
             }
             else {
                if ($display == "") {
                    $sql = "SELECT * FROM donors WHERE bloodType = '".$btSort."' AND DATE(selectedDate) >= DATE(NOW()) ORDER BY (selectedDate) ASC;";
                 }
                else {
                    $sql = "SELECT * FROM donors WHERE subject = '".$display."' AND bloodType = '".$btSort."' AND DATE(selectedDate) >= DATE(NOW()) ORDER BY (selectedDate) ASC;";
                } 
              }  
            
                $result = $conn-> query($sql);
                    while ($row = $result-> fetch_assoc()) {
                        echo "<tr><td>". $row["name"] ."</td><td>". $row["surname"] ."</td><td>". $row["dateOfBirth"] ."</td><td>". $row["email"] ."</td><td>". $row["subject"] ."</td><td>". $row["bloodType"] ."</td><td>". date("d-m-Y",strtotime($row['selectedDate'])) ."</td></tr>";
                    }
                    echo "</table>";         
        }
            
        //in case user did click on "display ALL" = even old dates    
        else {
            $btSort = $_POST["btSort"];
            $display = $_POST['display'];
            if ($btSort == "") {
                if ($display == "") {
                    $sql = "SELECT * FROM donors ORDER BY (selectedDate) ASC;";
                 }
                else {
                    $sql = "SELECT * FROM donors WHERE subject = '".$display."'; ORDER BY (selectedDate) ASC";
                } 
                        
            }
            else {
                if ($display == "") {
                    $sql = "SELECT * FROM donors WHERE bloodType = '".$btSort."' ORDER BY (selectedDate) ASC;";
                }
                else {
                     $sql = "SELECT * FROM donors WHERE subject = '".$display."' AND bloodType = '".$btSort."' ORDER BY (selectedDate) ASC;";
                } 
            }  
            
            $result = $conn-> query($sql);
                while ($row = $result-> fetch_assoc()) {
                    echo "<tr><td>". $row["name"] ."</td><td>". $row["surname"] ."</td><td>". $row["dateOfBirth"] ."</td><td>". $row["email"] ."</td><td>". $row["subject"] ."</td><td>". $row["bloodType"] ."</td><td>". date("d-m-Y",strtotime($row['selectedDate'])) ."</td></tr>";
                }
                echo "</table>";
        }           
    }
        
// default display of dates without clicking on the search button = from today into future
    else {
        $sql = "SELECT * from donors WHERE DATE(selectedDate) >= DATE(NOW()) ORDER BY (selectedDate) ASC;";            
            
        $result = $conn-> query($sql);
            while ($row = $result-> fetch_assoc()) {
                echo "<tr id='first'><td>". $row["name"] ."</td><td>". $row["surname"] ."</td><td>". $row["dateOfBirth"] ."</td><td>". $row["email"] ."</td><td>". $row["subject"] ."</td><td>". $row["bloodType"] ."</td><td>". date("d-m-Y",strtotime($row['selectedDate'])) ."</td></tr>";
            }
            echo "</table>";
        }
     $conn-> close(); 
?>
        </table>
        <footer>
            <div>Designed by Julie Pražáková</div>
            <span> Registrační systém 2020</span>
        </footer>
    </body>
</html>