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

		if (!empty($data->hoteltoken)) {
			// code...
			$db = new db();
$categories = getHotelRoomCategories($db, $data->hoteltoken);

if ($categories != false) {
	// code...
	$array = array(
			'success' => true,
			'message' => "categories",
			'data' => $categories
		);
		echo json_encode($array);
		exit();
}else{
	$array = array(
			'success' => false,
			'message' => "Could not get categories for this hotel.."
		);
		echo json_encode($array);
		exit();
}

		}else{
			$array = array(
			'success' => false,
			'message' => "Select hotel first"
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