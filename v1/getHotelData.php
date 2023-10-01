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
		$hotel = getHotelData($db, $mysqli, $data->hoteltoken);

			if ($hotel != false) {
				// code...
				$array = array(
			'success' => true,
			'message' => "Hotel Data",
			'data' => $hotel
		);
		echo json_encode($array);
		$db = null;
		exit();
			}else{
				$array = array(
			'success' => false,
			'message' => $_SESSION['err']
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