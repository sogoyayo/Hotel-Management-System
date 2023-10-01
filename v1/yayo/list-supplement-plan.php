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

            $sql = "SELECT * FROM contracts WHERE token='$contractToken' and dmctoken='$dmctoken' and hoteltoken='$hoteltoken' and display=1 and sup_stay_from !='' and sup_stay_to !='' ORDER BY id DESC";
            
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
        'hotel_owner' => "".$col['hotel_owner']."",
        'account_owner' => "".$col['account_owner']."",
        'hotelname' => "".$col['hotelname']."",
        'timestamp' => "".$col['timestamp']."",
        'status' => "".$col['status']."", 
        'child_age_From' => "".$col['child_age_from']."", 
        'child_age_To' => "".$col['child_age_to']."", 
        'currency' => "".$col['currency']."",
        'subscription' => "".$col['subscription']."",
        'service' => "".$col['service']."",
        'stay_from' => "".$col['sup_stay_from']."",
        'stay_to' => "".$col['sup_stay_to']."", 
        'price_child' => "".$col['price_child']."", 
        'price_adult' => "".$col['price_adult']."",
        'sup_type' => "".$col['sup_type']."",
        'display' => "".$col['display']."",
        'rownum' => "$rownum",
        'count' => "$count",
        'supp_child_age_from' => $col['supp_child_age_from'],
        'supp_child_age_to' => $col['supp_child_age_to'],
        'supp_room_type' => $col['supp_room_type'],
        'child_perc' => $col['child_perc'],
        'adult_perc' => $col['adult_perc'],
        'adult_amount' => $col['adult_amount'],
        'child_amount' => $col['child_amount']
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