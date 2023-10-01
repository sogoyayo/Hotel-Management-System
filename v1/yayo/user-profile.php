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
$db = new db();
$data = file_get_contents('php://input');
$data = json_decode($data);

if (isset($data->apptoken)) {

    $apptoken = input_check($data->apptoken);

    if (CheckToken($mysqli, $apptoken) == true) {

if (!empty($data->usertoken)) {
    // code...
    $usertoken = input_check($data->usertoken);

     if (empty($usertoken)) {
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

        if (getUserDetails_token($mysqli, $usertoken)) {
            # code...
            $currencyData = getCurrencyWithID($db, $_SESSION['currency']);
            $array = array(
                'success' => true,
                'message' => "users profile",
                'usertoken' => "" . $_SESSION['usertoken'] . "",
                'mail' => "" . $_SESSION['mail'] . "",
                'firstname' => "" . $_SESSION['fullname'] . "",
                'lastname' => "" . $_SESSION['lastname'] . "",
                'phone' => "" . $_SESSION['phone'] . "",
                'role' => "" . $_SESSION['role'] . "",
                'address' => "" . $_SESSION['address'] . "",
                'payoneer_linked' => "" . $_SESSION['payoneer_linked'] . "",
                'stripe_id' => "" . $_SESSION['stripe_id'] . "",
                'isApproved' => "" . $_SESSION['is_approved'] . "",
                'currency' => "" . $currencyData['symbol'] . "",
                // 'payoneer_token' => "" . $_SESSION['payoneer_token'] . "",
                // 'payoneer_registration_link' => "" . $_SESSION['payoneer_registration_link'] . "",
                // 'proof_of_id' => "" . $_SESSION['proof_of_id'] . "",
                // 'comp_reg_cert' => "" . $_SESSION['comp_reg_cert'] . "",
                // 'proof_of_address' => "" . $_SESSION['proof_of_address'] . "",
                'zip_code' => "" . $_SESSION['zip_code'] . "",
                'country' => "" . $_SESSION['country'] . "",
                'state' => "" . $_SESSION['state'] . "",
                'city' => "" . $_SESSION['city'] . "",
                'stripe_linked' => "".$_SESSION['stripe_linked'].""
            );
            // $array = array(
            //     'success' => true,
            //     'message' => "Your profile has been updated."
            // );
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

}else{
    $array = array(
'success' => false,
            'message' => "Usertoken is missing"
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
