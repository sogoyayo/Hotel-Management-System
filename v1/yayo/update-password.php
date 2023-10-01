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

$current_password = md5(input_check($data->currentPassword));
$new_password = md5(input_check($data->newPassword));
$confirm_password = input_check($data->confirmPassword);
$usertoken = input_check($data->usertoken);

if (isset($data->apptoken)) {

	$apptoken = input_check($data->apptoken);

	if (CheckToken($mysqli, $apptoken)==true) {

		if (empty($data->usertoken) || empty($data->currentPassword) || empty($data->newPassword) || empty($data->confirmPassword)) {
            # code...
            $array = array(
                'success' => false,
                'message' => "Empty fields..."
            );
            echo json_encode($array);
            exit();
        }

        // check if the user current password exist  
        if (!checkPasswordExist($mysqli, $usertoken, $current_password)) {
            # code...
            $array = array(
                'success' => false,
                'message' => "Password does not exit...Enter a valid password"
            );
            echo json_encode($array);
            exit();
        } 

		if ($data->newPassword !== $data->confirmPassword) {
            # code...
            $array = array(
                'success' => false,
                'message' => "Your new password and confirm passowrd do not match"
            );
            echo json_encode($array);
            exit();
        } 

		if (updatePassword($mysqli, $usertoken, $new_password)) {
            # code...
            $array = array(
                'success' => true,
                'message' => "Your password has been updated."
            );
            echo json_encode($array);
            exit();
        } else {
            $array = array(
                'success' => false,
                'message' => "Something went wrong! Failed to update password. Please try again."
            );
            echo json_encode($array);
            exit();
        } 

	}else{
		$array = array(
			'success' => false,
			'message' => "Unauthorized access..contact support"
		);
		echo json_encode($array);
		exit();
	}
}else{
	$array = array(
		'success' => false,
		'message' => "Token not set.."
	);
	echo json_encode($array);
		exit();
}
