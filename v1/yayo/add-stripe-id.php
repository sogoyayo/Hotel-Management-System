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
$stripe_id = input_check($data->stripe_id);

if (isset($data->apptoken)) {

    $apptoken = input_check($data->apptoken);

    if (CheckToken($mysqli, $apptoken) == true) {

        if (empty($usertoken) || empty($stripe_id)) {
            # code...
            $array = array(
                'success' => false,
                'message' => "Empty fields..."
            );
            echo json_encode($array);
            exit();
        }

        if (!checkUserExist($mysqli, $usertoken)) {
            # code...
            $array = array(
                'success' => false,
                'message' => "Invalid user."
            );
            echo json_encode($array);
            exit();
        }

        if (addStripeId($mysqli, $usertoken, $stripe_id) === true) {
            # code...
            $array = array(
                'success' => true,
                'message' => "Stripe token has been updated."
            );
            echo json_encode($array);
            exit();
        } else {
            $array = array(
                'success' => false,
                'message' => "Something went wrong! Failed to add stripe token. Please try again"
            );
            echo json_encode($array);
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
