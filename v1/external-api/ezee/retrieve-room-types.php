<?php 
header('Content-Type: application/json');

require('../../../aaconfig.php');
require('../../../data.php');
require('../../../functions.php');
require('../../../functions2.php');

include('../functions.php');
include('../../../sms.php');
include('../../../engine.php');

$hotelcode = "18727";
$username = "D657610113";
$authkey = "983e6b30e133@9148790807c57666de-bb8c-11ea-a";


?>

<?php

// end of the date work 

// $baseurl = "https://live.ipms247.com/booking/reservation_api/listing.php?request_type=RoomList&HotelCode=20317&APIKey=0610273611aff0f238-41e8-11ec-9&check_in_date=2022-02-02&check_out_date=2022-02-05";

// $baseurl = "https://live.ipms247.com/booking/reservation_api/listing.php?request_type=RoomList&HotelCode=$hotelcode&APIKey=$authkey&check_in_date=$dd&check_out_date=$dda";

$baseurl = "https://live.ipms247.com/booking/reservation_api/listing.php?request_type=RoomTypeList&HotelCode=$hotelcode&APIKey=$authkey&publishtoweb=1";

$ch = curl_init();
   // $payload = array ('apptoken' => '3hr98h938rh8rbrubirbk3jrbfkjrbp3irub',
    // 'usertoken' => $usertoken); 

// $authorization = "Authorization: Bearer $token";

// $ch = curl_init();

// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic TUtfVEVTVF9TQUY3SFI1RjNGOjRTWTZUTkw4Q0szVlBSU0JUSFRSRzJOOFhYRUdDNk5M'));
curl_setopt($ch, CURLOPT_URL,$baseurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $payload); 

$output1=curl_exec($ch);


if ($e = curl_error($ch)){
	// echo "$e";
	// echo "string";
}else{

echo $output1;

}


curl_close($ch);
?>


<?php

// echo $output1;
?>
