<?
header('Content-Type: application/json');

require('../aaconfig.php');
require('../data.php');
require('../functions.php');
require('../functions2.php');

// include('../mailer.php');
// include('../sms.php');
// include('../engine.php');

// $timestamp = time();

if (isset($_REQUEST['apptoken'])) {


	$apptoken = input_check($_REQUEST['apptoken']);
	if (CheckToken($mysqli, $apptoken)==true) {

		$hotelToken = input_check($_REQUEST['hotelid']);
		if (!empty($hotelToken)) {
			// code...

// echo $_REQUEST['hotelid'];
// exit();

            $sql = "SELECT * FROM hotel_rooms where hotelid = '$hotelToken'";
            if ($res = $mysqli->query($sql)) {
                if ($res->num_rows > 0) {
                    echo "[";
                   
                    $count=0;
                    while ($col = $res->fetch_array()) {
                        $count= ++$count;
                        $rownum= $res->num_rows;
                        $array=[
                            'hotelid' => "".$col['hotelid']."",
                            'room_name' => "".$col['name']."",
                            'price' => "".$col['price']."",
                            'availnum' => "".$col['availnum']."",
                            'timestamp' => "".$col['timestamp']."",
                            'roomid' => "".$col['room_id']."",
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
				'message' => "Empty fields"
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
}


?>