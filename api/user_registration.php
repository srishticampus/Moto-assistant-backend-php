<?php
require 'connection.php';
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$address=$_POST['address'];
$device_token=$_POST['device_token'];
$upload_dir = 'uploads/';
$details=array();
$server_url = '/home/ubuntu/html/Project/Moto/api/';
 $avatar_name = $_FILES["image"]["name"];
    
    $avatar_tmp_name = $_FILES["image"]["tmp_name"];
 
    $error = $_FILES["image"]["error"];
   
$data=array();
$sql="select * from user where phone_number='$phone'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	$data=array("status"=>false,
              "message"=>"User Already Exist",
              "userDetails"=>array());
	}
	else{


		 $random_name = rand(1000,1000000)."-".$avatar_name;
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);


         $upload_name= $server_url."/".$upload_name;
         
  move_uploaded_file($avatar_tmp_name,$upload_name);
            $image= basename($upload_name);
          
$sql="INSERT INTO `user`(`name`, `email`, `phone_number`, `password`, `address`, `profilePic`,`device_token`) VALUES ('$name','$email','$phone','$password','$address','$image','$device_token')";
$result=$con->query($sql);
$count=$con->affected_rows;
$last_id = $con->insert_id;
if($count>0)
{
	$query="select * from user where id=$last_id";
	$queryResult=$con->query($query);
	while($row=$queryResult->fetch_assoc()){
    $details[]=array("id"=>$row['id'],
                   "name"=>$row['name'],
                   "phone"=>$row['phone_number'],
                   "email"=>$row['email'],
                   "address"=>$row['address'],
                   "password"=>$row['password'],
                   "image"=>"http://campus.sicsglobal.co.in/Project/Moto/api/uploads/".$row['profilePic'],
                   "device_token"=>$row['device_token']);
  }


$data=array("status"=>true,
              "message"=>"Registration Success",
              "userDetails"=>$details);
}
else{
	$data=array("status"=>false,
              "message"=>"Registration Failed",
              "userDetails"=>array());
	

}
}
echo json_encode($data);

?>