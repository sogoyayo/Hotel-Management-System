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
        $day = input_check($_REQUEST['day']);
        
        if (!empty($package_id)) {
            # code...
            if (!empty($day)) {
                # code...
                $day_id = intval(getPackageDayId($mysqli, $day, $package_id));

                $sql = "SELECT * FROM package_item where day_id='$day_id' and package_id='$package_id' and display=1 ";
                if ($res = $mysqli->query($sql)) {
                    if ($res->num_rows > 0) {
                        echo "[";
                    
                        $count=0;
while ($col = $res->fetch_array()) {
$count= ++$count;
$rownum= $res->num_rows;

$contractName = getContractName($mysqli, $col['contract_token']);
$roomName = getRoomName($mysqli, $col['roomtoken']);
$array=[
    'id' => "".$col['id']."",
    'package_id' => "".$col['package_id']."",
    'day_id' => "".$col['day_id']."",
    'seller_type' => "".$col['seller_type']."",
    'seller' => "".$col['seller']."",
    'package_type' => "".$col['package_type']."",
    'package_type_id' => "".$col['package_type_id']."",
    'seller_type_name' => "".$col['seller_type_name']."",
    'package_type_name' => "".$col['package_type_name']."",
    'timestamp' => "".$col['timestamp']."",
    'rownum' => "$rownum",
    'count' => "$count",
    'country' => $col['country'],
    'contract_token' => $col['contract_token'],
    'roomtoken' => $col['roomtoken'],
    'contract_name' => $contractName,
    'roomname' => $roomName
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
                } else {
                    # code...
                    $array =[
                        'success'=> false,
                        'message'=>"This request failed. Something went wrong.."
                    ];
                    $array=json_encode($array);
                    echo "$array";
                    exit;
                
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