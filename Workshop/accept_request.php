<?php
require 'connection.php';
session_start();
date_default_timezone_set('Asia/Kolkata');
define( 'API_ACCESS_KEY','AAAAoulLdz0:APA91bFpu571xw9Z9oWg08_75LBN-7_cNFu8R3GvP1-Bq9XZfkOyekFFuR9ruitVUWIu5LlVJJroHH3nPk3EO1c5wlgnjf2hHVAEmNZ2zVuxqjafTcGI8g-9Iv47e_iR3pVoow-RSpsU');
$request=$_POST['request'];
$tname=$_POST['tname'];
$user_id=$_POST['user_id'];
$price=$_POST['price'];
$phone=$_POST['phone'];
 $date=date('Y-m-d');
    $time=date('H:i:s');
$sql1="select * from user where id=$user_id";
$result1=$con->query($sql1);
$count1=$result1->num_rows;
if($count1>0){
	while ($row1=$result1->fetch_assoc()) {
		$device=$row1['device_token'];
	}
}

$registrationIds = array($device);
if($_POST['accept']){
	//echo "hao";die();
	$astatus='accept';
$sql="update request set status=1 ,staff_name='$tname',phone='$phone',accept_date='$date',accept_time='$time',price='$price' where id=$request";
$result=$con->query($sql);
}
else if($_POST['reject']){
	//echo 'hello';die();
	$astatus='reject';
	$sql="update request set status=4 ,staff_name='$tname',phone='$phone',accept_date='$date',accept_time='$time',price=0 where id=$request";
$result=$con->query($sql);

}

$sq="select * from request where id=$request";
$res=$con->query($sq);
$rowResult=$res->fetch_assoc();
$staff_name=$rowResult['staff_name'];
$price=$rowResult['price'];


$msg= array('Staff_name'=>$staff_name,'Price'=>$price,'Phone'=>$phone,'date'=>$date,'time'=>$time,'status'=>$astatus);
$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg
);




 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($fields));
//curl_setopt( $ch,CURLOPT_POSTFIELDS, json_decode( $fields ) );
$result = curl_exec($ch );



curl_close($ch);



 $post = array("payload"=>$msg);
 // echo $result;die();

if(!$result){
	header("location:view_request.php?status=failed");
}
else{
	header("location:view_request.php?status=success");
}
?>