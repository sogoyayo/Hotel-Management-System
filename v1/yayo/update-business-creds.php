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

        $hotel_owner = input_check($_REQUEST['token']);

        $type = input_check($_REQUEST['type']);

        if (!empty($hotel_owner)) {
            // code...
            if (getUsertoken_bizcreds($mysqli, $hotel_owner)==true) {
                // code...
            
        		if (!empty($type)) {
        			// code...
        			if ($type=='business_name') {
        				// code...
        				$businessName = input_check($_REQUEST['business_name']); 

        				// inserts business name
        				if (updateBusinessName($mysqli, $businessName)==true) {
        					// code...
        					$array = [
        						'success' => true,
        						'message' => "business name added successfully.."
        					];
        					$return = json_encode($array);
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
        			}elseif ($type==$_FILES['business_owner_id']) {
        				// code...

        				$filename = $_FILES['business_owner_id']['name']; 
                        $filesize = $_FILES['business_owner_id']['size']; 
                        $filetype = $_FILES['business_owner_id']['type'];
                        $filename= $timestamp.$filename;

                        $target_dir = "./uploads/";
                        $target_file = $target_dir . basename($_FILES["business_owner_id"]["name"]);
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

                        if ($_FILES["business_owner_id"]["size"] > 25000000) {
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
                            if (move_uploaded_file($_FILES["business_owner_id"]["tmp_name"], $target_file)) {
                                $fileURL=BACKURL."/v1/yayo/uploads/".$filename;

                                if (insertBusinessOwnerId($mysqli, $fileURL)==true) {
                                    // code...
                                    $array = [
                                        'success' => true,
                                        'message' => "message sent."
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
        	            
        			}elseif ($type==$_FILES['business_license']) {
        				// code...

        				$filename = $_FILES['business_license']['name']; 
                        $filesize = $_FILES['business_license']['size']; 
                        $filetype = $_FILES['business_license']['type'];
                        $filename= $timestamp.$filename;

                        $target_dir = "./uploads/";
                        $target_file = $target_dir . basename($_FILES["business_license"]["name"]);
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

                        if ($_FILES["business_license"]["size"] > 25000000) {
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
                            if (move_uploaded_file($_FILES["business_license"]["tmp_name"], $target_file)) {
                                $fileURL=BACKURL.'/uploads/'.$filename;

                                if (updateBusinessLicense($mysqli, $fileURL)==true) {
                                    // code...
                                    $array = [
                                        'success' => true,
                                        'message' => "image uploaded successfully."
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
                   
        			}elseif ($type==$_FILES['business_logo']) {
        				// code...

        				$filename = $_FILES['business_logo']['name']; 
                        $filesize = $_FILES['business_logo']['size']; 
                        $filetype = $_FILES['business_logo']['type'];
                        $filename= $timestamp.$filename;

                        $target_dir = "./uploads/";
                        $target_file = $target_dir . basename($_FILES["business_logo"]["name"]);
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

                        if ($_FILES["business_logo"]["size"] > 25000000) {
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
                                $fileURL=BACKURL.'/uploads/'.$filename;

                                if (insertBusinessLogo($mysqli, $fileURL)==true) {
                                    // code...
                                    $array = [
                                        'success' => true,
                                        'message' => "image uploaded successfully."
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
        				$array = [
        					'success' => false,
        					'message' => "$type is invalid. please insert the correct type.."
        				];
        				$return = json_encode($array);
        				echo "$return";
        				exit();
        			}
        		}else{
        			$array = [
        				'success' => false,
        				'message' => "Field is empty!!"
        			];
        			$return = json_encode($array);
        			echo "$return";
        			exit();
        		}
            }else{
                if (insertUsertoken_bizcreds($mysqli, $hotel_owner)==true) {
                    // code...
                    $array = [
                        'success' => true,
                        'message' => "hotel owner has been updated!!"
                    ];
                    $return = json_encode($array);
                    echo "$return";
                    exit();
                }else{
                    $array = [
                        'success' => false,
                        'message' => "Field to update hotel owner!"
                    ];
                    $return = json_encode($array);
                    echo "$return";
                    exit();
                }
            }
        }else{
            $array = [
                'success' => false,
                'message' => "Empty token..."
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