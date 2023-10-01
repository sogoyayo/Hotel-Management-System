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

		$new_start_date = input_check($_REQUEST['new_start_date']);
		$old_start_date = input_check($_REQUEST['old_start_date']);
		$new_end_date = input_check($_REQUEST['new_end_date']);
		$old_end_date = input_check($_REQUEST['old_end_date']);


		$new_start_date1 = input_check($_REQUEST['new_start_date']);
		$old_start_date1 = input_check($_REQUEST['old_start_date']);
		$new_end_date1 = input_check($_REQUEST['new_end_date']);
		$old_end_date1 = input_check($_REQUEST['old_end_date']);

		$id = input_check($_REQUEST['id']);


		if (($new_start_date=='') or ($old_start_date=='') or ($new_end_date=='') or ($old_end_date=='')) {
			// code...
			$array = [
				'success' => false,
				'message' => "Empty fields.."
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{
			
			$new_start_date = strtotime($new_start_date);
			$new_end_date = strtotime($new_end_date);

			$old_start_date = strtotime($old_start_date);
			$old_end_date = strtotime($old_end_date);
			// to is the expiry date and from is the start date

// $array = [
// 					'success' => false,
// 					'message' => "new start date is $new_start_date1 and new end date is $new_end_date1"
// 				];
// 				$return = json_encode($array);
// 				echo "$return";
// 				exit();

			if (($new_start_date < $new_end_date) and ($old_start_date < $old_end_date)) {

				$start_date_new = $new_start_date;
				$end_date_new = $new_end_date;

				$start_date_old = $old_start_date;
				$end_date_old = $old_end_date;

				if (changeDateDurationCancel($mysqli, $start_date_new, $start_date_old, $end_date_new, $end_date_old)===true) {
					// code...
					$array = [
	                    'success' => true,
	                    'message' => "The dates have been changed successfully..."
	                ];
	                $return= json_encode($array);
	                echo "$return";
	                exit();
				}else{
					$array = [
						'success' => false,
						'message' => "Something went wrong, Failed to update contract. please try again."
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}
			}else{
				$array = [
					'success' => false,
					'message' => "Your start date cannot be greater than end date."
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