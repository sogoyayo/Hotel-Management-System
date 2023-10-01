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

        $sql = "SELECT * FROM wallet ORDER BY timestamp DESC ";
        
        if ($res = $mysqli->query($sql)) {
            if ($res->num_rows > 0) {
                echo "[";
                
                $count=0;
                while ($col = $res->fetch_array()) {
                    $count= ++$count;
                    $rownum= $res->num_rows;
                    $email = GetUserMail($mysqli, $col['usertoken']);
                    $fullName = GetUserName($mysqli, $col['usertoken']);
                    $array=[
                        'id' => "".$col['id']."",
                        'usertoken' => "".$col['usertoken']."",
                        'type' => "".$col['type']."",
                        'amount' => "".$col['amount']."",
                        'log' => "".$col['log']."",
                        'email' => "$email",
                        'fullName' => "$fullName",
                        'timestamp' => "".$col['timestamp']."",
                        'rownum' => "$rownum",
                        'count' => "$count",
                        'source' => $col['source'],
                        'note' => $col['note']
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
        } else{
            $array =[
                'success'=> false,
                'message'=>"Failed request"
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