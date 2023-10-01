<?php 
header('Content-Type: application/json');

require('../aaconfig.php');
require('../data.php');
require('../functions.php');
require('../functions2.php');

// include('../mailer.php');
// include('../sms.php');
// include('../engine.php');

// $ip = $_SERVER['REMOTE_ADDR'];

// function clientIpAddress(){
//   if(!empty($_SERVER['HTTP_CLIENT_IP'])){
//     $address = $_SERVER['HTTP_CLIENT_IP'];
//   }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
//     $address = $_SERVER['HTTP_X_FORWARDED_FOR'];
//   }else{
//     $address = $_SERVER['REMOTE_ADDR'];
//   }
//   return $address;
// }

$ip = clientIpAddress();

$baseurl = "https://ipgeolocation.abstractapi.com/v1/?api_key=eeaf751c8393442cbd4314c81fe6a35d&ip_address=102.0.5005.61";
// $baseurl = "https://ipgeolocation.abstractapi.com/v1/?api_key=eeaf751c8393442cbd4314c81fe6a35d";

$ch = curl_init();
   // $payload = array ('apptoken' => '3hr98h938rh8rbrubirbk3jrbfkjrbp3irub',
    // 'usertoken' => $usertoken); 

// $authorization = "Authorization: Bearer $token";

$ch = curl_init();

// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic TUtfVEVTVF9TQUY3SFI1RjNGOjRTWTZUTkw4Q0szVlBSU0JUSFRSRzJOOFhYRUdDNk5M'));
curl_setopt($ch, CURLOPT_URL,$baseurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $payload); 

$output=curl_exec($ch);


if ($e = curl_error($ch)){
	echo "$e";
	echo "string";
}else{

// $output = json_decode($output);

// foreach($output as $item) {
//    echo $item->Room_Name;
//     // $Room_Name = $item['Room_Name'];
//    // $_SESSION['message'] = $message;
//     // echo $Room_Name;
//    // workAvailability($mysqli, $item->Room_Name);
// }
 // echo "<hr />";

// echo $output->Room_Name;
// echo "<hr />";
echo $output;


}



curl_close($ch);

?>