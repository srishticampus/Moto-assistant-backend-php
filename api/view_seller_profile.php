<?php
require 'connection.php';
$seller_id=$_REQUEST['seller_id'];

$sql="select * from seller where id=$seller_id and  status=1";
$result=$con->query($sql);
$count=$result->num_rows;
$details=array();
$data=array();
if($count>0){
	$row=$result->fetch_assoc();
	  $details[]=array("id"=>$row['id'],
                   "name"=>$row['name'],
                   "phone"=>$row['phone'],
                   "email"=>$row['email'],
                   "address"=>$row['address'],
                   "district"=>$row['district'],
                   "state"=>$row['state'],
                   "address"=>$row['address'],
                   "license_number"=>$row['license_number'],
                   "image"=>"http://campus.sicsglobal.co.in/Project/Moto/api/uploads/".$row['file'],
                   "device_token"=>($row['device_token']==null)?"":$row['device_token'],
                   "status"=>$row['status']);
	  $data=array("status"=>true,
	               "message"=>"Login Successfull",
	               "sellerDetails"=>$details);

	}
	else{
		  $data=array("status"=>false,
	               "message"=>"Login Failed",
	               "sellerDetails"=>$details);

	}
	echo json_encode($data);

?>