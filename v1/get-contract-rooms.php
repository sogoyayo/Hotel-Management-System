<?php
header('Content-Type: application/json');

require('../aaconfig.php');
require('../data.php');
require('../functions.php');
require('../functions2.php');

// include('../mailer.php');
include('../sms.php');
include('../engine.php');

$timestamp = time();

if (isset($_REQUEST['apptoken'])) {

    $apptoken = input_check($_REQUEST['apptoken']);

    if (CheckToken($mysqli, $apptoken)==true) {

if (!empty($_POST['token'])) {
    // code...

$token = input_check($_POST['token']);

$start_date = getContractStartDate($mysqli, $token);
// $start_date = "12";
$end_date = getContractEndDate($mysqli, $token);

 $sql = "SELECT * FROM contracts WHERE token='$token' and display=1 and room_category !='' GROUP BY roomtoken ORDER BY timestamp ASC ";
            if ($res = $mysqli->query($sql)) {
                if ($res->num_rows > 0) {
                    echo "[";
                   
$count=0;
while ($col = $res->fetch_array()) {
    $count= ++$count;
    $rownum= $res->num_rows;
    if ($col['invt_room'] == "" or $col['invt_room']=="undefined") {
        // code...
        $room = 0;
    }else{
        $room = $col['invt_room'];
    }
    $array=[
        'id' => "".$col['id']."",
        'contract_name' => "".$col['contract_name']."",
        'contract_id' => "".$col['token']."",
        'hoteltoken' => "".$col['hoteltoken']."",
        'roomtoken' => "".$col['roomtoken']."",
        'room_desc' => "".$col['room_desc']."",
        'dmctoken' => "".$col['dmctoken']."",
        'hotel_owner' => "".$col['hotel_owner']."",
        'account_owner' => "".$col['account_owner']."",
        'hotelname' => "".$col['hotelname']."",
        'hotel_desc' => "".$col['hotel_desc']."",
        'room_name' => "".$col['room_name']."",
        'price' => "".$col['price']."",
        'availnum' => "".$col['availnum']."",
        'timestamp' => "".$col['timestamp']."",
        'status' => "".$col['status']."", 
        'child_age_From' => "".$col['child_age_from']."", 
        'child_age_To' => "".$col['child_age_to']."",  
        'currency' => "".$col['currency']."", 
        'occupy_min' => "".$col['occupy_min']."", 
        'occupy_max' => "".$col['occupy_max']."", 
        'occupy_min_child' => "".$col['occupy_min_child']."", 
        'occupy_max_child' => "".$col['occupy_max_child']."", 
        'release_date' => "".$col['release_date']."", 
        'breakfast_adult' => "".$col['breakfast_adult']."", 
        'breakfast_child' => "".$col['breakfast_child']."", 
        'hb_adult' => "".$col['half_bar_adult']."", 
        'hb_child' => "".$col['half_bar_child']."", 
        'fb_adult' => "".$col['full_bar_adult']."", 
        'fb_child' => "".$col['full_bar_child']."", 
        'sai_adult' => "".$col['soft_all_incl_adult']."", 
        'sai_child' => "".$col['soft_all_incl_child']."", 
        'all_incl_adult' => "".$col['all_incl_adult']."", 
        'all_incl_child' => "".$col['all_incl_child']."", 
        'uai_adult' => "".$col['ultra_all_incl_adult']."", 
        'uai_child' => "".$col['ultra_all_incl_child']."", 
        'cancel_days' => "".$col['cancel_days']."", 
        'cancel_penalty' => "".$col['cancel_penalty']."", 
        'expiry_date' => $end_date,
        'start_date' => $start_date,
        'meals_start' => "".$col['meals_start']."",
        'meals_end' => "".$col['meals_end']."",
        'cancel_start' => "".$col['cancel_start']."",
        'cancel_end' => "".$col['cancel_end']."",
        'display' => "".$col['display']."",
        'confirm' => "".$col['confirm']."",
        'rooms_only_child' => "".$col['rooms_only_child']."",
        'rooms_only_adult' => "".$col['rooms_only_adult']."", 
       'stay_from' => "".$col['stay_from']."",
        'stay_to' => "".$col['stay_to']."",
        'booking_from' => "".$col['booking_from']."",
        'booking_to' => "".$col['booking_to']."",
        'discount_amount' => "".$col['discount_amount']."",
        'discount_percentage' => "".$col['discount_rate']."",
        'offer' => "".$col['offer']."",
        'subscription' => "".$col['subscription']."",
        'countries' => "".$col['countries']."",
        'rownum' => "$rownum",
        'count' => "$count",
        'room_category' => "".$col['room_category']."",
        'price_sgl' => "".$col['price_sgl']."",
        'price_dbl' => "".$col['price_dbl']."",
        'price_trl' => "".$col['price_trl']."",
        'price_quad' => "".$col['price_qud']."",
        'room' => $room,
        'real_start_date_old' => date("d-m-Y", $col['start_date']),
        'real_expiry_date_old' => date("d-m-Y", $col['exp_date']),
        'real_start_date' => date("d-m-Y", $start_date),
        'real_expiry_date' => date("d-m-Y", $end_date)
    ];
    $array=json_encode($array);
    if ($rownum > $count) {
        echo "$array,";
    }else {
        echo "$array";
    }
                    }
                    echo "]";
                    $mysqli->close();
                    exit();
}else{
            $array = [
            'success' => false,
            'message' => "No data"
        ];
        $return = json_encode($array);
        echo "$return";
        exit();
}
}else{
        $array = [
            'success' => false,
            'message' => "No data.."
        ];
        $return = json_encode($array);
        echo "$return";
        exit();
}


}else{
    $array = [
            'success' => false,
            'message' => "No token found.."
        ];
        $return = json_encode($array);
        echo "$return";
        exit();
}

    }else{
        $array = [
            'success' => false,
            'message' => "Unauthorized access..contact support"
        ];
        $return = json_encode($array);
        echo "$return";
        exit();
    }
}else{
    $array = [
        'success' => false,
        'message' => "Token not set.."
    ];
    $return = json_encode($array);
    echo "$return";
    exit();
}

?>