<?php
header('Content-Type: application/json');

require('../../aaconfig.php');
require('../../data.php');
require('../../functions.php');
require('../../functions2.php');

// include('../../mailer.php');
include('../../sms.php');
include('../../engine.php');

$timestamp = time();
$data = file_get_contents('php://input');
$data = json_decode($data);

if (isset($data->apptoken)) {

	$apptoken = input_check($data->apptoken);

	if (CheckToken($mysqli, $apptoken)==true) {

		$hoteltoken = input_check($data->hoteltoken);
		$usertoken = input_check($data->usertoken);
		$dmc_email = input_check($data->dmc_email);
		$source = input_check($data->source);
		$hotelcode = input_check($data->hotelCode);

		if (($hoteltoken=='')){
			$array = [
				'success' => false,
				'message' => "Empty fields"
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{
			if (checkHotelDisplay($mysqli, $hoteltoken)==false) {
				// code...
				if (checkAcctOwnerToken($mysqli, $usertoken)==true) {
					// code...
					$dmctoken = getUserToken_mail($mysqli, $dmc_email);
					
					if (addDMC_hotels($mysqli, $usertoken, $dmctoken, $hoteltoken, $source, $hotelcode)==true) {
						// code...
						$array = [
							'success' => true,
							'message' => "DMC added successfully!"
						];
						$return = json_encode($array);
						echo "$return";
						exit();
					}else{
						$array = [
							'success' => false,
							'message' => "Something went wrong. Try again"
						];
						$return = json_encode($array);
						echo "$return";
						exit();
					}
				}else{
					$array = [
						'success' => false,
						'message' => "That user does not exit"
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}
			}else{
				$array = [
					'success' => false,
					'message' => "That hotel does not exist"
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