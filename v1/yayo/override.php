<?php
header('Content-Type: application/json');

require('../../aaconfig.php');
require('../../data.php');
require('../../functions.php');
require('../../functions2.php');

// include('../../mailer.php');
include('../../sms.php');
include('../../engine.php');


if (isset($_REQUEST['apptoken'])) {

	$apptoken = input_check($_REQUEST['apptoken']);

	if (CheckToken($mysqli, $apptoken)==true) {

		
		// $token = input_check($_REQUEST['token']);
		$type = strtoupper(input_check($_REQUEST['type']));
		$start_duration = strtotime(input_check($_REQUEST['start_duration']));
		$end_duration = strtotime(input_check($_REQUEST['end_duration']));
		$nature = strtoupper(input_check($_REQUEST['nature']));
		$recipient = input_check($_REQUEST['recipient']);
		$override1 = input_check($_REQUEST['override1']);
		$override2 = input_check($_REQUEST['override2']);
		$override3 = input_check($_REQUEST['override3']);
		$amount1 = input_check($_REQUEST['target_amount1']);
		$amount2 = input_check($_REQUEST['target_amount2']);
		$amount3 = input_check($_REQUEST['target_amount3']);
		$country = input_check($_REQUEST['country']);
		$hoteltoken = input_check($_REQUEST['hoteltoken']);

		$timestamp = time();

		// $id = input_check($_REQUEST['id']);

		if (($type=='') or ($amount1=='') or ($amount2=='') or ($amount3=='') or ($start_duration=='') or ($end_duration=='') or ($nature=='') or ($recipient=='') or ($override1=='') or ($override2=='') or ($override3=='') or ($hoteltoken=='') or ($country=='')) {
			// code...
			$array = [
				'success' => false,
				'message' => "Empty fields.."
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{

			$duration_start = intval(date("Ymd",$start_duration));
			$datenow = intval(date("Ymd"));

			if ($duration_start >= $datenow) {

				if ($end_duration >= $start_duration) {

					if (getHotelDetails($mysqli, $hoteltoken)===true) {

						if (insertOverride($mysqli, $type, $amount1, $amount2, $amount3, $start_duration, $end_duration, $nature, $recipient, $override1, $override2, $override3, $_SESSION['hotel_name'], $country, $timestamp)===true) {
							// code...
							$array = [
								'success' => true,
								'message' => "Override data inserted."
							];
							$return= json_encode($array);
							echo "$return";
							unset($_SESSION);
							exit();
						}else{
							$array = [
								'success' => false,
								'message' => "Something went wrong, please try again."
							];
							$return = json_encode($array);
							echo "$return";
							exit();
						}
					}else {
						# code...
						$array = [
							'success' => false,
							'message' => "This hoteltoken does not exist."
						];
						$return = json_encode($array);
						echo "$return";
						exit();
					}	
				}else{
					$array = [
						'success' => false,
						'message' => "Your start duration cannot be greater than end duration."
					];
					$return = json_encode($array);
					echo "$return";
					exit();	
				}
				
			}else{
				$array = [
					'success' => false,
					'message' => "Your start duration cannot be earlier than today."
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