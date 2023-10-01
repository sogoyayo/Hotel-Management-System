<?php

require('./test-db.php');

require __DIR__ . '/vendor/autoload.php';


use Twilio\Rest\Client;

$timestamp = time();

// Your Account SID and Auth Token from twilio.com/console
// $account_sid = 'ACa889cacec67fd613c3a96695b0cea877';
$account_sid = 'AC92ad9e90bb30a75c277cfa563ee1f533';

// $auth_token = 'ec96f4cabc36f01303c441ee5cd04ada';
$auth_token = '7a9970064ddb111e33ee6d038b3d6cc7';

// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities
// $twilio_number = "+19085096481";
$twilio_number = "+19786307887";
// $to_number = "+2348187907998";
$to_number = "+2348130645443";

$message = 'Hasta La Vista, Baby!!';

$client = new Client($account_sid, $auth_token);

function send_sms($mysqli, $message, $to_number, $timestamp, $twilio_number, $client)
{
    // global $client;
    try {
        //code...
        $status = $client->messages->create(
            // Where to send a text message (your cell phone?)
            $to_number,
            array(
                'from' => $twilio_number,
                'body' => $message
            )
        );

        if ($status) {
            # code...
            $error_log = 0;
            $sql = "INSERT INTO sms_log (message, recipient_no, sent, error_object, timestamp) VALUES('$message', '$to_number', 1, '$error_log', '$timestamp') ";
            if ($mysqli->query($sql) == true) {
                echo 'successful';
                return true;
                exit();
            } else {
                return false;
                exit();
                $mysqli->error;
            }
            // Close connection 
            $mysqli->close();
        }
    } catch (\Exception $err) {
        //throw $err;
        if ($err->getMessage()) {
            # code...
            $error_log = addslashes($err->__toString());
            $sql = "INSERT INTO sms_log (message, recipient_no, sent, error_object, timestamp) VALUES('$message', '$to_number', 0, '$error_log', '$timestamp') ";
            if ($mysqli->query($sql) == true) {
                echo 'failed';
                return true;
                exit();
            } else {
                return false;
                exit();
                $mysqli->error;
            }
            // Close connection 
            $mysqli->close();
        }
    }
}

send_sms($mysqli, $message, $to_number, $timestamp, $twilio_number, $client);
