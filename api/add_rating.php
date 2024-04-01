<?php
require 'connection.php';
$data=array();
$user_id=$_REQUEST['user_id'];
$workshop_id=$_REQUEST['workshop_id'];
$service_id=$_REQUEST['service_id'];
$ratcount=$_REQUEST['ratcount'];
$request_id=$_REQUEST['request_id'];
$review=$_REQUEST['review'];
// $sql="select * from rating where user_id='$user_id' and workshop_id='$workshop_id' and service_id='$service_id'";
// $result=$con->query($sql);
// $count=$result->num_rows;
// if($count>0){
// 	$sq="update rating set count='$ratcount',review='$review' where user_id='$user_id' and workshop_id='$workshop_id' and service_id='$service_id'";
// 	$res=$con->query($sq);
// 	$data=array("status"=>true,
//                   "message"=>"Rating added Successfull");
// }
// else{
$sql="INSERT INTO `rating`(`count`, `user_id`, `workshop_id`, `service_id`,`request_id`,`review`) VALUES ('$ratcount','$user_id','$workshop_id','$service_id','$request_id','$review')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0){
	$data=array("status"=>true,
                  "message"=>"Rating added Successfull");
}
else{
	 $data=array("status"=>false,
                  "message"=>"Rating added Successfull");
	//echo $sql;
}
//}
echo json_encode($data);
?>