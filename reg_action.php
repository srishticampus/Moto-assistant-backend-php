<?php

require 'connection.php';
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$place=$_POST['place'];
$lat=$_POST['lat'];
$long=$_POST['long'];
$address=$_POST['address'];
$password=$_POST['password'];
$upload_dir = 'uploads/';
$server_url = '/home/ubuntu/html/Project/Moto/Workshop/';
$sql="select * from workshop where email='$email'";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	header("location:workshop_registration.php?status=failed");
}
else{
            $avatar_name = $_FILES["file"]["name"];
    
            $avatar_tmp_name = $_FILES["file"]["tmp_name"];
 
            $error = $_FILES["file"]["error"];
            $random_name = rand(1000,1000000)."-".$avatar_name;
            $upload_name = $upload_dir.strtolower($random_name);
            $upload_name = preg_replace('/\s+/', '-', $upload_name);


            $upload_name= $server_url."/".$upload_name;
         
            move_uploaded_file($avatar_tmp_name,$upload_name);
            $image= basename($upload_name);
           // echo $image;die();
            $sql="INSERT INTO `workshop`(`workshop_name`, `email`, `phone`, `place`, `lattitude`, `longitude`, `address`, `password`,`file`) VALUES ('$name','$email','$phone','$place','$lat','$long','$address','$password','$image')";
            $result=$con->query($sql);
            $count=$con->affected_rows;
            if($count>0){
            header("location:workshop_registration.php?status=success");
                  //echo $sql;
            }
            else{
            	header("location:workshop_registration.php?status=failed");
            }

        }
?>