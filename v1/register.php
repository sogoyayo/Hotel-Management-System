<?
header('Content-Type: application/json');

require('../aaconfig.php');
require('../data.php');
require('../functions.php');
require('../functions2.php');

// include('../mailer.php');
include('../sms.php');
include('../engine.php');

$timestamp = time();

if (isset($_REQUEST['apptoken'])) {

$apptoken = input_check($_REQUEST['apptoken']);

// echo"the apptoken is - $apptoken";
// exit();

if (CheckToken($mysqli, $apptoken)==true) {
	
		# code...
		if ($_POST['password'] == $_POST['cpassword']) {
			// code...
		
if (($_POST['mail']=='') or ($_POST['password']=='')) {
	# code...
		$array = [
			'success' => false,
			'message' => "Empty fields"
		];

		$return = json_encode($array);
		echo "$return";
		exit();
		
}else{
	$mail = input_check($_POST['mail']);
	$pword = input_check(md5($_POST['password']));
	$address = input_check($_POST['address']);
	$phone = input_check($_POST['phone']);
	$fname = input_check($_POST['fname']);
	$lname = input_check($_POST['lname']);
	$role = input_check($_POST['role']);
	$country = input_check($_POST['country']);
	$city = input_check($_POST['city']);
	$state = input_check($_POST['state']);
	$zip_code = input_check($_POST['zipCode']);

if (CheckMailExist($mysqli, $mail)==false) {
	# code...
	if (InsertUserData($mysqli, $fname, $lname, $mail, $phone, $address, $pword, $timestamp, $role, $ip, $country, $city, $state, $zip_code)==true) {
		
		$array = [
			'success' => true,
			'message' => "Registration successful",
			'firstname' => "".$_SESSION['fname']."",
			'lastname' => "".$_SESSION['lname']."",
			'token' => "".$_SESSION['usertoken']."",
			'mail' => "".$_SESSION['mail'].""
		];
		$return = json_encode($array);
		echo "$return";

		unset($_SESSION);
		exit();
	}else{
		# code...
		$array = [
			'success' => false,
			'message' => "Registration not completed please try again."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
	}

}else{
	# code...
	$array = [
			'success' => false,
			'message' => "$mail already exists."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
}
}
}else{
	$array = [
			'success' => false,
			'message' => "Password does not match."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
}
}else{
	$array = [
			'success' => false,
			'message' => "Invalid token set."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
}

}else{
	$array = [
			'success' => false,
			'message' => "Token not set."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
}
# end of user register
 

 ?>