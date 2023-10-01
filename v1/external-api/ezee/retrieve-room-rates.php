<?
header('Content-Type: application/json');

require('../../../aaconfig.php');
require('../../../data.php');
require('../functions.php');


$baseurl = "https://live.ipms247.com/pmsinterface/getdataAPI.php";


// {
//      "RES_Request": {
//              "Request_Type": "AssignRoom",
//              "Authentication": {
//              "HotelCode": "xxxx",
//              "AuthCode": "xxxxxxxxxxxx"
//              },
//              "RoomAssign": [{
//                   "BookingId": "RES101",
//                   "RoomTypeID": "1234500000000000001",
//                   "RoomID": "1234500000000000001"
//             },
//             {
//                  "BookingId": "RES112-1",
//                  "RoomTypeID": "1234500000000000002",
//                  "RoomID": "1234500000000000002"
//            }]
//       }
// }


$sms_array = [
 "RES_Request" => [
  "Request_Type" => "Rate",
  "FromDate" => "2020-07-05",
  "ToDate" => "2020-07-07",
  "Authentication" => [
  "HotelCode" => "20317",
  "AuthCode" => "0610273611aff0f238-41e8-11ec-9"
]
]
];

// $array = json_encode($sms_array);
$array_xml = xmlrpc_encode($sms_array);
// echo $array;


$ch = curl_init();
   // $payload = array ('apptoken' => '3hr98h938rh8rbrubirbk3jrbfkjrbp3irub',
    // 'usertoken' => $usertoken); 

$headers = array ('Content-Type' => 'application/json'); 

$ch = curl_init();

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic TUtfVEVTVF9TQUY3SFI1RjNGOjRTWTZUTkw4Q0szVlBSU0JUSFRSRzJOOFhYRUdDNk5M'));
curl_setopt($ch, CURLOPT_URL,$baseurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $array_xml); 

$output=curl_exec($ch);
$output = xmlrpc_decode($output);

if ($e = curl_error($ch)){
    echo "$e";
    echo "string";
}else{

   // $output = json_encode($output);
  
// foreach($output as $item) {
//    echo $item->Room_Name;
//    workAvailability($mysqli, $item->Room_Name);
// }
echo $output;
}


    ?>