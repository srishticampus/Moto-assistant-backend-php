<?php

require 'connection.php';
$userid=$_REQUEST['userid'];
$sql="update user set device_token=null where id=$userid";
$result=$con->query($sql);
if(!$result){
	$data=array('status'=>false,
               'message'=>'Failed');
}
else{
	
	$data=array('status'=>true,
               'message'=>'Successfull');
}
echo json_encode($data)

?>