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

		$package_name = input_check($_REQUEST['package_name']);

		$timestamp = time();

		if (!empty($package_name)) {
			// code...
			$package_id = generateAlphaNumericOTP(6);

			if (createPackage($mysqli, $package_name, $package_id, $timestamp)===true) {
				# code...
				$array = [
					'success' => true,
					'message' => "Package has been created",
					'package_id' => "$package_id",
					'package_name' => "$package_name"
				];
				$return = json_encode($array);
				echo "$return";
				unset($_SESSION);
				exit();	
			} else {
				# code...
				$array = [
					'success' => false,
					'message' => "Failed to create package"
				];
				$return = json_encode($array);
				echo "$return";
				unset($_SESSION);
				exit();	
			}
		}else{
			$array = [
				'success' => false,
				'message' => "The package name is empty. please fill in the package name"
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