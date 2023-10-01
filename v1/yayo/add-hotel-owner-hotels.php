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
		$account_owner = input_check($_REQUEST['account_owner']);
		$hotel_owner = input_check($_REQUEST['hotel_owner']);

		if (($hoteltoken=='') or ($account_owner=='') or ($hotel_owner=='')){
			$array = [
				'success' => false,
				'message' => "Empty fields"
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{
			if (checkHotelDisplay($mysqli, $hoteltoken)==false){

				if (checkAcctOwnerToken($mysqli, $account_owner)==true) {
					// code...
					$usertoken = getUserToken_mail($mysqli, $hotel_owner);
					
					if (addhotel_owner_hotels($mysqli, $account_owner, $hoteltoken, $usertoken)===true) {
						// code...

						$array = [
							'success' => true,
							'message' => "Hotel owner added successfully!"
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
						'message' => "That user does not exist"
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