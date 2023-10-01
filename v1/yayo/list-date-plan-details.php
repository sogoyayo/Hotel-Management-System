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

		$from = input_check($_REQUEST['start_date']);
		$to = input_check($_REQUEST['exp_date']);
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

                $exp_date = $to;
                $start_date = $from;

                $sql = "SELECT * FROM contracts WHERE token='$contractToken' and display=1 and start_date='$start_date' and exp_date='$exp_date' GROUP BY roomtoken ORDER BY start_date DESC";
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
                                'roomtoken' => "".$col['roomtoken']."",
                                'room_desc' => "".$col['room_desc']."",
                                'dmctoken' => "".$col['dmctoken']."",
                                'hotel_owner' => "".$col['hotel_owner']."",
                                'account_owner' => "".$col['account_owner']."",
                                'hotelname' => "".$col['hotelname']."",
                                'hotel_desc' => "".$col['hotel_desc']."",
                                'room_name' => "".$col['room_name']."",
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
                                'expiry_date' => "".$col['exp_date']."",
                                'start_date' => "".$col['start_date']."",
                                'display' => "".$col['display']."",
                                'room' => "".$col['room']."",
                                'price_sgl' => "".$col['price_sgl']."",
                                'price_dbl' => "".$col['price_dbl']."",
                                'price_trl' => "".$col['price_trl']."",
                                'price_qud' => "".$col['price_qud']."",
                                'price_chd1' => "".$col['price_chd1']."",
                                'price_chd2' => "".$col['price_chd2']."",
                                'inventory_room' => "".$col['invt_room']."",
                                'inventory_rel' => "".$col['invt_rel']."",
                                'room_category' => "".$col['room_category']."",
                                'twn' => "".$col['twn']."",
                                'unit' => "".$col['unit']."",
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