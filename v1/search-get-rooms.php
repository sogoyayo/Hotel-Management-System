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


        if (empty($_POST['usertoken'])) {
        // code...

          $array =[
            'success'=> false,
            'message'=>"Usertoken is missing..."
        ];
        $array=json_encode($array);
        echo "$array";
        exit();
    }else{
        $usertoken = input_check($_POST['usertoken']);
    }


	if (empty($_POST['contract_token'])) {
		// code...

          $array =[
            'success'=> false,
            'message'=>"Select a contract please.."
        ];
        $array=json_encode($array);
        echo "$array";
        exit();

	}else{
		$contract_token = input_check($_POST['contract_token']);
	}

    if (empty($_POST['to']) or empty($_POST['from'])) {
        // code...
        $array =[
            'success'=> false,
            'message'=>"Select a contract please.."
        ];
        $array=json_encode($array);
        echo "$array";
        exit;
    }else{
        $to = strtotime(input_check($_POST['to']));
        $from = strtotime(input_check($_POST['from']));
    }

$from1 = intval($from) + $twentyfourhours;
$to1 = intval($from) + $twentyfourhours;

$db = new db();

// $sql = "SELECT * FROM contracts where token = '$contract_token' and start_date > '$from1' and exp_date < '$to1' and display = 1";

$sql = "SELECT * FROM contracts where token = '$contract_token' and start_date < '$from' and exp_date > '$to' and display = 1 and roomtoken != '0'
UNION ALL
SELECT * FROM contracts 
WHERE token = '$contract_token' and exp_date = '$to' and display = 1 and roomtoken != '0'
UNION ALL
SELECT * FROM contracts 
WHERE token = '$contract_token' and start_date = '$from' and display = 1 and roomtoken != '0'
GROUP by roomtoken";


// $sql = "SELECT * FROM contracts where $stmt and start_date < '$from' and exp_date > '$to' and display = 1 and roomtoken !='' and room_name !='' and hotelname !=''
// UNION ALL
// SELECT * FROM contracts 
// WHERE $stmt and exp_date = '$to' and display = 1 and roomtoken !='' and room_name !='' and hotelname !=''
// UNION ALL
// SELECT * FROM contracts 
// WHERE $stmt and start_date = '$from' and display = 1 and roomtoken !='' and room_name !='' and hotelname !=''
// GROUP BY token, hoteltoken  order by price_sgl,price_dbl ASC"; 

  if ($res = $mysqli->query($sql)) {
                if ($res->num_rows > 0) {
                    echo "[";
                   
                    $count=0;
                    while ($col = $res->fetch_array()) {

                        $count= ++$count;
                        $rownum= $res->num_rows;

    $roomName = getRoomName($mysqli, $col['roomtoken']);
    $suplementPerc = getSuplementPerc1($mysqli, $contract_token, $to, $from);
    $suplementAmount = getSuplementAmount1($mysqli, $contract_token, $to, $from);

if ($suplementAmount == 0) {
    // code...
    $childPrice = (intval($suplementPerc)/2) * intval($col['price_dbl']);
}else{
    $childPrice = $suplementAmount;
}

$country = getUserCountry($mysqli, $usertoken);

                $array=array(
                    'id' => "".$col['id']."",
                    'token' => "".$col['token']."",
                    'price_sgl' => "".$col['price_sgl']."",
                    'price_dbl' => "".$col['price_dbl']."",
                    'price_trl' => "".$col['price_trl']."",
                    'price_qud' => $col['price_qud'],
                    'room_name' => $roomName,
                    'price_child' => $childPrice,
                    'supp_perc' => $suplementPerc,
                    'supp_amount' => $suplementAmount,
                    'markup' => getMarkup($db, $roomName, $contract_token, $country),
                    'roomtoken' => $col['roomtoken']
                );
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
                        'message'=>"No results $from1 and $to1"
                    ];
                    $array=json_encode($array);
                    echo "$array";
                    exit;
                }
            }else{
                $array = [
            'success' => false,
            'message' => "Something went wrong, please try again.."
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