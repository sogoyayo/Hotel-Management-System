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

$policy_content = input_check($data->policy_content);
$contractToken = input_check($data->contractToken);

if (isset($data->apptoken)) {

    $apptoken = input_check($data->apptoken);

    if (CheckToken($mysqli, $apptoken) == true) {

        if (empty($contractToken) || empty($policy_content)) {
            # code...
            $array = array(
                'success' => false,
                'message' => "Please provide the required fields"
            );
            echo json_encode($array);
            exit();
        }

        if (createCancelationPolicy($mysqli, $policy_content, $contractToken, $timestamp) === true) {
            # code...
            $array = array(
                'success' => true,
                'message' => "Cancelation policy created successfully."
            );
            echo json_encode($array);
            exit();
        } else {
            $array = array(
                'success' => false,
                'message' => "Something went wrong. Failed to create cancelation policy. Please try again"
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
