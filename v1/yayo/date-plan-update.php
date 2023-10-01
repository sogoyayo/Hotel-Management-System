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
$db = new db();
		$dmctoken = input_check($_REQUEST['dmctoken']);
		$roomtoken = input_check($_REQUEST['roomtoken']);
		$contractToken = input_check($_REQUEST['token']);
		$hoteltoken = input_check($_REQUEST['hoteltoken']);
		$end_date = strtotime(input_check($_REQUEST['exp_date']));
		$start_date = strtotime(input_check($_REQUEST['start_date']));
		$contractName = input_check($_REQUEST['contract_name']);


		$status = input_check($_REQUEST['status']);
		$child_age_From = input_check($_REQUEST['child_age_From']);
		$child_age_To = input_check($_REQUEST['child_age_To']);
		$currency = input_check($_REQUEST['currency']);

		// $room = input_check($_REQUEST['room']);
	$price_sgl = input_check($_REQUEST['price_sgl']);
	$price_dbl = input_check($_REQUEST['price_dbl']);
	$price_trl = input_check($_REQUEST['price_trl']);
	$price_qud = input_check($_REQUEST['price_qud']);
	$price_chd1 = input_check($_REQUEST['price_chd1']);
	$price_chd2 = input_check($_REQUEST['price_chd2']);
	$inventory_room = input_check($_REQUEST['inventory_room']);
	$inventory_rel = input_check($_REQUEST['inventory_rel']);	

		// $release_date = input_check($_REQUEST['release_date']);

	$twn = input_check($_REQUEST['twn']);
	$unit = input_check($_REQUEST['unit']);

		if (!empty($_REQUEST['release_date'])) {
			// code...
			$release_date = input_check($_REQUEST['release_date']);
		}else {
			# code...
			$release_date = 0;
		}

		if (!empty($_REQUEST['room'])) {
			// code...
			$room = input_check($_REQUEST['room']);
		}else {
			# code...
			$room = 0;
		}
	

		// $price = input_check($_REQUEST['price']);
		// $availnum = input_check($_REQUEST['avail_room_num']);
		// $occupy_min = input_check($_REQUEST['occupy_min']);
		// $occupy_max = input_check($_REQUEST['occupy_max']);

		// $occupy_min_child = input_check($_REQUEST['occupy_min_child']);
		// $occupy_max_child = input_check($_REQUEST['occupy_max_child']);

		
		if (!empty($_REQUEST['id'])) {
			// code...
			$id = input_check($_REQUEST['id']);
		}


		if (($dmctoken=='') or ($roomtoken=='') or ($hoteltoken=='') or ($contractToken=='') or ($start_date=='') or ($end_date=='') or ($contractName=='')) {
			// code...
			$array = [
				'success' => false,
				'message' => "something  is empty.."
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
			'room_category' => "".$_SESSION['category']."",
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

					if(getUserDetails_token($mysqli, $dmctoken)){

						$country = $_SESSION['country'];
						$city = $_SESSION['city'];

						$businessName=getBusinessName($mysqli, $dmctoken);

						// to get the day of a date from the unix timestamp
						// $getdate_from=getdate($from);
						// $getdatenow=getdate($timestamp);

						// echo $datefrom = intval($getdate_from['year'].$getdate_from['mon'].$getdate_from['mday']);
						// echo $datenow = intval($getdatenow['year'].$getdatenow['mon'].$getdatenow['mday']);

						$date_start = intval(date("Ymd",$start_date));
						$datenow = intval(date("Ymd"));

if ($datenow <= $date_start) {
							// code...
			if ($end_date >= $start_date) {
	if (checkContractInsertExist($mysqli, $contractName, $contractToken, $hoteltoken, $roomtoken, $dmctoken, $start_date, $end_date)===true) {
									
if (updateDatePlan($mysqli, $contractName, $contractToken, $hoteltoken, $roomtoken, $roomDetails['room_desc'], $dmctoken, $hotelDetails['hotel_owner'], $hotelDetails['account_owner'], $hotelDetails['hotel_name'], $hotelDetails['hotel_desc'], $roomDetails['room_name'], $start_date, $end_date, $status, $child_age_From, $child_age_To, $currency, $release_date, $businessName, $city, $country, $room, $price_sgl, $price_dbl, $price_trl, $price_qud, $price_chd1, $price_chd2, $inventory_room, $inventory_rel, $roomDetails['room_category'], $twn, $unit)===true) {
										
		updateContractStatus($db, $mysqli, $contractToken, $status);

			$array = [
                'success' => true,
                'message' => "Contract updated..."
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

		if (checkDatePlanHasParent($mysqli, $dmctoken, $contractToken, $start_date, $end_date, $roomtoken)===true) {
			// code...

			// if(checkSplitContract($mysqli, $_SESSION['id__1'])===false) {
				
				
if (createPriceContract($mysqli, $contractName, $contractToken, $hoteltoken, $roomtoken, $roomDetails['room_desc'], $dmctoken, $hotelDetails['hotel_owner'], $hotelDetails['account_owner'], $hotelDetails['hotel_name'], $hotelDetails['hotel_desc'], $roomDetails['room_name'], $start_date, $end_date, $status, $child_age_From, $child_age_To, $currency, $release_date, $timestamp, $business_name, $city, $country, $room, $price_sgl, $price_dbl, $price_trl, $price_qud, $price_chd1, $price_chd2, $inventory_room, $inventory_rel, $_SESSION['id_1'], $roomDetails['room_category'], $twn, $unit)===true) {
		// code...
		if (first_updateRelay1($mysqli, $_SESSION['id_1'])===true) {
			// code..
			
	        $new_end_date_parent_contract=intval($start_date) - intval($twentyfourhours);

	        if ($_SESSION['start_date_1'] > $new_end_date_parent_contract) {
            	// code...
            	$new_end_date = $_SESSION['start_date_1'];
            }else{
            	$new_end_date = $new_end_date_parent_contract;
            }

	        
	        if (updateParentContract($db, $mysqli, $_SESSION['id_1'], $new_end_date)===true) {
	            // code...

	            $new_start_date_third_contract=intval($end_date) + intval($twentyfourhours);

	            if ($new_start_date_third_contract > $_SESSION['expiry_date_1']) {
	            	// code...
	            	$new_start_date = $_SESSION['expiry_date_1'];
	            }else{
	            	$new_start_date = $new_start_date_third_contract;
	            }

if (createThirdChildContract($mysqli, $_SESSION['contract_name_1'], $_SESSION['contractToken_1'], $_SESSION['hoteltoken_1'], $_SESSION['roomtoken_1'], $_SESSION['room_desc_1'], $_SESSION['dmctoken_1'], $_SESSION['hotel_owner_1'], $_SESSION['account_owner_1'], $_SESSION['hotelname_1'], $_SESSION['hotel_desc_1'], $_SESSION['room_name_1'],  $new_start_date, $_SESSION['expiry_date_1'], $_SESSION['status_1'], $_SESSION['child_age_From_1'], $_SESSION['child_age_To_1'], $_SESSION['currency_1'],  $_SESSION['release_date_1'], $timestamp, $_SESSION['business_name_1'], $_SESSION['city_1'], $_SESSION['country_1'], $_SESSION['room_1'], $_SESSION['price_sgl_1'], $_SESSION['price_dbl_1'], $_SESSION['price_trl_1'], $_SESSION['price_qud_1'], $_SESSION['price_chd1_1'], $_SESSION['price_chd2_1'], $_SESSION['inventory_room_1'], $_SESSION['inventory_rel_1'], $_SESSION['id_1'], $_SESSION['room_category_1'], $_SESSION['twn_1'], $_SESSION['unit_1'])===true) {

	updateContractStatus($db, $mysqli, $contractToken, $status);
		
        // echo "Done!";
		$array = [
			'success' => true,
			'message' => "Inner Date plan and third Contract created successfully."
		];
		$return = json_encode($array);
		echo "$return";
        unset($_SESSION);
		exit();
    }else{
        // echo "error one";
    	$array = [
			'success' => false,
			'message' => "Failed to create the third child contract."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
    }
    }else{
        // echo "error two";
    	$array = [
			'success' => false,
			'message' => "Failed to update end date for the parent contract."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
    }

		}else{
			$array = [
				'success' => false,
				'message' => "Failed to update relay1 for the parent contract."
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}
	} else {
		// code...
		$array = [
			'success' => false,
			'message' => "Something went wrong. Failed to inner date plan contract."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
	}
// }else{
// 	$array = [
// 		'success' => false,
// 		'message' => "This contract has already been split..."
// 	];
// 	$return = json_encode($array);
// 	echo "$return";
// 	exit();
// }

}else{

if (checkDatePlan($mysqli, $start_date, $end_date, $contractToken, $roomtoken)===false) {
	// code...
	if (createContractDatePlan($mysqli, $contractName, $contractToken, $hoteltoken, $roomtoken, $roomDetails['room_desc'], $dmctoken, $hotelDetails['hotel_owner'], $hotelDetails['account_owner'], $hotelDetails['hotel_name'], $hotelDetails['hotel_desc'], $roomDetails['room_name'], $start_date, $end_date, $timestamp, $status, $child_age_From, $child_age_To, $currency, $release_date, $businessName, $city, $country, $room, $price_sgl, $price_dbl, $price_trl, $price_qud, $price_chd1, $price_chd2, $inventory_room, $inventory_rel, $roomDetails['room_category'], $twn, $unit)==true) {
		// code...
		$array = [
            'success' => true,
            'message' => "Contract details has been created. Please update rest of the contract details."
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