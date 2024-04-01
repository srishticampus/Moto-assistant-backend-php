<?php
require 'connection.php';
session_start();
$email=$_POST['email'];
$pass=$_POST['pass'];
$sql="select * from workshop where email='$email' and password='$pass' and status=1";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$row=$result->fetch_assoc();
	$_SESSION['id']=$row['id'];
	echo 1;
}
else{
	echo 0;
}


?>