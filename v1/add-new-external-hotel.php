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

if (isset($data->apptoken)) {

	$apptoken = input_check($data->apptoken);

	if (CheckToken($mysqli, $apptoken)==true) {

		if (!empty($data->usertoken) and !empty($data->dmctoken) and !empty($data->hotelcode) and !empty($data->sourceid) and !empty($data->hotelname) and !empty($data->aotoken)) {
			// code...
			$db = new db();
			if(CheckUserToken($mysqli, $data->usertoken)==true){
// if (ExtHotelExists($mysqli, $data->usertoken, $hotelcode)==false) {
	// code...
			if (addExternalHotel($db, $mysqli, $data->usertoken, $data->dmctoken, $data->hotelcode, $data->sourceid, $data->hotelname, $data->aotoken) == true) {
				// code...
			$array = array(
			'success' => true,
			'message' => "Hotel records updated.."
		);
		echo json_encode($array);
		exit();
			}else{
				$array = array(
			'success' => false,
			'message' => "Something went wrong, please try again later.."
		);
		echo json_encode($array);
		exit();
			}
		// }else{
		// 	$array = array(
		// 	'success' => false,
		// 	'message' => "Something went wrong, please try again later.."
		// );
		// echo json_encode($array);
		// exit();
		// }
		}else{
$array = array(
			'success' => false,
			'message' => "This user does not exist.."
		);
		echo json_encode($array);
		exit();
		}
		}else{
			$array = array(
			'success' => false,
			'message' => "Missing data"
		);
		echo json_encode($array);
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