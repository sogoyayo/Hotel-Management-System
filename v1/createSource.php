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
// var_dump($data);
// exit();

if (isset($data->apptoken)) {

	$apptoken = input_check($data->apptoken);

	if (CheckToken($mysqli, $apptoken)==true) {

		if (!empty($data->usertoken) and !empty($data->source) and !empty($data->aotoken)) {
			// code...
			$db = new db();

			if (createSource($db, $mysqli, $data->usertoken, $data->source, $data->aotoken)==true) {
				// code...
	$array = array(
			'success' => true,
			'message' => "Source created.."
		);
		echo json_encode($array);
		exit();
			}else{
		$array = array(
			'success' => false,
			'message' => "Source not created, please try again.."
	);
	echo json_encode($array);
	exit();
			}



		}else{
		$array = array(
			'success' => false,
			'message' => "EMpty data, make sure you select an account owner.."
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