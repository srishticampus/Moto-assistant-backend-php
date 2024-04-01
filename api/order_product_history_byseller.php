<?php

require 'connection.php';
$seller_id=$_REQUEST['seller_id'];
$details=array();
$data=array();
$sql="SELECT order_details.id as order_id,order_details.product_id,product.name,product.mrp,product.selling_price,product.quantity,order_details.quantity as orderQuantity,product.image,product.description,product.seller_id,order_details.user_id,order_details.created_at FROM order_details INNER JOIN product ON order_details.product_id=product.id where product.seller_id=$seller_id";
$result=$con->query($sql);

$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
		$details[]=array("order_id"=>$row['order_id'],
	                     "product_id"=>$row['product_id'],
	                     "name"=>$row['name'],
	                     "mrp"=>$row['mrp'],
	                     "selling_price"=>$row['selling_price'],
	                     "product_quantity"=>$row['quantity'],
	                     "order_quantity"=>$row['orderQuantity'],
	                     "image"=>"http://campus.sicsglobal.co.in/Project/Moto/api/uploads/".$row['image'],
	                     "description"=>$row['description'],
	                     "seller_id"=>$row['seller_id'],
	                     "user_id"=>$row['user_id'],
	                     "created_at"=>$row['created_at']);


	}
	$data=array("status"=>true,
               "message"=>"order details",
               "orderDetails"=>$details);

}
else{
		$data=array("status"=>false,
               "message"=>"no order details",
               "orderDetails"=>$details);

}
echo json_encode($data);
?>