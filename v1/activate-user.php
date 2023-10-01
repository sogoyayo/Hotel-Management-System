<?
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
	if (!empty($_POST['code'])) {
		// code...
		$code = $_POST['code'];
		if (ActivateUser($mysqli, $code)) {
			// code...
			$array = [
			'success' => true,
			'message' => "Acount activated, you can login now"
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
			'message' => "We need to know your activation code"
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