    <?php
//require('aaconfig.php');
//require('data.php');

     $sql = "SELECT * FROM sms_tb where send=0 LIMIT 1";
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       if ($row = $res->fetch_array())  
        { 
          $phone=$row['phone'];
          $dbmessage=rawurlencode($row['message']);
          $dbid=$row['id'];

 $url="http://www.appwebsms.com/index.php?option=com_spc&comm=spc_api&username=fireswitchtech&password=fst@0852&sender=ReniTrust&recipient=$phone&message=$dbmessage";

//$url="https://sms.com.ng/sendsms.php?user=fireswitchtech&password=fst@0852&mobile=$phone&senderid=SMS.com.ng&message=$dbmessage&dnd=1";

$data = file_get_contents($url);

  if (strpos($data, 'OK') !== false) {

            $sql = "UPDATE sms_tb SET send='1', fail='$data' WHERE id='$dbid'"; 
if($mysqli->query($sql) === true){ 
 
}

 }else{
 

   $sql = "UPDATE sms_tb SET send='2', fail='$data' WHERE id='$dbid'"; 
if($mysqli->query($sql) === true){ 

}

 }

             }
      //  echo "</table>"; 
        $res->free(); 
    }
    else { 
    } 
}
else { 
 //   echo "ERROR: Could not able to execute $sql. " 
                                         //    .$mysqli->error; 
} 
  //  }
    ?>
   