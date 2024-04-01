<?php

require 'connection.php';
$product_id=$_REQUEST['product_id'];
$sql="delete from product where id=$product_id";
$result=$con->query($sql);
if(!$result){
	$data=array("status"=>false,
                "message"=>"product deleted failed");
}
else{
	$data=array("status"=>true,
                "message"=>"product deleted successfull");

}
echo json_encode($data);
?>