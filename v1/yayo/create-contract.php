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

		if (!empty($_REQUEST['dmctoken'])) {
			// code...

			if (!empty($_REQUEST['hoteltoken'])) {
				// code...

$dmctoken = input_check($_REQUEST['dmctoken']);
$hoteltoken = input_check($_REQUEST['hoteltoken']);


				if(getUserDetails_token($mysqli, $dmctoken)===true){

					if (getHotelDetails_dmc($mysqli, $hoteltoken, $dmctoken)===true) {
						// code...

						$hotelname = $_SESSION['hotel_name'];
						$country = $_SESSION['country'];
						$city = $_SESSION['city'];

						
						if (createContract($mysqli, $hoteltoken, $dmctoken, $hotelname, $country, $city, $timestamp)===true) {
							// code...
							$array = [
								'success' => true,
								'message' => "Good job! Contract created successfully.",
								'city' => "$city",
								'country' => "$country",
								'hotelname' => "$hotelname",
								'contractToken' => "".$_SESSION['contractToken'].""
							];
							$return = json_encode($array);
							echo "$return";
							unset($_SESSION);
							exit();
						} else {
							// code...
							$array = [
								'success' => false,
								'message' => "Something went wrong. Failed to create contract."
							];
							$return = json_encode($array);
							echo "$return";
							exit();
						}
					}else{
						$array = [
							'success' => false,
							'message' => "Sorry, we encountered an issue fetching the hotel details...please try again."
						];
						$return = json_encode($array);
						echo "$return";
						exit();
					}
				}else{
					$array = [
						'success' => false,
						'message' => "Sorry, something went wrong. We encountered an issue fetching the users details...please try again."
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}
			}else{
				$array = [
					'success' => false,
					'message' => "Please enter an hotel token. Hotel token is not set"
				];
				$return = json_encode($array);
				echo "$return";
				exit();
			}
		}else{
			$array = [
				'success' => false,
				'message' => "Please enter a dmc token....dmc token is not set"
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