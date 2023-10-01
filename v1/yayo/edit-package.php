<?php
header('Content-Type: application/json');

require('../../aaconfig.php');
require('../../data.php');
require('../../functions.php');
require('../../functions2.php');

// include('../../mailer.php');
include('../../sms.php');
include('../../engine.php');


if (isset($_REQUEST['apptoken'])) {

	$apptoken = input_check($_REQUEST['apptoken']);

	if (CheckToken($mysqli, $apptoken)==true) {

		$package_id = input_check($_REQUEST['package_id']);
		$description = input_check($_REQUEST['description']);
		$youtube_link = input_check($_REQUEST['youtube_link']);
		$sharing_link = input_check($_REQUEST['sharing_link']);

		if (($package_id=='') or ($description=='')) {
			// code...
			$array = [
				'success' => false,
				'message' => "Empty fields.."
			];
			$return = json_encode($array);
			echo "$return";
			exit();
		}else{

            if ($_FILES['avatar']) {

                $filename = $_FILES['avatar']['name']; 
                $filesize = $_FILES['avatar']['size']; 
                $filetype = $_FILES['avatar']['type'];
                $newFilename= $timestamp . "_" . $filename;

                $target_dir = "./uploads/";
                $target_file = $target_dir . $timestamp . "_" . basename($_FILES["avatar"]["name"]);
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
                        $fileURL="".BACKURL."/v1/yayo/uploads/".$newFilename;

                        if (editPackage($mysqli, $package_id, $description, $fileURL, $youtube_link, $sharing_link)===true) {
                            // code...
                            $array = [
                                'success' => true,
                                'message' => "Package has been updated."
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
                if (editPackage($mysqli, $package_id, $description, $fileURL, $youtube_link, $sharing_link)===true) {
                    // code...
                    $array = [
                        'response' => true,
                        'message' => "Package has been updated."
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