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

// check if an owner is indicated
if (isset($_POST['ownertoken'])) {
	// code...

}

// if no owner is indicated
else{

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