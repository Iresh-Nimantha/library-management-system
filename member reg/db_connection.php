<?php

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "library_system";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if(!$conn){
        die('Connection failed'.mysqli_error());
    }
 

?>