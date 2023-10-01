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

		$hoteltoken = input_check($_REQUEST['hoteltoken']);
		$dmctoken = input_check($_REQUEST['dmctoken']);
		$contractToken = input_check($_REQUEST['token']);


        if (($hoteltoken=='') or ($dmctoken=='') or ($contractToken=='')) {
            // code...
            $array = [
                'success' => false,
                'message' => "Empty fields"
            ];
            $return = json_encode($array);
            echo "$return";
            exit();
        }else{

    $sql = "SELECT * FROM contracts WHERE token='$contractToken' and dmctoken='$dmctoken' and hoteltoken='$hoteltoken' and display=1 and stay_from !='' and stay_to !='' and booking_from !='' and booking_to !='' ORDER BY id DESC";
            if ($res = $mysqli->query($sql)) {
                if ($res->num_rows > 0) {
                    echo "[";
                   
                    $count=0;
                    while ($col = $res->fetch_array()) {
                        $count= ++$count;
                        $rownum= $res->num_rows;
    $array=[
            'id' => "".$col['id']."",
            'business_name' => "".$col['business_name']."",
            'city' => "".$col['city']."",
            'country' => "".$col['country']."",
            'contract_name' => "".$col['contract_name']."",
            'contractToken' => "".$col['token']."",
            'hoteltoken' => "".$col['hoteltoken']."",
            'dmctoken' => "".$col['dmctoken']."",
            'status' => "".$col['status']."", 
            'child_age_From' => "".$col['child_age_from']."", 
            'child_age_To' => "".$col['child_age_to']."", 
            'currency' => "".$col['currency']."", 
            'link1' => "".$col['link1']."", 
            'link2' => "".$col['link2']."", 
            'link3' => "".$col['link3']."", 
            'link4' => "".$col['link4']."", 
            'link5' => "".$col['link5']."", 
            'stay_from' => "".$col['stay_from']."", 
            'stay_to' => "".$col['stay_to']."", 
            'booking_from' => "".$col['booking_from']."", 
            'booking_to' => "".$col['booking_to']."", 
            'discount_amountt' => "".$col['discount_amount']."", 
            'discount_rate' => "".$col['discount_rate']."", 
            'source_market' => "".$col['source_market']."",
            'offer' => "".$col['offer']."",
            'order' => "".$col['offer_order']."",
            'timestamp' => "".$col['timestamp']."",
            'display' => "".$col['display']."",
            'rownum' => "$rownum",
            'count' => "$count",
            'offers_room_type' => $col['offers_room_type'],
            'offer_room' => $col['offer_room'],
            'offer_meals' => $col['offer_meals'],
            'offer_supplement' => $col['offer_supplement']
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
                        'message'=>"No results"
                    ];
                    $array=json_encode($array);
                    echo "$array";
                    exit;
                }
            }   
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