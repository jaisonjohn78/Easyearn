<?php

require_once 'config/db.php'; 
    require_once 'config/function.php'; 
    $id = $_SESSION['ID'];
    $msg="";
    $query = "select * from users where id=$id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $ref_code = $row['reference_id'];

    $sql1 = mysqli_query($con,"SELECT * from `reference` WHERE `username` = 'lalit'");
    

?>