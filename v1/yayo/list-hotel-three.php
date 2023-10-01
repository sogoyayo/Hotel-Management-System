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
        
        $account_owner = input_check($_REQUEST['token']);

        if (!empty($account_owner)) {
            // code...
            $sql = "SELECT * FROM hotels where account_owner='$account_owner' and display=1";
             if ($res = $mysqli->query($sql)) {
                if ($res->num_rows > 0) {
                    echo "[";
                   
                    $count=0;
                    while ($col = $res->fetch_array()) {
                        $count= ++$count;
                        $rownum= $res->num_rows;
                        $array=[
                            'hotelid' => "".$col['token']."",
                            'hotel_name' => "".$col['hotelname']."",
                            'hotel_desc' => "".$col['description']."",
                            'dmctoken' => "".$col['dmctoken']."",
                            'hotel_owner' => "".$col['hotel_owner']."",
                            'account_owner' => "".$col['account_owner']."",
                            'location' => "".$col['location']."",
                            'timestamp' => "".$col['timestamp']."",
                            'latitude' => "".$col['latitude']."",
                            'longitude' => "".$col['longitude']."",
                            'display' => "".$col['display']."",
                            'rownum' => "$rownum",
                            'count' => "$count"
                        ];
                        $array=json_encode($array);
                        if ($rownum > $count) {
                            echo "$array,";
                        }else {
                            echo "$array";
                        }
                    }
                    echo "]";
                }else {
                    $array =[
                        'success'=> false,
                        'message'=>"No results"
                    ];
                    $array=json_encode($array);
                    echo "$array";
                    exit;
                }
            }
        }else{
            
            $array = [
                'success' => false,
                'message' => "Empty fields"
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