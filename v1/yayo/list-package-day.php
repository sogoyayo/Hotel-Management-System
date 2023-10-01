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

        $package_id = input_check($_REQUEST['package_id']);

        if (!empty($package_id)) {
            # code...
            $sql = "SELECT * FROM package_day where package_id='$package_id' and display=1 "; 
            if ($res = $mysqli->query($sql)) {
                if ($res->num_rows > 0) {
                    echo "[";
                
                    $count=0;
                    while ($col = $res->fetch_array()) {
                        $count= ++$count;
                        $rownum= $res->num_rows;
                        $array=[
                            'id' => "".$col['id']."",
                            'day' => "".$col['day']."",
                            'package_id' => "".$col['package_id']."",
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
        } else {
            # code...
            $array =[
                'success'=> false,
                'message'=>"Empty field.."
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