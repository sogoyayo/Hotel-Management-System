<?php
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
		
		$country = strtoupper(input_check($_REQUEST['country']));

		if (!empty($country)) {
			// code...
           if (($country = 'all_countries') or ($country = 'ALL COUNTRIES') or ($country = 'ALL_COUNTRIES')) {
               // code...


        $sql = "SELECT * FROM contracts where display=1 GROUP BY hoteltoken ORDER BY hotelname";
        
           }else{
        
        $sql = "SELECT * FROM contracts where country='$country' and hoteltoken !='' and display=1 GROUP BY hoteltoken ORDER BY hotelname";
           }

             if ($res = $mysqli->query($sql)) {
                if ($res->num_rows > 0) {
                    echo "[";
                   
                    $count=0;
                    while ($col = $res->fetch_array()) {
                        $count= ++$count;
                        $rownum= $res->num_rows;
                        $array=[
                            'hoteltoken' => "".$col['hoteltoken']."",
                            'hotel_name' => "".$col['hotelname']."",
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
                        'message'=>"No results $country"
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