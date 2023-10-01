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


		if (!empty($_REQUEST['usertoken'])) {
			# code...
			if (!empty($_REQUEST['amount'])) {
				# code...
				$type="debit";
				$amount=input_check($_REQUEST['amount']);
				$amount = "-$amount";
				$usertoken=input_check($_REQUEST['usertoken']);
				$log= 'debits';
			
			
				if (wallet($mysqli, $usertoken, $type, $log, $amount, $timestamp)==true) {
					# code...
					$array = [
					 	'success' => true,
					 	'message' => "Your wallet has been debited with $amount"
				 	];
					$return= json_encode($array);
					echo "$return";
					exit();
				}else{
					$array = [
				 		'success' => false,
				 		'message' => "something went wrong, try again..."
				 	];
					$return= json_encode($array);
					echo "$return";
					exit();
				}
			}else{
				$array = [
 					'success' => false,
 					'message' => "Enter a valid Amount"
 				];
				$return= json_encode($array);
				echo "$return";
				exit();
			}
		}else{
			$array = [
 				'success' => false,
		 		'message' => "Invalid user"
		 	];
			$return= json_encode($array);
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
				