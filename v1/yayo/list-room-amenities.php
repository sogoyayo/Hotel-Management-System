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
    $roomtoken = input_check($_REQUEST['roomtoken']);

    if (CheckToken($mysqli, $apptoken)==true) {

        if (!empty($roomtoken)) {
            # code...

            $sql = "SELECT * FROM selected_amenities where roomtoken = '$roomtoken' "; 
            if ($res = $mysqli->query($sql)) {
                if ($res->num_rows > 0) {
                    echo "[";
                
                    $count=0;
                    while ($col = $res->fetch_array()) {
                        $count= ++$count;
                        $rownum= $res->num_rows;
                        $array=[
                            'id' => "".$col['id']."",
                            'room_amenities' => "".$col['room_amenities']."",
                            'amenities_id' => "".$col['amenities_id']."",
                            'roomtoken' => "".$col['roomtoken']."",
                            'timestamp' => "".$col['timestamp']."",
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
        }else {
            # code...
            $array =[
                'success'=> false,
                'message'=>"Empty Field"
            ];
            $array=json_encode($array);
            echo "$array";
            exit;
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