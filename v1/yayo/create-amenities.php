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

		$room_amenities = input_check($_REQUEST['room_amenities']);


		if (!empty($room_amenities)) {
			// code...
			if (checkAmenitiesExist($mysqli, $room_amenities)===false) {
				// code...
				if (createAmenities($mysqli, $room_amenities)==true) {
					// code...
					$array = [
						'success' => true,
						'message' => "Room amenities has been created."
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}else{
					$array = [
						'success' => false,
						'message' => "Something went wrong. Failed to create amenity."
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}
			}elseif (checkAmenitiesDisplay($mysqli, $room_amenities)===true) {
				// code...
			
				if (changeAmenitiesDisplay($mysqli, $room_amenities)===true) {
					// code...
					$array = [
						'success' => true,
						'message' => "Room amenities has been created..."
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}else{
					$array = [
						'success' => false,
						'message' => "Something went wrong. Failed to create room amenity..."
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}
			}else{
				$array = [
					'success' => false,
					'message' => "This amenity already exist."
				];
				$return = json_encode($array);
				echo "$return";
				exit();
			}
		}else{
			$array = [
				'success' => false,
				'message' => "Empty field."
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