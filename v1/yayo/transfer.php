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

    if (CheckToken($mysqli, $apptoken)===true) {

        $type="";
        $log= "";

        $usertoken = input_check($_REQUEST['usertoken']);
        $amount = input_check($_REQUEST['amount']);
        $email = input_check($_REQUEST['email']);

if (!empty($_POST['note'])) {
    // code...
    $note = $_POST['note'];
    $_SESSION['note'] = $_POST['note'];
}

        $senderMail = GetUserMail($mysqli, $usertoken);

        $walletBalance = intval(GetWalletBalance($mysqli, $usertoken));

        if (($usertoken=='') or ($amount=='') or ($email=='')) {
            # code...
            $array = [
                'success' => false,
                'message' => "Empty fields."
            ];
            $return= json_encode($array);
            echo "$return";
            exit();
        }else { 
            if ($walletBalance > $amount) {
                # code...
                $type="debit";
				$db_amount = "-$amount";
				$log= "The transfer of $amount to $email was successful.";

                if (wallet($mysqli, $usertoken, $type, $log, $db_amount, $timestamp) === true) {
                    # code...
                    
                    $recipient = getUserToken_mail($mysqli, $email);
                    $type="credit";
                    $log= "The transfer of $amount from $senderMail was successful.";
                    
                    if (wallet($mysqli, $recipient, $type, $log, $amount, $timestamp) === true) {
                        # code...
                        $subject_transfer="Transfer Confirmation";
                        $body_transfer="You have just made a transfer of $amount to $email";
                        
                        mail_tb($mysqli, $email, $subject_transfer, $body_transfer, $timestamp);


                        $subject="Transfer Confirmation";
                        $body="You have just recieved an amount of $amount in your ".APPNAME." wallet from $senderMail";

                        mail_tb($mysqli, $email, $subject, $body, $timestamp);

                        $senderFullname = GetUserName($mysqli, $usertoken);
                        $recipientFullname = GetUserName($mysqli, $recipient);
                        $transaction_id = getThisTransactionID($mysqli, $usertoken, $timestamp);

                        $array = [
                            'success' => true,
                            'message' => "Transfer successful",
                            'transaction_id' => "$transaction_id",
                            'senderFullname' => "$senderFullname",
                            'recipientFullname' => "$recipientFullname",
                            'senderMail' => "$senderMail",
                            'recipientToken' => "$recipient",
                            'recipientMail' => "$email",
                            'senderToken' => "$usertoken",
                            'amount' => "$amount",
                            'timestamp' => "$timestamp"
                        ];
                        $return= json_encode($array);
                        echo "$return";
                        exit();

                    } else {
                        # code...
                        $type="credit";
                        $log= "A refund from the reversal of the failed transaction of $amount.";

                        if (wallet($mysqli, $usertoken, $type, $log, $amount, $timestamp) === true) {
                            # code...
                            $array = [
                                'success' => true,
                                'message' => "Refund was successful"
                            ];
                            $return= json_encode($array);
                            echo "$return";
                            exit();

                        } else {
                            # code...
                            $array = [
                                'success' => false,
                                'message' => "An error occurred during the reversal process...we will fix it shortly"
                            ];
                            $return= json_encode($array);
                            echo "$return";
                            exit();
                        }
                        
                    }   
                    
                } else {
                    # code...
                    $array = [
                        'success' => false,
                        'message' => "Failed transaction, unable to debit. Please try again..."
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