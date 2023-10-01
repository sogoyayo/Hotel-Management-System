<?php
header('Content-Type: application/json');

require('../../aaconfig.php');
require('../../data.php');
require('../../functions.php');
require('../../functions2.php');

// include('../../mailer.php');
include('../../sms.php');
include('../../engine.php');

$timestamp = time();

if (isset($_REQUEST['apptoken'])) {

    $apptoken = input_check($_REQUEST['apptoken']);

    if (CheckToken($mysqli, $apptoken)==true) {

        $keyword = input_check($_REQUEST['keyword']);

if (!empty($_POST['to']) and !empty($_POST['from'])) {
    // code...
            $to = strtotime(input_check($_POST['to']));
        $from = strtotime(input_check($_POST['from']));
}else{
            $to = time();
        $from = time();
}

$stmt = "";

        if (!empty($keyword)) {
            // code...
            $array_keyword = explode(" ", $keyword);

            foreach ($array_keyword as $key => $value) {
                // code...
                if (strlen($value) > 0) {
                    // code...
                    $stmt .= "country like '%$value%' or contract_name like '%$value%' or room_category like '%$value%' or hotelname like '%$value%' or ";
                }
                // productname like '%$value%' or productname like '%$value%' or 
            }

            $stmt = substr($stmt, 0, strlen($stmt)-3);

$sql = "SELECT * FROM contracts where ($stmt) and (start_date < '$from' and exp_date > '$to' and display = 1 and roomtoken !='' and room_name !='' and hotelname !='')
UNION
SELECT * FROM contracts where ($stmt) and (start_date = '$from' and exp_date > '$to' and display = 1 and roomtoken !='' and room_name !='' and hotelname !='')
UNION
SELECT * FROM contracts where ($stmt) and (start_date < '$from' and exp_date = '$to' and display = 1 and roomtoken !='' and room_name !='' and hotelname !='')
UNION
SELECT * FROM contracts 
WHERE ($stmt) and (exp_date = '$to' and display = 1 and roomtoken !='' and room_name !='' and hotelname !='')
UNION
SELECT * FROM contracts 
WHERE ($stmt) and (start_date = '$from' and display = 1 and roomtoken !='' and room_name !='' and hotelname !='')
GROUP BY token, hoteltoken  order by price_sgl, price_dbl ASC"; 


            if ($res = $mysqli->query($sql)) {
                if ($res->num_rows > 0) {
                    echo "[";
                   
    $count=0;
    while ($col = $res->fetch_array()) {
        $count= ++$count;
        $rownum= $res->num_rows;
        $contractName = getContractName($mysqli, $col['token']);
        $hotelRoomImage = getHotelRoomImage($mysqli, intval($col['roomtoken']));
        $hotelImage = getHotelImage($mysqli, intval($col['hoteltoken']));
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
            'link1' => "".$col['link1']."",
            'link2' => "".$col['link2']."",
            'link3' => "".$col['link3']."",
            'link4' => "".$col['link4']."",
            'link5' => "".$col['link5']."",
            'stay_from' => "".$col['stay_from']."",
            'stay_to' => "".$col['stay_to']."",
            'booking_from' => "".$col['booking_from']."",
            'booking_to' => "".$col['booking_to']."",
            'discount_amount' => "".$col['discount_amount']."",
            'discount_percentage' => "".$col['discount_rate']."",
            'offer' => "".$col['offer']."",
            'subscription' => "".$col['subscription']."",
            'source_market' => "".$col['source_market']."",
            'room_category' => "".$col['room_category']."",
            'country' => "".$col['country']."",
            'price_sgl' => "".$col['price_sgl']."",
            'price_dbl' => "".$col['price_dbl']."",
            'price_trl' => "".$col['price_trl']."",
            'price_qud' => "".$col['price_qud']."",
            'price_chd1' => "".$col['price_chd1']."",
            'price_chd2' => "".$col['price_chd2']."",
            'city' => "".$col['city']."",
            'room' => "".$col['room']."",
            'invt_room' => "".$col['invt_room']."",
            'invt_rel' => "".$col['invt_rel']."",
            'service' => "".$col['service']."",
            'price_child' => "".$col['price_child']."",
            'price_adult' => "".$col['price_adult']."",
            'sup_stay_to' => "".$col['sup_stay_to']."",
            'sup_stay_from' => "".$col['sup_stay_from']."",
            'sup_type' => "".$col['sup_type']."",
            'twn' => "".$col['twn']."",
            'unit' => "".$col['unit']."",
            'availability_calendar_only' => "".$col['availability_calendar_only']."",
            'hotelRoomImage' => "$hotelRoomImage",
            '$hotelImage' => "$$hotelImage",
            'rownum' => "$rownum",
            'count' => "$count"
        ];
        $array=json_encode($array);
        if ($rownum > $count) {
            echo "$array,";
        }else {
            echo "$array";
        }
    }
    echo "]";
                }else {
                    $array =[
                        'success'=> false,
                        'message'=> "No results for $keyword ".date("d-m-Y", $from)." " .date("d-m-Y", $to). " $from $to"
                    ];
                    $array=json_encode($array);
                    echo "$array";
                    exit;
                }

            }else{
                $array = [
                    'success' => false,
                    'message' => "Failed to fetch data"
                ];
                $return = json_encode($array);
                echo "$return";
                exit();
            }

        }else{
            $array = [
                'success' => false,
                'message' => "Empty field"
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