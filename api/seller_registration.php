<?php
require 'connection.php';
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$address=$_POST['address'];
$device_token=$_POST['device_token'];
$license_number=$_POST['license_number'];
$district=$_POST['district'];
$state=$_POST['state'];
$upload_dir = 'uploads/';
$details=array();
$server_url = '/home/ubuntu/html/Project/Moto/api/';
 $avatar_name = $_FILES["image"]["name"];
    
    $avatar_tmp_name = $_FILES["image"]["tmp_name"];
 
    $error = $_FILES["image"]["error"];
   
$data=array();
$sql="select * from seller where phone='$phone'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
  $data=array("status"=>false,
              "message"=>"User Already Exist",
              "sellerDetails"=>array());
  }
  else{


     $random_name = rand(1000,1000000)."-".$avatar_name;
        $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = preg_replace('/\s+/', '-', $upload_name);


         $upload_name= $server_url."/".$upload_name;
         
  move_uploaded_file($avatar_tmp_name,$upload_name);
            $image= basename($upload_name);
          
$sql="INSERT INTO `seller`( `name`, `email`, `password`, `phone`, `license_number`, `file`, `address`, `district`, `state`) VALUES ('$name','$email','$password','$phone','$license_number','$image','$address','$district','$state')";
$result=$con->query($sql);
$count=$con->affected_rows;
$last_id = $con->insert_id;
if($count>0)
{
  $query="select * from seller where id=$last_id";
  $queryResult=$con->query($query);
  while($row=$queryResult->fetch_assoc()){
    $details[]=array("id"=>$row['id'],
                   "name"=>$row['name'],
                   "phone"=>$row['phone'],
                   "email"=>$row['email'],
                   "address"=>$row['address'],
                   "district"=>$row['district'],
                   "state"=>$row['state'],
                   "address"=>$row['address'],
                   "license_number"=>$row['license_number'],
                   "image"=>"http://campus.sicsglobal.co.in/Project/Moto/api/uploads/".$row['file'],
                   "device_token"=>($row['device_token']==null)?"":$row['device_token'],
                   "status"=>$row['status']);
  }


$data=array("status"=>true,
              "message"=>"Registration Success",
              "sellerDetails"=>$details);
}
else{
  $data=array("status"=>false,
              "message"=>"Registration Failed",
              "sellerDetails"=>array());
  

}
}
echo json_encode($data);

?>