<?php
require 'connection.php';
session_start();
$id=$_SESSION['id'];
$name=$_POST['name'];
$sql="INSERT INTO `workshop_service`(`service_id`, `workshop_id`) VALUES ('$name','$id')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	header("location:services.php?status=success");
}
else{
	header("location:services.php?status=failed");
}

?>