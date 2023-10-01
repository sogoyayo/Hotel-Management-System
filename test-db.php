<?php
define("DB_SERVER", "localhost");
define("DBASE_NAME", 'test');
define("DBASE_USER", 'root');
define("DBASE_PASS", '');
$connect_error = "We sincerely apologise. We are experiencing connection problems";

$con = mysqli_connect(DB_SERVER, DBASE_USER, DBASE_PASS, DBASE_NAME);

($con) ? TRUE : die($connect_error);

$mysqli = mysqli_connect(DB_SERVER, DBASE_USER, DBASE_PASS, DBASE_NAME);

if (mysqli_connect_errno()) {
    die("Unable to connect to the server " . mysqli_connect_error());
}
global $mysqli;