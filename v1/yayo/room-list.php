<?
header('Content-Type: application/json');

require('../../aaconfig.php');
require('../../data.php');
require('../../functions.php');
require('../../functions2.php');

// include('../../mailer.php');
// include('../../sms.php');
include('../../engine.php');

$timestamp = time();

if (isset($_REQUEST['apptoken'])) {

	$apptoken = input_check($_REQUEST['apptoken']);

	if (CheckToken($mysqli, $apptoken)==true) {

		$hotelToken = input_check($_REQUEST['hotelid']);

		if (!empty($hotelToken)) {
			// code...
            $sql = "SELECT * FROM hotel_rooms where hotelid='$hotelToken' and name != '0' and display=1 GROUP by hotelid";
            if ($res = $mysqli->query($sql)) {
                if ($res->num_rows > 0) {
                    echo "[";
                   
                    $count=0;
    while ($col = $res->fetch_array()) {
        $count= ++$count;
        $rownum= $res->num_rows;

if ($col['category'] == "0") {
    // code...
    $category = $col['name'];
    $mapped = 0;
}else{
    $category = $col['category'];
    $mapped = 1;
}

        $array=[
            'id' => "".$col['id']."",
            'hotelid' => "".$col['hotelid']."",
            'roomid' => "".$col['room_id']."",
            'room_name' => $category,
            'room_description' => "".$col['room_description']."",
            'availnum' => "".$col['availnum']."",
            'price' => "".$col['price']."",
            'account_owner' => "".$col['account_owner']."",
            'dmc' => "".$col['dmc']."",
            'hotel_owner' => "".$col['hotel_owner']."",
            'display' => "".$col['display']."",
            'timestamp' => "".$col['timestamp']."",
            'imageURL' => "".$col['image']."",
            'category' => $category,
            'dbl' => "".$col['dbl']."",
            'sgl' => $col['sgl'],
            'trpl' => $col['trpl'],
            'quad' => "".$col['quad']."",
            'room_size' => "".$col['room_size']."",
            'max_child' => "".$col['max_child']."",
            'min_adult' => "".$col['min_adult']."",
            'max_adult' => "".$col['max_adult']."",
            'max_total' => "".$col['max_total']."",
            'bed_number' => "".$col['bed_number']."",
            'rownum' => "$rownum",
            'count' => "$count",
            'roomtoken' => $col['hotelid'],
            'mapped' => $mapped
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
                        'message'=>"This hotel does not have rooms at the moment, add new rooms."
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