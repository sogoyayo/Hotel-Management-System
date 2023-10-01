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

		if (!empty($data->usertoken) and !empty($data->hoteltoken) and !empty($data->hotoken)) {
			// code...
			$db = new db();
			if (addHotelOwnerToHotel($db, $mysqli, $data->hoteltoken, $data->hotoken)==true) {
				// code...
				$array = array(
			'success' => true,
			'message' => "Hotel Owner has been added.."
		);
		echo json_encode($array);
		exit();

			}else{

				$array = array(
			'success' => false,
			'message' => "Could not add hotel owner, please try again.."
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