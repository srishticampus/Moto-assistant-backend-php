<?php

require 'connection.php';
$seller_id=$_REQUEST['seller_id'];
$data=array();
$sql="select * from product where seller_id=$seller_id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
	$data[]=array("id"=>$row['id'],
                 "name"=>$row['name'],
                 "mrp"=>$row['mrp'],
                 "selling_price"=>$row['selling_price'],
                 "quantity"=>$row['quantity'],
                 "image"=>"http://campus.sicsglobal.co.in/Project/Moto/api/uploads/".$row['image'],
                 "description"=>$row['description'],"seller_id"=>$row['seller_id']);
}
	$post=array("status"=>true,
                 "message"=>"Product Details",
                 "productDetails"=>$data);
}
else{
	$post=array("status"=>false,
                 "message"=>"No Product Details",
                 "productDetails"=>$data);
}
echo json_encode($post);

?>