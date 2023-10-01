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

		$cancel_type = input_check($_REQUEST['cancel_type']);
		$cancel_days = input_check($_REQUEST['cancel_days']);
		$cancel_penalty = input_check($_REQUEST['cancel_penalty']);

		// $id = input_check($_REQUEST['id']);

		if (($dmctoken=='') or ($hoteltoken=='') or ($contractToken=='') or ($cancel_start=='') or ($cancel_end=='') or ($contractName=='')) {
			// code...
			$array = [
				'success' => false,
				'message' => "the dmc token or hotel token or contract token or start date or end date or contract name is empty.."
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{
			if (checkCancelPLan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $cancel_days, $cancel_penalty, $businessName, $city, $country, $cancel_type, $cancel_start, $cancel_end)===false) {
				// code...

				if(getUserDetails_token($mysqli, $dmctoken)){

					$country = $_SESSION['country'];
					$city = $_SESSION['city'];

					$businessName=getBusinessName($mysqli, $dmctoken);


					$cancel_end = strtotime($cancel_end);
					$cancel_start = strtotime($cancel_start);
					// to is the expiry date and from is the start date

					$date_start = intval(date("Ymd",$cancel_start));
					$datenow = intval(date("Ymd"));

					if ($date_start >= $datenow) {

						if ($cancel_end >= $cancel_start) {

							$cancel_to = $cancel_end;
							$cancel_from = $cancel_start;


		if (createContractCancelPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $cancel_days, $cancel_penalty, $cancel_from, $cancel_to, $timestamp, $businessName, $city, $country, $cancel_type)==true) {
									// code...
									$array = [
					                    'success' => true,
					                    'message' => "Cancellation policy have been created!."
					                ];
					                $return= json_encode($array);
					                echo "$return";
					                exit();
								}else{
									$array = [
										'success' => false,
										'message' => "Something went wrong, Failed to insert contract. please try again."
									];
									$return = json_encode($array);
									echo "$return";
									exit();
								}


							// if (checkCancelPLanExist($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $cancel_from, $cancel_to)===true) {
							// 	// code...
							// 	// update
							// 	if (checkCancelPLan($mysqli, $contractToken, $cancel_from, $cancel_to)===true) {
							// 		// code...

							// 		if (updateCancelPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $cancel_days, $cancel_penalty, $cancel_from, $cancel_to, $businessName, $city, $country)===true) {
							// 			// code...
							// 			$array = [
						 //                    'success' => true,
						 //                    'message' => "Cancel plan updated..."
						 //                ];
						 //                $return= json_encode($array);
						 //                echo "$return";
						 //                exit();
							// 		}else{
							// 			$array = [
							// 				'success' => false,
							// 				'message' => "Something went wrong, Failed to update contract. please try again."
							// 			];
							// 			$return = json_encode($array);
							// 			echo "$return";
							// 			exit();
							// 		}

							// 	}else{
							// 		$array = [
							// 			'success' => false,
							// 			'message' => "Contract does not exist.."
							// 		];
							// 		$return = json_encode($array);
							// 		echo "$return";
							// 		exit();

							// 	}

							// }else {
							// 	// code...
							// 	// insert

							// 	if (createContractCancelPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $cancel_days, $cancel_penalty, $cancel_from, $cancel_to, $timestamp, $businessName, $city, $country)==true) {
							// 		// code...
							// 		$array = [
					  //                   'success' => true,
					  //                   'message' => "Cancel has been created."
					  //               ];
					  //               $return= json_encode($array);
					  //               echo "$return";
					  //               exit();
							// 	}else{
							// 		$array = [
							// 			'success' => false,
							// 			'message' => "Something went wrong, Failed to insert contract. please try again."
							// 		];
							// 		$return = json_encode($array);
							// 		echo "$return";
							// 		exit();
							// 	}
							
							// }

						}else{
							$array = [
								'success' => false,
								'message' => "Your start date cannot be greater than end date."
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
						'message' => "Something went wrong. Failed to get users details."
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}
			}else{
				$array = [
					'success' => false,
					'message' => "These contract details exit already. Try again."
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