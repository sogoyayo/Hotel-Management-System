<?
// include('v1/external-api/engine.php');

$db = new db();
# update hotel cover image  
if ($res = $mysqli->query("SELECT * FROM hotels where cover_image='' order by timestamp ASC")) {
    if ($res->num_rows > 0) { 
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) { 
            $coverImage = getHotelImageOne($mysqli, $row['token']);
            $token = $row['token'];
            $sql = "UPDATE hotels SET cover_image='$coverImage' WHERE token='$token'"; 
            if($mysqli->query($sql) == true){ 

            }else{

            }
        }
    }else{
      
    }
}else {

}



if (getHotelOwner_Engine($mysqli)===true) {

    if (getCountryAndCity($mysqli, $_SESSION['hotel_owner'])===true) { 
        $country = strtoupper($_SESSION['country']);
        $city = strtoupper($_SESSION['city']);
        if (updateContractCountryAndCity($mysqli, $_SESSION['contract_token'], $country, $city)===true) { 
            unset($_SESSION);
        }else {
            
        }
    }else{
      
    }
}


CheckForUnMappedDataFromEzee($mysqli);

checkForContractsWithoutToken($mysqli);

UpdateEzeeContracts($db, $mysqli);


$sql = "UPDATE contracts SET price_chd1='0' WHERE price_chd1='undefined'"; 
if($mysqli->query($sql) == true){ 

}else{

}


$sql = "UPDATE contracts SET price_chd2='0' WHERE price_chd2='undefined'"; 
if($mysqli->query($sql) == true){ 

}else{

}


$sql = "UPDATE contracts SET status='live' WHERE source='ezee'"; 
if($mysqli->query($sql) == true){ 

}else{

}


$sql = "UPDATE ex_ezee_availability SET mapped=1 WHERE dayone_mapped = 1 and daytwo_mapped = 1 and daythree_mapped = 1";
if($mysqli->query($sql) === true){

    // echo $type;

}else{
  // return false;
}



# map external hotel  
if ($res = $mysqli->query("SELECT * FROM hotel_external_records where mapped = 0 order by rand() LIMIT 1")) {
    if ($res->num_rows > 0) { 
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) { 
            
            $id = $row['id'];
            $hotelcode = $row['hotelcode'];
            $source = $row['source'];
            $sourceid = $row['sourceid'];
            $hotelname = $row['name'];
            $dmctoken = $row['dmctoken'];
            $usertoken = $row['usertoken'];
// echo $hotelcode;
    $db = new db();
            $rooms =getHotelRoomsFromEzee($db, $mysqli, $hotelcode, EZEE_AUTH_KEY);
// echo 1;
if ($rooms != false) {
    // code...
    // echo 2;
if (mappExternalHotel($db, $mysqli, $hotelcode, $source, $sourceid, $hotelname, $dmctoken, $usertoken)==true) {
    // code...
    // echo 3;
    if (updateExternalRooms($db, $mysqli, $rooms, $hotelcode, $_SESSION['hoteltoken'], $hotelname)==true) {
        // code...
        // echo 4;
        $sql = "UPDATE hotel_external_records SET mapped = 1 WHERE id='$id'"; 
            if($mysqli->query($sql) == true){ 
            }else{}
    }else{}
}else{}
}else{}
        }
    }else{}
}else {}



# move rooms from external to normal table
if ($res = $mysqli->query("SELECT * FROM hotel_rooms_external_records where moved = 0 and roomtypeunkid != '' and roomtypeunkid != '' order by timestamp ASC LIMIT 1")) {
    if ($res->num_rows > 0) { 
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) {
            $id = $row['id'];
if (moveExternalRoom($db, $mysqli, $row['roomtoken'], $row['hotelid_external'], $row['hoteltoken'], $row['name'], $row['roomtypeunkid'], $row['roomtype'], $row['shortcode'])==true) {
        $sql = "UPDATE hotel_rooms_external_records SET moved = 1 WHERE id='$id'"; 
            if($mysqli->query($sql) == true){ 
// echo time();
            }else{}
}
        }
    }
}



// confirm payoneer payment
if ($res = $mysqli->query("SELECT * FROM withdrawals where status > 1 and payout_type = 'payoneer' order by rand() LIMIT 1")) {
    if ($res->num_rows > 0) { 
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) {
            $wid = $row['id'];
            $usertoken = $row['usertoken'];
            $db = new db();
if (confirmPayoneerPayout($db, $mysqli, $wid)==true) {
    // code...

 $userData = getUserData($db, $usertoken);
$email = $userData['mail'];
$subject = "HotelsOffline Payments settlement";
$body = "Your withdrawal through Payoneer has been paid.";
$timestamp = time();
    mail_tb($mysqli,$email,$subject,$body,$timestamp);

    updateWithdrawal($db, $mysqli, $wid, 'payoneer', 'Payment successfuly sent by payoneer', 1);
}else{
updateWithdrawal($db, $mysqli, $wid, 'payoneer', 'Payment FAILED to go through', 0);
}
        }
    }
}




// get user payoneer status
if ($res = $mysqli->query("SELECT * FROM users where payoneer_linked > 0 and payoneer_token != '0' order by rand() LIMIT 1")) {
    if ($res->num_rows > 0) { 
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) {
            $usertoken = $row['token'];
            $db = new db();
if (getUserPayoneerStatus($db, $mysqli, $wid)==true) {
    // code...
    updateUserPayoneerStatus($db, $mysqli, $usertoken, 1);
}else{
updateUserPayoneerStatus($db, $mysqli, $usertoken, 0);
}
        }
    }
}


// update contract hotel code
if ($res = $mysqli->query("SELECT * FROM contracts where source != '0' and (hotelcode = '0' or hotelcode = '') order by rand() LIMIT 10")) {
    if ($res->num_rows > 0) { 
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) {
            $usertoken = $row['token'];
            $db = new db();
            $contractToken = $row['token'];

$exterContractData = getExternalContractRawData($db, $contractToken);
if ($exterContractData != false) {
    // code...
    // echo $contractToken; 
// echo " - hotel code - ";
    $hotelcode = $exterContractData['hotelcode'];
    $sql1 = "UPDATE contracts SET hotelcode = '$hotelcode' WHERE token='$contractToken'"; 
            if($mysqli->query($sql1) == true){ 
// echo time();
    // echo $contractToken; 
// echo " - hotel code - done!";
            }else{
                // echo $mysqli->error;
            }
}
        }
    }
}



// update contract roomtypeunkid
if ($res = $mysqli->query("SELECT * FROM contracts where source != '0' and (roomtypeunkid = '0' or roomtypeunkid = '') order by rand() LIMIT 10")) {
    if ($res->num_rows > 0) { 
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) {
            $usertoken = $row['token'];
            $db = new db();
            $contractToken1 = $row['token'];

$exterContractData1 = getExternalContractRawData($db, $contractToken1);
if ($exterContractData1 != false) {
    // code...
//     echo $contractToken;
// echo " - roomtypeunkid - ";

   if (isset($exterContractData1['roomtypeunkid'])) {
       // code...
     $roomtypeunkid = $exterContractData1['roomtypeunkid'];
    $sql2 = "UPDATE contracts SET roomtypeunkid = '$roomtypeunkid' WHERE token='$contractToken1'"; 
            if($mysqli->query($sql2) == true){ 
// echo time();
// echo $contractToken;
// echo " - roomtypeunkid - done!";
            }else{
                // echo $mysqli->error;
                // echo "not done";
            }
   }
}else{
    // echo "not done 2";
}
        }
    }
}




// send payoneer payments
if ($res = $mysqli->query("SELECT * FROM withdrawals where payout_type = 'payoneer' and status = 0 order by rand() LIMIT 2")) {
    if ($res->num_rows > 0) { 
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) {
            $usertoken = $row['usertoken'];
            $db = new db();
            $wid = $row['id'];
            $amount = $row['amount'];
            $currency = $row['currency'];
            $description = $row['note'];

            if (sendMoney_payoneer($db, $mysqli, $usertoken, $wid, $amount, $currency, $description)==true) {
                // code...
            }

}
        }
    }



// update contract display
if ($res = $mysqli->query("SELECT * FROM contracts where start_date != 0 and exp_date != 0 order by rand() LIMIT 20")) {
    if ($res->num_rows > 0) { 
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) {
            $start_date = $row['start_date'];
            $db = new db();
            $exp_date = $row['exp_date'];
            $id = $row['id'];

           if ($exp_date < time()) {
               // code...
             $sql2 = "UPDATE contracts SET display = 0 WHERE id='$id'"; 
            if($mysqli->query($sql2) == true){ 

            }else{
                
            }
           }

}
        }
    }




// update main contract status
    $oneeightydays = 24 * 3600 * 180;
    $oneeighty = time() + $oneeightydays; 
if ($res = $mysqli->query("SELECT * FROM init_contract where lastdate != 0 and (lastdate = $oneeighty or lastdate < $oneeighty) and display = 0 order by rand() LIMIT 10")) {
    if ($res->num_rows > 0) { 
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) {
            $token = $row['token'];
          

        $sql2 = "UPDATE init_contract SET status = 'renew' WHERE token='$token'"; 
            if($mysqli->query($sql2) == true){ 

            }else{
                
            }
}
        }
    }



    if ($res = $mysqli->query("SELECT * FROM init_contract where channel != '0' and channel !='' and display = 1 order by rand() LIMIT 10")) {
    if ($res->num_rows > 0) { 
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) {
            $token = $row['token'];
          $channel = $row['channel'];

        $sql2 = "UPDATE contracts SET source = '$channel' WHERE token='$token'"; 
            if($mysqli->query($sql2) == true){ 

            }else{
                
            }
}
        }
    }




if ($res = $mysqli->query("SELECT * FROM contracts where hoteltoken != '0' and hoteltoken !='' and hotelname = '' order by rand() LIMIT 10")) {
    if ($res->num_rows > 0) { 
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) {
            $hoteltoken = $row['hoteltoken'];
// echo $hoteltoken;
// exit();
// 

 if ($res = $mysqli->query("SELECT * FROM hotels where token = '$hoteltoken' LIMIT 1")) {
    if ($res->num_rows > 0) { 
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) {
            $hotelname = $row['hotelname'];
// echo $hotelname;
// exit();
        $sql2 = "UPDATE contracts SET hotelname = '$hotelname' WHERE hoteltoken='$hoteltoken'"; 
            if($mysqli->query($sql2) == true){ 

            }else{
                
            }
}
        }
    }

            // 
       
}
        }
    }





    if ($res = $mysqli->query("SELECT * FROM init_contract where status != 'CLOSED' order by rand() LIMIT 10")) {
    if ($res->num_rows > 0) { 
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) {
            $token = $row['token'];

// 

 if ($res = $mysqli->query("SELECT * FROM markup where contract_token = '$token'")) {
    if ($res->num_rows > 0) { 
//         // while ($row = $res->fetch_array())  
//         if ($row = $res->fetch_array()) {
//             $hotelname = $row['hotelname'];
// // echo $hotelname;
// // exit();
//         $sql2 = "UPDATE contracts SET hotelname = '$hotelname' WHERE hoteltoken='$hoteltoken'"; 
//             if($mysqli->query($sql2) == true){ 

//             }else{
                
//             }
// }
        }else{

            $sql2 = "UPDATE init_contract SET status = 'CLOSED' WHERE token='$token'"; 
            if($mysqli->query($sql2) == true){ 

            }else{
                
            }


            $sql1 = "UPDATE contracts SET status = 'CLOSED' WHERE token='$token'"; 
            if($mysqli->query($sql1) == true){ 

            }else{
                
            }

        }
    }

            // 
       
}
        }
    }





        if ($res = $mysqli->query("SELECT * FROM init_contract where status = 'CLOSED' order by rand() LIMIT 10")) {
    if ($res->num_rows > 0) { 
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) {
            $token = $row['token'];
// 
 if ($res = $mysqli->query("SELECT * FROM markup where contract_token = '$token'")) {
    if ($res->num_rows > 0) { 

 $sql2 = "UPDATE init_contract SET status = 'LIVE' WHERE token='$token'"; 
            if($mysqli->query($sql2) == true){ 

            }else{
                
            }


            $sql1 = "UPDATE contracts SET status = 'LIVE' WHERE token='$token'"; 
            if($mysqli->query($sql1) == true){ 

            }else{
                
            }

        }else{

        }
    }

            // 
       
}
        }
    }

CheckForUnMappedDataFromHotelBeds($db, $mysqli);




// check processing stripe account links
// if ($res = $mysqli->query("SELECT * FROM users where is_stripe_connected = 1 order by rand() LIMIT 1")) {
//     if ($res->num_rows > 0) { 
//         // while ($row = $res->fetch_array())  
//         if ($row = $res->fetch_array()) {
//             $usertoken = $row['token'];
//             $stripeId = $row['stripe_id'];

//  $stripe = new \Stripe\StripeClient(
//   'sk_test_51Lv3gTFTpufO3rQ4twBg7nboEt2euNM2la01RnZcvqv0WLpQhEwMzTzM3tyeVbprLtPVwIqPR1qRwr03De2ACpO500P9Nea69n'
// );

//  if (verifyUserStripeAuth($db, $mysqli, $usertoken, $stripeId, $stripe)==true) {
//      // code...

//  }else{}

//         }else{  }
//             }
//     }



// update user country ticker
if ($res = $mysqli->query("SELECT * FROM users where country_ticker = '0' and (country != '0' or country != '') order by rand() LIMIT 1")) {
    if ($res->num_rows > 0) {
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) {
            $country = $row['country'];
            $token = $row['token'];
            
 // 
if ($res = $mysqli->query("SELECT * FROM country_symbol where name = '$country' and ticker != '0' order by rand() LIMIT 1")) {
    if ($res->num_rows > 0) {
        // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array()) {
            $name = $row['name'];
            $ticker = $row['ticker'];

 $sql1 = "UPDATE users SET country_ticker = '$ticker' WHERE token='$token'"; 
            if($mysqli->query($sql1) == true){ 

            }else{
                
            }

        }else{  }
            }
        }else{  }
// 

            }
        }
    }


    


$db = null;
?>