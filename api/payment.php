<?php
require 'connection.php';
$user_id=$_REQUEST['user_id'];
$request_id=$_REQUEST['request_id'];
$data=array();
$sql="update request set status=3 where user_id=$user_id and id=$request_id";
$result=$con->query($sql);
if(!$result){
$data=array("status"=>false,
           "message"=>"Payment Failed");
}
else{
	
	$data=array("status"=>true,
           "message"=>"Payment Successfull");
}
echo json_encode($data);
?>