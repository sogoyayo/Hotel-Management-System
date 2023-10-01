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

        $systemWalletBalance = GetSystemWalletBalance($mysqli);

        if ($systemWalletBalance) {
            # code...
        
            $array = [
                'success' => true,
                'message' => "The system's wallet balance is $systemWalletBalance...",
                'systemWalletBalance' => "$systemWalletBalance"
            ];
            $return= json_encode($array);
            echo "$return";
            exit();
        }else { 
            $array = [
                'success' => false,
                'walletbalance' => "0",
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