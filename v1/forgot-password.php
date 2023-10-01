<?
header('Content-Type: application/json');

require('../aaconfig.php');
require('../data.php');
require('../functions.php');
require('../functions2.php');

// include('../mailer.php');
include('../sms.php');
// include('../engine.php');

$timestamp = time();

if (isset($_REQUEST['apptoken'])) {

$apptoken = input_check($_REQUEST['apptoken']);

if (CheckToken($mysqli, $apptoken)==true) {
	if (!empty($_POST['mail'])) {
		// code...
		$mail = input_check($_POST['mail']);

		if (CheckMailExist($mysqli, $mail)==true) {
			// code...
		if (resetpword($mysqli, $mail, $timestamp)==true) {
			// code...
			$array = [
			'success' => true,
			'message' => "Password updated and an email has been sent to your $mail inbox"
		];
		$return = json_encode($array);
		echo "$return";
		exit();
		}else{
			$array = [
			'success' => false,
			'message' => "Something went wrong, please try again"
		];
		$return = json_encode($array);
		echo "$return";
		exit();
		}
	}else{
		$array = [
			'success' => false,
			'message' => "$mail does not exist in our records"
		];
		$return = json_encode($array);
		echo "$return";
		exit();
	}
	}else{
		$array = [
			'success' => false,
			'message' => "We need to know your valid email address"
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
}

 ?>