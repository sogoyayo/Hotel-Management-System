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

		$day = intval(input_check($_REQUEST['day']));
		$package_id = input_check($_REQUEST['package_id']);
		
		$timestamp = time();

		if (($day=='') or ($package_id=='')) {
			// code...
            $array = [
                'success' => false,
                'message' => "Empty field"
            ];
            $return = json_encode($array);
            echo "$return";
            exit();	

		}else{
			if (checkPackageDayExist($mysqli, $day, $package_id)===false) {
                # code...
                if (createPackageDay($mysqli,$package_id, $day, $timestamp)===true) {
                    # code...
                    $array = [
                        'success' => true,
                        'message' => "Package day created"
                    ];
                    $return = json_encode($array);
                    echo "$return";
                    exit();
                }else {
                    # code...
                    $array = [
                        'success' => false,
                        'message' => "Package day created"
                    ];
                    $return = json_encode($array);
                    echo "$return";
                    exit();
                }
            } else {
                # code...
                $array = [
                    'success' => false,
                    'message' => "Package day already exist. Please pick a diferent day"
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