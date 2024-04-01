<?php

require 'connection.php';
$data=array();
$sql="select * from workshop where status=1";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while($row=$result->fetch_assoc()){
		$data[]=array("id"=>$row['id'],
	                  "workshop_name"=>$row['workshop_name'],
	                  "email"=>$row['email'],
	                  "phone"=>$row['phone'],
	                  "place"=>$row['place'],
	                  "lattitude"=>$row['lattitude'],
	                  "longitude"=>$row['longitude'],
	                  "address"=>$row['address'],
	                  "password"=>$row['password'],
	                  "file"=>"http://campus.sicsglobal.co.in/Project/Moto/Workshop/uploads/".$row['file'],
	                  "created_at"=>$row['created_at']);
	}
	$post=array("status"=>true,
                "message"=>"Workshop Details",
                "workshopDetails"=>$data);
}
else{
	$post=array("status"=>false,
                "message"=>"No Workshop Details",
                "workshopDetails"=>$data);
}
echo json_encode($post);
?>