<?php
    
    $dbhost = "127.0.0.1:3306";
    $dbuser = "u706182210_root";
    $dbpass = "easylearn@1";
    $dbname = "u706182210_easyearn";

    // $con = mysqli_connect("localhost","root","","easyearn");
    
    $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }


?>