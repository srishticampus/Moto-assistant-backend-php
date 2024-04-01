<?php
require 'connection.php';
$product_id=$_REQUEST['product_id'];
$quantity=$_REQUEST['quantity'];
$shipping_address=$_REQUEST['shipping_address'];
$user_id=$_REQUEST['user_id'];
$co="";

$sql="select * from product where id=$product_id";
$result=$con->query($sql);
$ro=$result->fetch_assoc();
$co=$ro['quantity'];
if($co==0||$co<0){

	$data= array("status"=>false,
                 "message"=>"product outoff stock");
}
else{
$sql="INSERT INTO `order_details`( `product_id`, `quantity`, `user_id`) VALUES ('$product_id','$quantity','$user_id')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	if($co>=$quantity){
	$query="update product set quantity=quantity-$quantity where id=$product_id";
	$queryResult=$con->query($query);

	$data= array("status"=>true,
                 "message"=>"product ordered");
}
else{

	$data= array("status"=>false,
                 "message"=>"product ordering failed");
}
}
else{

	$data= array("status"=>false,
                 "message"=>"product ordering failed");
}
}
echo json_encode($data)

?>