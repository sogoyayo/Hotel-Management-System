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

		
		$contract_token = input_check($_REQUEST['contract_token']);
		$markup = input_check($_REQUEST['markup']);
		$category = input_check($_REQUEST['category']);
		$seller_type = input_check($_REQUEST['seller_type']);
		$seller = input_check($_REQUEST['seller']);
		$buyer_type = input_check($_REQUEST['buyer_type']);
		$buyer = input_check($_REQUEST['buyer']);
		$country = input_check($_REQUEST['country']);
		$hoteltoken = input_check($_REQUEST['hoteltoken']);
		// $markup_sgl = input_check($_REQUEST['markup_sgl']);
		// $markup_dbl = input_check($_REQUEST['markup_dbl']);
		// $markup_trpl = input_check($_REQUEST['markup_trpl']);
		// $markup_quad = input_check($_REQUEST['markup_quad']);
		$timestamp = time();

		// $id = input_check($_REQUEST['id']);

		if (($contract_token=='') or ($markup=='') or ($category=='') or ($seller_type=='') or ($seller=='') or ($buyer_type=='') or ($buyer=='') or ($hoteltoken=='') or ($country=='')) {
			// code...
			$array = [
				'success' => false,
				'message' => "Empty fields.."
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{
			if (getHotelDetails($mysqli, $hoteltoken)===true) {
				# code...
				
				if (insertMarkUp($mysqli, $contract_token, $markup, $category, $seller_type, $seller, $buyer_type, $buyer, $_SESSION['hotel_name'], $country, $timestamp)===true) {
					// code...
					$array = [
						'success' => true,
						'message' => "Markup data inserted."
					];
					$return= json_encode($array);
					echo "$return";
					unset($_SESSION);
					exit();
				}else{
					$array = [
						'success' => false,
						'message' => "Something went wrong, please try again."
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}
			}else {
				# code...
				$array = [
					'success' => false,
					'message' => "This hoteltoken does not exist."
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