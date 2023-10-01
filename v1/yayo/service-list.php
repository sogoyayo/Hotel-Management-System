<?php
header('Content-Type: application/json');

require('../../aaconfig.php');
require('../../data.php');
require('../../functions.php');
require('../../functions2.php');

// include('../../mailer.php');
include('../../sms.php');
include('../../engine.php');

$timestamp = time();

if (isset($_REQUEST['apptoken'])) {

    $apptoken = input_check($_REQUEST['apptoken']);
    
    if (CheckToken($mysqli, $apptoken)==true) {

        $usertoken = input_check($_REQUEST['usertoken']);
        
        $sql = "SELECT * FROM service where usertoken='$usertoken' and display=1"; 
         if ($res = $mysqli->query($sql)) {
            if ($res->num_rows > 0) {
                echo "[";
               
                $count=0;
                while ($col = $res->fetch_array()) {
                    $count= ++$count;
                    $rownum= $res->num_rows;
                    $array=[
                        'id' => "".$col['id']."",
                        'usertoken' => "".$col['usertoken']."",
                        'service_name' => "".$col['service_name']."",
                        'date_from' => "".$col['date_from']."",
                        'date_to' => "".$col['date_to']."",
                        'location' => "".$col['location']."",
                        'country' => "".$col['country']."",
                        'city' => "".$col['city']."",
                        'longitude' => "".$col['longitude']."",
                        'latitude' => "".$col['latitude']."",
                        'description' => "".$col['description']."",
                        'social_media_link' => "".$col['social_media_link']."",
                        'youtube_link' => "".$col['youtube_link']."",
                        'price_adult' => "".$col['price_adult']."",
                        'price_child' => "".$col['price_child']."",
                        'child_age_from' => "".$col['child_age_from']."",
                        'child_age_to' => "".$col['child_age_to']."",
                        'discounts' => "".$col['discounts']."",
                        'discount_from' => "".$col['discount_from']."",
                        'discount_to' => "".$col['discount_to']."",
                        'min_pax_discount' => "".$col['min_pax_discount']."",
                        'image_name' => "".$col['image_name']."",
                        'image_url' => "".$col['image_url']."",
                        'timestamp' => "".$col['timestamp']."",
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
                    'message'=>"No results"
                ];
                $array=json_encode($array);
                echo "$array";
                exit;
            }
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