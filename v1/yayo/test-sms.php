<?php
header('Content-Type: application/json');

require __DIR__ . '/../../vendor/autoload.php';

use Twilio\Rest\Client;

require('../../aaconfig.php');
require('../../data.php');
require('../../functions.php');
require('../../functions2.php');

// include('../../mailer.php');
include('../../sms.php');
include('../../engine.php');

$timestamp = time();

// if (isset($_REQUEST['apptoken'])) {

//     $apptoken = input_check($_REQUEST['apptoken']);

//     if (CheckToken($mysqli, $apptoken)===true) {

        $type="";
        $log= "";

        $usertoken = input_check($_REQUEST['usertoken']);
        $amount = input_check($_REQUEST['amount']);
        $email = input_check($_REQUEST['email']);

        


//     }else{
//         $array = [
//             'success' => false,
//             'message' => "Unauthorized access..contact support"
//         ];
//         $return = json_encode($array);
//         echo "$return";
//         exit();
//     }
// }else{
//     $array = [
//         'success' => false,
//         'message' => "Token not set.."
//     ];
//     $return = json_encode($array);
//     echo "$return";
//     exit();
// }
