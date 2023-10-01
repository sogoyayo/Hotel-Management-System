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

		if (!empty($_POST['description'])) {

			if (!empty($_POST['creator_token'])) {
				// code...
				if (!empty($_POST['hotelname'])) {
					// code...

					$hotelname = strtoupper(input_check_large($_POST['hotelname']));
					$description = input_check($_POST['description']);
					$usertoken = input_check($_POST['creator_token']);
					$location = strtoupper(input_check($_POST['location']));
					$token = generateNumericOTP(6);
					// $token = $token.$timestamp;
					// $token = intval($token);

					if (checkHotelExist($mysqli, $hotelname)===false) {
						// code...

						// if (check_hotel_token($mysqli, $token)==false) {
						
							if ($_FILES['avatar']) {

								$filename = $_FILES['avatar']['name']; 
								$filesize = $_FILES['avatar']['size']; 
								$filetype = $_FILES['avatar']['type'];

								if (!file_exists('../uploads/$token')) {
									// code...
									mkdir('../uploads/$token');
								}

								$target_dir = "../uploads/$token";
								$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
								$uploadOk = 1;
								$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

								// Check if file already exists
								if (file_exists($target_file)) {
								  	//  echo "Sorry, file already exists.<br> <a href=''>Proceed</a>";
							    	$array = [
										'success' => false,
										'message' => "Sorry, file already exists, change the file name."
									];
									$return= json_encode($array);
									echo "$return";

								    $uploadOk = 0;
								    exit();
								}
								// Check file size
								if ($_FILES["avatar"]["size"] > 25000000) {
								  	//  echo "Sorry, your file is too large.";
							    	$array = [
									'success' => false,
									'message' => "Sorry, your file is too large. File should not be more than 25MB."
									];
									$return= json_encode($array);
									echo "$return";
								    $uploadOk = 0;
								    exit();
								}

								// Allow certain file formats
								if($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "gif") {
								   // echo "Sorry, only images are allowed.";
								   	$array = [
									'success' => false,
									'message' => "Sorry, only images are allowed. Only JPG, JPEG, PNG and GIF file types are allowed"
									];
									$return= json_encode($array);
									echo "$return";
								    $uploadOk = 0;
								    exit();
								}
								// Check if $uploadOk is set to 0 by an error
								if ($uploadOk == 0) {
								   	$array = [
									'success' => false,
									'message' => "Sorry your file could not be uploaded, try again."
									];
									$return= json_encode($array);
									echo "$return";
								    exit;
								// if everything is ok, try to upload file
								} else {
								    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
										$file_path=BACKURL.'/$target_dir/'.$filename;

										if (createHotel($mysqli, $token, $hotelname, $description, $usertoken, $location)==true) {
											// code...
											if (AddImage($mysqli, $token, $file_path)==true) {
												// code...
												$array = [
													'success' => true,
													'message' => "$hotelname created.",
													'token' => "$token"
												];
												$return = json_encode($array);
												echo "$return";
												exit();
											}
										}else{
											$array = [
													'success' => false,
													'message' => "Something went wrong, please try again later.."
												];
												$return = json_encode($array);
												echo "$return";
												exit();
										}
									}else{
									  	$array = [
										'response' => "00",
										'message' => "Error, image not uploaded. Try again"
										];
										$return= json_encode($array);
										echo "$return";
										exit();
									}
								}
    						} else {    	
    							if (createHotel($mysqli, $token, $hotelname, $description, $usertoken, $location)==true) {
									// code...
								    $array = [
										'success' => true,
										'message' => "$hotelname created.",
										'token' => "$token"
									];
									$return = json_encode($array);
									echo "$return";
									exit();
								}else{
									$array = [
										'success' => false,
										'message' => "Something went wrong, please try again later!.."
									];
									$return = json_encode($array);
									echo "$return";
									exit();
								}
    						}
						// }else{
						// 	$id = $_SESSION['id'];
						// 	$array = [
						// 		'success' => false,
						// 		'message' => "Something went wrong, please try again in a moment..$token - $id"
						// 	];
						// 	$return = json_encode($array);
						// 	echo "$return";
						// 	unset($_SESSION);
						// 	exit();
						// }
					}else{
						$array = [
							'success' => false,
							'message' => "Hotel name already exist"
						];
						$return = json_encode($array);
						echo "$return";
						exit();
					}
				}else{
					$array = [
						'success' => false,
						'message' => "Hotel name not known, please provide the name of the hotel"
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}
			}else{
				$array = [
					'success' => false,
					'message' => "User not known, please try again.."
				];
				$return = json_encode($array);
				echo "$return";
				exit();
			}
		}else{
			$array = [
				'success' => false,
				'message' => "Hotel description not known, please provide the description of the hotel"
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}
	}else{
		$array = [
			'success' => false,
			'message' => "Unauthorized access..contact support"
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

?>