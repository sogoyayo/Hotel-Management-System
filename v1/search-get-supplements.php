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

		if (!empty($_POST['contract_token']) and !empty($_POST['to']) and !empty($_POST['from']) and !empty($_POST['roomtoken'])) {
			// code...

// $sql = "SELECT * FROM contracts where contract_token='$contract_token' "; 

$contract_token = input_check($_POST['contract_token']);
$to = strtotime(input_check($_POST['to']));
$from = strtotime(input_check($_POST['from']));
$roomtoken = input_check($_POST['roomtoken']);

$sql = "SELECT * FROM contracts where token = '$contract_token' and sup_stay_from < '$from' and sup_stay_to > '$to' and roomtoken = '$roomtoken' and service !='' and service != '0'
UNION ALL
SELECT * FROM contracts 
WHERE token = '$contract_token' and sup_stay_to = '$to' and roomtoken = '$roomtoken' and service !='' and service != '0'
UNION ALL
SELECT * FROM contracts 
WHERE token = '$contract_token' and sup_stay_from = '$from' and roomtoken = '$roomtoken' and service !='' and service != '0' order by rand() LIMIT 1"; 


   if ($res = $mysqli->query($sql)) {
         if ($res->num_rows > 0) {
            echo "[";
        $count=0;
        while ($col = $res->fetch_array()) {
            $count= ++$count;
            $rownum= $res->num_rows;
        $array=[
            'id' => "".$col['id']."",
            'token' => "".$col['token']."",
            'service' => "".$col['service']."",
            'sup_type' => "".$col['sup_type']."",
            'supp_child' => $col['supp_child'],
            'supp_perc' => $col['supp_perc'],
            'supp_room_type' => $col['supp_room_type'],
            'supp_child_age_to' => $col['supp_child_age_to'],
            'supp_child_age_from' => $col['supp_child_age_from'],
            'price_adult' => $col['price_adult'],
            'adult_amount' => $col['adult_amount'],
            'child_amount' => $col['child_amount'],
            'price_child' => $col['price_child'],
             'child_perc' => $col['child_perc'],
        'adult_perc' => $col['adult_perc'],
        'subscription' => "".$col['subscription'].""
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
			'message' => "Incomplete data.."
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