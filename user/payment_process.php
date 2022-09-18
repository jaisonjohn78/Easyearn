<?php
session_start();
require_once 'config/db.php'; 
require_once 'config/function.php'; 

if(isset($_POST['amt']) && isset($_POST['package_name']) && isset($_POST['username'])){
    $username=$_POST['username'];
    $amt=$_POST['amt'];
    $package_name=$_POST['package_name'];
    $payment_status="pending";
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($con,"INSERT into payment(name,package_name,amount,payment_status,added_on) values('$name','$package_name','$amt','$payment_status','$added_on')");
    $_SESSION['id']=mysqli_insert_id($con);
}

if(isset($_POST['payment_id'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($con,"UPDATE payment SET payment_status='complete',payment_id='$payment_id'
    where id='".$_SESSION['id']."'");
}
?>