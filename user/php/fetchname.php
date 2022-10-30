<?php
require_once '../config/db.php'; 

$name = $_GET['rid'];

$query = "SELECT  `username` FROM `users` WHERE `reference_id` = '$name'";
$sql = mysqli_query($con , $query);
$data = mysqli_fetch_array($sql);
$dataj = json_encode($data);
// print_r($data);
// $result = $data['username'];
// return $data;
echo $dataj;

?>