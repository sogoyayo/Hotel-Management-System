<?php
header('Content-Type: application/json');

require('../../aaconfig.php');
require('../../data.php');
require('../../functions.php');
require('../../functions2.php');

// include('../../mailer.php');
include('../../sms.php');
// include('../../engine.php');

$timestamp = time();

if (isset($_REQUEST['apptoken'])) {

    $apptoken = input_check($_REQUEST['apptoken']);

    if (CheckToken($mysqli, $apptoken)==true) {

        if (getRoles_DMC($mysqli)===true) {
            // code...
           // $dmc_id = $_SESSION['id'];
           // $dmc_name = $_SESSION['name'];

    $sql = "SELECT * FROM users where role='".$_SESSION['id']."' "; 
      if ($res = $mysqli->query($sql)) {
                if ($res->num_rows > 0) {
                    echo "[";
                   
                    $count=0;
                    while ($col = $res->fetch_array()) {
                        $count= ++$count;
                        $rownum= $res->num_rows;
                        $array=[
                            'id' => "".$col['id']."",
                            'token' => "".$col['token']."",
                            'mail' => "".$col['mail']."",
                            'first_name' => "".$col['fname']."",
                            'last_name' => "".$col['lname'].""
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
                'message' => "Failed DMC roles info"
            ];
            $return = json_encode($array);
            echo "$return";
            exit();
        }
        unset($_SESSION);
        
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