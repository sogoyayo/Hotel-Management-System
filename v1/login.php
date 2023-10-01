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

if (CheckToken($mysqli, $apptoken)==true) {
	
		# code...
		$mail=input_check($_POST['mail']);
		$pword=input_check(md5($_POST['password']));

if (($mail=='') or ($pword=='')) {
	# code...
		$array = [
			'success' => false,
			'message' => "Empty fields...."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
}else{
	
if (CheckMailExist($mysqli, $mail)==true) {
	
	// if (CheckActivated($mysqli, $mail)==true) {

	if (SignIn($mysqli, $mail, $pword)==true) {

		if (updateUserIP($mysqli, $ip, $_SESSION['token'])===true) {
		
			if (!empty($_POST['longitude'])) {
				// code...
				if (!empty($_POST['latitude'])) {
					// code...
					$longitude = input_check($_POST['longitude']);
					$latitude = input_check($_POST['latitude']);

					updateUserLocation($mysqli, $longitude, $latitude, $_SESSION['token']);
				}
			}
		}
			$timeregistered = datediff($_SESSION['timestamp'], $timestamp);

			$array = [
				'success' => true,
				'message' => "Login successful",
				'mail' => "".$_SESSION['mail']."",
				'fname' => "".$_SESSION['fname']."",
				'lname' => "".$_SESSION['lname']."",
				'phone' => "".$_SESSION['phone']."",
				'role' => "".$_SESSION['role']."",
				'address' => "".$_SESSION['address']."",
				'usertoken' => "".$_SESSION['token']."",
				'timeregistered' => "$timeregistered"
				
			];
			$return = json_encode($array);
			echo "$return";

			// unset($_SESSION['fullname']);
			// unset($_SESSION['mail']);
			// unset($_SESSION['usertoken']);
			exit();
	}else{
		# code...
		$array = [
			'success' => false,
			'message' => "Incorrect Password for $mail."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
	}
// }else{
// 	$array = [
// 			'success' => false,
// 			'message' => "Your account has not been activated. Please check your email for your activation details."
// 		];
// 		$return = json_encode($array);
// 		echo "$return";
// 		exit();
// }
}else{
	# code...
	$array = [
			'success' => false,
			'message' => "$mail does not exist."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
}
}
}else{
	$array = [
			'success' => false,
			'message' => "Invalid token."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
}

}else{
		$array = [
			'success' => false,
			'message' => "Token not set.."
		];
		$return = json_encode($array);
		echo "$return";
		exit();
}
# end of user register
 

 ?>