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

        $type="";
        $log= "";

        $usertoken = input_check($_REQUEST['usertoken']);
        $amount = input_check($_REQUEST['amount']);
        $options = input_check($_POST['options']);
        $currency = input_check($_POST['currency']);

        $walletBalance = intval(GetWalletBalance($mysqli, $usertoken));

        if (($usertoken=='') or ($amount=='')) {
            # code...
            $array = [
                'success' => false,
                'message' => "Empty fields."
            ];
            $return= json_encode($array);
            echo "$return";
            exit();
        }else { 
            $type="debit";
            $db_amount = "-$amount";
            $log= "A withdrawal of $amount was made";

            if ($walletBalance > $amount) {

                if (wallet($mysqli, $usertoken, $type, $log, $db_amount, $timestamp) === true) {
                    #code...
                    if (insertWithdrawalTransaction($mysqli, $usertoken, $amount, $timestamp, $options, $currency)===true) {
                        # code...
                        $array = [
                            'success' => true,
                            'message' => "Withdraw successful"
                        ];
                        $return= json_encode($array);
                        echo "$return";
                        exit();
                    } else {
                        # code...
                        $array = [
                            'success' => false,
                            'message' => "Something went wrong.."
                        ];
                        $return= json_encode($array);
                        echo "$return";
                        exit();
                    }
                
                }else{
                    $array = [
                        'success' => false,
                        'message' => "Please try again. The withdrawal failed"
                    ];
                    $return= json_encode($array);
                    echo "$return";
                    exit();
                }
            } else {
                # code...
                $array = [
                    'success' => false,
                    'message' => "Insufficient balance.."
                ];
                $return= json_encode($array);
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