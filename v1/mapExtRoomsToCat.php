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

		if (!empty($data->category) and !empty($data->contract_token) and !empty($data->hoteltoken)) {
			// code...
			// !empty($data->roomid) and 
			$db = new db();
			if (mappedExtRoom($db, $mysqli, $data->roomid, $data->category, $data->contract_token, $data->hoteltoken)==true) {
				// code...
				$array = array(
			'success' => true,
			'message' => "ROom has been mapped.."
		);
		echo json_encode($array);
		exit();
			}else{
$array = array(
			'success' => false,
			'message' => $_SESSION['err'],
			'err' => $_SESSION['err']
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