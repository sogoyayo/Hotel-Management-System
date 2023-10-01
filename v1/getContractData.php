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

		if (!empty($data->contract_token)) {
			// code...
			$db = new db();
			$contractData = getContractData($db, $data->contract_token);

			if ($contractData != false) {

		$array = array(
			'success' => true,
			'message' => "Contract Data",
			'data' => $contractData
		);
		echo json_encode($array);
		exit();

			}else{
				$array = array(
			'success' => false,
			'message' => "Contract not found.."
		);
		echo json_encode($array);
		exit();
			}
		}else{
		$array = array(
			'success' => false,
			'message' => "Select a contract"
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