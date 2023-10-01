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

		$hotelToken = input_check($_REQUEST['hoteltoken']);

		// if (!empty($_REQUEST['roomtoken'])) {
		// 	// code...
		// 	$roomtoken = input_check($_REQUEST['roomtoken']);
		// }


		if (!empty($hotelToken)) {
			// code...
			if (getHotelDetails($mysqli, $hotelToken)===true) {
				// code...
				$hotelDetails = [
			        'hoteltoken' => "".$_SESSION['hotelid']."",
					'hotel_name' => "".$_SESSION['hotel_name']."",
					'hotel_desc' => "".$_SESSION['description']."",
					'account_owner' => "".$_SESSION['account_owner']."",
					'dmc' => "".$_SESSION['dmc']."",
					'hotel_owner' => "".$_SESSION['hotel_owner']."",
					'location' => "".$_SESSION['location']."",
					'hotel_timestamp' => "".$_SESSION['timestamp']."",
					'latitude' => "".$_SESSION['latitude']."",
					'longitude' => "".$_SESSION['longitude']."",
					'display' => "".$_SESSION['display'].""
				];

				// if (checkRoomExist($mysqli, $hotelToken, $roomtoken)===false) {
					// code...

					
					if (createHotelRoom($mysqli, $hotelToken, $hotelDetails['account_owner'], $hotelDetails['hotel_owner'], $timestamp)===true) {
							// code...
						$array = [
		                    'success' => true,
		                    'message' => "Hotel room has been added.",
		                    'roomid' => "".$_SESSION['roomid'].""
		                ];
		                $return= json_encode($array);
		                echo "$return";
		                exit();
					}else{
						$array = [
							'success' => false,
							'message' => "Something went wrong, please try again.
							"
						];
						$return = json_encode($array);
						echo "$return";
						exit();
					}
				// }else{
				// 	$array = [
				// 		'success' => false,
				// 		'message' => "Room exist already. Please create another room"
				// 	];
				// 	$return = json_encode($array);
				// 	echo "$return";
				// 	exit();
				// }
			}else{
				$array = [
					'success' => false,
					'message' => "Something went wrong..."
				];
				$return = json_encode($array);
				echo "$return";
				exit();
			}
		}else{
			$array = [
				'success' => false,
				'message' => "Hotel not selected"
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