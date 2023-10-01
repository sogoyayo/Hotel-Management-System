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

		$id = input_check($_REQUEST['id']);


		if (!empty($id)) {
			// code...
			if (checkOverrideExist($mysqli, $id)===true) {
				// code...
				if (updateOverrideDisplay($mysqli, $id)===true) {
					// code...
					$array = [
						'success' => true,
						'message' => "Override has been deleted."
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}else{
					$array = [
						'success' => false,
						'message' => "Something went wrong. Failed to delete Override."
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}
			}else{
				$array = [
					'success' => false,
					'message' => "This Override does not exist."
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