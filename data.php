<?

 $sql = "SELECT * FROM settings where id=1";
 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
    	if ($row = $res->fetch_array())  {
    	$appname=$row['appname'];
    	$appmail=$row['appmail'];
        $appphone=$row['appphone'];
       
}
    }
}


define('APPNAME', $appname);
define('URL', 'http://' . $_SERVER['HTTP_HOST']);
define('DOMAIN', $_SERVER["HTTP_HOST"]);
define('APPURL', 'http://test.hotelsoffline.com');
define('APPMAIL', $appmail);
define('APPPHONE', $appphone);
define('EZEEBASEURL', 'https://live.ipms247.com');
define('EZEE_AUTH_KEY', '983e6b30e133@9148790807c57666de-bb8c-11ea-a');
define('EZEE_USERNAME', 'D657610113');

$_SESSION['EZEEBASEURL'] = "https://live.ipms247.com";

$systemtoken ="1";

$timestamp=time();
define('TIMESTAMP', '$timestamp');
// $ip = $_SERVER['REMOTE_ADDR'];

function clientIpAddress(){
  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
    $address = $_SERVER['HTTP_CLIENT_IP'];
  }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }else{
    $address = $_SERVER['REMOTE_ADDR'];
  }
  return $address;
}

$ip = clientIpAddress();


$_SESSION['ip'] = $ip;

$date = date("d-m-Y, h:m:s A ",$timestamp);
$add_impressions="0.8";
$add_views="1";
$link_exp_hr="24";
$link_exp_hr_dne=$link_exp_hr * 3600;
$link_exp=$timestamp + $link_exp_hr_dne;
$twelvehours = 12 * 3600;
$twentyfourhours = 24 * 3600;
$twentyfourhoursago = $timestamp - $twentyfourhours;
//$unik=rand(111,999);

//$show = date("d-m-Y, h:m:s A ",$twentyfourhoursago);
//echo "$link_exp_hr_dne and $link_exp and $twentyfourhoursago <br />";
//echo "$show";
//exit();
//echo "$timestamp + $link_exp_hr_dne gave $link_exp";
//exit;

// $connectDB;

$uri = $_SERVER['REQUEST_URI'];
//echo $uri; // Outputs: URI
 
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
 
 $realurl1 = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
 // echo $realurl; // Outputs: Full URL without https://

$realurl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//echo $realurl; // Outputs: Full URL
//exit;
 
 
$query = $_SERVER['QUERY_STRING'];
//echo $query; // Outputs: Query String

//echo "below data string <br>";
 

// withdrawal table
// when status is 0 - unprocessed
// when 1 PAID
// when 2 sent for procesing 
// when 3 failed, retry


?>