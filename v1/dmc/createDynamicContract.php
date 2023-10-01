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

		if (!empty($data->hoteltoken) and !empty($data->hotelcode) and !empty($data->dmctoken) and !empty($data->channel)) {
			// code...
			$db = new db();
			$userData = getUserData($db, $data->dmctoken);
			$hotelData = getHotelData($db, $mysqli, $data->hoteltoken);
$timestamp = time();
	if(initiateDynamicContract($mysqli, $data->hoteltoken, $data->hotelcode, $data->dmctoken, $hotelData->hotelname, $userData->country, $userData->city, $timestamp, $data->channel)==true){
$array = array(
			'success' => true,
			'message' => "Dynamic contract has been initiated..",
			'contractToken' => $_SESSION['contractToken'],
			'hotelname' => $hotelData['hotelname'],
			'country' => $userData['country'],
			'city' => $userData['city'],
			'type' => "dynamic"
		);
		echo json_encode($array);
		unset($_SESSION);
		exit();
	}else{
$array = array(
			'success' => false,
			'message' => "Could not create dynamic contact, please try again.."
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