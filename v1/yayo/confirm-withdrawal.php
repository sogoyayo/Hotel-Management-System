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
        
        $withdrawal_id = input_check($_REQUEST['id']);

        if (!empty($withdrawal_id)) {
            # code...
            if (confrimWithdrawal ($mysqli, $withdrawal_id)===true) {
                // code...
                $array = [
                    'success' => true,
                    'message' => "Withdrawal confirmed."
                ];
                $return= json_encode($array);
                echo "$return";
            }else{
                $array = [
                    'success' => false,
                    'message' => "Failed to confirm withdrawal. Please try again."
                ];
                $return = json_encode($array);
                echo "$return";
                exit();
            }
        } else {
            # code...
            $array = [
                'success' => false,
                'message' => "Empty fields..."
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