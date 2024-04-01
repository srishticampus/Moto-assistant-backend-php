<?php
require 'connection.php';
$data=array();
$sql="select * from services";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
		$data[]=array('id'=>$row['id'],
	                 'service_name'=>$row['service_name'],
	                'file'=>"http://campus.sicsglobal.co.in/Project/Moto/Workshop/uploads/".$row['file']);
	}
	$post=array("status"=>true,
               "message"=>"Service Details",
               "serviceDetails"=>$data);
}
else{
	$post=array("status"=>false,
               "message"=>"No Service Details",
               "serviceDetails"=>$data);
}
echo json_encode($post);
?>