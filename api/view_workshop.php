<?php

require 'connection.php';
$data=array();
$id=$_REQUEST['id'];
$sql="select * from workshop where id=$id and status=1";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$userCount=0;
	$workshop_rating=0;
$row=$result->fetch_assoc();

$id=$row['id'];

		$sql1="select * from rating where workshop_id=$id ";
		$result1=$con->query($sql1);
		$count1=$result1->num_rows;
		while($row1=$result1->fetch_assoc()){
		$total_rate=$count1*5;
		$userCount+=$row1['count'];
		$percentage=($userCount/$total_rate)*100;
		$workshop_rating= ($percentage/100)*5;
	}
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
	                  "distance"=>"",
	                  "rat_percentage"=>$percentage,
	                  "workshop_rating"=>$workshop_rating,
	                  "no_of_rating"=>$count1,
	                  "created_at"=>$row['created_at']);
	
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