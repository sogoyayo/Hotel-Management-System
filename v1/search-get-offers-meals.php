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

		if (!empty($_POST['contract_token']) and !empty($_POST['to']) or !empty($_POST['from'])) {
			// code...

// $sql = "SELECT * FROM contracts where contract_token='$contract_token' ";

$to = strtotime(input_check($_POST['to']));
$from = strtotime(input_check($_POST['from'])); 

$sql = "SELECT * FROM contracts where stay_from < '$from' and stay_to > '$to' and display = 1 and discount_rate !='' and discount_amount !='' and offer_meals = '1'
UNION
SELECT * FROM contracts 
WHERE stay_to = '$to' and display = 1 and discount_rate !='' and discount_amount !='' and offer_meals = '1'
UNION
SELECT * FROM contracts 
WHERE stay_from = '$from' and display = 1 and discount_rate !='' and discount_amount !='' and offer_meals = '1' order by rand() LIMIT 1"; 


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
            'discount_rate' => "".$col['discount_rate']."",
            'discount_amount' => "".$col['discount_amount']."",
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
            }else{
            	$array =[
                        'success'=> false,
                        'message'=>"Something went wrong, please try again.."
                    ];
                    $array=json_encode($array);
                    echo "$array";
                    exit;
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