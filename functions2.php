<?php


function createHotelRoom($mysqli, $hotelToken, $account_owner, $hotel_owner, $timestamp){
 
  $roomtoken = generateAlphaNumericOTP_case(9);
  $sql = "INSERT INTO hotel_rooms (hotelid, room_id, account_owner, hotel_owner, timestamp) VALUES('$hotelToken', '$roomtoken', '$account_owner', '$hotel_owner', '$timestamp')"; 
  if ($mysqli->query($sql)==true){ 
    $_SESSION['roomid']="$roomtoken";
    return true;
    exit();
  }else{ 
  	return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}

function updateHotelRoom($mysqli, $hotelToken, $roomtoken, $account_owner, $hotel_owner, $roomName, $availnum, $room_desc, $image, $category, $dbl, $sgl, $trpl, $quad, $room_size, $max_child, $min_adult, $max_adult, $max_total, $bed_number){
  $sql = "UPDATE hotel_rooms SET hotelid='$hotelToken', room_id='$roomtoken', name='$roomName', room_description='$room_desc', availnum='$availnum', account_owner='$account_owner', hotel_owner='$hotel_owner', image='$image', category='$category', dbl='$dbl', sgl='$sgl', trpl='$trpl', quad='$quad', room_size='$room_size', max_child='$max_child', min_adult='$min_adult', max_adult='$max_adult', max_total='$max_total', bed_number='$bed_number' WHERE hotelid='$hotelToken' and room_id='$roomtoken' ";  
  if ($mysqli->query($sql)==true){
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}


function checkRoomExist($mysqli, $hotelToken, $roomtoken){
  $sql = "SELECT * FROM hotel_rooms where hotelid='$hotelToken' and room_id='$roomtoken' and display=1"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}



function checkHotelExist($mysqli, $hotelname, $longitude, $latitude){
  $sql = "SELECT * FROM hotels where (hotelname = '$hotelname') or (longitude='$longitude' and latitude='$latitude')"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}



function checkRoom($mysqli, $hotelToken, $roomtoken, $category){
  $sql = "SELECT * FROM hotel_rooms where hotelid='$hotelToken' and room_id='$roomtoken' and category='$category' and display=1"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


// function insertBusinessLogo($mysqli, $fileURL){
 
//   $sql = "UPDATE  SET business_logos='$fileURL' WHERE usertoken='$usertoken' "; 
//   if ($mysqli->query($sql) == true){ 
//     return true;
//     exit();
//   }else{ 
//     return false;
//     $mysqli->error; 
//   } 
//   // Close connection 
//   $mysqli->close(); 
// }


// function updateBusinessLicense($mysqli, $fileURL){
 
//   $sql = "UPDATE  SET business_license='$fileURL' WHERE usertoken='$usertoken' "; 
//   if ($mysqli->query($sql) == true){ 
//     return true;
//     exit();
//   }else{ 
//     return false;
//     $mysqli->error; 
//   } 
//   // Close connection 
//   $mysqli->close(); 
// }


// function insertBusinessOwnerId($mysqli, $fileURL){
 
//   $sql = "UPDATE  SET business_owner_id='$fileURL' WHERE usertoken='$usertoken' "; 
//   if ($mysqli->query($sql) == true){ 
//     return true;
//     exit();
//   }else{ 
//     return false;
//     $mysqli->error; 
//   } 
//   // Close connection 
//   $mysqli->close(); 
// }


// function updateBusinessName($mysqli, $businessName){
 
//   $sql = "UPDATE  SET business_name='$businessName' WHERE usertoken='$usertoken' "; 
//   if ($mysqli->query($sql) == true){ 
//     return true;
//     exit();
//   }else{ 
//     return false;
//     exit();
//     $mysqli->error; 
//   } 
//   // Close connection 
//   $mysqli->close(); 
// }


function createContract($mysqli, $hoteltoken, $dmctoken, $hotelname, $country, $city, $timestamp){
  // code...
  $contractToken = generateAlphaNumericOTP(10);
  $sql = "INSERT INTO init_contract (token, hoteltoken, dmctoken,  timestamp, hotelname, country, city) VALUES('$contractToken', '$hoteltoken', '$dmctoken', '$timestamp', '$hotelname', '$country', '$city')"; 
  if ($mysqli->query($sql)==true){ 
    $_SESSION['contractToken']="$contractToken";
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();

}



function createPriceContract($mysqli, $contract_name, $contractToken, $hoteltoken, $roomtoken, $room_desc, $dmctoken, $hotel_owner, $account_owner, $hotelname, $hotel_desc, $room_name, $start_date, $end_date, $status, $child_age_From, $child_age_To, $currency, $release_date, $timestamp, $business_name, $city, $country, $room, $price_sgl, $price_dbl, $price_trl, $price_qud, $price_chd1, $price_chd2, $inventory_room, $inventory_rel, $id, $room_category, $twn, $unit){
  $sql = "INSERT INTO contracts (contract_name, token, hoteltoken, roomtoken, room_desc, dmctoken, hotel_owner, account_owner, hotelname, hotel_desc, room_name, start_date, exp_date, status, child_age_from, child_age_to, currency, release_date, timestamp, business_name, city, country, room, price_sgl, price_dbl, price_trl, price_qud, price_chd1, price_chd2, invt_room, invt_rel, relay2, relay_id, twn, unit, room_category) VALUES('$contract_name', '$contractToken', '$hoteltoken', '$roomtoken', '$room_desc', '$dmctoken', '$hotel_owner', '$account_owner', '$hotelname', '$hotel_desc', '$room_name', '$start_date', '$end_date', '$status', '$child_age_From', '$child_age_To', '$currency', '$release_date', '$timestamp', '$business_name', '$city', '$country', '$room', '$price_sgl', '$price_dbl', '$price_trl', '$price_qud', '$price_chd1', '$price_chd2', '$inventory_room', '$inventory_rel', 1, '$id', '$twn', '$unit', '$room_category') ";
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}


function createContractMealsPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $bfast_child, $bfast_adult, $hb_adult, $hb_child, $fb_adult, $fb_child, $sai_adult, $sai_child, $all_incl_adult, $all_incl_child, $uai_adult, $uai_child, $meals_from, $meals_to, $timestamp, $roc, $roa, $businessName, $city, $country){

  $sql = "INSERT INTO contracts (contract_name, token, hoteltoken, dmctoken, status, child_age_from, child_age_to, currency, breakfast_adult, breakfast_child, half_bar_adult, half_bar_child, full_bar_adult, full_bar_child, soft_all_incl_adult, soft_all_incl_child, all_incl_adult, all_incl_child, ultra_all_incl_adult, ultra_all_incl_child, timestamp, meals_start, meals_end, rooms_only_child, rooms_only_adult, business_name, city, country) VALUES('$contractName', '$contractToken', '$hoteltoken', '$dmctoken', '$status', '$child_age_From', '$child_age_To', '$currency', '$bfast_child', '$bfast_adult', '$hb_adult', '$hb_child', '$fb_adult', '$fb_child', '$sai_adult', '$sai_child', '$all_incl_adult', '$all_incl_child', '$uai_adult', '$uai_child', '$timestamp', '$meals_from', '$meals_to', '$roc', '$roa', '$businessName', '$city', '$country') ";
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}

function createContractCancelPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $cancel_days, $cancel_penalty, $cancel_start, $cancel_end, $timestamp, $businessName, $city, $country, $cancel_type){

   $sql = "INSERT INTO contracts (contract_name, token, hoteltoken, dmctoken, status, child_age_from, child_age_to, currency, cancel_days, cancel_penalty, timestamp, cancel_start, cancel_end, business_name, city, country, cancel_type) VALUES('$contractName', '$contractToken', '$hoteltoken', '$dmctoken', '$status', '$child_age_From', '$child_age_To', '$currency', '$cancel_days', '$cancel_penalty', '$timestamp', '$cancel_start', '$cancel_end', '$businessName', '$city', '$country', '$cancel_type') "; 
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}


function createContractDatePlan($mysqli, $contractName, $contractToken, $hoteltoken, $roomtoken, $room_desc, $dmctoken, $hotel_owner, $account_owner, $hotelname, $hotel_desc, $room_name, $start_date, $exp_date, $timestamp, $status, $child_age_From, $child_age_To, $currency, $release_date, $businessName, $city, $country, $room, $price_sgl, $price_dbl, $price_trl, $price_qud, $price_chd1, $price_chd2, $inventory_room, $inventory_rel, $room_category, $twn, $unit){
  // code...
  $sql = "INSERT INTO contracts (contract_name, token, hoteltoken, roomtoken, room_desc, dmctoken, hotel_owner, account_owner, hotelname, hotel_desc, room_name, start_date, exp_date, status, child_age_from, child_age_to, currency, release_date, timestamp, business_name, city, country, room, price_sgl, price_dbl, price_trl, price_qud, price_chd1, price_chd2, invt_room, invt_rel, twn, unit, room_category) 
  VALUES('$contractName', '$contractToken', '$hoteltoken', '$roomtoken', '$room_desc', '$dmctoken', '$hotel_owner', '$account_owner', '$hotelname', '$hotel_desc', '$room_name', '$start_date', '$exp_date', '$status', '$child_age_From', '$child_age_To', '$currency', '$release_date', '$timestamp', '$businessName', '$city', '$country', '$room', '$price_sgl', '$price_dbl', '$price_trl', '$price_qud', '$price_chd1', '$price_chd2', '$inventory_room', '$inventory_rel', '$twn', '$unit', '$room_category') "; 
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();

}


function checkCancelPLanExist($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $cancel_start, $cancel_end){
  $sql = "SELECT contract_name, token, hoteltoken, dmctoken, cancel_start, cancel_end FROM contracts WHERE contract_name='$contractName' and token='$contractToken' and hoteltoken='$hoteltoken' and dmctoken='$dmctoken' and cancel_start='$cancel_start' and cancel_end='$cancel_end' and display=1 "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
      }  
      $res->free(); 
    }else { 
      return false; 
    } 
  }else {
    return false; 
    $mysqli->error; 
  } 
  $mysqli->close();
}


function checkMealsPLanExist($mysqli, $id){
  $sql = "SELECT contract_name, token, hoteltoken, dmctoken, meals_start, meals_end FROM contracts WHERE id='$id' and display=1 "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
      }  
      $res->free(); 
    }else { 
      return false; 
    } 
  }else {
    return false; 
    $mysqli->error; 
  } 
  $mysqli->close();
}



function checkContractInsertExist($mysqli, $contractName, $contractToken, $hoteltoken, $roomtoken, $dmctoken, $start_date, $exp_date){
  $sql = "SELECT * FROM contracts WHERE contract_name='$contractName' and token='$contractToken' and hoteltoken='$hoteltoken' and roomtoken='$roomtoken' and dmctoken='$dmctoken' and start_date='$start_date' and exp_date='$exp_date' and display=1 "; 
  
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
      }  
      $res->free(); 
    }else { 
      return false; 
    } 
  }else {
    return false; 
    $mysqli->error; 
  } 
  $mysqli->close();
}


function changeDateDuration($mysqli, $start_date_new, $end_date_new, $id, $old_start_date, $old_end_date){
  // code...
  $sql = "UPDATE contracts SET start_date='$start_date_new', exp_date='$end_date_new' WHERE start_date='$old_start_date' and exp_date='$old_end_date'"; 
  if ($mysqli->query($sql) === true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}



function updateDatePlan($mysqli, $contractName, $contractToken, $hoteltoken, $roomtoken, $room_desc, $dmctoken, $hotel_owner, $account_owner, $hotelname, $hotel_desc, $room_name, $start_date, $exp_date, $status, $child_age_From, $child_age_To, $currency, $release_date, $businessName, $city, $country, $room, $price_sgl, $price_dbl, $price_trl, $price_qud, $price_chd1, $price_chd2, $inventory_room, $inventory_rel, $room_category, $twn, $unit){
  // code...
  $sql = "UPDATE contracts SET contract_name='$contractName', token='$contractToken', hoteltoken='$hoteltoken', roomtoken='$roomtoken', room_desc='$room_desc', dmctoken='$dmctoken', hotel_owner='$hotel_owner', account_owner='$account_owner', hotelname='$hotelname', hotel_desc='$hotel_desc', room_name='$room_name', start_date='$start_date', exp_date='$exp_date', status='$status', child_age_from='$child_age_From', child_age_to='$child_age_To', currency='$currency', release_date='$release_date', business_name='$businessName', city='$city', country='$country', room='$room', price_sgl='$price_sgl', price_dbl='$price_dbl', price_trl='$price_trl', price_qud='$price_qud', price_chd1='$price_chd1', price_chd2='$price_chd2', invt_room='$inventory_room', invt_rel='$inventory_rel', twn='$twn', unit='$unit', room_category='$room_category' WHERE token='$contractToken' and hoteltoken='$hoteltoken' and roomtoken='$roomtoken' and dmctoken='$dmctoken' and start_date='$start_date' and exp_date='$exp_date' and display=1 "; 
  if ($mysqli->query($sql) === true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}



function updateMealsPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $bfast_child, $bfast_adult, $hb_adult, $hb_child, $fb_adult, $fb_child, $sai_adult, $sai_child, $all_incl_adult, $all_incl_child, $uai_adult, $uai_child, $meals_start, $meals_end, $roc, $roa, $businessName, $city, $country, $id){
  // code...
  $sql = "UPDATE contracts SET contract_name='$contractName', token='$contractToken', hoteltoken='$hoteltoken', dmctoken='$dmctoken', status='$status', child_age_from='$child_age_From', child_age_to='$child_age_To', currency='$currency', breakfast_adult='$bfast_adult', breakfast_child='$bfast_child', half_bar_adult='$hb_adult', half_bar_child='$hb_child', full_bar_adult='$fb_adult', full_bar_child='$fb_child', soft_all_incl_adult='$sai_adult', soft_all_incl_child='$sai_child', all_incl_adult='$all_incl_adult', all_incl_child='$all_incl_child', ultra_all_incl_adult='$uai_adult', ultra_all_incl_child='$uai_child', meals_start='$meals_start', meals_end='$meals_end', rooms_only_child='$roc', rooms_only_adult='$roa', business_name='$businessName', city='$city', country='$country' WHERE id='$id' and display=1 "; 
  if ($mysqli->query($sql) === true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}



function updateCancelPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $cancel_days, $cancel_penalty, $cancel_start, $cancel_end, $id, $cancel_type){
  // code...
  $sql = "UPDATE contracts SET contract_name='$contractName', token='$contractToken', hoteltoken='$hoteltoken', dmctoken='$dmctoken', status='$status',  child_age_from='$child_age_From', child_age_to='$child_age_To', currency='$currency', cancel_days='$cancel_days', cancel_penalty='$cancel_penalty', cancel_start='$cancel_start', cancel_end='$cancel_end', cancel_type='$cancel_type' WHERE id='$id' and display=1 "; 
  if ($mysqli->query($sql) === true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}



function checkOfferPLanExist($mysqli, $id) {
  $sql = "SELECT contract_name, token, hoteltoken, dmctoken, stay_from, stay_to, booking_from, booking_to FROM contracts WHERE id='$id' and display=1 "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
      }  
      $res->free(); 
    }else { 
      return false; 
    } 
  }else {
    return false; 
    $mysqli->error; 
  } 
  $mysqli->close();
}



function checkOfferPLan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $link1, $discount_amt, $discount_rate, $source_market, $offer, $businessName, $city, $country, $order, $stay_from, $stay_end, $booking_start, $booking_end){

  $sql = "SELECT * FROM contracts where contract_name='$contractName' and token='$contractToken' and hoteltoken='$hoteltoken' and dmctoken='$dmctoken' and status='$status' and child_age_from='$child_age_From' and child_age_to='$child_age_To' and currency='$currency' and link1='$link1' and discount_amount='$discount_amt' and discount_rate='$discount_rate' and source_market='$source_market' and offer='$offer' and business_name='$businessName' and city='$city' and country='$country' and offer_order='$order' and stay_from='$stay_from' and stay_to='$stay_end' and booking_from='$booking_start' and booking_to='$booking_end' and display=1"; 

  if ($res = $mysqli->query($sql)) {
    if ($res->num_rows > 0) {
      if ($row = $res->fetch_array()){

        return true;
        exit();
      }
      $res->free(); 
    }else{
      return false; 
      exit();
    } 
  }else{
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}



function updateOfferPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $link1, $stay_start, $stay_end, $booking_start, $booking_end, $discount_amt, $discount_rate, $source_market, $offer, $businessName, $city, $country, $order, $offers_room_type, $offer_room, $offer_meals, $offer_supplement, $id) {
  $sql = "UPDATE contracts SET contract_name='$contractName', token='$contractToken', hoteltoken='$hoteltoken', dmctoken='$dmctoken', status='$status', child_age_from='$child_age_From', child_age_to='$child_age_To', currency='$currency', link1='$link1', stay_from='$stay_start', stay_to='$stay_end', booking_from='$booking_start', booking_to='$booking_end', discount_amount='$discount_amt', discount_rate='$discount_rate', source_market='$source_market', offer='$offer', business_name='$businessName', city='$city', country='$country', offer_order='$order', offers_room_type='$offers_room_type', offer_room='$offer_room', offer_meals='$offer_meals', offer_supplement='$offer_supplement' WHERE id='$id' and display=1 "; 
  if ($mysqli->query($sql)===true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}


function createContractOfferPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $link1, $stay_start, $stay_end, $booking_start, $booking_end, $discount_amt, $discount_rate, $source_market, $offer, $timestamp, $businessName, $city, $country, $order, $offers_room_type, $offer_room, $offer_meals, $offer_supplement) {


  $sql = "INSERT INTO contracts (contract_name, token, hoteltoken, dmctoken, status, child_age_from, child_age_to, currency, timestamp, link1, stay_from, stay_to, booking_from, booking_to, discount_amount, discount_rate, source_market, offer, business_name, city, country, offer_order, offers_room_type, offer_room, offer_meals, offer_supplement) VALUES('$contractName', '$contractToken', '$hoteltoken', '$dmctoken', '$status', '$child_age_From', '$child_age_To', '$currency', '$timestamp', '$link1', '$stay_start', '$stay_end', '$booking_start', '$booking_end', '$discount_amt', '$discount_rate', '$source_market', '$offer', '$businessName', '$city', '$country', '$order', '$offers_room_type', '$offer_room', '$offer_meals', '$offer_supplement') ";

  if ($mysqli->query($sql) == true){ 

    return true;
    exit();
  
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}



function checkSupplementPLanExist($mysqli, $id) {
  $sql = "SELECT contract_name, token, hoteltoken, dmctoken, sup_stay_from, sup_stay_to FROM contracts WHERE id='$id' and display=1 "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
      }  
      $res->free(); 
    }else { 
      return false; 
    } 
  }else {
    return false; 
    $mysqli->error; 
  } 
  $mysqli->close();
}


function checkSupplementPLan($mysqli, $contractName, $token, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $businessName, $city, $country, $subscription, $service, $price_child, $price_adult, $sup_type){
  $sql = "SELECT * FROM contracts where contract_name='$contractName' and token='$token' and hoteltoken='$hoteltoken' and dmctoken='$dmctoken' and status='$status' and child_age_from='$child_age_From' and child_age_to='$child_age_To' and currency='$currency' and business_name='$businessName' and city='$city' and country='$country' and subscription='$subscription' and service='$service' and price_child='$price_child' and price_adult='$price_adult' and sup_type='$sup_type' and display=1 "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function updateSupplementPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $businessName, $city, $country, $subscription, $service, $stay_start, $stay_end, $price_child, $price_adult, $sup_type, $id, $supp_child, $supp_perc, $supp_room_type, $child_amount, $adult_amount, $child_perc, $adult_perc, $supp_child_age_from, $supp_child_age_to) {

  $sql = "UPDATE contracts SET contract_name='$contractName', token='$contractToken', hoteltoken='$hoteltoken', dmctoken='$dmctoken', status='$status', child_age_from='$child_age_From', child_age_to='$child_age_To', currency='$currency', business_name='$businessName', city='$city', country='$country', subscription='$subscription', service='$service', sup_stay_from='$stay_start', sup_stay_to='$stay_end', price_child='$price_child', price_adult='$price_adult', sup_type='$sup_type', supp_child = '$supp_child', supp_perc = '$supp_perc', supp_room_type='$supp_room_type', child_amount='$child_amount', adult_amount='$adult_amount', child_perc='$child_perc', adult_perc='$adult_perc', supp_child_age_from='$supp_child_age_from', supp_child_age_to='$supp_child_age_to' WHERE id='$id' and display=1 "; 
  if ($mysqli->query($sql)===true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}


function createContractSupplementPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $timestamp, $businessName, $city, $country, $subscription, $service, $stay_start, $stay_end, $price_child, $price_adult, $sup_type, $supp_child, $supp_perc, $supp_room_type, $child_amount, $adult_amount, $child_perc, $adult_perc, $supp_child_age_from, $supp_child_age_to) {

  $sql = "INSERT INTO contracts (contract_name, token, hoteltoken, roomtoken, dmctoken, status, child_age_from, child_age_to, currency, timestamp, business_name, city, country, subscription, service, sup_stay_from, sup_stay_to, price_child, price_adult, sup_type, supp_child, supp_perc, supp_room_type, child_amount, adult_amount, child_perc, adult_perc, supp_child_age_from, supp_child_age_to) VALUES('$contractName', '$contractToken', '$hoteltoken', '$supp_room_type', '$dmctoken', '$status', '$child_age_From', '$child_age_To', '$currency', '$timestamp', '$businessName', '$city', '$country', '$subscription', '$service', '$stay_start', '$stay_end', '$price_child', '$price_adult', '$sup_type', '$supp_child', '$supp_perc', '$supp_room_type', '$child_amount', '$adult_amount', '$child_perc', '$adult_perc', '$supp_child_age_from', '$supp_child_age_to') ";
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}



function wallet($mysqli, $usertoken, $type, $log, $amount, $timestamp){

if (isset($_SESSION['source'])) {
  // code...
  $source = $_SESSION['source'];
}else{
  $source = "0";
}


if (isset($_SESSION['note'])) {
  // code...
  $note = $_SESSION['note'];
}else{
  $note = "0";
}

  $sql = "INSERT INTO wallet (usertoken, type, log, amount, timestamp, source, note) VALUES('$usertoken','$type','$log', '$amount','$timestamp', '$source', '$note') "; 

  if ($mysqli->query($sql)==true) { 
    return true;
    exit();
  } else{ 
    return false;
    exit();
    $mysqli->error; 
  }   
  // Close connection 
  $mysqli->close(); 
}



function deleteContract($mysqli, $contractToken){
 
  $sql = "UPDATE contracts SET display=0 WHERE token='$contractToken' "; 
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close(); 
}



function deleteHotel($mysqli, $hoteltoken){
 
  $sql = "UPDATE hotels SET display=0 WHERE token='$hoteltoken' "; 
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close(); 
}


function deleteHotel_roomtb($mysqli, $hoteltoken){
 
  $sql = "UPDATE hotel_rooms SET display=0 WHERE hotelid='$hoteltoken' "; 
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close(); 
}


function deleteHotel_contractstb($mysqli, $hoteltoken){
 
  $sql = "UPDATE contracts SET display=0 WHERE hoteltoken='$hoteltoken' "; 
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close(); 
}


function deleteRoom($mysqli, $roomtoken){
 
  $sql = "UPDATE hotel_rooms SET display=0 WHERE room_id='$roomtoken' "; 
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close(); 

}


function GetWalletBalance($mysqli, $usertoken){
  $sql = "SELECT SUM(amount) AS balance FROM wallet where usertoken='$usertoken'"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
      // while ($row = $res->fetch_array())  
      if ($row = $res->fetch_array())  { 
        $walletbalance=$row['balance'];
        return $walletbalance;
      }  
      $res->free(); 
    } 
  }
}

function GetSystemWalletBalance($mysqli){
  $sql = "SELECT SUM(amount) AS balance FROM wallet "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
      // while ($row = $res->fetch_array())  
      if ($row = $res->fetch_array())  { 
        $systemWalletbalance=$row['balance'];
        return $systemWalletbalance;
      }  
      $res->free(); 
    } 
  }
}


function getRoomDetails($mysqli, $roomtoken){
  $sql = "SELECT * FROM hotel_rooms where room_id='$roomtoken'"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['hotelid']=$row['hotelid'];
        $_SESSION['room_id']=$row['room_id'];
        $_SESSION['room_name']=$row['name'];
        $_SESSION['room_desc']=$row['room_description'];
        $_SESSION['availnum']=$row['availnum'];
        $_SESSION['price']=$row['price'];
        $_SESSION['account_owner']=$row['account_owner'];
        $_SESSION['dmc']=$row['dmc'];
        $_SESSION['hotel_owner']=$row['hotel_owner'];
        $_SESSION['display']=$row['display'];
        $_SESSION['timestamp']=$row['timestamp'];
        $_SESSION['category']=$row['category'];
        return true;
      }  
      $res->free(); 
    }else { 
      return false; 
    } 
  }else {
    return false; 
    $mysqli->error; 
  } 
  $mysqli->close();
}



function getHotelDetails($mysqli, $hoteltoken){
  $sql = "SELECT * FROM hotels where token='$hoteltoken'"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['hotelid']=$row['token'];
        $_SESSION['hotel_name']=$row['hotelname'];
        $_SESSION['description']=$row['description'];
        $_SESSION['account_owner']=$row['account_owner'];
        $_SESSION['dmc']=$row['dmctoken'];
        $_SESSION['hotel_owner']=$row['hotel_owner'];
        $_SESSION['location']=$row['location'];
        $_SESSION['timestamp']=$row['timestamp'];
        $_SESSION['latitude']=$row['latitude'];
        $_SESSION['longitude']=$row['longitude'];
        $_SESSION['display']=$row['display'];
        return true;
      }  
      $res->free(); 
    }else { 
      return false; 
    } 
  }else {
    return false; 
    $mysqli->error; 
  } 
  $mysqli->close();
}


function getHotelDetails_dmc($mysqli, $hoteltoken, $dmctoken){
  $sql = "SELECT * FROM hotels where token='$hoteltoken'"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['hotelid']=$row['token'];
        $_SESSION['hotel_name']=$row['hotelname'];
        $_SESSION['description']=$row['description'];
        $_SESSION['account_owner']=$row['account_owner'];
        $_SESSION['dmc']=$row['dmctoken'];
        $_SESSION['hotel_owner']=$row['hotel_owner'];
        $_SESSION['location']=$row['location'];
        $_SESSION['timestamp']=$row['timestamp'];
        $_SESSION['latitude']=$row['latitude'];
        $_SESSION['longitude']=$row['longitude'];
        $_SESSION['display']=$row['display'];
        return true;
      }  
      $res->free(); 
    }else { 
      return false; 
    } 
  }else {
    return false; 
    $mysqli->error; 
  } 
  $mysqli->close();
}


function getUsertoken_bizcreds($mysqli, $hotel_owner){
  $sql = "SELECT * FROM business_creds where usertoken='$hotel_owner'"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
      }  
      $res->free(); 
    }else { 
      return false; 
    } 
  }else {
    return false; 
    $mysqli->error; 
  } 
  $mysqli->close();
}



function insertUsertoken_bizcreds($mysqli, $hotel_owner, $timestamp){
  $sql = "INSERT INTO business_creds (usertoken, timestamp) VALUES('$hotel_owner', '$timestamp') "; 
if ($mysqli->query($sql)===true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}



function checkAcctOwnerToken($mysqli, $token){
  $sql = "SELECT * FROM hotels where account_owner='$token'"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}



function addhotel_owner_hotels($mysqli, $account_owner, $hoteltoken, $usertoken) {
  $sql = "UPDATE hotels SET hotel_owner='$usertoken' WHERE token='$hoteltoken' AND account_owner='$account_owner' AND display=1 ";
  if ($mysqli->query($sql)===true) {
    // code...
    return true;
    exit;
  }else{
    return false;
    exit;
  }
  $mysqli->close();
}



function addDMC_hotels($mysqli, $usertoken, $dmctoken, $hoteltoken, $source, $hotelcode){
  $timestamp = time();
  $sql = "INSERT INTO hotels_dmc_map (hoteltoken, dmctoken, source, hotelcode, timestamp)
   VALUES('$hoteltoken', '$dmctoken', '$source',  '$hotelcode', '$timestamp') "; 
 if ($mysqli->query($sql)===true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}


function checkHotelDisplay($mysqli, $token){
  $sql = "SELECT * FROM hotels where token='$token' and display=0 "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}



function checkHotelRoomDisplay($mysqli, $token){
  $sql = "SELECT * FROM hotel_rooms where room_id='$token' and display=0 "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}



function checkContractDisplay($mysqli, $token){
  $sql = "SELECT * FROM contracts where token='$token' and display=0 "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function checkDatePlan($mysqli, $start_date, $exp_date, $contractToken, $roomtoken){
  $sql = "SELECT * FROM contracts where start_date='$start_date' and exp_date='$exp_date' and roomtoken='$roomtoken' and token='$contractToken' and display=1 "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();

//   if (checkIfStartDateisIbtwn()==true) {
//     // code...
//     return true;
//   }elseif(CheckIfEndDateisIbtwn()==true){
// return true;
//   }else{
//     return false;
//   }
}


function checkCancelPLan($mysqli, $contractName, $token, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $cancel_days, $cancel_penalty, $businessName, $city, $country, $cancel_type, $cancel_start, $cancel_end) {

  $sql = "SELECT * FROM contracts where contract_name='$contractName' and token='$token' and hoteltoken='$hoteltoken' and dmctoken='$dmctoken' and status='$status' and child_age_from='$child_age_From' and child_age_to='$child_age_To' and currency='$currency' and cancel_days='$cancel_days' and cancel_penalty='$cancel_penalty' and business_name='$businessName' and city='$city' and country='$country' and cancel_type='$cancel_type' and display=1 and cancel_start='$cancel_start' and cancel_end = '$cancel_end' and token='$token'";

  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function checkMealsPLan($mysqli, $meals_from, $meals_to) {
  $sql = "SELECT * FROM contracts where meals_start='$meals_from' and meals_end='$meals_to' and display=1 "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function confirmDatePlan($mysqli, $token, $start_date, $exp_date) {
  $sql = "UPDATE contracts SET confirm=1 WHERE token='$token' and start_date='$start_date' and exp_date='$exp_date' and display=1 "; 
  if ($mysqli->query($sql)=== true){ 
    return true;
    exit();
  }else{ 
    return false;
    exit();
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close(); 
}


function getUserDetails_token($mysqli, $token){
  $sql = "SELECT * FROM users where token='$token'"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['usertoken']=$row['token'];
        $_SESSION['mail']=$row['mail'];
        $_SESSION['role']=$row['role'];
        $_SESSION['fullname']=$row['fname'];
        $_SESSION['lastname']=$row['lname'];
        $_SESSION['phone']=$row['phone'];
        $_SESSION['address']=$row['address'];
        $_SESSION['timestamp']=$row['timestamp'];
        $_SESSION['country']=$row['country'];
        $_SESSION['city']=$row['city'];
        $_SESSION['payoneer_linked']=$row['payoneer_linked'];
        $_SESSION['zip_code']=$row['zip_code'];
        $_SESSION['state']=$row['state'];
        $_SESSION['currency']=$row['currency'];
        $_SESSION['stripe_linked'] = $row['is_stripe_connected'];
            return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}



function getBusinessName($mysqli, $token){
  $sql = "SELECT * FROM business_creds where usertoken='$token'"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $businessName = $row['business_name'];
        return $businessName;
        $res->free();
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function createAmenities($mysqli, $room_amenities){
  // code...
  $sql = "INSERT INTO amenities (room_amenities) VALUES('$room_amenities') "; 
  if ($mysqli->query($sql)===true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}


function createRoomCategory($mysqli, $category){
  // code...
  $sql = "INSERT INTO room_category (category) VALUES('$category') "; 
  if ($mysqli->query($sql)===true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}



function insertSelectedAmenities($mysqli, $room_amenities, $amenities_id, $roomtoken){
  // code...
  $sql = "INSERT INTO selected_amenities (room_amenities, amenities_id, roomtoken) VALUES('$room_amenities', '$amenities_id', '$roomtoken') "; 
  if ($mysqli->query($sql)===true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}


function checkselectedAmenities_room($mysqli, $room_amenities, $roomtoken){
  $sql = "SELECT * FROM selected_amenities where room_amenities='$room_amenities' and roomtoken='$roomtoken' "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}

function checkRoomCategoryExist($mysqli, $room_category) {
  $sql = "SELECT * FROM room_category where category='$room_category' "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function checkAmenitiesExist($mysqli, $room_amenities){
  $sql = "SELECT * FROM amenities where room_amenities='$room_amenities' "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function updateAmenitiesDisplay($mysqli, $room_amenities){
  $sql = "UPDATE amenities SET display=0 WHERE room_amenities='$room_amenities' and display=1 "; 
  if ($mysqli->query($sql)=== true){ 
    return true;
    exit();
  }else{ 
    return false;
    exit();
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close(); 
}

function updateRoomCategoryDisplay($mysqli, $room_category){
  $sql = "UPDATE room_category SET display=0 WHERE category='$room_category' and display=1 "; 
  if ($mysqli->query($sql)=== true){ 
    return true;
    exit();
  }else{ 
    return false;
    exit();
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close(); 
}


function changeRoomCategoryDisplay($mysqli, $room_category){
  $sql = "UPDATE room_category SET display=1 WHERE category='$room_category' and display=0 "; 
  if ($mysqli->query($sql)=== true){ 
    return true;
    exit();
  }else{ 
    return false;
    exit();
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close(); 
}


function changeAmenitiesDisplay($mysqli, $room_amenities){
  $sql = "UPDATE amenities SET display=1 WHERE room_amenities='$room_amenities' and display=0 "; 
  if ($mysqli->query($sql)=== true){ 
    return true;
    exit();
  }else{ 
    return false;
    exit();
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();  
}

function checkAmenitiesDisplay($mysqli, $room_amenities){
  $sql = "SELECT * FROM amenities where room_amenities='$room_amenities' and display=0"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function checkRoomCategoryDisplay($mysqli, $room_category){
  $sql = "SELECT * FROM room_category where category='$room_category' and display=0"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}

function dateBandExist($mysqli, $id){
  $sql = "SELECT * FROM contracts where id='$id' and display=1"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function first_updateRelay1($mysqli, $id){
  $sql = "UPDATE contracts SET relay1=1 WHERE id='$id' and display=1 "; 
  if ($mysqli->query($sql)=== true){ 
    return true;
    exit();
  }else{ 
    return false;
    exit();
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}


function getContractsDetails_relay2($mysqli){
  $sql = "SELECT * FROM contracts where relay2=1 "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['id_2'] = $row['id'];
        $_SESSION['business_name_2'] = $row['business_name'];
        $_SESSION['city_2'] = $row['city'];
        $_SESSION['country_2'] = $row['country'];
        $_SESSION['contract_name_2'] = $row['contract_name'];
        $_SESSION['contractToken_2'] = $row['token'];
        $_SESSION['hoteltoken_2'] = $row['hoteltoken'];
        $_SESSION['roomtoken_2'] = $row['roomtoken'];
        $_SESSION['room_desc_2'] = $row['room_desc'];
        $_SESSION['dmctoken_2'] = $row['dmctoken'];
        $_SESSION['hotel_owner_2'] = $row['hotel_owner'];
        $_SESSION['account_owner_2'] = $row['account_owner'];
        $_SESSION['hotelname_2'] = $row['hotelname'];
        $_SESSION['hotel_desc_2'] = $row['hotel_desc'];
        $_SESSION['room_name_2'] = $row['room_name'];
        $_SESSION['timestamp_2'] = $row['timestamp'];
        $_SESSION['status_2'] = $row['status']; 
        $_SESSION['child_age_From_2'] = $row['child_age_from']; 
        $_SESSION['child_age_To_2'] = $row['child_age_to']; 
        $_SESSION['currency_2'] = $row['currency'];
        $_SESSION['occupy_min_2'] = $row['occupy_min'];
        $_SESSION['occupy_max_2'] = $row['occupy_max'];
        $_SESSION['occupy_min_child_2'] = $row['occupy_min_child']; 
        $_SESSION['occupy_max_child_2'] = $row['occupy_max_child'];
        $_SESSION['release_date_2'] = $row['release_date'];  
        $_SESSION['expiry_date_2'] = $row['exp_date'];
        $_SESSION['start_date_2'] = $row['start_date'];
        $_SESSION['display_2'] = $row['display'];
        $_SESSION['room_2'] = $row['room'];
        $_SESSION['price_sgl_2'] = $row['price_sgl'];
        $_SESSION['price_dbl_2'] = $row['price_dbl'];
        $_SESSION['price_trl_2'] = $row['price_trl'];
        $_SESSION['price_qud_2'] = $row['price_qud'];
        $_SESSION['price_chd1_2'] = $row['price_chd1'];
        $_SESSION['price_chd2_2'] = $row['price_chd2'];
        $_SESSION['inventory_room_2'] = $row['invt_room'];
        $_SESSION['inventory_rel_2'] = $row['invt_rel'];
        $_SESSION['relay1_2'] = $row['relay1'];
        $_SESSION['relay2_2'] = $row['relay2'];
        $_SESSION['relay_id_2'] = $row['relay_id'];
        $_SESSION['room_category'] = $row['room_category'];
        return true;
      }  
      $res->free(); 
    }else { 
      return false; 
    } 
  }else {
    return false; 
    $mysqli->error; 
  } 
  $mysqli->close();
}


function getContractById($mysqli, $id){
  // code...
  $sql = "SELECT * FROM contracts where id='$id' "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['id_1'] = $row['id'];
        $_SESSION['business_name_1'] = $row['business_name'];
        $_SESSION['city_1'] = $row['city'];
        $_SESSION['country_1'] = $row['country'];
        $_SESSION['contract_name_1'] = $row['contract_name'];
        $_SESSION['contractToken_1'] = $row['token'];
        $_SESSION['hoteltoken_1'] = $row['hoteltoken'];
        $_SESSION['roomtoken_1'] = $row['roomtoken'];
        $_SESSION['room_desc_1'] = $row['room_desc'];
        $_SESSION['dmctoken_1'] = $row['dmctoken'];
        $_SESSION['hotel_owner_1'] = $row['hotel_owner'];
        $_SESSION['account_owner_1'] = $row['account_owner'];
        $_SESSION['hotelname_1'] = $row['hotelname'];
        $_SESSION['hotel_desc_1'] = $row['hotel_desc'];
        $_SESSION['room_name_1'] = $row['room_name'];
        $_SESSION['timestamp_1'] = $row['timestamp'];
        $_SESSION['status_1'] = $row['status']; 
        $_SESSION['child_age_From_1'] = $row['child_age_from']; 
        $_SESSION['child_age_To_1'] = $row['child_age_to']; 
        $_SESSION['currency_1'] = $row['currency'];
        $_SESSION['occupy_min_1'] = $row['occupy_min'];
        $_SESSION['occupy_max_1'] = $row['occupy_max'];
      $_SESSION['occupy_min_child_1'] = $row['occupy_min_child']; 
      $_SESSION['occupy_max_child_1'] = $row['occupy_max_child'];
        $_SESSION['release_date_1'] = $row['release_date'];  
        $_SESSION['expiry_date_1'] = $row['exp_date'];
        $_SESSION['start_date_1'] = $row['start_date'];
        $_SESSION['display_1'] = $row['display'];
        $_SESSION['room_1'] = $row['room'];
        $_SESSION['price_sgl_1'] = $row['price_sgl'];
        $_SESSION['price_dbl_1'] = $row['price_dbl'];
        $_SESSION['price_trl_1'] = $row['price_trl'];
        $_SESSION['price_qud_1'] = $row['price_qud'];
        $_SESSION['price_chd1_1'] = $row['price_chd1'];
        $_SESSION['price_chd2_1'] = $row['price_chd2'];
        $_SESSION['inventory_room_1'] = $row['invt_room'];
        $_SESSION['inventory_rel_1'] = $row['invt_rel'];
        $_SESSION['twn_1'] = $row['twn'];
        $_SESSION['unit_1'] = $row['unit'];
        $_SESSION['relay1_1'] = $row['relay1'];
        $_SESSION['relay2_1'] = $row['relay2'];
        $_SESSION['relay_id_1'] = $row['relay_id'];
        $_SESSION['room_category_1'] = $row['room_category'];
        return true;
      }  
      $res->free(); 
    }else { 
      return false; 
    } 
  }else {
    return false; 
    $mysqli->error; 
  } 
  $mysqli->close();
}


function updateParentContract($mysqli, $id, $new_end_date) {
  $sql = "UPDATE contracts SET exp_date='$new_end_date' WHERE id='$id' "; 
  if ($mysqli->query($sql)=== true){ 
    return true;
    exit();
  }else{ 
    return false;
    exit();
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}


// function createChildContract($mysqli, $new_start_date, $timestamp) {
//   $sql = "INSERT INTO contracts (contract_name, token, hoteltoken, roomtoken, room_desc, dmctoken, hotel_owner, account_owner, hotelname, hotel_desc, room_name, start_date, exp_date, status, child_age_from, child_age_to, currency, occupy_min, occupy_max, occupy_min_child, occupy_max_child, release_date, timestamp, business_name, city, country, room, price_sgl, price_dbl, price_trl, price_qud, price_chd1, price_chd2, invt_room, invt_rel, relay_id, room_category) VALUES('".$_SESSION['contract_name_1']."', '".$_SESSION['contractToken_1']."', '".$_SESSION['hoteltoken_1']."', '".$_SESSION['roomtoken_1']."', '".$_SESSION['room_desc_1']."', '".$_SESSION['dmctoken_1']."', '".$_SESSION['hotel_owner_1']."', '".$_SESSION['account_owner_1']."', '".$_SESSION['hotelname_1']."', '".$_SESSION['hotel_desc_1']."', '".$_SESSION['room_name_1']."', '$new_start_date', '".$_SESSION['new_end_date_1']."', '".$_SESSION['status_1']."', '".$_SESSION['child_age_From_1']."', '".$_SESSION['child_age_To_1']."', '".$_SESSION['currency_1']."', '".$_SESSION['occupy_min_1']."', '".$_SESSION['occupy_max_1']."', '".$_SESSION['occupy_min_child_1']."', '".$_SESSION['occupy_max_child_1']."', '".$_SESSION['release_date_1']."', '$timestamp', '".$_SESSION['business_name_1']."', '".$_SESSION['city_1']."', '".$_SESSION['country_1']."', '".$_SESSION['room_1']."', '".$_SESSION['price_sgl_1']."', '".$_SESSION['price_dbl_1']."', '".$_SESSION['price_trl_1']."', '".$_SESSION['price_qud_1']."', '".$_SESSION['price_chd1_1']."', '".$_SESSION['price_chd2_1']."', '".$_SESSION['inventory_room_1']."', '".$_SESSION['inventory_rel_1']."', '".$_SESSION['relay_id_2']."', '".$_SESSION['room_category_1']."' ) "; 
//   if ($mysqli->query($sql)==true){
//     return true;
//     exit();
//   }else{ 
//     return false;
//     $mysqli->error; 
//   } 
//   // Close connection 
//   $mysqli->close();
// }


function createThirdChildContract($mysqli, $contract_name, $contractToken, $hoteltoken, $roomtoken, $room_desc, $dmctoken, $hotel_owner, $account_owner, $hotelname, $hotel_desc, $room_name, $new_start_date, $new_end_date, $status, $child_age_From, $child_age_To, $currency, $release_date, $timestamp, $business_name, $city, $country, $room, $price_sgl, $price_dbl, $price_trl, $price_qud, $price_chd1, $price_chd2, $inventory_room, $inventory_rel, $id, $room_category, $twn, $unit) {
  $sql = "INSERT INTO contracts (contract_name, token, hoteltoken, roomtoken, room_desc, dmctoken, hotel_owner, account_owner, hotelname, hotel_desc, room_name, start_date, exp_date, status, child_age_from, child_age_to, currency, release_date, timestamp, business_name, city, country, room, price_sgl, price_dbl, price_trl, price_qud, price_chd1, price_chd2, invt_room, invt_rel, relay_id, twn, unit, room_category) VALUES('$contract_name', '$contractToken', '$hoteltoken', '$roomtoken', '$room_desc', '$dmctoken', '$hotel_owner', '$account_owner', '$hotelname', '$hotel_desc', '$room_name', '$new_start_date', '$new_end_date', '$status', '$child_age_From', '$child_age_To', '$currency', '$release_date', '$timestamp', '$business_name', '$city', '$country', '$room', '$price_sgl', '$price_dbl', '$price_trl', '$price_qud', '$price_chd1', '$price_chd2', '$inventory_room', '$inventory_rel', '$id', '$twn', '$unit', '$room_category') "; 
  if ($mysqli->query($sql)==true){
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}

function checkSplitContract($mysqli, $id){
  $sql = "SELECT * FROM contracts where id='$id' and relay1=1 and display=1"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function insertMarkUp($mysqli, $contract_token, $markup, $category, $seller_type, $seller, $buyer_type, $buyer, $hotelname, $country, $timestamp){

  $sql = "INSERT INTO markup (contract_token, markup, category, seller_type, seller, buyer_type, buyer, hotelname, country, timestamp) VALUES('$contract_token', '$markup', '$category', '$seller_type', '$seller', '$buyer_type', '$buyer', '$hotelname', '$country', '$timestamp') ";
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}


function updateMarkup($mysqli, $id, $markup, $seller_type, $seller, $buyer_type, $buyer) {
  $sql = "UPDATE markup SET markup='$markup', seller_type='$seller_type', seller='$seller', buyer_type='$buyer_type', buyer='$buyer' WHERE id='$id' and display=1 "; 
  if ($mysqli->query($sql)=== true){ 
    return true;
    exit();
  }else{ 
    return false;
    exit();
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close(); 

}

function insertOverride($mysqli, $type, $amount1, $amount2, $amount3, $start_duration, $end_duration, $nature, $recipient, $override1, $override2, $override3, $hotelname, $country, $timestamp){

  $sql = "INSERT INTO override (recipient, type, amount1, amount2, amount3, start_duration, end_duration, override1, override2, override3, nature, hotelname, country, timestamp) VALUES('$recipient', '$type', '$amount1', '$amount2', '$amount3', '$start_duration', '$end_duration', '$override1', '$override2', '$override3', '$nature', '$hotelname', '$country', '$timestamp') ";
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}

function updateOverride($mysqli, $id, $type, $amount1, $amount2, $amount3, $start_duration, $end_duration, $nature, $recipient, $override1, $override2, $override3) {
  $sql = "UPDATE override SET recipient='$recipient', type='$type', amount1='$amount1', amount2='$amount2', amount3='$amount3', start_duration='$start_duration', end_duration='$end_duration', override1='$override1', override2='$override2', override3='$override3', nature='$nature' WHERE id='$id' and display=1 "; 
  if ($mysqli->query($sql)=== true){ 
    return true;
    exit();
  }else{ 
    return false;
    exit();
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close(); 

}


function checkMarkupExist($mysqli, $id) {
  $sql = "SELECT * FROM markup where id='$id' "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function updateMarkupDisplay($mysqli, $id) {
  $sql = "UPDATE markup SET display=0 WHERE id='$id' and display=1 "; 
  if ($mysqli->query($sql)=== true){ 
    return true;
    exit();
  }else{ 
    return false;
    exit();
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close(); 

}


function checkOverrideExist($mysqli, $id) {
  $sql = "SELECT * FROM override where id='$id' "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function updateOverrideDisplay($mysqli, $id) {
  $sql = "UPDATE override SET display=0 WHERE id='$id' and display=1 "; 
  if ($mysqli->query($sql)=== true){ 
    return true;
    exit();
  }else{ 
    return false;
    exit();
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close(); 
}


function getContractName($mysqli, $contractToken){
  $sql = "SELECT * FROM contracts where token='$contractToken'"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
      // while ($row = $res->fetch_array())  
      if ($row = $res->fetch_array())  { 
        $contract_name=$row['contract_name'];
        return $contract_name;
      } 
      $res->free(); 
    } 
  }
}


function getRoles_DMC($mysqli) {
  $sql = "SELECT * FROM roles where role='DMC' "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function getRoles_ACCOUNTOWNER($mysqli) {
  $sql = "SELECT * FROM roles where role='ACCOUNTOWNER' "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}



function getRoles_HotelOwner($mysqli) {
  $sql = "SELECT * FROM roles where role='HOTELCHAIN' "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function getRoles_Traveler($mysqli) {
  $sql = "SELECT * FROM roles where role='TRAVELLER' "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function insertSpecialMarkUp($mysqli, $markup_id, $markup, $user_type, $usertoken, $timestamp, $hotelname, $country){

  $sql = "INSERT INTO special_markup (markup, markup_id, user_type, usertoken, timestamp, hotelname, country) VALUES('$markup', '$markup_id', '$user_type', '$usertoken', '$timestamp', '$hotelname', '$country') ";
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}


function checkDatePlanHasParent($mysqli, $dmctoken, $contractToken, $start_date, $end_date, $roomtoken) {
  $sql = "SELECT * FROM contracts where token='$contractToken' and roomtoken='$roomtoken' and dmctoken='$dmctoken' and start_date < '$start_date'  and exp_date > '$end_date' order by id DESC LIMIT 1"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['id_1'] = $row['id'];
        $_SESSION['business_name_1'] = $row['business_name'];
        $_SESSION['city_1'] = $row['city'];
        $_SESSION['country_1'] = $row['country'];
        $_SESSION['contract_name_1'] = $row['contract_name'];
        $_SESSION['contractToken_1'] = $row['token'];
        $_SESSION['hoteltoken_1'] = $row['hoteltoken'];
        $_SESSION['roomtoken_1'] = $row['roomtoken'];
        $_SESSION['room_desc_1'] = $row['room_desc'];
        $_SESSION['dmctoken_1'] = $row['dmctoken'];
        $_SESSION['hotel_owner_1'] = $row['hotel_owner'];
        $_SESSION['account_owner_1'] = $row['account_owner'];
        $_SESSION['hotelname_1'] = $row['hotelname'];
        $_SESSION['hotel_desc_1'] = $row['hotel_desc'];
        $_SESSION['room_name_1'] = $row['room_name'];
        $_SESSION['timestamp_1'] = $row['timestamp'];
        $_SESSION['status_1'] = $row['status']; 
        $_SESSION['child_age_From_1'] = $row['child_age_from']; 
        $_SESSION['child_age_To_1'] = $row['child_age_to']; 
        $_SESSION['currency_1'] = $row['currency'];
        $_SESSION['occupy_min_1'] = $row['occupy_min'];
        $_SESSION['occupy_max_1'] = $row['occupy_max'];
        $_SESSION['occupy_min_child_1'] = $row['occupy_min_child']; 
        $_SESSION['occupy_max_child_1'] = $row['occupy_max_child'];
        $_SESSION['release_date_1'] = $row['release_date'];  
        $_SESSION['expiry_date_1'] = $row['exp_date'];
        $_SESSION['start_date_1'] = $row['start_date'];
        $_SESSION['display_1'] = $row['display'];
        $_SESSION['room_1'] = $row['room'];
        $_SESSION['price_sgl_1'] = $row['price_sgl'];
        $_SESSION['price_dbl_1'] = $row['price_dbl'];
        $_SESSION['price_trl_1'] = $row['price_trl'];
        $_SESSION['price_qud_1'] = $row['price_qud'];
        $_SESSION['price_chd1_1'] = $row['price_chd1'];
        $_SESSION['price_chd2_1'] = $row['price_chd2'];
        $_SESSION['inventory_room_1'] = $row['invt_room'];
        $_SESSION['inventory_rel_1'] = $row['invt_rel'];
        $_SESSION['relay1_1'] = $row['relay1'];
        $_SESSION['relay2_1'] = $row['relay2'];
        $_SESSION['relay_id_1'] = $row['relay_id'];
         $_SESSION['twn_1'] = $row['twn'];
        $_SESSION['unit_1'] = $row['unit'];
        $_SESSION['room_category_1'] = $row['room_category'];
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function getHotelOwner_Engine($mysqli){
  $sql = "SELECT * FROM contracts where (country = '' or city = '' or country = '0' or city = '0') and (hotel_owner != '' or hotel_owner != '0') and display=1 LIMIT 1 "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['hotel_owner'] = $row['hotel_owner'];
        $_SESSION['contract_token'] = $row['token'];
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();  
}



function getCountryAndCity($mysqli, $hotel_owner){
  $sql = "SELECT * FROM users where usertoken = '$hotel_owner' "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['country'] = $row['country'];
        $_SESSION['city'] = $row['city'];
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();  
}


function updateContractCountryAndCity($mysqli, $contract_token, $country, $city) {
  $sql = "UPDATE contracts SET country='$country', city='$city' WHERE token='$contract_token' "; 
  if ($mysqli->query($sql)=== true){ 
    return true;
    exit();
  }else{ 
    return false;
    exit();
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close(); 
}

function getMarkupDetails($mysqli, $markup_id, $markup){
  # code...
  $sql = "SELECT * FROM markup where id='$markup_id' and markup='$markup' "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['markup'] = $row['markup'];
        $_SESSION['markup_id'] = $row['markup_id'];
        $_SESSION['usertoken'] = $row['usertoken'];
        $_SESSION['timestamp'] = $row['timestamp'];
        $_SESSION['hotelname'] = $row['hotelname'];
        $_SESSION['country'] = $row['country'];
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();

}


function createService($mysqli, $usertoken, $service_name, $date_from, $date_to, $location, $country, $city, $longitude, $latitude, $description, $social_media_link, $image_name, $image_url, $youtube_link, $price_adult, $price_child, $child_age_from, $child_age_to, $discounts, $discount_from, $discount_to, $min_pax_discount, $timestamp){
  # code...
  $sql = "INSERT INTO service (usertoken, service_name, date_from, date_to, location, country, city, longitude, latitude, description, social_media_link, image_name, image_url, youtube_link, price_adult, price_child, child_age_from, child_age_to, discounts, discount_from, discount_to, min_pax_discount, timestamp) VALUES('$usertoken', '$service_name', '$date_from', '$date_to', '$location', '$country', '$city', '$longitude', '$latitude', '$description', '$social_media_link','$image_name', '$image_url',  '$youtube_link', '$price_adult', '$price_child', '$child_age_from', '$child_age_to', '$discounts', '$discount_from', '$discount_to', '$min_pax_discount', '$timestamp') ";
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();

}


function createPackage($mysqli, $package_name, $package_id, $timestamp) {
  
  $sql = "INSERT INTO package (package_name, package_id, timestamp) VALUES('$package_name', '$package_id', '$timestamp') ";
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}

function updatePackage($mysqli, $package_id, $description, $fileURL, $youtube_link, $sharing_link){
  $sql = "UPDATE package SET description='$description', image_url='$fileURL', youtube_link='$youtube_link', sharing_link='$sharing_link' WHERE package_id='$package_id' and display=1"; 
  if ($mysqli->query($sql)=== true){ 
    return true;
    exit();
  }else{ 
    return false;
    exit();
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}


function checkPackageDayExist($mysqli, $day, $package_id) {
  $sql = "SELECT * FROM package_day where day='$day' and package_id='$package_id' and display=1 "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function createPackageDay($mysqli, $package_id, $day, $timestamp){
  $sql = "INSERT INTO package_day (package_id, day, timestamp) VALUES('$package_id', '$day', '$timestamp') ";
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}

function getServiceName ($mysqli, $id) {
  $sql = "SELECT * FROM service where id='$id' and display=1 "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $service_name = $row['service_name'];
        return $service_name;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function getHotelName($mysqli, $hoteltoken){
  $sql = "SELECT * FROM hotels where token='$hoteltoken' and display=1 "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $hotel_name = $row['hotelname'];
        return $hotel_name;
      }  
      $res->free(); 
    }else { 
      return false; 
    } 
  }else {
    return false; 
    $mysqli->error;
    exit(); 
  } 
  $mysqli->close();
}



function GetUserName($mysqli, $usertoken){
  $sql = "SELECT * FROM users where token='$usertoken'";
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $fullname = $row['fname']." ".$row['lname'];
        return $fullname;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}

function getPackageTypeName ($mysqli, $package_type, $package_type_id) {
  if ($package_type === 'SERVICE') {
    # code...
    $package_type_name = getServiceName ($mysqli, $package_type_id);

  }elseif ($package_type === 'HOTEL') {
    # code...
    $package_type_name = getHotelName($mysqli, $package_type_id);

  }else {
    # code...
  }
  return $package_type_name;
}



function createPackageItem($mysqli, $day_id, $seller_type, $seller, $package_type, $package_type_id, $package_id, $seller_type_name, $package_type_name, $timestamp,  $country, $contractToken, $roomtoken){
  $sql = "INSERT INTO package_item (package_id, day_id, seller_type, seller, package_type, package_type_id, seller_type_name, package_type_name, timestamp, country, contract_token, roomtoken) VALUES('$package_id', '$day_id', '$seller_type', '$seller', '$package_type', '$package_type_id', '$seller_type_name', '$package_type_name', '$timestamp', '$country', '$contractToken', '$roomtoken') ";
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
    exit();
  } 
  // Close connection 
  $mysqli->close();
}

function getPackageDayId($mysqli, $day, $package_id){
  $sql = "SELECT * FROM package_day where day='$day' and package_id='$package_id' and display=1 ";
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $day_id = $row['id'];
        return $day_id;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function getPackageDayItem($mysqli, $day_id, $package_id){
  $sql = "SELECT * FROM package_item where day_id='$day_id' and package_id='$package_id' and display=1 ";
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['id'] = $row['id'];
        $_SESSION['package_id'] = $row['package_id'];
        $_SESSION['day_id'] = $row['day_id'];
        $_SESSION['seller_type'] = $row['seller_type'];
        $_SESSION['seller'] = $row['seller'];
        $_SESSION['package_type'] = $row['package_type'];
        $_SESSION['package_type_id'] = $row['package_type_id'];
        $_SESSION['seller_type_name'] = $row['seller_type_name'];
        $_SESSION['package_type_name'] = $row['package_type_name'];
        $_SESSION['timestamp'] = $row['timestamp'];
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}

function insertWithdrawalTransaction($mysqli, $usertoken, $amount, $timestamp, $options, $currency) {
  $sql = "INSERT INTO withdrawals (usertoken, amount, timestamp, currency) VALUES('$usertoken', '$amount','$timestamp', '$currency') "; 

  if ($mysqli->query($sql)==true) { 
    return true;
    exit();
  } else{ 
    return false;
    exit();
    $mysqli->error; 
  }   
  // Close connection 
  $mysqli->close(); 
}

function confrimWithdrawal ($mysqli, $withdrawal_id){
  $sql = "UPDATE withdrawals SET status=1 WHERE id='$withdrawal_id'"; 
  if ($mysqli->query($sql)=== true){ 
    return true;
    exit();
  }else{ 
    return false;
    exit();
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}


function getHotelRoomImage($mysqli, $roomtoken){
  $sql = "SELECT * FROM hotel_rooms where room_id='$roomtoken' and display=1 LIMIT 1 ";
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $image = $row['image'];
        return $image;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function getHotelImage($mysqli, $hotelToken){
  $sql = "SELECT * FROM hotels where token='$hotelToken' and display=1 LIMIT 1 ";
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $cover_image = $row['cover_image'];
        return $cover_image;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}


function deleteService($mysqli, $id) {
  # code...
  $sql = "UPDATE service SET display=0 WHERE id='$id' and display=1 "; 
  if ($mysqli->query($sql)=== true){ 
    return true;
    exit();
  }else{ 
    return false;
    exit();
      $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}


function editService($mysqli, $usertoken, $service_name, $date_from, $date_to, $location, $country, $city, $longitude, $latitude, $description, $social_media_link, $image_name, $image_url, $youtube_link, $price_adult, $price_child, $child_age_from, $child_age_to, $discounts, $discount_from, $discount_to, $min_pax_discount, $id) {
  # code...
  $sql = "UPDATE service SET service_name='$service_name', date_from='$date_from', date_to='$date_to', location='$location', country='$country', city='$city', longitude='$longitude', latitude='$latitude', description='$description', social_media_link='$social_media_link', image_name='$image_name', image_url='$image_url', youtube_link='$youtube_link', price_adult='$price_adult', price_child='$price_child', child_age_from='$child_age_from', child_age_to='$child_age_to', discounts='$discounts', discount_from='$discount_from', discount_to='$discount_to', min_pax_discount='$min_pax_discount' WHERE usertoken='$usertoken' AND id='$id' AND display=1";
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}



function getSuplementPerc($mysqli, $contract_token, $to, $from){

  // $sql = "SELECT * FROM contracts where token='$contract_token' and display=1 LIMIT 1";

  $sql = "SELECT * FROM contracts where token = '$contract_token' and sup_stay_from < '$from' and sup_stay_to > '$to' and display = 1
UNION ALL
SELECT * FROM contracts 
WHERE token = '$contract_token' and sup_stay_to = '$to' and display = 1
UNION ALL
SELECT * FROM contracts 
WHERE token = '$contract_token' and sup_stay_from = '$from' and display = 1 LIMIT 1";

  if ($res = $mysqli->query($sql)) {
    if ($res->num_rows > 0) { 
      if ($row = $res->fetch_array()){
        $supp_perc = $row['supp_perc'];
        return $supp_perc;
        exit();
      }else { 
      return 0; 
      exit();
    }  
      $res->free(); 
    }else { 
      return 0; 
      exit();
    } 
  }else {
    return 0; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();

}

function checkPasswordExist($mysqli, $usertoken, $current_password) {
  $sql = "SELECT * FROM users where token='$usertoken' and pword='$current_password'";
  if ($res = $mysqli->query($sql)) {
    if ($res->num_rows > 0) {
      if ($row = $res->fetch_array()) {
        return true;
        exit();
      }
      $res->free();
    } else {
      return false;
      exit();
    }
  } else {
    return false;
    exit();
    $mysqli->error;
  }
  $mysqli->close();
}
function updatePassword($mysqli, $usertoken, $new_password) {
  $sql = "UPDATE users SET pword='$new_password' WHERE token='$usertoken' ";
  if ($mysqli->query($sql) == true) {
    return true;
    exit();
  } else {
    return false;
    $mysqli->error;
  }
  // Close connection 
  $mysqli->close();
}

function checkUserExist($mysqli, $token)
{
  $sql = "SELECT * FROM users where token='$token'";
  if ($res = $mysqli->query($sql)) {
    if ($res->num_rows > 0) {
      if ($row = $res->fetch_array()) {
        return true;
        exit();
      }
      $res->free();
    } else {
      return false;
      exit();
    }
  } else {
    return false;
    exit();
    $mysqli->error;
  }
  $mysqli->close();
}

function updateUserProfile($mysqli, $usertoken, $fname, $lname, $address, $phone, $country, $city, $state, $zip_code, $proof_of_id, $comp_reg_cert, $proof_of_address) {
  $sql = "UPDATE users SET fname='$fname', lname='$lname', phone='$phone', address='$address', country='$country', city='$city', state='$state', zip_code='$zip_code', proof_of_id='$proof_of_id', comp_reg_cert='$comp_reg_cert', proof_of_address='$proof_of_address' WHERE token='$usertoken' ";
  $sql = "UPDATE users SET zip_code='$zip_code' WHERE token='$usertoken' ";
  if ($mysqli->query($sql) == true) {
    return true;
    exit();
  } else {
    return false;
    $mysqli->error;
  }
  // Close connection 
  $mysqli->close();
}

