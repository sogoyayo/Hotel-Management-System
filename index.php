<?
header('Content-Type: application/json');

require('aaconfig.php');
require('data.php');
require('functions.php');
require('functions2.php');

include('mailer.php');
include('sms.php');
include('engine.php');

echo "Unauthorized access";
exit();
?>