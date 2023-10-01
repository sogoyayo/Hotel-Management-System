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

$data = file_get_contents('php://input');
$data = json_decode($data);

if (isset($data->apptoken)) {

	$apptoken = input_check($data->apptoken);

	if (CheckToken($mysqli, $apptoken)==true) {

		if (!empty($data->usertoken)) {
			// code...
			if (!empty($data->dmcToken)) {
				// code...
				$dmcToken = input_check($data->dmcToken);
				$data = getDMCsData($db, $dmcToken);
			}else{
				$data = getDMCsData($db, null);
			}

if ($data != false) {
	// code...
	$array = array(
			'success' => true,
			'message' => "DMCs..",
			'data' => $data
		);
		echo json_encode($array);
		exit();
}else{
	$array = array(
			'success' => false,
			'message' => "No DMC found"
		);
		echo json_encode($array);
		exit();
}


		}else{
			$array = array(
			'success' => false,
			'message' => "Unauthorized access..user not authenticated"
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