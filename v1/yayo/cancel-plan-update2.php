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
		$dmctoken = input_check($_REQUEST['dmctoken']);
		$contractToken = input_check($_REQUEST['token']);
		$contractName = input_check($_REQUEST['contract_name']);

		$cancel_start = input_check($_REQUEST['cancel_start']);
		$cancel_end = input_check($_REQUEST['cancel_end']);
		
		$status = input_check($_REQUEST['status']);
		$child_age_From = input_check($_REQUEST['child_age_From']);
		$child_age_To = input_check($_REQUEST['child_age_To']);
		$currency = input_check($_REQUEST['currency']);


		$cancel_days = input_check($_REQUEST['cancel_days']);
		$cancel_penalty = input_check($_REQUEST['cancel_penalty']);
		$cancel_type = input_check($_REQUEST['cancel_type']);

		$cancel_start1 = strtotime($cancel_start);
		$cancel_end1 = strtotime($cancel_end);

		$id = input_check($_REQUEST['id']);

		$date_start1 = intval(date("Ymd",$cancel_start1));
		$datenow = intval(date("Ymd"));

		if ($date_start1 >= $datenow) {
			// code...

			if ($cancel_end1 >= $cancel_start1){


				if (updateCancelPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $cancel_days, $cancel_penalty, $cancel_start1, $cancel_end1, $id, $cancel_type)===true) {
					// code...
					$array = [
	                    'success' => true,
	                    'message' => "Cancel plan updated..."
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
					'message' => "Your start date cannot come after the end date."
				];
				$return = json_encode($array);
				echo "$return";
				exit();
			}
		}else{
			$array = [
				'success' => false,
				'message' => "Your start date cannot be earlier than today."
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