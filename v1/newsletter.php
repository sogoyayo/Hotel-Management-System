<?php
header('Content-Type: application/json');

require('../aaconfig.php');
require('../data.php');
require('../functions.php');
require('../functions2.php');

$timestamp = time();

if (isset($_REQUEST['apptoken'])) {

	$apptoken = input_check($_REQUEST['apptoken']);

	if (CheckToken($mysqli, $apptoken)==true) {


		if (!empty($_POST['mail']) and !empty($_POST['name'])) {
			// code...
$name  = input_check($_POST['name']);
$mail = input_check($_POST['mail']);

if (SubscribeNewsletter($mysqli, $name, $mail)==true) {
	// code...
	$array = [
			'success' => true,
			'message' => "You have been subscribed to our newsletter."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
}else{
	$array = [
			'success' => false,
			'message' => "Something went wrong..please try again."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
}

		}else{
			$array = [
			'success' => false,
			'message' => "You need to fill your full name and email"
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