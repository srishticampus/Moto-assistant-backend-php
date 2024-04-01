<?php
require 'connection.php';
session_start();
$id=$_GET['id'];
$sql="delete from user where id=$id";
$result=$con->query($sql);
if(!$result){
	header("location:view_user.php?status=failed");
}
else{
	header("location:view_user.php?status=success");
}

?>