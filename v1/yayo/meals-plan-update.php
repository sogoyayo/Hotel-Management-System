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

$meals_start = input_check($_REQUEST['meals_start']);
$meals_end = input_check($_REQUEST['meals_end']);

$status = input_check($_REQUEST['status']);
$child_age_From = input_check($_REQUEST['child_age_From']);
$child_age_To = input_check($_REQUEST['child_age_To']);
$currency = input_check($_REQUEST['currency']);

$bfast_child = input_check($_REQUEST['breakfast_child']);
$bfast_adult = input_check($_REQUEST['breakfast_adult']);

$fb_child = input_check($_REQUEST['fb_child']);
$fb_adult = input_check($_REQUEST['fb_adult']);
$hb_child = input_check($_REQUEST['hb_child']);
$hb_adult = input_check($_REQUEST['hb_adult']);

		$sai_child = input_check($_REQUEST['sai_child']);
		$sai_adult = input_check($_REQUEST['sai_adult']);
		$all_incl_child = input_check($_REQUEST['all_inclusive_child']);
		$all_incl_adult = input_check($_REQUEST['all_inclusive_adult']);
		$uai_child = input_check($_REQUEST['uai_child']);
		$uai_adult = input_check($_REQUEST['uai_adult']);

		$roc = input_check($_REQUEST['rooms_only_child']);
		$roa = input_check($_REQUEST['rooms_only_adult']);

		if (!empty($_REQUEST['id'])) {
			// code...
		$id = input_check($_REQUEST['id']);

		}

		if (($dmctoken=='') or ($hoteltoken=='') or ($contractToken=='') or ($meals_start=='') or ($meals_end=='') or ($contractName=='')) {
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

			
				$meals_end = strtotime($meals_end);
				$meals_start = strtotime($meals_start);
				// to is the expiry date and from is the start date


				$date_start = intval(date("Ymd",$meals_start));
				$datenow = intval(date("Ymd"));

				if ($date_start >= $datenow) {

					if ($meals_end >= $meals_start) {

						$meals_to = $meals_end;
						$meals_from = $meals_start;

						if (checkMealsPLanExist($mysqli, $id)===true) {
							// code...
							// update
							// if (checkMealsPLan($mysqli, $contractToken, $meals_from, $meals_to)==true) {
								// code...

								if (updateMealsPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $bfast_child, $bfast_adult, $hb_adult, $hb_child, $fb_adult, $fb_child, $sai_adult, $sai_child, $all_incl_adult, $all_incl_child, $uai_adult, $uai_child, $meals_from, $meals_to, $roc, $roa, $businessName, $city, $country, $id)===true) {
									// code...
									$array = [
					                    'success' => true,
					                    'message' => "Meals plan updated..."
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
						

							if (checkMealsPLan($mysqli, $meals_from, $meals_to)==false) {
								// code...

								if (createContractMealsPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $bfast_child, $bfast_adult, $hb_adult, $hb_child, $fb_adult, $fb_child, $sai_adult, $sai_child, $all_incl_adult, $all_incl_child, $uai_adult, $uai_child, $meals_from, $meals_to, $timestamp, $roc, $roa, $businessName, $city, $country)==true) {
									// code...
									$array = [
					                    'success' => true,
					                    'message' => "Meals has been created."
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
									'message' => "These dates exist already. Try again."
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
							'message' => "Your start date cannot earlier than today."
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