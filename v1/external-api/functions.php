<?

function workAvailability ($mysqli, $data){
	// $data = $data->[0];
// var_dump($data);
// echo "<hr />";
	$total = count((array)$data);
	// echo $total;
	$data = json_encode($data);
	echo $data[2022-02-02];
}


function getEzeeAvailability ($db, $mysqli, $hotelcode,  $hoteltoken, $contract_token, $dmctoken){
	
$username = "D657610113";
$authkey = "983e6b30e133@9148790807c57666de-bb8c-11ea-a";

// the date work
$twentyfourhours = 24 * 3600;
$dayahead = time() + ($twentyfourhours * 4);
$nextDay = date("Y-m-d", $dayahead);

$todaytime = time() + $twentyfourhours;
$today=date("Y-m-d", $todaytime);

$d=strtotime($today);
// echo "Created date is " . date("Y-m-d", $d);
$dd = date("Y-m-d", $d);

$da=strtotime($nextDay);
$dda = date("Y-m-d", $da);

$dayone1 = $todaytime;
$dayone = date("Y-m-d", $dayone1);

$daytwo1 = $todaytime + $twentyfourhours;
$daytwo = date("Y-m-d", $daytwo1);

$daythree1 = $todaytime + $twentyfourhours + $twentyfourhours;
$daythree = date("Y-m-d", $daythree1);

$baseurl = "https://live.ipms247.com/booking/reservation_api/listing.php?request_type=RoomList&HotelCode=$hotelcode&APIKey=$authkey&check_in_date=$dd&check_out_date=$dda";

$data = file_get_contents($baseurl);

if (isset($data)) {
    // code...
    $output = json_decode($data);
$count=0;

if (isset($output->Errors)) {
    // code...
}else{


foreach($output as $item) {
    if (isset($item->available_rooms)) {
        // code...
           $room_name = $item->available_rooms;
    $count = ++$count;
   $dayone_avail = $room_name->$dayone;

  $daytwo_avail = $room_name->$daytwo;
 
  $daythree_avail = $room_name->$daythree;

foreach($room_name as $value) {

  if (addEzeeAvailability($mysqli, $item->Room_Name, $item->Room_Description, $item->Roomtype_Name, $item->Roomtype_Short_code, $item->Room_Max_adult, $item->Room_Max_child, $item->hotelcode, $item->roomtypeunkid, $item->ratetypeunkid, $item->roomrateunkid, $item->base_adult_occupancy, $item->base_child_occupancy, $item->max_adult_occupancy, $item->max_child_occupancy, $item->max_occupancy, $item->min_ava_rooms, $item->Avg_min_nights, $item->Avg_max_nights, $item->check_in_time, $item->check_out_time, $item->currency_code, $item->currency_sign, $item->BookingEngineURL, $item->available_rooms, $dayone, $dayone_avail, $daytwo, $daytwo_avail, $daythree, $daythree_avail, $item->room_rates_info->totalprice_room_only, $item->room_rates_info->totalprice_inclusive_all, $item->room_rates_info->avg_per_night_before_discount, $item->room_rates_info->avg_per_night_after_discount, $item->room_rates_info->avg_per_night_without_tax, $output1, $hoteltoken, $contract_token, $dmctoken)==true){

  }else{
  
   }

}

    }
}

$total =  $count;
// echo $output1;


}
}
}


function addEzeeAvailability($mysqli, $room_name, $room_description, $roomtype_name, $roomtype_short_code, $room_max_adult, $room_max_child, $hotel_code, $roomtypeunkid, $ratetypeunkid, $roomrateunkid, $base_adult_occupancy, $base_child_occupancy, $max_adult_occupancy, $max_child_occupancy, $max_occupancy, $min_ava_rooms, $avg_min_nights, $avg_max_nights, $check_in_time, $check_out_time, $currency_code, $currency_sign, $booking_engine_url, $available_rooms, $dayone, $dayone_avail, $daytwo, $daytwo_avail, $daythree, $daythree_avail, $totalprice_room_only, $totalprice_inclusive_all, $avg_per_night_before_discount, $avg_per_night_after_discount, $avg_per_night_without_tax, $output1, $hoteltoken, $contract_token, $dmctoken){

$available_rooms = json_encode($available_rooms);


if (dataAlreadyExist($mysqli, $daythree, $hotel_code, $contract_token)==false) {
	// code...

	$sql = "INSERT INTO ex_ezee_availability (contract_token, hoteltoken, dmctoken, room_name, room_description, roomtype_name, roomtype_short_code, room_max_adult, room_max_child, hotel_code, roomtypeunkid, ratetypeunkid, roomrateunkid, base_adult_occupancy, base_child_occupancy, max_adult_occupancy, max_child_occupancy, max_occupancy, min_ava_rooms, avg_min_nights, check_in_time, check_out_time, currency_code, currency_sign, booking_engine_url, available_rooms, totalprice_room_only, totalprice_inclusive_all, avg_per_night_before_discount, avg_per_night_after_discount, avg_per_night_without_tax, dayone, dayone_avail, daytwo, daytwo_avail, daythree, daythree_avail, object) 
   VALUES('$contract_token', '$hoteltoken', '$dmctoken', '$room_name', '$room_description', '$roomtype_name', '$roomtype_short_code', '$room_max_adult', '$room_max_child', '$hotel_code', '$roomtypeunkid', '$ratetypeunkid', '$roomrateunkid', '$base_adult_occupancy', '$base_child_occupancy', '$max_adult_occupancy', '$max_child_occupancy', '$max_occupancy', '$min_ava_rooms', '$avg_min_nights', '$check_in_time', '$check_out_time', '$currency_code', '$currency_sign', '$booking_engine_url', '$available_rooms', '$totalprice_room_only', '$totalprice_inclusive_all', '$avg_per_night_before_discount', '$avg_per_night_after_discount', '$avg_per_night_without_tax', '$dayone', '$dayone_avail', '$daytwo', '$daytwo_avail', '$daythree', '$daythree_avail', '$output1') "; 
    if ($mysqli->query($sql) == true) 
{ 
 return true;
// echo "data exists.."
}else{
	return false;
}

}else{
return false;
}


}


function dataAlreadyExist($mysqli, $daythree, $hotel_code, $contract_token){

	    $sql1 = "SELECT * FROM ex_ezee_availability where (dayone='$daythree' or daytwo='$daythree' or daythree = '$daythree') and hotel_code = '$hotel_code' and contract_token = '$contract_token'";
            if ($res = $mysqli->query($sql1)) {
                if ($res->num_rows > 0) {
    if ($col = $res->fetch_array()) { 
   // $id = $col['id'];
   // $hoteltoken = $col['hoteltoken'];
   // $timestamp = time();

return true;

}else{
    return false;
}
}else{
    return false;
}
}else{
    return false;
}

}



function getHotelBedsVailability ($db, $mysqli, $hotelcode,  $hoteltoken, $contract_token, $dmctoken){
    // the date work
$twentyfourhours = 24 * 3600;
$dayahead = time() + ($twentyfourhours * 4);
$nextDay = date("Y-m-d", $dayahead);

$todaytime = time() + $twentyfourhours;
$today=date("Y-m-d", $todaytime);

$d=strtotime($today);
// echo "Created date is " . date("Y-m-d", $d);
$dd = date("Y-m-d", $d);

$da=strtotime($nextDay);
$dda = date("Y-m-d", $da);

$dayone1 = $todaytime;
$dayone = date("Y-m-d", $dayone1);

$daytwo1 = $todaytime + $twentyfourhours;
$daytwo = date("Y-m-d", $daytwo1);

$daythree1 = $todaytime + $twentyfourhours + $twentyfourhours;
$daythree = date("Y-m-d", $daythree1);

// $data1 = {
//     "stay": {
//         "checkIn": "2022-11-26",
//         "checkOut": "2022-11-29"
//     },
//     "occupancies": [
//         {
//             "rooms": 1,
//             "adults": 2,
//             "children": 0
//         }
//     ],
//     "hotels": {
//         "hotel": [
//             $hotelcode
//         ]
//     }
// }

$rooms = generateNumericOTP(1);
$adults = generateNumericOTP(1);

$data = array(
    "stay" => array(
        "checkIn" => $dd,
        "checkOut" => $dda
    ),
    "occupancies" => array(
        array(
            "rooms" => 1,
            "adults" => 1,
            "children" => 0
        )
    ),
    "hotels" => array(
        "hotel" => array(
            $hotelcode
        )
    )
);

$payload = json_encode($data);

// echo $payload;
// exit();

$curl = curl_init();
$hash = hash('sha256', "7307dd75b4df5f0269b5437df54811c33d048d8ae1".time()."");
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.test.hotelbeds.com/hotel-api/1.0/hotels',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $payload,
  CURLOPT_HTTPHEADER => array(
    'Api-key: 7307dd75b4df5f0269b5437df54811c3',
    "X-Signature: $hash",
    'Accept: application/json',
    'Accept-Encoding: gzip',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$result = json_decode($response);

if (isset($result->error)) {
    // code...
// echo $response;
// exit();
}else{
   if ($result->hotels->total > 0) {
       // code...
     // echo "Good to go";
    // echo $response;
    // exit();
    addHotelBedsAvailability($db, $mysqli, $result, $hoteltoken, $contract_token, $dmctoken);
   }else{
    // echo "No data - $rooms - $adults";
    // echo $response;
    // exit();
   }
}
}


function addHotelBedsAvailability($db, $mysqli, $data, $hoteltoken, $contract_token, $dmctoken){

// $data = json_decode($response);

$auditData = json_encode($data->auditData);
$hotels = $data->hotels;
$checkIn = $hotels->checkIn;
$checkOut = $hotels->checkOut;
$hotelData = $hotels->hotels[0];
$rooms = $hotelData->rooms;
$hotelcode = $hotelData->code;
$hotelname = $hotelData->name;
$hotelcategoryCode = $hotelData->categoryCode;
$hotelcategoryName = $hotelData->categoryName;
$hoteldestinationCode = $hotelData->destinationCode;
$hoteldestinationName = $hotelData->destinationName;
$hotezoneCode = $hotelData->zoneCode;
$hotelzoneName = $hotelData->zoneName;
$hotellatitude = $hotelData->latitude;
$hotellongitude = $hotelData->longitude;

$minRate = $hotelData->minRate;
$maxRate = $hotelData->maxRate;
$currency = $hotelData->currency;

$countRooms = count($rooms);

// loop through rooms
for ($i=0; $i < $countRooms; $i++) { 
    // code...
    $roomCode = $rooms[$i]->code;
    $roomName = $rooms[$i]->name;

    $rates = $rooms[$i]->rates;
    $countRates = count($rates);

    // loop through rates
        for ($a=0; $a < $countRates; $a++) { 
            // code...
            $rateKey = $rates[$a]->rateKey;
            $rateClass = $rates[$a]->rateClass;
            $rateType = $rates[$a]->rateType;
            $net = $rates[$a]->net;
            $allotment = $rate[$a]->allotment;
            $paymentType = $rates[$a]->paymentType;
            $boardCode = $rates[$a]->boardCode;
            $packaging = $rates[$a]->packaging;
            $boardName = $rates[$a]->boardName;
            $cancellationPolicies_amount = $rates[$a]->cancellationPolicies[0]->amount;
            $cancellationPolicies_from = $rates[$a]->cancellationPolicies[0]->from;

if (checkIfAvailableExist($mysqli, $contract_token, $checkIn, $checkOut)==false) {
    // code...

    $sql = "INSERT INTO ex_hotelbeds_availability (checkIn, checkOut, contract_token, hoteltoken, dmctoken, hotelcode, hotelname, categoryCode, categoryName, destinationCode, destinationName, zoneCode, zoneName, latitude, longitude, minrate, maxrate, currency, roomcode, roomname, rateKey, rateClass, rateType, net, allotment, paymentType, packaging, boardCode, boardName, cancellationPolicies_amount, cancellationPolicies_from, auditData, timestamp) 
   VALUES('$checkIn', '$checkOut', '$contract_token', '$hoteltoken', '$dmctoken', '$hotelcode', '$hotelname', '$hotelcategoryCode', '$hotelcategoryName', '$hoteldestinationCode', '$hoteldestinationName', '$hotezoneCode', '$hotelzoneName', '$hotellatitude', '$hotellongitude', '$minRate', '$maxRate', '$currency', '$roomCode', '$roomName', '$rateKey', '$rateClass', '$rateType', '$net', '$allotment', '$paymentType', '$packaging', '$boardCode', '$boardName', '$cancellationPolicies_amount', '$cancellationPolicies_from', '$auditData','$time') "; 
    if ($mysqli->query($sql) == true) 
{ 
 return true;
// echo "data exists.."
}else{
    return false;
}

}
        }
        // end loop through rates
}
// end loop through rooms

}


function checkIfAvailableExist($mysqli, $contract_token, $checkIn, $checkOut){
$sql1 = "SELECT * FROM ex_hotelbeds_availability where checkOut='$checkOut' or checkIn='$checkIn' and contract_token = '$contract_token'";
            if ($res = $mysqli->query($sql1)) {
                if ($res->num_rows > 0) {
    if ($col = $res->fetch_array()) { 
   
return true;

}else{
    return false;
}
}else{
    return false;
}
}else{
    return false;
}
}


?>