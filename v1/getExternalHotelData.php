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

		if (!empty($data->hotelcode) and !empty($data->source)) {
			// code...
			if ($data->source == "ezee") {
				// code...
				$hotelData = getEzeeHotelData($data->hotelcode);
			}else{
				$hotelData = array();
			}
if ($hotelData != false) {
	// code...
	$array = array(
			'success' => true,
			'message' => "Hotel data..",
			'data' => $hotelData
		);
		echo json_encode($array);
		exit();
}else{
	$array = array(
			'success' => false,
			'message' => "Hotel data not found.."
		);
		echo json_encode($array);
		exit();
}
		}else{
			$array = array(
			'success' => false,
			'message' => "Please select a hotel first.."
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