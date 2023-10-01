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

		$from = input_check($_REQUEST['stay_from']);
		$to = input_check($_REQUEST['stay_to']);
		$contractToken = input_check($_REQUEST['token']);


        if (($from =='') or ($to =='') or ($contractToken =='')) {
            // code...
            
            $array = [
                'success' => false,
                'message' => "Empty fields"
            ];
            $return = json_encode($array);
            echo "$return";
            exit();
        }else{

            $to = strtotime($to);
            $from = strtotime($from);

            if ($to >= $from) {

                $stay_to = $to;
                $stay_from = $from;

                $sql = "SELECT * FROM contracts WHERE token='$contractToken' and display=1 and sup_stay_from='$stay_from' and sup_stay_to='$stay_to' ORDER BY id DESC";
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