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

		
        $token = input_check($_REQUEST['token']);

		if (!empty($token)) {
			// code...

            $sql = "SELECT * FROM contracts where display=1 GROUP BY start_date, exp_date";
            if ($res = $mysqli->query($sql)) {
                if ($res->num_rows > 0) {
                    echo "[";
                   
                    $count=0;
                    while ($col = $res->fetch_array()) {
                        $count= ++$count;
                        $rownum= $res->num_rows;

                        $start_date = $col['start_date'];
                        $exp_date = $col['exp_date'];
// getfollowup($mysqli, $start_date, $exp_date);
$sql1 = "SELECT * FROM contracts where start_date='$start_date' and exp_date='$exp_date'";
                        $array=[
                            'refToken' => "".$col['token_ref']."",
                            'contract_id' => "".$col['token']."",
                            'hotelid' => "".$col['hoteltoken']."",
                            'room_id' => "".$col['roomtoken']."",
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
                            'child_age_to' => "".$col['child_age_to']."", 
                            'child_age_from' => "".$col['child_age_from']."", 
                            'currency' => "".$col['currency']."", 
                            'occupy_min' => "".$col['occupy_min']."", 
                            'occupy_max' => "".$col['occupy_max']."", 
                            'occupy_min_child' => "".$col['occupy_min_child']."", 
                            'occupy_max_child' => "".$col['occupy_max_child']."", 
                            'release_date' => "".$col['release_date']."", 
                            'breakfast_adult' => "".$col['breakfast_adult']."", 
                            'breakfast_child' => "".$col['breakfast_child']."", 
                            'half_bar_adult' => "".$col['half_bar_adult']."", 
                            'half_bar_child' => "".$col['half_bar_child']."", 
                            'full_bar_adult' => "".$col['full_bar_adult']."", 
                            'full_bar_child' => "".$col['full_bar_child']."", 
                            'soft_all_incl_adult' => "".$col['soft_all_incl_adult']."", 
                            'soft_all_incl_child' => "".$col['soft_all_incl_child']."", 
                            'all_incl_adult' => "".$col['all_incl_adult']."", 
                            'all_incl_child' => "".$col['all_incl_child']."", 
                            'ultra_all_incl_adult' => "".$col['ultra_all_incl_adult']."", 
                            'ultra_all_incl_child' => "".$col['ultra_all_incl_child']."", 
                            'cancel_days' => "".$col['cancel_days']."", 
                            'cancel_penalty' => "".$col['cancel_penalty']."", 
                            'expiry_date' => "".$col['exp_date']."",
                            'start_date' => "".$col['start_date']."",
                            'display' => "".$col['display']."",
                            'rownum' => "$rownum",
                            'count' => "$count",
                            "data" =>   
     "".


            if ($res = $mysqli->query($sql1)) {
                if ($res->num_rows > 0) {
          
    while ($col = $res->fetch_array()) { 
       
//        $array = [
// "start" => "$start_date",
// "end" => "$exp_date",
// "ItemQuantity" => "1"
// ];
// $array = json_encode($array);

$_SESSION['start'] = $col['start_date'];
$_SESSION['end'] = $col['exp_date'];
echo "string";
// echo $array;
}
}
}

     .""

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