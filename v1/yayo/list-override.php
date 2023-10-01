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

        $sql = "SELECT * FROM override where display=1"; 
         if ($res = $mysqli->query($sql)) {
            if ($res->num_rows > 0) {
                echo "[";
               
                $count=0;
                while ($col = $res->fetch_array()) {
                    $count= ++$count;
                    $rownum= $res->num_rows;
                    $array=[
                        'id' => "".$col['id']."",
                        'recipient' => "".$col['recipient']."",
                        'target_amount1' => "".$col['amount1']."",
                        'target_amount2' => "".$col['amount2']."",
                        'target_amount3' => "".$col['amount3']."",
                        'override1' => "".$col['override1']."",
                        'override2' => "".$col['override2']."",
                        'override3' => "".$col['override3']."",
                        'type' => "".$col['type']."",
                        'start_duration' => "".$col['start_duration']."",
                        'end_duration' => "".$col['end_duration']."",
                        'nature' => "".$col['nature']."",
                        'timestamp' => "".$col['timestamp']."",
                        'hotelname' => "".$col['hotelname']."",
                        'country' => "".$col['country']."",
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