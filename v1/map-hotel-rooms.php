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

if (isset($_REQUEST['apptoken'])) {

	$apptoken = input_check($_REQUEST['apptoken']);

	if (CheckToken($mysqli, $apptoken)==true) {

		if (!empty($_POST['roomid_external']) and !empty($_POST['roomtoken'])) {
			// code...
			$roomid_external = input_check($_POST['roomid_external']);
			$roomtoken = input_check($_POST['roomtoken']);

		if (mappRoom($mysqli, $roomid_external, $roomtoken)==true) {
			// code...
			$array = [
			'success' => true,
			'message' => "ROom mapped.."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
		}else{
$array = [
			'success' => false,
			'message' => "Room not mapped.."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
		}
		}else{
		$array = [
			'success' => false,
			'message' => "Empty data.."
		];
		$return = json_encode($array);
		echo "$return";
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