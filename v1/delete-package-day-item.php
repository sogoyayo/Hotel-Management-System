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

if (!empty($_POST['id'])) {
	// code...
	$id = input_check($_POST['id']);

if (deletePackageItem($mysqli, $id)==true) {
	// code...
	$array = [
			'success' => true,
			'message' => "Package deleted."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
}else{
	$array = [
			'success' => false,
			'message' => "Package not deleted."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
}

}else{
	$array = [
			'success' => false,
			'message' => "Select a package Item."
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