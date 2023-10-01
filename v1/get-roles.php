<?
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

// echo"the apptoken is - $apptoken";
// exit();

if (CheckToken($mysqli, $apptoken)==true) {


$sql = "SELECT * FROM roles where role != 'SuperAdmin'";
if ($res = $mysqli->query($sql)) {
    if ($res->num_rows > 0) {
    	echo "[";
    	 $counter = 0;
    	 while ($col = $res->fetch_array())  
       // if ($row = $res->fetch_array())  
        {

        	$rownum= $res->num_rows;
        	$counter = ++$counter;
 
    $array = [
 'id' => "".$col['id']."",
 'role' => "".$col['role']."",
 'name' => "".$col['name']."",
];

$return= json_encode($array, JSON_PRETTY_PRINT);
if ($rownum > $counter) {
	# code...
	echo "$return,";
}elseif ($rownum==$counter) {
	# code...
	echo "$return";
}
        }
        echo "]";
        exit();
        $res->free(); 
    }
    else {
    	$array = [
 'success' => false,
 'message' => "something went wrong"
 ];
$return= json_encode($array);
echo "$return";
exit();
    }

}
else {
$array = [
 'success' => false,
 'message' => "something went wrong, please try again 2"
 ];
$return= json_encode($array);
echo "$return";
exit();
}

$mysqli->close(); 

		// echo "string";
		 exit();


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
            'message' => "Unauthorized access..token not set"
        ];
        $return = json_encode($array);
        echo "$return";
        exit();
}

 ?>