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

if (!empty($data->hoteltoken)) {
	// code...
		if (!empty($data->hotelname) and !empty($data->country) and !empty($data->city) and !empty($data->longitude) and !empty($data->latitude)) {
		// code...
		if (editHotel($mysqli, $data->hoteltoken, addslashes($data->hotelname), $data->country, $data->city, $data->longitude, $data->latitude)==true) {
			// code...
			$array = array(
			'success' => true,
			'message' => "Hotel has been updated.."
		);
		echo json_encode($array);
		exit();
		}else{
			$array = array(
			'success' => false,
			'message' => "Could not update hotel records.."
		);
		echo json_encode($array);
		exit();
		}
	}else{
		$array = array(
			'success' => false,
			'message' => "EMpty fields.."
		);
		echo json_encode($array);
		exit();
	}
}else{
	$array = array(
			'success' => false,
			'message' => "Select a hotel first.."
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