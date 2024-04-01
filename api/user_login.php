<?php
require 'connection.php';
$phone=$_REQUEST['phone'];
$password=$_REQUEST['password'];
$device_token=$_REQUEST['device_token'];
$data=array();
 $sq="update user set device_token='$device_token' where phone_number='$phone' and password='$password'";
      $res=$con->query($sq);
$sql="select * from user where phone_number='$phone' and password='$password'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
     
	while($row=$result->fetch_assoc()){
	$data[]=array("id"=>$row['id'],
                   "name"=>$row['name'],
                   "phone"=>$row['phone_number'],
                   "email"=>$row['email'],
                   "address"=>$row['address'],
                   "password"=>$row['password'],
                   "image"=>"http://campus.sicsglobal.co.in/Project/Moto/api/uploads/".$row['profilePic'],
                   "device_token"=>$row['device_token']);

}
$post=array("status"=>true,
            "message"=>"Login Success",
            "userDetails"=>$data);
}
else{
	$post=array("status"=>false,
            "message"=>"Login Failed",
            "userDetails"=>$data);
}
echo json_encode($post);
?>