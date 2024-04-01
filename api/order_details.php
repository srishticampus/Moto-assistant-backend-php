<?php
require 'connection.php';
$user_id=$_REQUEST['user_id'];
$request_id=$_REQUEST['request_id'];
$data=array();
$completion_status="";
$sql="select * from request where user_id=$user_id and id=$request_id";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0)
{
	while($row=$result->fetch_assoc()){
		$status="";
if($row['status']==0){
	$status="not_paid";
	$completion_status="Requested";
}
else if($row['status']==1){
	$status="not_paid";
	$completion_status="inprogress";
}
else if($row['status']==2){
	$status="not_paid";
	$completion_status="Completed";
}
else if($row['status']==3){
	$status="paid";
	$completion_status="Completed";
}

$workshop_id=$row['workshop_id'];

$request_id=$row['id'];
$rating_status=false;
$rating_xount=0;

$sq="select * from workshop where id=$workshop_id and status=1";
$res=$con->query($sq);

$ro=$res->fetch_assoc();
$sq1="select * from rating where workshop_id=$workshop_id and request_id=$request_id";
$res1=$con->query($sq1);
$co=$res1->num_rows;
$review_status=false;
if($co>0){
	$ro1=$res1->fetch_assoc();
	$rating_status =true;
	$rating_xount=$ro1['count'];
	$r_status=$ro1['review'];
	if($r_status==null){
$review_status=false;
	}
	else{
		$review_status=true;
	}

}
else{
	$rating_status =false;
	$rating_xount=0;
}



		$data[]=array("request_id"=>$row['id'],
	                 "workshop_id"=>$row['workshop_id'],
	                 "user_id"=>$row['user_id'],
	                 "service_name"=>($row['service_name']==null)?"":$row['service_name'],
	                 "service_id"=>($row['service_id']==null)?"":$row['service_id'],
	                 "description"=>($row['description']==null)?"":$row['description'],
	                 "staff_name"=>($row['staff_name']==null)?"":$row['staff_name'],
	                 "estimated_price"=>($row['price']==null)?"":$row['price'],
	                 "final_price"=>($row['final_price']==null)?"":$row['final_price'],
	                 "phone"=>($row['phone']==null)?"":$row['phone'],
	              "accept_date"=>($row['accept_date']==null)?"":$row['accept_date'],
	              "accept_time"=>($row['accept_time']==null)?"":$row['accept_time'],
	              "payment_status"=>$status,
	              "completion_status"=>$completion_status,
	              "requestcraeted_at"=>($row['craeted_at']==null)?"":$row['craeted_at'],
	              "workshop_name"=>($ro['workshop_name']==null)?"":$ro['workshop_name'],
	              "email"=>($ro['email']==null)?"":$ro['email'],
	              "workshop_phone"=>($ro['phone']==null)?"":$ro['phone'],
	              "place"=>($ro['place']==null)?"":$ro['place'],
	              "lattitude"=>($ro['lattitude']==null)?"":$ro['lattitude'],
	              "longitude"=>($ro['longitude']==null)?"":$ro['longitude'],
	              "address"=>($ro['address']==null)?"":$ro['address'],
	              "password"=>($ro['password']==null)?"":$ro['password'],
	              "description"=>($row['description']==null)?"":$row['description'],
	              "file"=>($ro['file']==null)?"":"http://campus.sicsglobal.co.in/Project/Moto/Workshop/uploads/".$ro['file'],
	              "rating_status"=>$rating_status,
	              "rating_count"=>(int)$rating_xount,
	              "review_status"=>$review_status,
	              "review"=>$ro1['review']);
	}
	$post=array("status"=>true,
                "message"=>"Order History",
                "orderHistory"=>$data);
}
else{
	$post=array("status"=>false,
                "message"=>"No Order History",
                "orderHistory"=>$data);

}
echo json_encode($post);

?>