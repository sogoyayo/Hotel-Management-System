if($action=='15') {
                $senderID = (input_check($_REQUEST['sender_id']));
                $receiverID = (input_check($_REQUEST['receiver_id']));
                $message = (input_check($_REQUEST['message']));
                
                if (!empty($message)) {
                    // code...
                
                    if(!empty($senderID)) {
                        if (!empty($receiverID)) {
                            // code...

                            // checks if a record of the message exit
                            if (comms_logCheck ($mysqli, $senderID, $receiverID)==true) {
                                // code...
                                $comms_logID = $_SESSION['comms_logID'];

                                if ($_FILES['avatar']) {

                                    $filename = $_FILES['avatar']['name']; 
                                    $filesize = $_FILES['avatar']['size']; 
                                    $filetype = $_FILES['avatar']['type'];
                                    $filename= $timestamp.$filename;

                                    $target_dir = "./uploads/";
                                    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
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

                                    if ($_FILES["avatar"]["size"] > 25000000) {
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
                                        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                                            $file_path=BACKURL.'/uploads/'.$filename;

                                            if (InsertChat($mysqli, $comms_logID, $fileURL, $senderID, $receiverID, $message, $timestamp)==true) {
                                                // code...
                                                $array = [
                                                    'response' => "$action",
                                                    'message' => "message sent."
                                                ];
                                                $return= json_encode($array);
                                                echo "$return";
                                                exit();
                                            }else{
                                                $array = [
                                                    'response' => "00",
                                                    'message' => "Something went wrong, Try again."
                                                ];
                                                $return= json_encode($array);
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
                                    $fileURL = 0;
                                    if (InsertChat($mysqli, $comms_logID, $fileURL, $senderID, $receiverID, $message, $timestamp)==true) {
                                        // code...
                                        $array = [
                                            'response' => "$action",
                                            'message' => "message sent."
                                        ];
                                        $return= json_encode($array);
                                        echo "$return";
                                        exit();
                                    }else{
                                        $array = [
                                            'response' => "00",
                                            'message' => "Something went wrong, Try again."
                                        ];
                                        $return= json_encode($array);
                                        echo "$return";
                                        exit();
                                    }
                                }

                            }else{
                                if (InsertComms_log($mysqli, $senderID, $receiverID, $timestamp)==true) {
                                    // code...
                                    if (comms_logCheck ($mysqli, $senderID, $receiverID)==true) {
                                        // code...
                                        $comms_logID = $_SESSION['comms_logID'];


                                        if ($_FILES['avatar']) {

                                            $filename = $_FILES['avatar']['name']; 
                                            $filesize = $_FILES['avatar']['size']; 
                                            $filetype = $_FILES['avatar']['type'];
                                            $filename= $timestamp.$filename;

                                            $target_dir = "./uploads/";
                                            $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
                                            $uploadOk = 1;
                                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                                            // Check if file already exists
                                            // if (file_exists($target_file)) {
                                            //     //  echo "Sorry, file already exists.<br> <a href=''>Proceed</a>";
                                            //     $array = [
                                            //         'response' => "00",
                                            //         'message' => "Sorry, file already exists, change the file name."
                                            //     ];
                                            //     $return= json_encode($array);
                                            //     echo "$return";
                                            //     $uploadOk = 0;
                                            //     exit();
                                            // }

                                            // Check file size
                                            if ($_FILES["avatar"]["size"] > 25000000) {
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
                                                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                                                    $fileURL=BACKURL.'/uploads/'.$filename;

                                                    if (InsertChat($mysqli, $comms_logID, $fileURL, $senderID, $receiverID, $message, $timestamp)==true) {
                                                        // code...
                                                        $array = [
                                                            'response' => "$action",
                                                            'message' => "message sent."
                                                        ];
                                                        $return= json_encode($array);
                                                        echo "$return";
                                                        exit();
                                                    }else{
                                                        $array = [
                                                            'response' => "00",
                                                            'message' => "Something went wrong, Try again."
                                                        ];
                                                        $return= json_encode($array);
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
                                            $fileURL = 0;
                                            if (InsertChat($mysqli, $comms_logID, $fileURL, $senderID, $receiverID, $message, $timestamp)==true) {
                                                // code...
                                                $array = [
                                                    'response' => "$action",
                                                    'message' => "message sent."
                                                ];
                                                $return= json_encode($array);
                                                echo "$return";
                                                exit();
                                            }else{
                                        
                                                $array = [
                                                'response' => "00",
                                                'message' => "Something went wrong..."
                                                ];
                                                $return= json_encode($array);
                                                echo "$return";
                                                exit();
                                            }
                                        }
                                    }else{
                                    
                                        $array = [
                                        'response' => "00",
                                        'message' => "try again"
                                        ];
                                        $return= json_encode($array);
                                        echo "$return";
                                        exit();
                                    }
                                }else{

                                    $array = [
                                    'response' => "00",
                                    'message' => "something went wrong!"
                                    ];
                                    $return= json_encode($array);
                                    echo "$return";
                                    exit();
                                }
                            }
                        } else{
                            $array = [
                            'response' => "00",
                            'message' => "That receiver does not exit"
                            ];
                            $return= json_encode($array);
                            echo "$return";
                            exit();
                        }
                    }else{
                        $array = [
                        'response' => "00",
                        'message' => "Empty message. please enter a message..."
                        ];
                        $return= json_encode($array);
                        echo "$return";
                        exit();
                    }
                }else{
                    $array = [
                    'response' => "00",
                    'message' => "Empty message. please enter a message..."
                    ];
                    $return= json_encode($array);
                    echo "$return";
                    exit();
                }
            }