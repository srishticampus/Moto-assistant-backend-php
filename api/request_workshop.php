<?php
require 'connection.php';
$workshop_id=$_REQUEST['workshop_id'];
$userid=$_REQUEST['userid'];
$service_name=$_REQUEST['service_name'];
$description=$_REQUEST['description'];
$service_id=$_REQUEST['service_id'];
// $sql="select * from request where user_id=$userid and service_id=$service_id and workshop_id=$workshop_id";
// $result=$con->query($sql);
// $count=$result->num_rows;
// if($count>0){
// $sq="UPDATE `request` SET `service_name`='$service_name',`description`='$description' WHERE user_id=$userid and service_id=$service_id and workshop_id=$workshop_id";
// $res=$con->query($sq);
// $data=array("status"=>true,
//                 "message"=>"inserted successfull");
// }
// else{

$sql="INSERT INTO `request`(`workshop_id`, `user_id`, `service_name`, `service_id`, `description`) VALUES ('$workshop_id','$userid','$service_name','$service_id','$description')";
$result=$con->query($sql);
$count=$con->affected_rows;
if($count>0)
{
	$data=array("status"=>true,
                "message"=>"inserted successfull");
}
else
{
	$data=array("status"=>false,
                "message"=>"inserted failed");
}
//}
echo json_encode($data);
?>