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

if (isset($_REQUEST['apptoken'])) {

	$apptoken = input_check($_REQUEST['apptoken']);

	if (CheckToken($mysqli, $apptoken)==true) {

		$hotelToken = input_check($_REQUEST['hoteltoken']);
		$roomtoken = input_check($_REQUEST['roomtoken']);
		$roomName = strtoupper(input_check($_REQUEST['name']));
		$availnum = input_check($_REQUEST['avail_room_num']);
		$room_desc = input_check($_REQUEST['room_desc']);

		$dbl = input_check($_REQUEST['dbl']);
		$sgl = input_check($_REQUEST['sgl']);
		$trpl = input_check($_REQUEST['trpl']);
		$quad = input_check($_REQUEST['quad']);
		$category = input_check($_REQUEST['category']);
		$room_size = input_check($_REQUEST['room_size']);
		$max_child = input_check($_REQUEST['max_child']);
		$min_adult = input_check($_REQUEST['min_adult']);
		$max_adult = input_check($_REQUEST['max_adult']);
		$max_total = input_check($_REQUEST['max_total']);
		$bed_number = input_check($_REQUEST['bed_number']);

		if (!empty($hotelToken)) {
			// code...
			if (!empty($roomtoken)) {
				// code...
				if (!empty($category)) {

					if (getHotelDetails($mysqli, $hotelToken)===true) {
						// code...
						$hotelDetails = [
					        'hoteltoken' => "".$_SESSION['hotelid']."",
							'hotel_name' => "".$_SESSION['hotel_name']."",
							'hotel_desc' => "".$_SESSION['description']."",
							'account_owner' => "".$_SESSION['account_owner']."",
							'dmc' => "".$_SESSION['dmc']."",
							'hotel_owner' => "".$_SESSION['hotel_owner']."",
							'location' => "".$_SESSION['location']."",
							'hotel_timestamp' => "".$_SESSION['timestamp']."",
							'latitude' => "".$_SESSION['latitude']."",
							'longitude' => "".$_SESSION['longitude']."",
							'display' => "".$_SESSION['display'].""
						];

						// if (checkRoom($mysqli, $hotelToken, $roomtoken, $category)===false) {
							// code...

							if (checkRoomExist($mysqli, $hotelToken, $roomtoken)===true) {
								// code...

								if ($_FILES['room_image']) {

				                    $filename = $_FILES['room_image']['name']; 
				                    $filesize = $_FILES['room_image']['size']; 
				                    $filetype = $_FILES['room_image']['type'];

				                    $temp = explode(".", $filename);
				                    $newfilename= "hotelsoffline-".$timestamp. "." .end($temp);

				                    $target_dir = "./uploads/";
				                    $target_file = $target_dir . basename($_FILES["room_image"]["name"]);
				                    $uploadOk = 1;
				                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				                    // Check if file already exists
				                    if (file_exists($target_file)) {
				                        //  echo "Sorry, file already exists.<br> <a href=''>Proceed</a>";
				                        $array = [
				                            'response' => "00",
				                            'message' => "Sorry, file already exists, change the file name."
				                        ];
				                        $return= json_encode($array);
				                        echo "$return";
				                        $uploadOk = 0;
				                        exit();
				                    }

				                    // Check file size

				                    if ($_FILES["room_image"]["size"] > 25000000) {
				                        //  echo "Sorry, your file is too large.";
				                        $array = [
				                            'response' => "00",
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
				                            'response' => "00",
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
				                            'response' => "00",
				                            'message' => "Sorry your file could not be uploaded, try again."
				                        ];
				                        $return= json_encode($array);
				                        echo "$return";
				                        exit;
				                        // if everything is ok, try to upload file
				                    } else {
				                        if (move_uploaded_file($_FILES["room_image"]["tmp_name"], $target_file)) {
				                            $fileURL=URL.'/uploads/'.$newfilename;
				                        
				                            if (updateHotelRoom($mysqli, $hotelToken, $roomtoken, $hotelDetails['account_owner'], $hotelDetails['hotel_owner'], $roomName, $availnum, $room_desc, $fileURL, $category, $dbl, $sgl, $trpl, $quad, $room_size, $max_child, $min_adult, $max_adult, $max_total, $bed_number)===true) {
												// code...
												$array = [
								                    'success' => true,
								                    'message' => "Hotel room has been updated."
								                ];
								                $return= json_encode($array);
								                echo "$return";
								                exit();
											}else{
												$array = [
													'success' => false,
													'message' => "Something went wrong, please try again."
												];
												$return = json_encode($array);
												echo "$return";
												exit();
											}

				                        }else{
				                            $array = [
				                                'response' => "00",
				                                'message' => "Error, image not uploaded, message not sent. Try again"
				                            ];
				                            $return= json_encode($array);
				                            echo "$return";
				                            exit();
				                        }
				                    }       
				                }else{
				                    $fileURL = "0";
				                    if (updateHotelRoom($mysqli, $hotelToken, $roomtoken, $hotelDetails['account_owner'], $hotelDetails['hotel_owner'], $roomName, $availnum, $room_desc, $fileURL, $category, $dbl, $sgl, $trpl, $quad, $room_size, $max_child, $min_adult, $max_adult, $max_total, $bed_number)===true) {
										// code...
										$array = [
						                    'success' => true,
						                    'message' => "Hotel room has been updated."
						                ];
						                $return= json_encode($array);
						                echo "$return";
						                exit();
									}else{
										$array = [
											'success' => false,
											'message' => "Something went wrong, please try again.
											"
										];
										$return = json_encode($array);
										echo "$return";
										unset($_SESSION);
										exit();
									}
								}
							}else{
								$array = [
									'success' => false,
									'message' => "Room does not exist..."
								];
								$return = json_encode($array);
								echo "$return";
								exit();
							}
						// }else{
						// 	$array = [
						// 		'success' => false,
						// 		'message' => "This room category already exist..."
						// 	];
						// 	$return = json_encode($array);
						// 	echo "$return";
						// 	exit();
						// }
					}else{
						$array = [
							'success' => false,
							'message' => "Something went wrong..."
						];
						$return = json_encode($array);
						echo "$return";
						exit();
					}
				}else{
					$array = [
						'success' => false,
						'message' => "Room category is not set"
					];
					$return = json_encode($array);
					echo "$return";
					exit();
				}
			}else{
				$array = [
					'success' => false,
					'message' => "Roomtoken is not set"
				];
				$return = json_encode($array);
				echo "$return";
				exit();
			}
		}else{
			$array = [
				'success' => false,
				'message' => "Hotel not selected"
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
		'message' => "Token not set.."
	];
	$return = json_encode($array);
	echo "$return";
	exit();
}


?>