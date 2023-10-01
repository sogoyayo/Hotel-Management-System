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

if (!empty($_POST['token']) or !empty($_POST['start_date']) or !empty($_POST['end_date']) or !empty($_POST['roomtoken'])) {
    // code...

$token = input_check($_POST['token']);
$timestring = input_check($_POST['timestamp']);
$roomtoken = input_check($_POST['roomtoken']);
$start_date = strtotime(input_check($_POST['start_date']));
$end_date = strtotime(input_check($_POST['end_date']));
// $roomtoken = input_check($_POST['roomtoken']);

$timestamp = strtotime($timestring);
$btime = intval($timestamp) - intval($twentyfourhours); 
$atime = intval($timestamp) + intval($twentyfourhours);

 // $sql = "SELECT * FROM contracts WHERE token='$token' and start_date > $btime and exp_date < $atime and room_category != '0' and price_sgl !='undefined' and display = 1 and roomtoken='$roomtoken' ORDER BY id DESC LIMIT 1";

// $sql = "SELECT * FROM contracts WHERE token='$token' and ((start_date < '$timestamp' and exp_date >' $timestamp') or (start_date =' $timestamp' and exp_date = '$timestamp') or (start_date = '$timestamp' or exp_date = '$timestamp')) and room_category != '0' and price_sgl !='undefined' and display = 1 and roomtoken = '$roomtoken' ORDER BY id DESC LIMIT 1";


// $sql = "SELECT * FROM contracts WHERE token='$token' and ((start_date = '$timestamp' and exp_date = '$timestamp') or (start_date < '$btime' and exp_date > '$atime')) and room_category != '0' and display = 1 and roomtoken='$roomtoken' ORDER BY id DESC LIMIT 1";

// $sql = "SELECT * FROM contracts WHERE token='$token' and ((start_date = '$start_date' and exp_date = '$end_date') or (start_date < '$timestamp' and exp_date > '$timestamp') or (start_date = '$timestamp' and exp_date = '$timestamp')) and room_category != '0' and display = 1 and roomtoken='$roomtoken' ORDER BY id DESC LIMIT 1";


// $sql = "SELECT * FROM contracts WHERE token='$token' and ((start_date < '$timestamp' and exp_date > '$timestamp') or (start_date = '$timestamp' and exp_date = '$timestamp')) and room_category != '0' and display = 1 and roomtoken='$roomtoken' ORDER BY id DESC LIMIT 1";


$sql = "SELECT * FROM contracts 
WHERE token='$token' and room_category != '0' and display = 1 and roomtoken='$roomtoken' and start_date = '$timestamp'
UNION ALL
SELECT * FROM contracts 
WHERE token='$token' and room_category != '0' and display = 1 and roomtoken='$roomtoken' and start_date < '$timestamp' and exp_date > '$timestamp'
UNION ALL
SELECT * FROM contracts 
WHERE token='$token' and room_category != '0' and display = 1 and roomtoken='$roomtoken' and exp_date = '$timestamp'
";


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
        'id' => $col['id'],
        'contract_name' => $col['contract_name'],
        'contract_id' => $col['token'],
        'hoteltoken' => $col['hoteltoken'],
        'roomtoken' => $col['roomtoken'],
        'room_desc' => $col['room_desc'],
        'dmctoken' => $col['dmctoken'],
        'hotel_owner' => $col['hotel_owner'],
        'account_owner' => $col['account_owner'],
        'hotelname' => $col['hotelname'],
        'hotel_desc' => $col['hotel_desc'],
        'room_name' => $col['room_name'],
        'price' => $col['price'],
        'availnum' => $col['availnum'],
        'timestamp' => $col['timestamp'],
        'status' => $col['status'], 
        'child_age_From' => $col['child_age_from'], 
        'child_age_To' => $col['child_age_to'],  
        'currency' => $col['currency'],
        'occupy_min' => $col['occupy_min'], 
        'occupy_max' => $col['occupy_max'], 
        'occupy_min_child' => $col['occupy_min_child'], 
        'occupy_max_child' => $col['occupy_max_child'], 
        'release_date' => $col['release_date'],
        'breakfast_adult' => $col['breakfast_adult'],
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
        'expiry_date' => "".$col['exp_date']."",
        'start_date' => "".$col['start_date']."",
        'meals_start' => "".$col['meals_start']."",
        'meals_end' => "".$col['meals_end']."",
        'cancel_start' => "".$col['cancel_start']."",
        'cancel_end' => "".$col['cancel_end']."",
        'display' => "".$col['display']."",
        'confirm' => "".$col['confirm']."",
        'rooms_only_child' => "".$col['rooms_only_child']."",
        'rooms_only_adult' => "".$col['rooms_only_adult']."", 
        'geo_offer' => $col['offer'],
        // 'last_minute' => "".$col['last_minute']."",
        // 'stay_pay' => "".$col['stay_pay']."",
        // 'non_refundable' => "".$col['non_refundable']."",
        // 'early_bird' => "".$col['early_bird']."",
        'stay_from' => "".$col['stay_from']."",
        'stay_to' => "".$col['stay_to']."",
        'booking_from' => "".$col['booking_from']."",
        'booking_to' => "".$col['booking_to']."",
        'discount_amount' => "".$col['discount_amount']."",
        'discount_percentage' => "".$col['discount_rate']."",
        'offer' => "".$col['offer']."",
        'subscription' => $col['subscription'],
        'countries' => $col['country'],
        'country' => $col['country'],
        'rownum' => $rownum,
        'count' => $count,
        'room_category' => $col['room_category'],
        'price_sgl' => $col['price_sgl'],
        'price_dbl' => $col['price_dbl'],
        'price_trl' => $col['price_trl'],
        'price_quad' => $col['price_qud'],
        'room' => $room,
        'unit' => $col['unit'],
        'twn' => $col['twn'],
    'real_start_date' => date("d-m-Y", $col['start_date']),
'real_end_date' => date("d-m-Y", $col['exp_date']),
'real_timestamp' => date("d-m-Y", $timestamp),
'inv_rel' => $col['invt_rel']
    ];
    $array=json_encode($array);
    // echo $array;
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
            'message' => "No data, $timestamp (".date("d-m-Y", $timestamp).")"
        ];
        $return = json_encode($array);
        echo "$return";
        exit();
}
}else{
        $array = [
            'success' => false,
            'message' => "No data.. $timestamp (".date("d-m-Y", $timestamp).") - btme - $btime (".date("d-m-Y", $btime)."), atime - $atime (".date("d-m-Y", $atime)."), - $twentyfourhours (".date("d-m-Y", $twentyfourhours).")"
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