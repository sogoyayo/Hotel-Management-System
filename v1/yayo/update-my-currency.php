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

$usertoken = input_check($data->usertoken);
$currency = input_check($data->currency);

if (isset($data->apptoken)) {

    $apptoken = input_check($data->apptoken);

    if (CheckToken($mysqli, $apptoken) == true) {

        if (empty($usertoken) || empty($currency)) {
            # code...
            $array = array(
                'success' => false,
                'message' => "The required fields cannot be empty"
            );
            echo json_encode($array);
            exit();
        }

        // code...
        if (updateUserCurrency($mysqli, $usertoken, $currency)) {
            // code...
            $array = [
                'success' => true,
                'message' => "Currency updated successfully."
            ];
            $return = json_encode($array);
            echo "$return";
            exit();
            exit();
        } else {
            $array = [
                'success' => false,
                'message' => "Failed to update. Try again."
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
