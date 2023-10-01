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

        $sql = "SELECT * FROM special_markup"; 
         if ($res = $mysqli->query($sql)) {
            if ($res->num_rows > 0) {
                echo "[";
               
                $count=0;
                while ($col = $res->fetch_array()) {
                    $count= ++$count;
                    $rownum= $res->num_rows;
                    $contractName = getContractName($mysqli, $col['contract_token']);
                    $array=[
                        'id' => "".$col['id']."",
                        'markup_id' => "".$col['markup_id']."",
                        'markup' => "".$col['markup']."",
                        'user_type' => "".$col['user_type']."",
                        'usertoken' => "".$col['usertoken']."",
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