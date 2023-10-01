<?php
header('Content-Type: application/json');

require('../../aaconfig.php');
require('../../data.php');
require('../../functions.php');
require('../../functions2.php');

// include('../mailer.php');
include('../../sms.php');
include('../../engine.php');

$timestamp = time();

$data = file_get_contents('php://input');
$data = json_decode($data);

if (isset($data->apptoken)) {

	$apptoken = input_check($data->apptoken);

	if (CheckToken($mysqli, $apptoken)==true) {

		if(!empty($data->usertoken)){
				if (!empty($data->accountOwnerToken)) {
					// code...
					$accountOwnerToken = input_check($data->accountOwnerToken);
					$data = getAccountOwnerData($db, $accountOwnerToken);
				}else{
					$data = getAccountOwnerData($db, null);
				}

			if ($data != false) {
				// code...
				$array = array(
			'success' => true,
			'message' => "data",
			'data' => $data
		);
		echo json_encode($array);
		exit();
			}else{
		$array = array(
			'success' => false,
			'message' => "No result."
		);
		echo json_encode($array);
		exit();
			}

		}else{
			$array = array(
			'success' => false,
			'message' => "User not authenticated"
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