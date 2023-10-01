<?php 

include('../../../aaconfig.php');
include('../../../data.php');
include('../../../functions.php');
include('../functions.php');

$db = new db();


   $sql = "SELECT * from init_contract where type = 'dynamic' and hotelcode != '0' and channel = 'hotelbeds' order by rand()";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again..";
                    return false;
                }else{
if($stmt->rowCount() == 0){

           $stmt = null;
           $_SESSION['err'] = "No student found..";
            return false;
            // code...
        }else{
            
           if($contract = $stmt->fetchAll(PDO::FETCH_ASSOC)){
            foreach ($contract as $key => $value) {
              // code...
                // var_dump($contract);
                // exit();
            getHotelBedsVailability($db, $mysqli, $value['hotelcode'], $value['hoteltoken'], $value['token'], $value['dmctoken']);
            }
// return $contract;
    }

    }
}


?>
