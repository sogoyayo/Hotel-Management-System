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
$address = input_check($data->address);
$phone = input_check($data->phone);
$fname = input_check($data->fname);
$lname = input_check($data->lname);
$country = input_check($data->country);
$city = input_check($data->city);

$state = input_check($data->state);
$zip_code = input_check($data->zip_code);

// $proof_of_id = json_encode($data->proof_of_id);
// $company_reg_cert = json_encode($data->company_reg_cert);
// $proof_of_address = json_encode($data->proof_of_address);

$proof_of_id = json_encode(input_check($data->proof_of_id));
$company_reg_cert = json_encode(input_check($data->company_reg_cert));
$proof_of_address = json_encode(input_check($data->proof_of_address));


if (isset($data->apptoken)) {

    $apptoken = input_check($data->apptoken);

    if (CheckToken($mysqli, $apptoken) == true) {

        if (empty($usertoken) || empty($fname) || empty($lname) || empty($address) || empty($phone) || empty($country) || empty($city) || empty($state) || empty($zip_code) || empty($proof_of_id) || empty($company_reg_cert) || empty($proof_of_address)) {
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

        if (updateUserProfile($mysqli, $usertoken, $fname, $lname, $address, $phone, $country, $city, $state, $zip_code, $proof_of_id, $company_reg_cert, $proof_of_address) === true) {
            # code...
            $array = array(
                'success' => true,
                'message' => "Your profile has been updated."
            );
            echo json_encode($array);
            exit();
        } else {
            $array = array(
                'success' => false,
                'message' => "Something went wrong! Failed to update profile. Please try again"
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
