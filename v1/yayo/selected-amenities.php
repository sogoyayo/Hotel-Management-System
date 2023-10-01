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
		$amenities_id = input_check($_REQUEST['amenities_id']);
		$roomtoken = input_check($_REQUEST['roomtoken']);


		if (($room_amenities=='') or ($amenities_id=='') or ($roomtoken=='')) {
			// code...
			$array = [
				'success' => false,
				'message' => "Empty fields."
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{
			if (checkselectedAmenities_room($mysqli, $room_amenities, $roomtoken)===false) {
				// code...
				if (insertSelectedAmenities($mysqli, $room_amenities, $amenities_id, $roomtoken)===true) {
					// code...
					$array = [
						'success' => true,
						'message' => "Selected Room amenities has been created."
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
			}else{
				$array = [
					'success' => false,
					'message' => "This room already has this amenity."
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