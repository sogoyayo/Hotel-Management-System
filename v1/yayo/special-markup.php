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

		
		$markup_id = input_check($_REQUEST['markup_id']);
		$markup = input_check($_REQUEST['markup']);
		$user_type = strtoupper(input_check($_REQUEST['user_type']));
		$usertoken = input_check($_REQUEST['usertoken']);
		// $markup_sgl = input_check($_REQUEST['markup_sgl']);
		// $markup_dbl = input_check($_REQUEST['markup_dbl']);
		// $markup_trpl = input_check($_REQUEST['markup_trpl']);
		// $markup_quad = input_check($_REQUEST['markup_quad']);
		$timestamp = time();

		// $id = input_check($_REQUEST['id']);

		if (($markup_id=='') or ($markup=='') or ($user_type=='') or ($usertoken=='')) {
			// code...
			$array = [
				'success' => false,
				'message' => "Empty fields.."
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{
			if (getMarkupDetails($mysqli, $markup_id, $markup)===true) {
				# code...
					if (insertSpecialMarkUp($mysqli, $markup_id, $markup, $user_type, $usertoken, $timestamp, $_SESSION['hotelname'], $_SESSION['country'])===true) {
						// code...
						$array = [
							'success' => true,
							'message' => "Markup data inserted."
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
			}else {
				# code...
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