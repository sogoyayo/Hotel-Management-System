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

$day_id = intval(input_check($_REQUEST['day_id']));
$seller_type = strtoupper(input_check($_REQUEST['seller_type']));
$seller = input_check($_REQUEST['seller']);
$package_type = strtoupper(input_check($_REQUEST['package_type']));
$package_type_id = input_check($_REQUEST['package_type_id']);
$package_id = input_check($_REQUEST['package_id']);
$seller_type_name = GetUserName($mysqli, $seller);
$package_type_name = getPackageTypeName($mysqli, $package_type, $package_type_id);
$country = input_check($_POST['country']);
$contractToken = input_check($_POST['contract_token']);
$roomtoken = input_check($_POST['roomtoken']);
        
        $timestamp = time();

		if (($day_id=='') or ($seller_type=='') or ($seller=='') or ($package_type=='') or ($package_type_id=='') or ($package_id=='')) {
			// code...
            $array = [
                'success' => false,
                'message' => "Empty fields..."
            ];
            $return = json_encode($array);
            echo "$return";
            unset($_SESSION);
            exit();	

		}else{
            # code...
            if (createPackageItem($mysqli, $day_id, $seller_type, $seller, $package_type, $package_type_id, $package_id, $seller_type_name, $package_type_name, $timestamp, $country, $contractToken, $roomtoken)===true) {
                # code...
                $array = [
                    'success' => true,
                    'message' => "Package item created"
                ];
                $return = json_encode($array);
                echo "$return";
                unset($_SESSION);
                exit();
            }else {
                # code...
                $array = [
                    'success' => false,
                    'message' => "Failed to create Package item"
                ];
                $return = json_encode($array);
                echo "$return";
                unset($_SESSION);
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