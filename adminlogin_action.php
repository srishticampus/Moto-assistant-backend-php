<?php
session_start();
require 'connection.php';
$email=$_POST['email'];
$pass=$_POST['pass'];
$sql="select * from admin where username='$email' and password='$pass'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	//$row=$result->fetch_assoc();
	$_SESSION['name']=true;
	echo 1;
	//header("location:Admin/index.php?status=success");
}
else{
	echo 0;
	//header("location:admin_login.php?status=failed");
}

?>