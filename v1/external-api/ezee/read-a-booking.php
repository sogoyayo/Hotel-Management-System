<?
header('Content-Type: application/json');

require('../../../aaconfig.php');
require('../../../data.php');
require('../functions.php');

// include('../mailer.php');
// include('../../../sms.php');
// include('../../../engine.php');

$baseurl = "https://live.ipms247.com/pmsinterface/pms_connectivity.php";

// {           
//       "RES_Request": {
//             "Request_Type": "FetchSingleBooking",
//             "BookingId": "12345",            
//             "RoomNo": "101",
//             "Guest": "Joy T. Mnewy",          
//             "IdentityNo": "ASD43543",              
//             "GuestEmail": "XXXXXX@gmail.com",              
//             "GuestMobileNo": "XXXXXXXXXX",  
//             "GuestRegistrationNo": "XXXXXX", 
//             "Authentication": {
//                  "HotelCode": "XXXX",
//                  "AuthCode": "XXXXXXXXXXXXXXXXXXX"
//            } 
//       }
// }


$sms_array = [
 "RES_Request" => [
  "Request_Type" => "FetchSingleBooking",
  "BookingId" => "RES1401",
  "Authentication" => [
  "HotelCode" => "20317",
  "AuthCode" => "0610273611aff0f238-41e8-11ec-9"
]
]
];

$array = json_encode($sms_array);

// echo $array;


$ch = curl_init();
   // $payload = array ('apptoken' => '3hr98h938rh8rbrubirbk3jrbfkjrbp3irub',
    // 'usertoken' => $usertoken); 

$headers = array ('Content-Type' => 'application/json'); 

$ch = curl_init();

// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic TUtfVEVTVF9TQUY3SFI1RjNGOjRTWTZUTkw4Q0szVlBSU0JUSFRSRzJOOFhYRUdDNk5M'));
curl_setopt($ch, CURLOPT_URL,$baseurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $array); 

$output=curl_exec($ch);


if ($e = curl_error($ch)){
    echo "$e";
    echo "string";
}else{

// $output = json_encode($output);

// foreach($output as $item) {
   // echo $item->Room_Name;
    // $Room_Name = $item['Room_Name'];
   // $_SESSION['message'] = $message;
    // echo $Room_Name;
   // workAvailability($mysqli, $item->Room_Name);
// }
 // echo "<hr />";

// echo $output->Room_Name;
// echo "<hr />";
echo $output;
}


    ?>