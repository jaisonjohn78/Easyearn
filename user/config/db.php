<?php
    
    // $hostname = "127.0.0.1:3306";
    // $username = "u706182210_root";
    // $password = "Easyearn@1";
    // $database = "u706182210_easyearn";

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "easyearn";

    // $con = mysqli_connect("localhost","root","","easyearn");
    
    // $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    // if (mysqli_connect_errno()){
    //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // }

    $con = mysqli_connect($hostname, $username, $password, $database) or die("Database connection failed");
    $base_url = "http://localhost/Easyearn/";
    $my_email = "hardikzz0409@gmail.com";
    $password = "cnrtxgwyqwmhocpa";
?>