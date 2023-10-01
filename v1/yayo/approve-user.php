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

$admintoken = input_check($data->admintoken);
$usertoken = input_check($data->usertoken);

if (isset($data->apptoken)) {

    $apptoken = input_check($data->apptoken);

    if (CheckToken($mysqli, $apptoken) == true) {

        if (empty($usertoken) || empty($admintoken)) {
            # code...
            $array = array(
                'success' => false,
                'message' => "Admin token or user token cannot be empty"
            );
            echo json_encode($array);
            exit();
        }

        if (!checkUserIsAdmin($mysqli, $admintoken)) {
            # code...
            $array = array(
                'success' => false,
                'message' => "Unauthorized access! This resource can only be accessed by the admin"
            );
            echo json_encode($array);
            exit();
        }

        if (approveUser($mysqli, $usertoken) === true) {
            # code...
            $array = array(
                'success' => true,
                'message' => "$usertoken has been approved."
            );
            echo json_encode($array);
            exit();
        } else {
            $array = array(
                'success' => false,
                'message' => "Something went wrong! Failed to approve $usertoken. Please try again"
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
