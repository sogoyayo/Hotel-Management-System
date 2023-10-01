<?php
header('Content-Type: application/json');

require('../../aaconfig.php');
require('../../data.php');
require('../../functions.php');
require('../../functions2.php');

// include('../mailer.php');
include('../../sms.php');
include('../../engine.php');

$timestamp = time();

if (isset($_REQUEST['apptoken'])) {

	$apptoken = input_check($_REQUEST['apptoken']);

	if (CheckToken($mysqli, $apptoken)==true) {

		
        $keyword = input_check($_REQUEST['keyword']);
        $childAge = input_check($_POST['childAge']);

if (!empty($_POST['to']) and !empty($_POST['from'])) {
    // code...
            $to = strtotime(input_check($_POST['to']));
        $from = strtotime(input_check($_POST['from']));
}else{
            $to = time();
        $from = time();
}

$stmt = "";

if (!empty($keyword)) {

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
$posts_arr = array();
$db = new db();
$sql = "SELECT * FROM contracts where ($stmt) and (start_date < '$from' and exp_date > '$to' and display = 1 and roomtoken !='' and room_name !='' and hotelname !='')
GROUP BY token, hoteltoken  order by price_sgl, price_dbl ASC";
$result1 = searchEngine($db, $mysqli, $sql);
if ($result1 != false) {
	// array_push($posts_arr, $result1);
	$posts_arr = array_merge($posts_arr, $result1);
}

$sql2 = "SELECT * FROM contracts WHERE ($stmt) and (exp_date = '$to' and display = 1 and roomtoken !='' and room_name !='') GROUP BY token, hoteltoken  order by price_sgl, price_dbl ASC";
$result2 = searchEngine($db, $mysqli, $sql2);
if ($result2 != false) {
	$posts_arr = array_merge($posts_arr, $result2);
}


$sql3 = "SELECT * FROM contracts 
WHERE ($stmt) and (start_date = '$from' and display = 1 and roomtoken !='' and room_name !='')
GROUP BY token, hoteltoken  order by price_sgl, price_dbl ASC";
$result3 = searchEngine($db, $mysqli, $sql3);
if ($result3 != false) {
	// code...
	$posts_arr = array_merge($posts_arr, $result3);
}

$sql4 = "SELECT * FROM contracts where ($stmt) and (start_date = '$from' and exp_date > '$to' and display = 1 and roomtoken !='' and room_name !='')
GROUP BY token, hoteltoken  order by price_sgl, price_dbl ASC";
$result4 = searchEngine($db, $mysqli, $sql4);
if ($result4 != false) {
	// code...
	$posts_arr = array_merge($posts_arr, $result4);
}

$sql5 = "SELECT * FROM contracts where ($stmt) and (start_date < '$from' and exp_date = '$to' and display = 1 and roomtoken !='' and room_name !='')
GROUP BY token, hoteltoken  order by price_sgl, price_dbl ASC";
$result5 = searchEngine($db, $mysqli, $sql5);
if ($result5 != false) {
	// code...
	$posts_arr = array_merge($posts_arr, $result5);
}

if ($posts_arr != false) {
	// code...
	echo json_encode($posts_arr);
exit();
}else{
	$array = array(
		'success' => false,
		'message' => "No result for search ".$from." ".$to.""
	);
	echo json_encode($array);
}

}else{
	$array = array(
		'success' => false,
		'message' => "Empty search query"
	);
	echo json_encode($array);
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