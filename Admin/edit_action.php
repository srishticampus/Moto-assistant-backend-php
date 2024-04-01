<?php
require 'connection.php';
session_start();
$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
if($_FILES["img"]["name"]==""){
	$sq="select * from user where id=$id";
	$res=$con->query($sq);
	$ro=$res->fetch_assoc();
	$image=$ro['profilePic'];

}
else{
	 $upload_dir = 'uploads/';
             $server_url = '/home/ubuntu/html/Project/Moto/api/';
            $avatar_name = $_FILES["img"]["name"];
        $avatar_tmp_name = $_FILES["img"]["tmp_name"];
                  $error = $_FILES["img"]["error"];
            $random_name = rand(1000,1000000)."-".$avatar_name;
            $upload_name = $upload_dir.strtolower($random_name);
            $upload_name = preg_replace('/\s+/', '-', $upload_name);
            $upload_name = $server_url."/".$upload_name;
         
            move_uploaded_file($avatar_tmp_name,$upload_name);
                  $image = basename($upload_name);
}
$sql="UPDATE `user` SET `name`='$name',`email`='$email',`phone_number`='$phone',`address`='$address',`profilePic`='$image' WHERE id=$id";
$result=$con->query($sql);
if(!$result){
	header("location:view_user.php?status=failed");
}
else{
	header("location:view_user.php?status=success");
}

?>