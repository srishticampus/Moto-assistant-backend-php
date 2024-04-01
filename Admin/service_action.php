<?php
require 'connection.php';
session_start();
                   $name = $_POST['name'];
             $upload_dir = 'uploads/';
             $server_url = '/home/ubuntu/html/Project/Moto/Workshop/';
            $avatar_name = $_FILES["img"]["name"];
        $avatar_tmp_name = $_FILES["img"]["tmp_name"];
                  $error = $_FILES["img"]["error"];
            $random_name = rand(1000,1000000)."-".$avatar_name;
            $upload_name = $upload_dir.strtolower($random_name);
            $upload_name = preg_replace('/\s+/', '-', $upload_name);
            $upload_name = $server_url."/".$upload_name;
         
            move_uploaded_file($avatar_tmp_name,$upload_name);
                  $image = basename($upload_name);
                    $sql = "INSERT INTO `services`(`service_name`, `file`) VALUES ('$name','$image')";
                 $result = $con->query($sql);
                  $count = $con->affected_rows;
            if($count>0){
            header("location:add_services.php?status=success");
                  //echo $sql;
            }
            else{
            	header("location:add_services.php?status=failed");
            }
?>