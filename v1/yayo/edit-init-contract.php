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

$data = file_get_contents('php://input');
$data = json_decode($data);

$contractToken = input_check($data->contractToken);
$contract_name = input_check($data->contract_name);
$child_age_From = input_check($data->child_age_From);
$child_age_To = input_check($data->child_age_To);
$status = input_check($data->status);

if (isset($data->apptoken)) {

	$apptoken = input_check($data->apptoken);

	if (CheckToken($mysqli, $apptoken) == true) {

		if (empty($contract_name) || empty($child_age_From) || empty($child_age_To) || empty($status)) {
			# code...
			$array = array(
				'success' => false,
				'message' => "Empty fields. Please provide the required values."
			);
			echo json_encode($array);
			exit();
		}

		if ($child_age_From >= $child_age_To) {
			# code...
			$array = array(
				'success' => false,
				'message' => "$child_age_From cannot be greater than $child_age_To. Please provide the correct values"
			);
			echo json_encode($array);
			exit();
		}
		// code...
		if (editInitiatedContract($mysqli, $contract_name, $contractToken, $child_age_From, $child_age_To, $status) === true) {
			// code...
			$array = [
				'success' => true,
				'message' => "Contract updated successfully."
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		} else {
			$array = [
				'success' => false,
				'message' => "This Markup does not exist."
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}
	} else {
		$array = array(
			'success' => false,
			'message' => "Unauthorized access..contact support"
		);
		echo json_encode($array);
		exit();
	}
} else {
	$array = array(
		'success' => false,
		'message' => "Token not set.."
	);
	echo json_encode($array);
	exit();
}
