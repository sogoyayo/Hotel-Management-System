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

$to = strtotime(input_check($_POST['to']));
$from = strtotime(input_check($_POST['from']));

// $sql = "SELECT * FROM contracts where contract_token='$contract_token' "; 

$sql = "SELECT * FROM contracts where meals_start < '$from' and meals_end > '$to' and display = 1
UNION ALL
SELECT * FROM contracts 
WHERE meals_end = '$to' and display = 1
UNION ALL
SELECT * FROM contracts 
WHERE meals_start = '$from' and display = 1 order by rand() LIMIT 1"; 


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
        'rooms_only_child' => "".$col['rooms_only_child']."",
        'rooms_only_adult' => "".$col['rooms_only_adult']."",
        'breakfast_adult' => "".$col['breakfast_adult']."",
        'breakfast_child' => $col['breakfast_child'],
        'hb_adult' => $col['half_bar_adult'],
        'hb_child' => $col['half_bar_child'],
        'fb_adult' => $col['full_bar_adult'],
        'fb_child' => $col['full_bar_child'],
        'soft_all_incl_adult' => $col['soft_all_incl_adult'],
        'soft_all_incl_child' => $col['soft_all_incl_child'],
        'all_incl_adult' => $col['all_incl_adult'],
        'all_incl_child' => $col['all_incl_child'],
        'ultra_all_incl_adult' => $col['ultra_all_incl_adult'],
        'ultra_all_incl_child' => $col['ultra_all_incl_child'],
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