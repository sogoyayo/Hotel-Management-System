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

		$usertoken = input_check($_REQUEST['usertoken']);

		if (($usertoken=='')) {
			// might use empty function
			// code...
			$array = [
				'success' => false,
				'message' => "Empty fields"
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{
			if (createWallet($mysqli, $usertoken, $timestamp)==true) {
				// code...
				$array = [
                    'success' => true,
                    'message' => "Wallet created successfully."
                ];
                $return= json_encode($array);
                echo "$return";
			}else{
				$array = [
					'success' => false,
					'message' => "Something went wrong, please try again."
				];
				$return = json_encode($array);
				echo "$return";
				exit();
			}
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