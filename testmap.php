<?php
require('aaconfig.php');
require('data.php');
require('functions.php');
require('functions2.php');

// include('mailer.php');
// include('sms.php');
// include('engine.php');

CheckForUnMappedDataFromEzee($mysqli);
checkForContractsWithoutToken($mysqli);

$display = strtotime("2022-02-24");
echo $display;

// echo " - ";

// $display_another = date("d-m-Y", $display);

// echo $display_another;

// echo " - ";

// $display2 = strtotime("24-02-2022");
// echo $display2;

// $display_another2 = date("")
?>
