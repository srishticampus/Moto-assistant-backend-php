<?php
require 'connection.php';
// API access key from Google API's Console
define( 'API_ACCESS_KEY','AAAAljsUh3E:APA91bFhbHl34-Kq4PwPZoXXyLpkRAF3JeibhWn0UV1TvLJY689Kq4DchYDPb2w_kYmtZJC4Bi2zXZX5rA5dUb8O8r_hzDiFWwCk8S8ZkBxYpr98heknAIxMA8dpp1-l46LbLd6iCR5A');
$device = 'fa8zo8Z7SVS6Lm0di_rcR9:APA91bGh9XNVPTzobSSFm3GkyhPSs1az5OUNbDIhtB53jxZFZHabTkQdKu9vr8DN3UE3BeDKxi_wL6Tom9byiytYqCNMog12y6aXxSqIvlCc7uaBD0TwZ6h2doh3H_VLIePDLO8rN5Lw';


$registrationIds = array($device);

$msg= array('ffrom'=>'Adersh','tto'=>'Safna','ph'=>'9087654321','email'=>'Adersh@gmail.com');
$fields = array
(
  'registration_ids'  => $registrationIds,
  'data'      => $msg
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

//echo (json_encode($post));
echo $result;
?>
