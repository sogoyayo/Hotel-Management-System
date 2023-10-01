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

		$hotelToken = input_check($_REQUEST['hoteltoken']);
		$roomName = input_check($_REQUEST['name']);
		$roomPrice = input_check($_REQUEST['price']);
		$availnum = input_check($_REQUEST['avail_room_num']);

		if (($hotelToken=='') or ($roomName=='') or ($roomPrice=='')) {
			// code...
			$array = [
				'success' => false,
				'message' => "Empty fields"
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{
			if (createHotelRoom($mysqli, $hotelToken, $roomName, $availnum, $roomPrice, $timestamp)) {
				// code...
				$array = [
                    'success' => true,
                    'message' => "Hotel room added.",
                    'roomid' => "".$_SESSION['roomid'].""
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