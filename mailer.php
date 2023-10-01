    <?php

    // Start with PHPMailer class
    use PHPMailer\PHPMailer\PHPMailer;

    require_once 'vendor/autoload.php';

    // create a new object
    $mail = new PHPMailer();

    // configure an SMTP
   $mail->isSMTP();
    $mail->Host = 'sg08.tmd.cloud';
    $mail->SMTPAuth = true;
    $mail->Username = 'hello@hotelsoffline.com';
    $mail->Password = 'K8m$=+sq#=?A';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('hello@hotelsoffline.com', ''.APPNAME.'');
$dbname = "HotelsOffline";

     $sql = "SELECT * FROM mail_tb where sent=0 and mail!='' order by id DESC";
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // if ($row = $res->fetch_array())  
       while($row = $res->fetch_array())  
        { 
          $dbmail=$row['mail'];
          $dbsubject=$row['subject'];
          $dbbody=$row['body'];
          $dbid=$row['id'];
          $dbname=$row['name'];

$mail2 = clone $mail;
   $mail2->addAddress($dbmail, $dbname);
   $mail2->addReplyTo(''.APPMAIL.'', ''.APPNAME.'');
    // $mail->addAddress = "$dbmail";
    $mail2->Subject = "$dbsubject";

 //  echo "$dbmail, $dbsubject, $dbbody";
 // exit();
 //   if (isset($_POST['submit'])) {

        $body ="$dbbody<br /><br />
        Stay safe.<br />
        ";
        // Set HTML 
        $mail2->isHTML(TRUE);
        $mail2->Body = $body;
        $mail2->AltBody = strip_tags($body);

        // send the message
        // try {
          if($mail2->send()){

       $timestamp=time();
            $sql = "UPDATE mail_tb SET sent='1', sent_timestamp='$timestamp' WHERE id='$dbid'"; 
if($mysqli->query($sql) === true){ 
 //  echo "Records was updated successfully."; 
}
        } 
        // catch(exeption $e) {
        else{
$timestamp=time();
            $sql = "UPDATE mail_tb SET sent='0', sent_timestamp='$timestamp' WHERE id='$dbid'"; 
if($mysqli->query($sql) === true){ 
 //  echo "Records was updated successfully."; 
}
   //         echo "Message has been sent successfully to $dbmail - $dbid";
        }


             } 
      //  echo "</table>"; 
        $res->free(); 
    } 
    else { 
     //  echo "No unsent mail."; 
    } 
} 
else { 
 //   echo "ERROR: Could not able to execute $sql. " 
                                         //    .$mysqli->error; 
} 
  //  }
    ?>
   