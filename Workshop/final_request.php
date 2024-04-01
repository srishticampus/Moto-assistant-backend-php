<?php
require 'connection.php';
session_start();
$final_price=$_POST['final_price'];
$requestid=$_POST['requestid'];
$sql="update request set status=2,final_price='$final_price' where id=$requestid";
$result=$con->query($sql);
if(!$result){
	header("location:view_request.php?status=failed");
}
else{
header("location:view_request.php?status=success");	
}

?>