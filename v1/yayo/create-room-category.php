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

		$room_category = input_check($_REQUEST['category']);


		if (!empty($room_category)) {
			// code...
			if (checkRoomCategoryExist($mysqli, $room_category)===false) {
				// code...
				if (createRoomCategory($mysqli, $room_category)===true) {
					// code...
					$array = [
						'success' => true,
						'message' => "Room category has been created."
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}else{
					$array = [
						'success' => false,
						'message' => "Something went wrong. Failed to create room category."
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}
			}elseif (checkRoomCategoryDisplay($mysqli, $room_category)===true) {
				// code...
			
				if (changeRoomCategoryDisplay($mysqli, $room_category)===true) {
					// code...
					$array = [
						'success' => true,
						'message' => "Room category has been created..."
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}else{
					$array = [
						'success' => false,
						'message' => "Something went wrong. Failed to create room category."
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}
			}else{
				$array = [
					'success' => false,
					'message' => "This category already exist."
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