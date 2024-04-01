<?php
require 'connection.php';
$userid=$_REQUEST['userid'];
$requestid=$_REQUEST['requestid'];
$data=array();
$sql="select * from request where user_id=$userid and id=$requestid";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$row=$result->fetch_assoc();
	$data[]=array('id'=>$row['id'],
		           "workshop_id"=>$row['workshop_id'],
		           "service_name"=>$row['service_name'],
		           "estimated_price"=>$row['price'],
		           "final_price"=>$row['final_price'],
                  );

$post=array("status"=>true,
	"message"=>"Payment Details",
            "paymentDetails"=>$data);

}
else{
	$post=array("status"=>false,
	"message"=>"No Payment Details",
            "paymentDetails"=>$data);
}
echo json_encode($post);

?>