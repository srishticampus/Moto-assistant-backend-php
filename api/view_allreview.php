<?php

require 'connection.php';
$workshop_id=$_REQUEST['workshop_id'];
$data=array();
$sql="SELECT rating.id,rating.count,rating.review,rating.workshop_id,rating.user_id,workshop.workshop_name,workshop.email,workshop.phone,workshop.place,workshop.address,user.name as uname,rating.created_at,user.profilePic,user.email as uemail,user.phone_number,user.address as uaddress,request.service_name FROM rating INNER JOIN workshop ON rating.workshop_id=workshop.id INNER JOIN request on workshop.id=request.workshop_id INNER JOIN user on request.user_id=user.id where rating.workshop_id=$workshop_id and workshop.status=1";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	while ($row=$result->fetch_assoc()) {
                $created_at=$row['created_at'];
                $date=date('Y-m-d',strtotime($created_at));
                $time=date('h:i:s',strtotime($created_at));
	$data[]=array("id"=>$row['id'],
                 "count"=>$row['count'],
                 "review"=>$row['review'],
                 "workshop_id"=>$row['workshop_id'],
                 "user_id"=>$row['user_id'],
                 "workshop_name"=>$row['workshop_name'],
                 "workshop_email"=>$row['email'],
                 "workshop_phone"=>$row['phone'],
                 "workshop_place"=>$row['place'],
                 "workshop_address"=>$row['address'],
                 "username"=>$row['uname'],
                 "user_email"=>$row['uemail'],
                 "user_phone"=>$row['phone_number'],
                 "user_address"=>$row['uaddress'],
                 "service_name"=>$row['service_name'],
                 "date"=>$date,
                 "time"=>$time,
                 "profilePic"=>"http://campus.sicsglobal.co.in/Project/Moto/api/uploads/".$row['profilePic']);

	}
	$post=array("status"=>true,
                "message"=>"review listed",
                "reviewDetails"=>$data);
}
else{
	$post=array("status"=>false,
                "message"=>"No reviews Found",
                "reviewDetails"=>$data);

}
echo json_encode($post);

?>