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
	if (!empty($_POST['mail'])) {
		// code...
	$oldpword=input_check(md5($_POST['oldpword']));
	$pword=input_check(md5($_POST['pword']));
	$usertoken=input_check($_POST['usertoken']);

	if (checkoldpword($mysqli, $usertoken, $mail)==true) {
			// code...
	if (updatepword($mysqli, $usertoken, $timestamp)==true) {
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