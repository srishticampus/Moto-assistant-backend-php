<?php
require 'connection.php';
session_start();
$id=$_GET['id'];
$sql="update workshop set status=1 where id=$id";
$result=$con->query($sql);
if(!$result){
	header("location:workshop.php?status=failed");

}
else{
	header("location:workshop.php?status=success");
}

?>