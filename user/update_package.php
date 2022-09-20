<?php
 require_once 'config/db.php'; 
 require_once 'config/function.php'; 
 $id = $_SESSION['ID'];
 if(!isset($_SESSION['ID'])){
     header("location: index.php");
 }
 $query = "select * from users where id='$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    
    
 if(isset($_POST['amt']) && isset($_POST['package_name'])){
    $amt=$_POST['amt'];
    $package_name=$_POST['package_name'];
    $username = $row['username'];
    $payment_status="pending";
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($con,"INSERT into payment(`name`,`package_name`,`amount`,`payment_status`,`added_on`) values('$username','$package_name','$amt','$payment_status','$added_on')");
    $_SESSION['id']=mysqli_insert_id($con);
}

if(isset($_POST['payment_id'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($con,"UPDATE payment SET payment_status='complete',payment_id='$payment_id'
    where id='".$_SESSION['id']."'");
}

?>