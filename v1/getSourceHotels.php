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

if (!empty($data->usertoken) and !empty($data->sourceid) and !empty($data->source)) {
	// code...
	$db = new db();
	$hotels = getSourceHotels($db, $mysqli, $data->usertoken, $data->sourceid, $data->source);

	if ($hotels != false) {
		// code...
		$array = array(
			'success' => true,
			'message' => "Hotels..",
			'Hotels' => $hotels
		);
		echo json_encode($array);
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
			'message' => "Unknown user.."
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