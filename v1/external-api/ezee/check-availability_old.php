<?php 


$hotelcode = "18727";
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

$baseurl = "https://live.ipms247.com/booking/reservation_api/listing.php?request_type=RoomList&HotelCode=$&APIKey=$authkey&check_in_date=$dd&check_out_date=$dda";

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

}else{

$output = json_decode($output1);
$count=0;

foreach($output as $item) {
   $room_name = $item->available_rooms;
    $count = ++$count;
   $dayone_avail = $room_name->$dayone;
 ?>

 <?
  $daytwo_avail = $room_name->$daytwo;
 ?>

<?
  $daythree_avail = $room_name->$daythree;
?>

<?

foreach($room_name as $value) {

  if (addEzeeAvailability($mysqli, $item->Room_Name, $item->Room_Description, $item->Roomtype_Name, $item->Roomtype_Short_code, $item->Room_Max_adult, $item->Room_Max_child, $item->hotelcode, $item->roomtypeunkid, $item->ratetypeunkid, $item->roomrateunkid, $item->base_adult_occupancy, $item->base_child_occupancy, $item->max_adult_occupancy, $item->max_child_occupancy, $item->max_occupancy, $item->min_ava_rooms, $item->Avg_min_nights, $item->Avg_max_nights, $item->check_in_time, $item->check_out_time, $item->currency_code, $item->currency_sign, $item->BookingEngineURL, $item->available_rooms, $dayone, $dayone_avail, $daytwo, $daytwo_avail, $daythree, $daythree_avail, $item->room_rates_info->totalprice_room_only, $item->room_rates_info->totalprice_inclusive_all, $item->room_rates_info->avg_per_night_before_discount, $item->room_rates_info->avg_per_night_after_discount, $item->room_rates_info->avg_per_night_without_tax, $output1)==true){

  }else{
  
   }

}

}

$total =  $count;

curl_close($ch);
// echo $output1;
?>
