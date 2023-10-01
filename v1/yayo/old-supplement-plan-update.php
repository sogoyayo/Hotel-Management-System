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
		$contractName = input_check($_REQUEST['contract_name']);
		$contractToken = input_check($_REQUEST['token']);

		$stay_from = input_check($_REQUEST['stay_from']);
		$stay_to = input_check($_REQUEST['stay_to']);

		$status = input_check($_REQUEST['status']);
		$child_age_From = input_check($_REQUEST['child_age_From']);
		$child_age_To = input_check($_REQUEST['child_age_To']);
		$currency = input_check($_REQUEST['currency']);

		$service = input_check($_REQUEST['service']);
		$price_child = input_check($_REQUEST['price_child']);
		$price_adult = input_check($_REQUEST['price_adult']);
		$subscription = input_check($_REQUEST['subscription']);
		$sup_type = input_check($_REQUEST['sup_type']);

		if (!empty($_REQUEST['id'])) {
			// code...
			$id = input_check($_REQUEST['id']);
		}

		if (($dmctoken=='') or ($hoteltoken=='') or ($contractToken=='') or ($stay_from=='') or ($stay_to=='') or ($contractName=='')) {
			// code...
			$array = [
				'success' => false,
				'message' => "the dmc token or hotel token or contract token or start date or end date or contract name is empty.."
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{

			if(getUserDetails_token($mysqli, $dmctoken)){

				$country = $_SESSION['country'];
				$city = $_SESSION['city'];

				$businessName=getBusinessName($mysqli, $dmctoken);

			
				$stay_to = strtotime($stay_to);
				$stay_from = strtotime($stay_from);
				// to is the expiry date and from is the start date


				$date_stay = intval(date("Ymd",$stay_from));
				$datenow = intval(date("Ymd"));

				if ($date_stay >= $datenow) {

					if ($stay_to >= $stay_from) {

						$stay_end = $stay_to;
						$stay_start = $stay_from;

if (!empty($_REQUEST['id'])) {
	// code...

						if (checkSupplementPLanExist($mysqli, $id)===true) {
					
							// code...
							// update
							// if (checkSupplementPLan($mysqli, $contractToken, $stay_start, $stay_end)==true) {
								// code...

if (updateSupplementPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $businessName, $city, $country, $subscription, $service, $stay_start, $stay_end, $price_child, $price_adult, $sup_type, $id, $price_childto, $price_childfrom)===true) {
									// code...
									$array = [
					                    'success' => true,
					                    'message' => "Supplements updated..$id."
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

							// }else{
							// 	$array = [
							// 		'success' => false,
							// 		'message' => "Contract does not exist.."
							// 	];
							// 	$return = json_encode($array);
							// 	echo "$return";
							// 	exit();

							// }

						}else {
							// code...
							// insert

						
						}

					}else{
							if (checkSupplementPLan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $businessName, $city, $country, $subscription, $service, $price_child, $price_adult, $sup_type)===false) {
								// code...

							if (createContractSupplementPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $timestamp, $businessName, $city, $country, $subscription, $service, $stay_start, $stay_end, $price_child, $price_adult, $sup_type)==true) {
									// code...
									$array = [
					                    'success' => true,
					                    'message' => "Supplements created...$id"
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
							}else{
								$array = [
									'success' => false,
									'message' => "These contract details already exit. Try again."
								];
								$return = json_encode($array);
								echo "$return";
								exit();
							}
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