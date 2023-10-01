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

		$stay_from = input_check($_REQUEST['stay_from']);
		$stay_to = input_check($_REQUEST['stay_to']);
		
		$booking_from = input_check($_REQUEST['booking_from']);
		$booking_to = input_check($_REQUEST['booking_to']);
		
		$link1 = input_check($_REQUEST['link1']);
		$link2 = input_check($_REQUEST['link2']);
		$link3 = input_check($_REQUEST['link3']);
		$link4 = input_check($_REQUEST['link4']);
		$link5 = input_check($_REQUEST['link5']);

		$discount_amt = input_check($_REQUEST['discount_amt']);
		$discount_rate = input_check($_REQUEST['discount_rate']);
		$source_market = input_check($_REQUEST['source_market']);
		$offer = input_check($_REQUEST['offer']);
		$order = input_check($_REQUEST['order']);

		$status = input_check($_REQUEST['status']);
		$child_age_From = input_check($_REQUEST['child_age_From']);
		$child_age_To = input_check($_REQUEST['child_age_To']);
		$currency = input_check($_REQUEST['currency']);

		if (!empty($_REQUEST['id'])) {
			// code...
			$id = input_check($_REQUEST['id']);
		}

		if (($dmctoken!=='') and ($hoteltoken!=='') and ($contractToken!=='') and ($contractName!=='') and ($stay_from!=='') and ($stay_to!=='') and ($booking_from!=='') and ($booking_to!=='') and ($offer!=='')) {
			// code...

			$stay_from = strtotime($stay_from);
			$stay_to = strtotime($stay_to);

			$booking_from = strtotime($booking_from);
			$booking_to = strtotime($booking_to);

			if(getUserDetails_token($mysqli, $dmctoken)){

				$country = $_SESSION['country'];
				$city = $_SESSION['city'];

				$businessName=getBusinessName($mysqli, $dmctoken);
				

				$date_stay_from = intval(date("Ymd",$stay_from));
				$date_booking_from = intval(date("Ymd",$booking_from));
				$datenow = intval(date("Ymd"));

				if (($date_stay_from >= $datenow) and ($date_booking_from >= $datenow)) {
					// code...

					if (($stay_to >= $stay_from) and ($booking_to >= $booking_from)) {

						
						$stay_start = $stay_from;
						$stay_end = $stay_to;

						$booking_start = $booking_from;
						$booking_end = $booking_to;

if (!empty($_REQUEST['id'])) {
	// code...

						if (checkOfferPLanExist($mysqli, $id)===true) {
							

								if (updateOfferPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $link1, $stay_start, $stay_end, $booking_start, $booking_end, $discount_amt, $discount_rate, $source_market, $offer, $businessName, $city, $country, $order, $id)===true) {
									// code...
								
									$array = [
					                    'success' => true,
					                    'message' => "Offer plan updated..."
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

							

						}else {
							$array = [
										'success' => false,
										'message' => "Please select an offer.."
									];
									$return = json_encode($array);
									echo "$return";
									exit();
						}
					}else{


						# ID not found
						if (checkOfferPLan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $link1, $discount_amt, $discount_rate, $source_market, $offer, $businessName, $city, $country, $order, $stay_start, $stay_end, $booking_start, $booking_end)===false) {

$offers_room_type = input_check($_POST['offers_room_type']);
$offer_room = input_check($_POST['offer_room']);
$offer_meals = input_check($_POST['offer_meals']);
$offer_supplement = input_check($_POST['offer_supplement']);

								if (createContractOfferPlan($mysqli, $contractName, $contractToken, $hoteltoken, $dmctoken, $status, $child_age_From, $child_age_To, $currency, $link1, $stay_start, $stay_end, $booking_start, $booking_end, $discount_amt, $discount_rate, $source_market, $offer, $timestamp, $businessName, $city, $country, $order, $offers_room_type, $offer_room, $offer_meals, $offer_supplement) ===true) {

// echo "Checking 2";
// exit();

									$array = [
					                    'success' => true,
					                    'message' => "Offer created."
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
								exit();
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
							'message' => "The dates are not properly set. Your start date cannot be greater than end date."
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
				'message' => "Empty field detected.."
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