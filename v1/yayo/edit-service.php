<?
header('Content-Type: application/json');

require('../../aaconfig.php');
require('../../data.php');
require('../../functions.php');
require('../../functions2.php');

// include('../../mailer.php');
// include('../../sms.php');
include('../../engine.php');


if (isset($_REQUEST['apptoken'])) {
	
	$apptoken = input_check($_REQUEST['apptoken']);
	
	if (CheckToken($mysqli, $apptoken)==true) {
		
		$id = input_check($_REQUEST['id']);
		$usertoken = input_check($_REQUEST['usertoken']);
		$service_name = input_check($_REQUEST['service_name']);
		$date_from = strtotime(input_check($_REQUEST['date_from']));
		$date_to = strtotime(input_check($_REQUEST['date_to']));
		$location = input_check($_REQUEST['location']);
		$country = input_check($_REQUEST['country']);
		$city = input_check($_REQUEST['city']);
		$longitude = input_check($_REQUEST['longitude']);
		$latitude = input_check($_REQUEST['latitude']);
		$description = addslashes($_REQUEST['description']);
		$social_media_link = input_check($_REQUEST['social_media_link']);
		$youtube_link = input_check($_REQUEST['youtube_link']);
		$price_adult = input_check($_REQUEST['price_adult']);
		$price_child = input_check($_REQUEST['price_child']);
		$child_age_from = input_check($_REQUEST['child_age_from']);
		$child_age_to = input_check($_REQUEST['child_age_to']);
		$discounts = input_check($_REQUEST['discounts']);
		$discount_from = strtotime(input_check($_REQUEST['discount_from']));
		$discount_to = strtotime(input_check($_REQUEST['discount_to']));
		$min_pax_discount = input_check($_REQUEST['min_pax_discount']);
		
		$timestamp = time();

		if (($id=='') or ($usertoken=='') or ($service_name=='') or ($date_from=='') or ($date_to=='') or ($location=='') or ($country=='') or ($city=='') or ($longitude=='') or ($latitude=='') or ($description=='') or ($price_adult=='') or ($price_child=='') or ($child_age_from=='') or ($child_age_to=='') or ($min_pax_discount=='')) {
			// code...
			$array = [
				'success' => false,
				'message' => "Empty fields.."
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{

			// $new_date_from = intval(date("Ymd", $date_from));
			// $new_discount_from = intval(date("Ymd", $discount_from));
			// $datenow = intval(date("Ymd"));

			// if (($new_date_from >= $datenow) and ($new_discount_from >= $datenow)) {
				// code...

				if (($date_to >= $date_from) and ($discount_to >= $discount_from)) {

					if ($_FILES['avatar']) {

						$filename = $_FILES['avatar']['name']; 
						$filesize = $_FILES['avatar']['size']; 
						$filetype = $_FILES['avatar']['type'];
						$newFilename= $timestamp . "_" . $filename;

						$target_dir = "./uploads/";
						$target_file = $target_dir .  $timestamp . "_" . basename($_FILES["avatar"]["name"]);
						$uploadOk = 1;
						$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

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
						if($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType !== "pdf" ) {
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
								$fileURL= BACKURL."/v1/yayo/uploads/".$newFilename;

								if (editService($mysqli, $usertoken, $service_name, $date_from, $date_to, $location, $country, $city, $longitude, $latitude, $description, $social_media_link, $filename, $fileURL, $youtube_link, $price_adult, $price_child, $child_age_from, $child_age_to, $discounts, $discount_from, $discount_to, $min_pax_discount, $id)==true) {
									// code...
									$array = [
										'success' => true,
										'message' => "Service edited."
									];
									$return= json_encode($array);
									echo "$return";
									exit();
								}else{
									$array = [
										'success' => false,
										'message' => "Something went wrong, Try again."
									];
									$return= json_encode($array);
									echo "$return";
									exit();
								}
							}else{
								$array = [
									'success' => false,
									'message' => "Error, image not uploaded, message not sent. Try again"
								];
								$return= json_encode($array);
								echo "$return";
								exit();
							}
						}       
					}else{
						$fileURL = 0;
						$filename = 0;
						if (editService($mysqli, $usertoken, $service_name, $date_from, $date_to, $location, $country, $city, $longitude, $latitude, $description, $social_media_link, $filename, $fileURL, $youtube_link, $price_adult, $price_child, $child_age_from, $child_age_to, $discounts, $discount_from, $discount_to, $min_pax_discount, $id)==true) {
							// code...
							$array = [
								'response' => true,
								'message' => "Service edited."
							];
							$return= json_encode($array);
							echo "$return";
							exit();
						}else{
							$array = [
								'response' => false,
								'message' => "Something went wrong, Try again...."
							];
							$return= json_encode($array);
							echo "$return";
							exit();
						}
					}
				}else{
					$array = [
						'success' => false,
						'message' => "The dates are not properly set. Your start date cannot be greater than end date."
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}
			// }else{
			// 	$array = [
			// 		'success' => false,
			// 		'message' => "Your start date cannot be earlier than today."
			// 	];
			// 	$return = json_encode($array);
			// 	echo "$return";
			// 	exit();
			// }
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
        'message' => "Token not set.."
    ];
    $return = json_encode($array);
    echo "$return";
    exit();
}





?>