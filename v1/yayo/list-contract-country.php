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

if (!empty($_POST['country'])) {
$country = input_check($_POST['country']);
			// code...
if ($country == "All Countries") {
    // code...
    $sql = "SELECT * FROM contracts WHERE display=1";
}else{
    $sql = "SELECT * FROM contracts WHERE country='$country' and display=1";
}
            if ($res = $mysqli->query($sql)) {
                if ($res->num_rows > 0) {
                    echo "[";
                   
                    $count=0;
                    while ($col = $res->fetch_array()) {
                        $count= ++$count;
                        $rownum= $res->num_rows;

                        $start_date = getContractStartDate($mysqli, $col['token']);
                        // $start_date = "12";
                        $end_date = getContractEndDate($mysqli, $col['token']);

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
                            'expiry_date_r' => "".$col['exp_date']."",
                            'start_date_r' => "".$col['start_date']."",
                            'start_date' => $start_date,
                            'expiry_date' => $end_date,
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
                            'rownum' => "$rownum",
                            'count' => "$count",
                            'city' => $col['city'],
                            'country' => $col['country'],
                            'availability_calender_only' => $col['availability_calender_only']
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
                        'message'=>"No results for $country"
                    ];
                    $array=json_encode($array);
                    echo "$array";
                    exit;
                }
            }
		}else{
			
			$array = [
				'success' => false,
				'message' => "Empty fields"
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