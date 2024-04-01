<?php
require 'connection.php';
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$address=$_POST['address'];

$id=$_POST['userid'];
$upload_dir = 'uploads/';
$details=array();
$data=array();
$server_url = '/home/ubuntu/html/Project/Moto/api/';
 $avatar_name = $_FILES["image"]["name"];
    
    $avatar_tmp_name = $_FILES["image"]["tmp_name"];
 
    $error = $_FILES["image"]["error"];

    $random_name = rand(1000,1000000)."-".$avatar_name;
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);


         $upload_name= $server_url."/".$upload_name;
               if($avatar_name==""){
  $query="select * from user where id=$id";
  $resultQuery=$con->query($query);
  $row=$resultQuery->fetch_assoc();
  $image=$row['profilePic'];

}
else{
  move_uploaded_file($avatar_tmp_name,$upload_name);
            $image= basename($upload_name);
}
          
$sql="UPDATE `user` SET `name`='$name',`email`='$email',`phone_number`='$phone',`address`='$address',`profilePic`='$image' WHERE id=$id";
$result=$con->query($sql);
//$count=$con->affected_rows;
//$last_id = $con->insert_id;
if(!$result)
{
	



$data=array("status"=>false,
              "message"=>"Updated Failed");
}
else{

	$data=array("status"=>true,
              "message"=>"Updated Success");
	

}
echo json_encode($data);

?>