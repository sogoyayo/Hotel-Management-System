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
        if (!empty($data->token)) {
            // code...
            $token = input_check($data->token);
              $sql = "SELECT * FROM contract_distribution WHERE contract_token = '$token' and display = 1";
        if ($res = $mysqli->query($sql)) {
            if ($res->num_rows > 0) {
                echo "[";

                $count = 0;
                while ($col = $res->fetch_array()) {
                    $count = ++$count;
                    $rownum = $res->num_rows;

                    $array = array(
                        'id' => "" . $col['id'] . "",
                        'contract_token' => "" . $col['contract_token'] . "",
                        'country' => "" . $col['country'] . "",
                        'timestamp' => "" . $col['timestamp'] . ""
                    );
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
                    'message' => "No results"
                ];
                $array = json_encode($array);
                echo "$array";
                exit;
            }
        }
        }else{
            $array = [
            'success' => false,
            'message' => "Unknown contract ID"
        ];
        $return = json_encode($array);
        echo "$return";
        exit();
        }
    } else {
        $array = [
            'success' => false,
            'message' => "Unauthorized access..contact support"
        ];
        $return = json_encode($array);
        echo "$return";
        exit();
    }
} else {
    $array = [
        'success' => false,
        'message' => "Token not set.."
    ];
    $return = json_encode($array);
    echo "$return";
    exit();
}
