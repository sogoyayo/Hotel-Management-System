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

		$contractToken = input_check($_REQUEST['contract_id']);

		if (empty($contractToken)) {
			// might use empty functions
			// code...
			$array = [
				'success' => false,
				'message' => "Empty field"
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{
			if (deleteContract($mysqli, $contractToken)==true) {
				// code...
				$array = [
                    'success' => true,
                    'message' => "Contract deleted."
                ];
                $return= json_encode($array);
                echo "$return";
			}else{
				$array = [
					'success' => false,
					'message' => "Something went wrong, please try again."
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