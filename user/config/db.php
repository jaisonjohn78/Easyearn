<?php
    
    // $hostname = "127.0.0.1:3306";
    // $username = "u706182210_root";
    // $password = "Easyearn@1";
    // $database = "u706182210_easyearn";

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "u706182210_easyearn";

    // $con = mysqli_connect("localhost","root","","easyearn");
    
    // $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    // if (mysqli_connect_errno()){
    //     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // }

    $con = mysqli_connect($hostname, $username, $password, $database) or die("Database connection failed");
    $base_url = "http://www.easyearn/";
    $my_email = "easyearnfoundation@gmail.com";
    $password = "ffasdgrsrrgiuoij";
?>