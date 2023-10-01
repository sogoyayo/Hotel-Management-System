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

		// $contract_token = input_check($_REQUEST['contract_token']);
		$markup = input_check($_REQUEST['markup']);
		// $category = input_check($_REQUEST['category']);
		$seller_type = input_check($_REQUEST['seller_type']);
		$seller = input_check($_REQUEST['seller']);
		$buyer_type = input_check($_REQUEST['buyer_type']);
		$buyer = input_check($_REQUEST['buyer']);
		$id = input_check($_REQUEST['id']);

		if (($markup=='') or ($seller_type=='') or ($seller=='') or ($id=='') or ($buyer_type=='') or ($buyer=='')) {
			// code...
			$array = [
				'success' => false,
				'message' => "Empty fields.."
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{
			// code...
            if (updateMarkup($mysqli, $id, $markup, $seller_type, $seller, $buyer_type, $buyer)===true) {
				// code...
				$array = [
                    'success' => true,
                    'message' => "Markup has been updated."
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
				unset($_SESSION);
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