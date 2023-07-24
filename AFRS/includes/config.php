<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $db_name = "tax_wizard";
    $conn = new mysqli($servername,$username,$password,$db_name);
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
        }

?>