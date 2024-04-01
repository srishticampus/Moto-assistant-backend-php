<?php
require 'connection.php';
$id=$_GET['id'];
$sql="delete from services where id=$id";
$result=$con->query($sql);
if(!$result){
	header("location:all_service.php?status=failed");
}
else{
	header("location:all_service.php?status=success");
}
?>