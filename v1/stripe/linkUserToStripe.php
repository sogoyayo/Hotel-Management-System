<?php
header('Content-Type: application/json');

require('../../aaconfig.php');
require('../../data.php');
require('../../functions.php');
require('../../functions2.php');

// include('../mailer.php');
include('../../sms.php');
include('../../engine.php');

require_once('../stripe_php/init.php');

$timestamp = time();

$data = file_get_contents('php://input');
$data = json_decode($data);

if (isset($data->apptoken)) {

	$apptoken = input_check($data->apptoken);

	if (CheckToken($mysqli, $apptoken)==true) {

		if (!empty($data->usertoken)) {
			// code...
			$db = new db();
			$stripe = new \Stripe\StripeClient(
  'sk_test_51Lv3gTFTpufO3rQ4twBg7nboEt2euNM2la01RnZcvqv0WLpQhEwMzTzM3tyeVbprLtPVwIqPR1qRwr03De2ACpO500P9Nea69n'
);
			$stripeOnboard = stripeOnboardUser($db, $data->usertoken, $stripe);

		if($stripeOnboard != false){
			$stripeAccountLinks = stripeAccountLinks($db, $mysqli, $data->usertoken, $stripeOnboard->id, $stripe);

			if ($stripeAccountLinks != false) {
				// code...

				$array = array(
			'success' => true,
			'message' => "Your account link has been submitted and awaiting confirmation, click below to finish this process.",
			'stripeOnboard' => $stripeOnboard,
			'stripeAccountLinks' => $stripeAccountLinks
		);
		echo json_encode($array);
		exit();

			}else{

			}
			
			}else{
			$array = array(
			'success' => false,
			'message' => "Unknown access, please login and try again. - ".$_SESSION['err'].""
		);
		echo json_encode($array);
		unset($_SESSION['err']);
		exit();
			}

		}else{
			$array = array(
			'success' => false,
			'message' => "Unknown access, please logina and try again."
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