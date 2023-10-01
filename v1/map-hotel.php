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

		if (!empty($_POST['name']) and !empty($_POST['hotelcode']) and !empty($_POST['source']) and !empty($_POST['dmctoken']) and !empty($_POST['sourceid'])) {
			// code...
		// $hoteltoken = input_check($_POST['hoteltoken']);
		$name = input_check($_POST['name']);
		$hotelcode = input_check($_POST['hotelcode']);
		$source = input_check($_POST['source']);
		$dmctoken = input_check($_POST['dmctoken']);
		$usertoken = input_check($_POST['usertoken']);
		$sourceid = input_check($_POST['sourceid']);
$db = new db();
if(hotelExistSource($db,$mysqli, $sourceid, $hotelcode)==false){
if (hotelMapped($mysqli, $name, $hotelcode, $source, $sourceid, $dmctoken, $usertoken)==true) {
	// code...
	$array = [
			'success' => true,
			'message' => "Hotel successfuly mapped.."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
}else{
	$array = [
			'success' => false,
			'message' => "Hotel not mapped.."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
}
}else{
	$array = array(
			'success' => false,
			'message' => "Hotel already exist in this source.."
		);
		$return = json_encode($array);
		echo "$return";
		exit();
}


		}else{
			$array = [
			'success' => false,
			'message' => "Empty field. Make sure source ID is present."
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