<?php

require 'connection.php';
$pid=$_GET['pid'];
$sql="delete from product where id=$pid";
$result=$con->query($sql);
if(!$result)
{
	header("location:view_product.php?status=failed");
}
else{
	header("location:view_product.php?status=success");
}
?>