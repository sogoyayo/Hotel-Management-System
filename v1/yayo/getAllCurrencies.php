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

$data = file_get_contents('php://input');
$data = json_decode($data);

if (isset($data->apptoken)) {

    $apptoken = input_check($data->apptoken);

    if (CheckToken($mysqli, $apptoken) == true) {

        $sql = "SELECT * FROM currencies";
        if ($res = $mysqli->query($sql)) {
            if ($res->num_rows > 0) {
                echo "[";

                $count = 0;
                while ($col = $res->fetch_array()) {
                    $count = ++$count;
                    $rownum = $res->num_rows;

                    $array = [
                        'id' => "" . $col['id'] . "",
                        'currency_name' => "" . $col['name'] . "",
                        'acronym' => "" . $col['symbol'] . ""
                    ];
                    $array = json_encode($array);
                    if ($rownum > $count) {
                        echo "$array,";
                    } else {
                        echo "$array";
                    }
                }
                echo "]";
            } else {
                $array = [
                    'success' => false,
                    'message' => "No result"
                ];
                $array = json_encode($array);
                echo "$array";
                exit;
            }
        }
        
    } else {
        $array = array(
            'success' => false,
            'message' => "Unauthorized access..contact support"
        );
        echo json_encode($array);
        exit();
    }
} else {
    $array = array(
        'success' => false,
        'message' => "Token not set.."
    );
    echo json_encode($array);
    exit();
}
