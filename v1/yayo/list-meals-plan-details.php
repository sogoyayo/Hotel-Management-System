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

		$meals_start = input_check($_REQUEST['meals_start']);
        $meals_end = input_check($_REQUEST['meals_end']);
        $contractToken = input_check($_REQUEST['token']);


        if (($meals_start =='') or ($meals_end =='') or ($contractToken =='')) {
            // code...
            $array = [
                'success' => false,
                'message' => "Empty fields"
            ];
            $return = json_encode($array);
            echo "$return";
            exit();
        }else{

            $meals_end = strtotime($meals_end);
            $meals_start = strtotime($meals_start);
            // to is the expiry date and from is the start date

            if ($meals_end >= $meals_start) {

                $meals_to = $meals_end;
                $meals_from = $meals_start;

                // code...
                $sql = "SELECT * FROM contracts WHERE token='$contractToken' and display=1 and meals_start='$meals_from' and meals_end='$meals_to' ORDER BY id DESC";
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
                                'breakfast_adult' => "".$col['breakfast_adult']."", 
                                'breakfast_child' => "".$col['breakfast_child']."", 
                                'hb_adult' => "".$col['half_bar_adult']."", 
                                'hb_child' => "".$col['half_bar_child']."", 
                                'fb_adult' => "".$col['full_bar_adult']."", 
                                'fb_child' => "".$col['full_bar_child']."", 
                                'sai_adult' => "".$col['soft_all_incl_adult']."", 
                                'sail_child' => "".$col['soft_all_incl_child']."", 
                                'all_incl_adult' => "".$col['all_incl_adult']."", 
                                'all_incl_child' => "".$col['all_incl_child']."", 
                                'uai_adult' => "".$col['ultra_all_incl_adult']."", 
                                'uai_child' => "".$col['ultra_all_incl_child']."", 
                                'meals_end' => "".$col['meals_end']."",
                                'meals_start' => "".$col['meals_start']."",
                                'rooms_only_child' => "".$col['rooms_only_child']."",
                                'rooms_only_adult' => "".$col['rooms_only_adult']."",
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