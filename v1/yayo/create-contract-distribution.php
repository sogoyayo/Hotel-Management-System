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

$contractToken = input_check($data->contractToken);
$country = input_check($data->country);

if (isset($data->apptoken)) {

    $apptoken = input_check($data->apptoken);

    if (CheckToken($mysqli, $apptoken) == true) {

        if (empty($country) || empty($contractToken)) {
            # code...
            $array = array(
                'success' => false,
                'message' => "The required fields cannot be empty"
            );
            echo json_encode($array);
            exit();
        }

        if (checkDistribution($mysqli, $contractToken, $country)==false) {
                    // code...   
    if (createContractDistribution_($mysqli, $contractToken, $country, $timestamp)) {
            // code...
            $array = [
                'success' => true,
                'message' => "Created successfully."
            ];
            $return = json_encode($array);
            echo "$return";
            exit();
            exit();
        } else {
            $array = [
                'success' => false,
                'message' => "Failed to create. Try again."
            ];
            $return = json_encode($array);
            echo "$return";
            exit();
        }
    }else{
        $array = array(
            'success' => false,
            'message' => "Distribution already exist.."
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
