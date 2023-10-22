<?php      
    $host = "localhost";  
    $user = "__root";  
    $db_password = "";  
    $db_name = "db"; 
      
    $con = mysqli_connect($host, $user, $db_password, $db_name);  
    mysqli_select_db($con,"db") or die("could not connect database");
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>
