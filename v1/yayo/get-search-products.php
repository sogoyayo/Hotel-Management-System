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

        $keyword = input_check($_REQUEST['keyword']);

        if (!empty($keyword)) {
            // code...
            $array_keyword = explode(" ", $keyword);

            foreach ($array_keyword as $key => $value) {
                // code...
                if (strlen($value) > 0) {
                    // code...
                    $stmt .= "country like '%$value%' or contract_name like '%$value%' or room_category like '%$value%' or hotelname like '%$value%' or ";
                }
                // productname like '%$value%' or productname like '%$value%' or 
            }

            $stmt = substr($stmt, 0, strlen($stmt)-3);

            $sql = "SELECT * FROM contracts where $stmt order by rand() LIMIT 10"; 
            if ($res = $mysqli->query($sql)) {
                if ($res->num_rows > 0) {
                    echo "[";
                    $count=0;
                    while ($col = $res->fetch_array()) {
                        $count= ++$count;
                        $rownum= $res->num_rows;
                        $contractName = getContractName($mysqli, $col['contract_token']);
                        $array=[
                            'hotelname' => "".$col['hotelname']."",
                            'contract_name' => "".$col['contract_name']."",
                            'room_category' => "".$col['room_category']."",
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

            }else{
                $array = [
                    'success' => false,
                    'message' => "Failed to fetch data"
                ];
                $return = json_encode($array);
                echo "$return";
                exit();
            }

        }else{
            $array = [
                'success' => false,
                'message' => "Empty field"
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