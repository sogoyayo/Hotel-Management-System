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

		$stay_from = input_check($_REQUEST['stay_from']);
        $stay_to = input_check($_REQUEST['stay_to']);
        $booking_from = input_check($_REQUEST['booking_from']);
        $booking_to = input_check($_REQUEST['booking_to']);
        $contractToken = input_check($_REQUEST['token']);


        if (($stay_from =='') or ($stay_to =='') or ($booking_from =='') or ($booking_to =='') or ($contractToken =='')) {
            // code...
            $array = [
                'success' => false,
                'message' => "Empty fields"
            ];
            $return = json_encode($array);
            echo "$return";
            exit();
        }else{

            $stay_from = strtotime($stay_from);
            $stay_to = strtotime($stay_to);

            $booking_from = strtotime($booking_from);
            $booking_to = strtotime($booking_to);

            // to is the expiry date and from is the start date

            if (($stay_to >= $stay_from) and ($booking_to >= $booking_from)) {

                $stay_start = $stay_from;
                $stay_end = $stay_to;

                $booking_start = $booking_from;
                $booking_end = $booking_to;

                // code...

                $sql = "SELECT * FROM contracts WHERE token='$contractToken' and stay_from='$stay_start' and stay_to='$stay_end' and booking_from='$booking_start' and booking_to='$booking_end' and display=1 ORDER BY id DESC";
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
                            'message'=>"No results"
                        ];
                        $array=json_encode($array);
                        echo "$array";
                        exit;
                    }
                }
            }else{
                $array = [
                    'success' => false,
                    'message' => "Your start date cannot be greater than end date."
                ];
                $return = json_encode($array);
                echo "$return";
                exit();
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