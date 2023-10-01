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

		$refToken = input_check($_POST['token']);

		$dmctoken = input_check($_POST['dmctoken']);
		$roomtoken = input_check($_POST['roomtoken']);
		$room_price = input_check($_POST['room_price']);
		$start_date = input_check($_POST['start_date']);
		$exp_date = input_check($_POST['exp_date']);
		$availnum = input_check($_POST['avail_room_num']);

		$status = input_check($_POST['status']);
		$child_age = input_check($_POST['child_age']);
		$currency = input_check($_POST['currency']);
		$occupy_min = input_check($_POST['occupy_min']);
		$occupy_max = input_check($_POST['occupy_max']);

		$occupy_min_child = input_check($_POST['occupy_min_child']);
		$occupy_max_child = input_check($_POST['occupy_max_child']);
		$release_date = input_check($_POST['release_date']);
		$bfast_child = input_check($_POST['breakfast_child']);
		$bfast_adult = input_check($_POST['breakfast_adult']);

		$fb_child = input_check($_POST['fb_child']);
		$fb_adult = input_check($_POST['fb_adult']);
		$hb_child = input_check($_POST['hb_child']);
		$hb_adult = input_check($_POST['hb_adult']);

		$sai_child = input_check($_POST['sai_child']);
		$sai_adult = input_check($_POST['sai_adult']);
		$all_incl_child = input_check($_POST['all_inclusive_child']);
		$all_incl_adult = input_check($_POST['all_inclusive_adult']);
		$uai_child = input_check($_POST['uai_child']);
		$uai_adult = input_check($_POST['uai_adult']);

		$cancel_days = input_check($_POST['cancel_days']);
		$cancel_penalty = input_check($_POST['cancel_penalty']);

		if (($refToken=='') or ($dmctoken=='') or ($roomtoken=='') or ($room_price=='') or ($start_date=='') or ($exp_date=='') or ($availnum=='') or ($status=='') or ($child_age=='') or ($currency=='') or ($occupy_min=='') or ($occupy_max=='') or ($occupy_min_child=='') or ($occupy_max_child=='') or ($release_date=='') or ($bfast_child=='') or ($bfast_adult=='') or ($fb_child=='') or ($fb_adult=='') or ($hb_child=='') or ($hb_adult=='') or ($sai_child=='') or ($sai_adult=='') or ($all_incl_child=='') or ($all_incl_adult=='') or ($uai_child=='') or ($uai_adult=='') or ($cancel_days=='') or ($cancel_penalty=='')) {
			// code...
			$array = [
				'success' => false,
				'message' => "Empty fields"
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{
			if (getRoomDetails($mysqli, $roomtoken)===true) {
				// code...
				$roomDetails = [
					'hoteltoken' => "".$_SESSION['hotelid']."",
					'room_id' => "".$_SESSION['room_id']."",
					'room_name' => "".$_SESSION['room_name']."",
					'room_desc' => "".$_SESSION['room_desc']."",
					'availnum' => "".$_SESSION['availnum']."",
					'price' => "".$_SESSION['price']."",
					'account_owner' => "".$_SESSION['account_owner']."",
					'dmc' => "".$_SESSION['dmc']."",
					'hotel_owner' => "".$_SESSION['hotel_owner']."",
					'display' => "".$_SESSION['display']."",
					'room_timestamp' => "".$_SESSION['timestamp'].""
				];

				if (getHotelDetails($mysqli, $roomDetails['hoteltoken'])===true) {
					// code...
					$hotelDetails = [
				        'hoteltoken' => "".$_SESSION['hotelid']."",
						'hotel_name' => "".$_SESSION['hotel_name']."",
						'hotel_desc' => "".$_SESSION['description']."",
						'account_owner' => "".$_SESSION['account_owner']."",
						'dmc' => "".$_SESSION['dmc']."",
						'hotel_owner' => "".$_SESSION['hotel_owner']."",
						'location' => "".$_SESSION['location']."",
						'hotel_timestamp' => "".$_SESSION['timestamp']."",
						'latitude' => "".$_SESSION['latitude']."",
						'longitude' => "".$_SESSION['longitude']."",
						'display' => "".$_SESSION['display'].""
					];

					$exp_date = strtotime($exp_date);
					$start_date = strtotime($start_date);

					if (createContractDatePlan($mysqli, $refToken, $roomDetails['hoteltoken'], $roomtoken, $roomDetails['room_desc'], $dmctoken, $hotelDetails['hotel_owner'], $hotelDetails['account_owner'], $hotelDetails['hotel_name'], $hotelDetails['hotel_desc'], $roomDetails['room_name'], $availnum, $room_price, $start_date, $exp_date, $timestamp, $status, $child_age, $currency, $occupy_min, $occupy_max, $occupy_min_child, $occupy_max_child, $release_date, $bfast_child, $bfast_adult, $fb_child, $fb_adult, $hb_child, $hb_adult, $sai_child, $sai_adult, $all_incl_child, $all_incl_adult, $uai_child, $uai_adult, $cancel_days, $cancel_penalty)==true) {
						// code...
						$array = [
		                    'success' => true,
		                    'message' => "Contract date has been set.",
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
				}else{
					$array = [
						'success' => false,
						'message' => "Failed to get hotel details...fix it"
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}
			}else{
				$array = [
					'success' => false,
					'message' => "Failed to get room details...fix it"
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