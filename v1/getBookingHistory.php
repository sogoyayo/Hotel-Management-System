<?php
header('Content-Type: application/json');

require('../aaconfig.php');
require('../data.php');
require('../functions.php');
require('../functions2.php');

// include('../mailer.php');
include('../sms.php');
// include('../engine.php');

$timestamp = time();

$data = file_get_contents('php://input');
$data = json_decode($data);

if (isset($data->apptoken)) {

	$apptoken = input_check($data->apptoken);

	if (CheckToken($mysqli, $apptoken)==true) {

if (!empty($data->usertoken)) {
	// code...
		$bookingHistory = getBookingHistory($db, $data->usertoken);

		if ($bookingHistory == false) {
			// code...
		}else{
			$array = array(
		'success' => true,
		'history' => $bookingHistory,
		'time_today' => date("d-m-Y", time())
			);
			echo json_encode($array);
		}

}else{
	$array = array(
			'success' => false,
			'message' => "Unauthorized access..contact support"
		);
		$return = json_encode($array);
		echo $return;
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