<?php
header('Content-Type: application/json');

require('../aaconfig.php');
require('../data.php');
require('../functions.php');
require('../functions2.php');

// include('../mailer.php');
include('../sms.php');
include('../engine.php');

$timestamp = time();

if (isset($_REQUEST['apptoken'])) {

	$apptoken = input_check($_REQUEST['apptoken']);

	if (CheckToken($mysqli, $apptoken)==true) {

	if (!empty($_POST['hotelid_external'])) {
		// code...
		$hotelid_external = input_check($_POST['hotelid_external']);

            $sql = "SELECT * FROM hotel_rooms_external_records where hotelid_external='$hotelid_external'";
            if ($res = $mysqli->query($sql)) {
                if ($res->num_rows > 0) {
                    echo "[";
                   
                    $count=0;
                    while ($col = $res->fetch_array()) {
                        $count= ++$count;
                        $rownum= $res->num_rows;
                        $array=[
                            'roomtoken' => "".$col['roomtoken']."",
                            'hotelid_external' => "".$col['hotelid_external']."",
                            'name' => "".$col['name']."",
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
                        'response'=> false,
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
			'message' => "Unknown DMC token"
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