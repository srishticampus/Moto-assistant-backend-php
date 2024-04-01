<?php
require 'connection.php';
$product_name=$_POST['product_name'];
$mrp=$_POST['mrp'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];
$description=$_POST['description'];
$seller_id=$_POST['seller_id'];
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
         
  move_uploaded_file($avatar_tmp_name,$upload_name);
            $image= basename($upload_name);
            $sql="INSERT INTO `product`(`name`, `mrp`, `selling_price`, `quantity`, `image`, `description`,`seller_id`) VALUES ('$product_name','$mrp','$price','$quantity','$image','$description','$seller_id')";
            $result=$con->query($sql);
            $count=$con->affected_rows;
            $last_id = $con->insert_id;

if($count>0){
	$query="select * from product where id=$last_id";
	$queryResult=$con->query($query);
	$queryCount=$queryResult->num_rows;
	if($queryCount>0){
		$queryRow=$queryResult->fetch_assoc();
		$details[]=array("id"=>$queryRow['id'],
			           "name"=>$queryRow['name'],
			           "mrp"=>$queryRow['mrp'],
			           "selling_price"=>$queryRow['selling_price'],
			           "quantity"=>$queryRow['quantity'],
			           "image"=>"http://campus.sicsglobal.co.in/Project/Moto/api/uploads/".$queryRow['image'],
			           "description"=>$queryRow['description'],
			           "seller_id"=>$queryRow['seller_id']);
		$data=array("status"=>true,
			"message"=>"Product Added",
			"productDetails"=>$details);
	}
	else{
		$data=array("status"=>false,
			"message"=>"Product Added failed",
			"productDetails"=>$details);
	}

}
echo json_encode($data);
?>