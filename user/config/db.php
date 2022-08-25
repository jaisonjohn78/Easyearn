<?php
    
    // $con = mysqli_connect("localhost","root","","easyearn");
    $con = mysqli_connect("127.0.0.1:3306","u706182210_root","easylearn@1","u706182210_easyearn");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }


?>