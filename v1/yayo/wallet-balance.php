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

        $usertoken=input_check($_REQUEST['usertoken']);

        if (!empty($usertoken)) {
            // code...
            $walletBalance = GetWalletBalance($mysqli, $usertoken);
            if ($walletBalance == 0 || $walletBalance == '') {
                # code...
                $array = [
                    'success' => true,
                    'message' => "Your wallet balance is empty",
                    'walletbalance' => "0"
                ];
                $return= json_encode($array);
                echo "$return";
                exit();
            } else {
                # code...
                $array = [
                    'success' => true,
                    'message' => "Your wallet balance is $walletBalance...",
                    'walletbalance' => "$walletBalance"
                ];
                $return= json_encode($array);
                echo "$return";
                exit();
            }
        }else { 
            $array = [
                'success' => false,
                'message' => "Empty field",
            ];
            $return= json_encode($array);
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