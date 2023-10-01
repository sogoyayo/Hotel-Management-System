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

$data = file_get_contents('php://input');
$data = json_decode($data);

if (isset($data->apptoken)) {

	$apptoken = input_check($data->apptoken);

	if (CheckToken($mysqli, $apptoken)==true) {

		if (!empty($data->usertoken) and !empty($data->did)) {
			// code...
			$usertoken = input_check($data->usertoken);
			$did = input_check($data->did);
			if (removeDistribution($mysqli, $did)==true) {
				// code...
				$array = array(
			'success' => true,
			'message' => "Distribution removed.."
		);
		echo json_encode($array);
		exit();
			}else{
				$array = array(
			'success' => false,
			'message' => "Could not remove distribution.."
		);
		echo json_encode($array);
		exit();
			}
		}else{
			$array = array(
			'success' => false,
			'message' => "Missing data.."
		);
		echo json_encode($array);
		exit();
		}

	}else{
		$array = array(
			'success' => false,
			'message' => "Unauthorized access..contact support"
		);
		echo json_encode($array);
		exit();
	}
}else{
	$array = array(
		'success' => false,
		'message' => "Token not set.."
	);
	echo json_encode($array);
		exit();
}

?>