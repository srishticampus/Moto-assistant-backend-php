<?php

require 'connection.php';
$userid=$_REQUEST['userid'];
$data=array();
$sql="select * from user where id=$userid";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$row=$result->fetch_assoc();
	$data[]=array("id"=>$row['id'],
                   "name"=>$row['name'],
                   "phone"=>$row['phone_number'],
                   "email"=>$row['email'],
                   "address"=>$row['address'],
                   "password"=>$row['password'],
                   "image"=>"http://campus.sicsglobal.co.in/Project/Moto/api/uploads/".$row['profilePic'],
                   "device_token"=>$row['device_token']);
	$post=array("status"=>true,
                 "message"=>"User Details",
                 "userDetails"=>$data);
}
else{
	$post=array("status"=>false,
                 "message"=>"No User Details",
                 "userDetails"=>$data);
}
echo json_encode($post);

?>