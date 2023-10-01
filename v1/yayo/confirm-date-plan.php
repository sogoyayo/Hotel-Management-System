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

		$contractToken = input_check($_REQUEST['token']);
		$start_date = input_check($_REQUEST['start_date']);
		$exp_date = input_check($_REQUEST['exp_date']);

		$start_date = strtotime($start_date);
        $exp_date = strtotime($exp_date);

		if (!empty($contractToken)) {
			// code...
			if (!empty($start_date)) {
				// code...
				if (!empty($exp_date)) {
					// code...
					// if (checkDatePlan($mysqli, $contractToken, $start_date, $exp_date)===true) {
						// code...
						if (confirmDatePlan($mysqli, $contractToken, $start_date, $exp_date)===true) {
							// code...
							$array = [
			                    'success' => true,
			                    'message' => "Successful."
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
					// }else{
					// 	$array = [
					// 		'success' => false,
					// 		'message' => "Contract does not exist"
					// 	];
					// 	$return = json_encode($array);
					// 	echo "$return";
					// 	exit();
					// }
				}else{
					$array = [
						'success' => false,
						'message' => "expiry date is not set"
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}
			}else{
				$array = [
					'success' => false,
					'message' => "start date is not set"
				];
				$return = json_encode($array);
				echo "$return";
				exit();

			}
		}else{
			$array = [
				'success' => false,
				'message' => "contractToken is not set"
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