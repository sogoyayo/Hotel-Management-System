<?php
header('Content-Type: application/json');

require('../aaconfig.php');
require('../data.php');
require('../functions.php');
require('../functions2.php');

// include('../mailer.php');
include('../sms.php');
include('../engine.php');

$timestamp = time();

$data = file_get_contents('php://input');
$data = json_decode($data);
// var_dump($data);
// exit();

if (isset($data->apptoken)) {

	$apptoken = input_check($data->apptoken);
// var_dump($data->contractToken);
// exit();
	if (CheckToken($mysqli, $apptoken)==true) {

		if (!empty($data->usertoken) and !empty($data->bookingData) and !empty($data->totalAmount) and !empty($data->hoteltoken) and !empty($data->contractToken) and !empty($data->dmctoken)) {
			// code...
$hotelname = getHotelName($mysqli, $data->hoteltoken);
$time = date("d-m-Y", time());
// $log = "Payment for booking $hotelname on $time";
// $source = "Booking on HotelsOffline";

		// if (debitUser($mysqli, $data->usertoken, $data->totalAmount, $log, $source)==true) {
			// code...
$log = "Payment recieved for booking on $hotelname on $time";
			if (creditUser($mysqli, $data->dmctoken, $data->totalAmount, $log, $source)==true) {
				
		$source = hotelIsExternal($mysqli, $data->hoteltoken);

		if ($source == "ezee") {
			// code...
			sendBookingToEzee($data);
		}

		if (recordBooking($mysqli, $data->usertoken, $data->hoteltoken, $data->totalAmount, $hotelname, $source, $data->bookingData, $data->contractToken, $data->dmctoken)==true) {
		$array = array(
			'success' => true,
			'message' => "Payments successful, and your bookings have been processed.."
		);
		$return = json_encode($array);
		echo "$return";
		exit();
		}else{
$array = array(
			'success' => false,
			'message' => "Payment failed, to update your booking.."
		);
		$return = json_encode($array);
		echo "$return";
		exit();
		}

			}else{
$log = "Payment refund for failed booking on $hotelname on $time";
			creditUser($mysqli, $data->usertoken, $data->amount, $log, $source);
		$array = array(
			'success' => false,
			'message' => "Payment failed, your wallet has been refunded.."
		);
		$return = json_encode($array);
		echo "$return";
		exit();
			}
		// }else{

		// $array = array(
		// 	'success' => false,
		// 	'message' => "Payment failed, your wallet has been refunded.."
		// );
		// $return = json_encode($array);
		// echo "$return";
		// exit();

		// }

		}else{
			$array = [
			'success' => false,
			'message' => "Incomplete data.."
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
		'message' => "Token not set.. $apptoken"
	];
	$return = json_encode($array);
	echo "$return";
	exit();
}

?>