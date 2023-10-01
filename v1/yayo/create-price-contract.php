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

		$contractToken = input_check($_REQUEST['contractToken']);
		$hoteltoken = input_check($_REQUEST['hoteltoken']);
		$roomtoken = input_check($_REQUEST['roomtoken']);
		$dmctoken = input_check($_REQUEST['dmctoken']);
		$inventory_room = input_check($_POST['room']);
		$inventory_rel = input_check($_REQUEST['inventory_rel']);
	$start_date = strtotime(input_check($_REQUEST['start_date']));
		$end_date = strtotime(input_check($_REQUEST['end_date']));
// $start_date = input_check($_POST['start_date']);
// $end_date = input_check($_POST['end_date']);
		$price_sgl = input_check($_REQUEST['price_sgl']);
		$price_dbl = input_check($_REQUEST['price_dbl']);
		$price_trpl = input_check($_REQUEST['price_trl']);
		$price_quad = input_check($_REQUEST['price_qud']);
		$twn = input_check($_REQUEST['twn']);
		$unit = input_check($_REQUEST['unit']);
		$id = input_check($_REQUEST['id']);
		$room = input_check($_POST['room']);


		// $array = [
		// 			'success' => false,
		// 			'message' => $inventory_room	
	 //  		];
		// $return = json_encode($array);
		// echo "$return";
		// exit();


		if (!empty($dmctoken)) {
			// code...#

			$datefrom = intval(date("Ymd",$start_date));
			$datenow = intval(date("Ymd"));

	if ($datenow <= $datefrom) {
		// code...
		if ($end_date >= $start_date) {

// check old contract

if (getContractById($mysqli, $id)===true) {

// setting all sessions to  their respective variables
			
	    $timestamp = time();

	if(checkSplitContract($mysqli, $id)===false) {

	if (createPriceContract($mysqli, $_SESSION['contract_name_1'], $contractToken, $hoteltoken, $roomtoken, $_SESSION['room_desc_1'], $dmctoken, $_SESSION['hotel_owner_1'], $_SESSION['account_owner_1'], $_SESSION['hotelname_1'], $_SESSION['hotel_desc_1'], $_SESSION['room_name_1'], $start_date, $end_date, $_SESSION['status_1'], $_SESSION['child_age_From_1'], $_SESSION['child_age_To_1'], $_SESSION['currency_1'], $_SESSION['release_date_1'], $timestamp, $_SESSION['business_name_1'], $_SESSION['city_1'], $_SESSION['country_1'], $room, $price_sgl, $price_dbl, $price_trpl, $price_quad, $_SESSION['price_chd1_1'], $_SESSION['price_chd2_1'], $inventory_room, $inventory_rel, $id, $_SESSION['room_category_1'], $twn, $unit)===true) {
		// code...
		if (first_updateRelay1($mysqli, $id)===true) {
				// code..

        // calc
        $new_end_date_parent_contract=intval($start_date) - intval($twentyfourhours);

        if ($_SESSION['start_date_1'] > $new_end_date_parent_contract) {
        	// code...
        	$new_end_date = $_SESSION['start_date_1'];
        }else{
        	$new_end_date = $new_end_date_parent_contract;
        }

        
        if (updateParentContract($mysqli, $id, $new_end_date)===true) {
            // code...

            $new_start_date_third_contract=intval($end_date) + intval($twentyfourhours);

            if ($new_start_date_third_contract > $_SESSION['expiry_date_1']) {
            	// code...
            	$new_start_date = $_SESSION['expiry_date_1'];
            }else{
            	$new_start_date = $new_start_date_third_contract;
            }

            // $new_end_date = $_SESSION['expiry_date_1'];

            if (createThirdChildContract($mysqli, $_SESSION['contract_name_1'], $_SESSION['contractToken_1'], $_SESSION['hoteltoken_1'], $_SESSION['roomtoken_1'], $_SESSION['room_desc_1'], $_SESSION['dmctoken_1'], $_SESSION['hotel_owner_1'], $_SESSION['account_owner_1'], $_SESSION['hotelname_1'], $_SESSION['hotel_desc_1'], $_SESSION['room_name_1'], $new_start_date, $_SESSION['expiry_date_1'], $_SESSION['status_1'], $_SESSION['child_age_From_1'], $_SESSION['child_age_To_1'], $_SESSION['currency_1'], $_SESSION['release_date_1'], $timestamp, $_SESSION['business_name_1'], $_SESSION['city_1'], $_SESSION['country_1'], $room, $_SESSION['price_sgl_1'], $_SESSION['price_dbl_1'], $_SESSION['price_trl_1'], $_SESSION['price_qud_1'], $_SESSION['price_chd1_1'], $_SESSION['price_chd2_1'], $_SESSION['inventory_room_1'], $_SESSION['inventory_rel_1'], $id, $_SESSION['room_category_1'], $_SESSION['twn_1'], $_SESSION['unit_1'])===true) {


                // echo "Done!";
				$array = [
					'success' => true,
					'message' => "Price Contract created successfully."
				];
				$return = json_encode($array);
				echo "$return";
                unset($_SESSION);
				exit();
            }else{
                // echo "error one";
            	$array = [
					'success' => true,
					'message' => "Failed to update to create the third child contract."
				];
				$return = json_encode($array);
				echo "$return";
				exit();
            }
        }else{
							            // echo "error two";
	        	$array = [
					'success' => true,
					'message' => "Failed to update end date for the old contract."
				];
				$return = json_encode($array);
				echo "$return";
				exit();
	        }

		}else{
			$array = [
				'success' => true,
				'message' => "Failed to update relay1 for the old contract."
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}
	} else {
		// code...
		$array = [
			'success' => false,
			'message' => "Something went wrong. Failed to create price contract."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
	}
}else{
	$array = [
		'success' => false,
		'message' => "This availability has been updated in the past."
	];
	$return = json_encode($array);
	echo "$return";
	exit();
}
					
	    }else{
	        // echo "error three";
	       	$array = [
				'success' => true,
				'message' => "Failed Something went wrong."
			];
			$return = json_encode($array);
			echo "$return";
			exit(); 
	    }

	// check old contract

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
				'message' => "Please enter a dmc token....dmc token is not set"
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