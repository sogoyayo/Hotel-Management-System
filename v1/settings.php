<?
header('Content-Type: application/json');

require('../aaconfig.php');
require('../data.php');
require('../functions.php');
require('../functions2.php');

// include('../mailer.php');
include('../sms.php');
include('../engine.php');

if (isset($_REQUEST['apptoken'])) {

$apptoken = input_check($_REQUEST['apptoken']);

if (CheckToken($mysqli, $apptoken)==true) {

	# code...
		 $sql = "SELECT * FROM settings where id=1";
 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
    	if ($row = $res->fetch_array())  {
    	$appname=$row['appname'];
    	$appmail=$row['appmail'];
        $appphone=$row['appphone'];

	$array = [
 'success' => true,
 'message' => "System data fetched",
 'appname' => "$appname",
 'appmail' => "$appmail",
 'appphone' => "$appphone"
 ];
$return= json_encode($array);
echo "$return";
exit();
}
    }else{
    		$array = [
 'success' => false,
 'message' => "No data fetched"
 ];
$return= json_encode($array);
echo "$return";
exit();
    }
}



}

}
 

 ?>