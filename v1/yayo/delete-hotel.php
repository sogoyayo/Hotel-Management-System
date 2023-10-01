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

if (isset($_REQUEST['apptoken'])) {

	$apptoken = input_check($_REQUEST['apptoken']);

	if (CheckToken($mysqli, $apptoken)==true) {

		$hoteltoken = input_check($_REQUEST['hoteltoken']);

		if (empty($hoteltoken)) {
			// code...
			$array = [
				'success' => false,
				'message' => "Empty field"
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{
			if (deleteHotel($mysqli, $hoteltoken)==true) {
				// code...
				if (deleteHotel_roomtb($mysqli, $hoteltoken)==true) {
					// code...
					if (deleteHotel_contractstb($mysqli, $hoteltoken)==true) {
						// code...
						$array = [
		                    'success' => true,
		                    'message' => "Hotel deleted successfully."
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
				}else{
					$array = [
						'success' => false,
						'message' => "Something went wrong, please try again."
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}
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