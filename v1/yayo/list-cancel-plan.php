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

            $sql = "SELECT * FROM contracts WHERE token='$contractToken' and dmctoken='$dmctoken' and hoteltoken='$hoteltoken' and display=1 and cancel_start!='' and cancel_end!='' ORDER BY id DESC";
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
                                'timestamp' => "".$col['timestamp']."",
                                'status' => "".$col['status']."", 
                                'child_age_From' => "".$col['child_age_from']."", 
                                'child_age_To' => "".$col['child_age_to']."", 
                                'currency' => "".$col['currency']."", 
                                'cancel_days' => "".$col['cancel_days']."", 
                                'cancel_penalty' => "".$col['cancel_penalty']."", 
                                'cancel_start' => "".$col['cancel_start']."",
                                'cancel_end' => "".$col['cancel_end']."",
                                'cancel_type' => "".$col['cancel_type']."",
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