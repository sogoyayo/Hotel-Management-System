<?
$timestamp=time();

use PHPMailer\PHPMailer\PHPMailer;

# DECODE THE HTMLSPECIAL STRING IN TO STRING
# -----------------------------------------------------------------------*/
function escape_data($data){
  //$con=mysqli_connect(DB_SERVER,DBASE_USER,DBASE_PASS,DBASE_NAME);
  $mysqli = mysqli_connect(DB_SERVER,DBASE_USER,DBASE_PASS,DBASE_NAME);
  if(function_exists('mysql_real_escape_string')){
    $data = mysqli_real_escape_string($mysqli, $data);
    $data = strip_tags($data);
  }else{
    $data = trim($data);
    $data = mysqli_escape_string($mysqli, $data);
    $data = strip_tags($data);
  }
  return $data;
}
# ---------------------------------------------------------------------
// unset($_SESSION);

function get_ip_info(){
  $indicesServer = array('PHP_SELF',
'argv',
'argc',
'GATEWAY_INTERFACE',
'SERVER_ADDR',
'SERVER_NAME',
'SERVER_SOFTWARE',
'SERVER_PROTOCOL',
'REQUEST_METHOD',
'REQUEST_TIME',
'REQUEST_TIME_FLOAT',
'QUERY_STRING',
'DOCUMENT_ROOT',
'HTTP_ACCEPT',
'HTTP_ACCEPT_CHARSET',
'HTTP_ACCEPT_ENCODING',
'HTTP_ACCEPT_LANGUAGE',
'HTTP_CONNECTION',
'HTTP_HOST',
'HTTP_REFERER',
'HTTP_USER_AGENT',
'HTTPS',
'REMOTE_ADDR',
'REMOTE_HOST',
'REMOTE_PORT',
'REMOTE_USER',
'REDIRECT_REMOTE_USER',
'SCRIPT_FILENAME',
'SERVER_ADMIN',
'SERVER_PORT',
'SERVER_SIGNATURE',
'PATH_TRANSLATED',
'SCRIPT_NAME',
'REQUEST_URI',
'PHP_AUTH_DIGEST',
'PHP_AUTH_USER',
'PHP_AUTH_PW',
'AUTH_TYPE',
'PATH_INFO',
'ORIG_PATH_INFO') ;
$result ="";
$result = $result . '<table cellpadding="10">' ;
foreach ($indicesServer as $arg) {
    if (isset($_SERVER[$arg])) {
        $result = $result . '<tr><td>'.$arg.'</td><td> __ ' . $_SERVER[$arg] . ' </td> </tr>' ;
    }
    else {
        $result = $result .'<tr><td>'.$arg.'</td><td>__</td> </tr>' ;
    }
}
$result = $result .'</table>' ;
return $result;
}


function sql_detect($data){
    $sql = array(
    "DROP DATABASE",
    "ALTER TABLE",
    "TRUNCATE TABLE",
    "DELETE FROM",
    "INSERT INTO",
    "DROP TABLE",
    "CREATE TABLE"
    );

    $str  = strtoupper($data);
    $count = count($sql);
    $b="";

    for ($i=0; $i < $count; $i++) {
      $pos = strpos($str, $sql[$i]);
      if ($pos === false) {
        $b= FALSE;
      }else{
        $b= TRUE;
        break;
      }
    }

    if ($b == false) {
      return FALSE;
    }else{
      return TRUE;
    }
}

function sql_offence($data){
        $data = escape_data($data);
        $data = str_replace(" ", "_", $data);
        $data = "__".$data."__";
        return $data;
}

function attack_detect($offence,$mem_id){
    $con=mysqli_connect(DB_SERVER,DBASE_USER,DBASE_PASS,DBASE_NAME);
     $ip_info = escape_data(get_ip_info());
      $offence = escape_data($offence);
     if(empty($memid)){
      $memid = "UN-KNOWN";
     }

    $sql = " insert into db_offence_tb (ip_address ,timestamp ,ip_info,offence,user_id,dir_url) values ('".get_client_ip()."','". date("F j, Y, D, h:i a")."','".$ip_info."','$offence','$memid','$realurl')";
    mysqli_query($con,$sql);

      $subject = 'THREAT ALERT';

      $email = "ayodeletim@gmail.com" ;
      //-----
        $from = "$webmail3";
        //-----

        $Server ="";
        $headers = "From: $Server <".$from.">\n";
        $headers .= "Reply-To: $Server <".$from.">\n";
        $headers .= "Return-Path: $Server <".$from.">\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";

        $message = msg_html("<h2>$offence<h2> </br>" . get_ip_info());

        mail($email, $subject, $message, $headers);

}


function input_check($data){
  if(sql_detect($data) ==TRUE){
    $offence = sql_offence($data);
    attack_detect($offence);
    return "****";
  }else{
    $data = trim($data);
    $data = filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data , ENT_QUOTES,'UTF-8');
    $data = escape_data($data);

/*
      $subject = 'THREAT ALERT';

      $email = "ayodeletim@gmail.com" ;
      //-----
        $from = "$webmail3";
        //-----

        $Server ="jhfhfjhfh";
        $headers = "From: $Server <".$from.">\n";
        $headers .= "Reply-To: $Server <".$from.">\n";
        $headers .= "Return-Path: $Server <".$from.">\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";

        $message = msg_html("<h2>$offence<h2> </br>" . get_ip_info());

        mail($email, $subject, $message, $headers);
*/
    return $data;
  }

}

function input_check_large($data){
  if(sql_detect($data) ==TRUE){
    $offence = sql_offence($data);
    attack_detect($offence);
    return "****";
  }else{
    $data = trim($data);
    $data = filter_var($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
   // $data = strip_tags($data);
   // $data = stripslashes($data);
 //   $data = htmlspecialchars($data , ENT_QUOTES,'UTF-8');
    $data = escape_data($data);

/*
      $subject = 'THREAT ALERT';

      $email = "ayodeletim@gmail.com" ;
      //-----
        $from = "$webmail3";
        //-----

        $Server ="jhfhfjhfh";
        $headers = "From: $Server <".$from.">\n";
        $headers .= "Reply-To: $Server <".$from.">\n";
        $headers .= "Return-Path: $Server <".$from.">\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";

        $message = msg_html("<h2>$offence<h2> </br>" . get_ip_info());

        mail($email, $subject, $message, $headers);
*/
    return $data;
  }

}


function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

    $ipaddress = $_SERVER['SERVER_ADDR'] ;
    return $ipaddress;
}


function datediff ($olddate, $newdate){

// Declare and define two dates 
// $date1 = strtotime("2016-06-01 22:45:00"); 
// $date2 = strtotime("2018-09-21 10:44:01"); 

// Formulate the Difference between two dates 
$diff = abs($newdate - $olddate); 


// To get the year divide the resultant date into 
// total seconds in a year (365*60*60*24) 
$years = floor($diff / (365*60*60*24)); 


// To get the month, subtract it with years and 
// divide the resultant date into 
// total seconds in a month (30*60*60*24) 
$months = floor(($diff - $years * 365*60*60*24) 
              / (30*60*60*24)); 


// To get the day, subtract it with years and 
// months and divide the resultant date into 
// total seconds in a days (60*60*24) 
$days = floor(($diff - $years * 365*60*60*24 - 
      $months*30*60*60*24)/ (60*60*24)); 


// To get the hour, subtract it with years, 
// months & seconds and divide the resultant 
// date into total seconds in a hours (60*60) 
$hours = floor(($diff - $years * 365*60*60*24 
  - $months*30*60*60*24 - $days*60*60*24) 
                / (60*60)); 


// To get the minutes, subtract it with years, 
// months, seconds and hours and divide the 
// resultant date into total seconds i.e. 60 
$minutes = floor(($diff - $years * 365*60*60*24 
    - $months*30*60*60*24 - $days*60*60*24 
            - $hours*60*60)/ 60); 


// To get the minutes, subtract it with years, 
// months, seconds, hours and minutes 
$seconds = floor(($diff - $years * 365*60*60*24 
    - $months*30*60*60*24 - $days*60*60*24 
        - $hours*60*60 - $minutes*60)); 

// Print the result 
// printf("%d years, %d months, %d days, %d hours, "
//   . "%d minutes, %d seconds", $years, $months, 
//       $days, $hours, $minutes, $seconds); 

if ($years!='') {
  # code...
  // $value = "$years years, $months months, $days days, $hours hours, $minutes minutes, $seconds seconds";
   $value = "$years year(s)";
  return $value;
}elseif ($months!='') {
  # code...
  // $value = "$months months, $days days, $hours hours, $minutes minutes, $seconds seconds";
   $value = "$months month(s)";
  return $value;
}elseif ($days!='') {
  # code...
  // $value = "$days days, $hours hours, $minutes minutes, $seconds seconds";
  $value = "$days day(s)";
  return $value;
}elseif ($hours!='') {
  # code...
  // $value = "$hours hours, $minutes minutes, $seconds seconds";
   $value = "$hours hour(s)";
  return $value;
}elseif ($minutes!='') {
  # code...
  // $value = "$minutes minutes, $seconds seconds";
  $value = "$minutes minute(s)";
  return $value;
}elseif ($seconds!='') {
  # code...
  $value = "$seconds second(s)";
  return $value;
}
}

// Function to generate OTP 
function generateNumericOTP($n) { 
      
    // Take a generator string which consist of 
    // all numeric digits 
    $generator = "1357902468"; 
  // $generator = "1357902468";
    // Iterate for n-times and pick a single character 
    // from generator and append it to $result 
      
    // Login for generating a random character from generator 
    //     ---generate a random number 
    //     ---take modulus of same with length of generator (say i) 
    //     ---append the character at place (i) from generator to result 
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
  
    // Return result 
    $result = intval($result);
    return $result; 
} 

function generateAlphaNumericOTP($n) { 
      
    // Take a generator string which consist of 
    // all numeric digits 
    $generator = "1357902468ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
  
    // Iterate for n-times and pick a single character 
    // from generator and append it to $result 
      
    // Login for generating a random character from generator 
    //     ---generate a random number 
    //     ---take modulus of same with length of generator (say i) 
    //     ---append the character at place (i) from generator to result 
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
  
    // Return result 
    return $result; 
} 




function generateAlphaNumericOTP_case($n) { 
      
    // Take a generator string which consist of 
    // all numeric digits 
    $generator = "1357902468ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"; 
  
    // Iterate for n-times and pick a single character 
    // from generator and append it to $result 
      
    // Login for generating a random character from generator 
    //     ---generate a random number 
    //     ---take modulus of same with length of generator (say i) 
    //     ---append the character at place (i) from generator to result 
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
  
    // Return result 
    return $result; 
} 




function generateAlphaOTP($n) { 
      
    // Take a generator string which consist of 
    // all numeric digits 
    $generator = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
  
    // Iterate for n-times and pick a single character 
    // from generator and append it to $result 
      
    // Login for generating a random character from generator 
    //     ---generate a random number 
    //     ---take modulus of same with length of generator (say i) 
    //     ---append the character at place (i) from generator to result 
  
    $result = ""; 
  
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
  
    // Return result 
    return $result; 
} 
# end of custom functions





function CheckMailExist($mysqli,$mail){
  $sql = "SELECT * FROM users where mail='$mail'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           return true;
        } 
        // echo "</table>"; 
        $res->free(); 
    } 
    else { 
      return false;
      //  echo "Incorrect Code. Try again. <br> <b>Reset</b> and try again biko"; 
    } 
} 
else {
return false; 
   // echo "ERROR: Could not able to execute command.. ";
                                             $mysqli->error; 
} 
$mysqli->close(); 
}



function mail_tb($mysqli,$email,$subject,$body,$timestamp){
    $body = addslashes($body);

 $timestamp = time();
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
$mail2 = clone $mail;
    $mail2->addAddress($email, $dbname);
   $mail2->addReplyTo(''.APPMAIL.'', ''.APPNAME.'');
    $mail2->Subject = "$subject";


        $body ="
        $body<br /><br />
        Stay safe
        ";
        // Set HTML 
        $mail2->isHTML(TRUE);
        $mail2->Body = $body;
        $mail2->AltBody = strip_tags($body);

          if($mail2 -> send()){

            $body = addslashes($body);
    $sql = "INSERT INTO mail_tb (mail, subject, body, timestamp, sent, sent_timestamp)
              VALUES('$email', '$subject','$body','$timestamp','1', '$timestamp') "; 
    if ($mysqli->query($sql) == true) 
{ 
            return true;

            }
else
{
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
          }else{
$body = addslashes($body);
    $sql = "INSERT INTO mail_tb (mail, subject, body, timestamp, sent)
              VALUES('$email', '$subject','$body','$timestamp','0') "; 
    if ($mysqli->query($sql) == true) 
{ 

            return true;

                 }
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
          }


  
// Close connection 
$mysqli->close(); 

}




function mail_tb_clas($mysqli,$email,$subject,$body,$timestamp){
    $body = addslashes($body);

 $timestamp = time();
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
$mail2 = clone $mail;
    $mail2->addAddress($email, $dbname);
   $mail2->addReplyTo(''.APPMAIL.'', ''.APPNAME.'');
    $mail2->Subject = "$subject";


        $body ="
        $body<br /><br />
        Stay safe
        ";
        // Set HTML 
        $mail2->isHTML(TRUE);
        $mail2->Body = $body;
        $mail2->AltBody = strip_tags($body);

          if($mail2 -> send()){

            }else{

          }


  
// Close connection 
$mysqli->close(); 

}



function CheckToken($mysqli, $apptoken){
   $sql = "SELECT * FROM apptoken_tb where token='$apptoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           return true;
        } 
        // echo "</table>"; 
        $res->free(); 
    } 
    else { 
      return false;
      //  echo "Incorrect Code. Try again. <br> <b>Reset</b> and try again biko"; 
    } 
} 
else {
return false; 
   // echo "ERROR: Could not able to execute command.. ";
                                             $mysqli->error; 
} 
$mysqli->close(); 
}



function InsertUserData($mysqli, $fname, $lname, $mail, $phone, $address, $pword, $timestamp, $role, $ip, $country, $city, $state, $zip_code){

 $token = generateAlphaNumericOTP(10);
$role = intval($role);
$sql = "INSERT INTO users (token, mail, fname, lname, phone, address, pword, timestamp, role, country, city, ip_create, state, zip_code) 
   VALUES('$token', '$mail','$fname', '$lname','$phone', '$address','$pword','$timestamp', '$role', '$country', '$city', '$ip', '$state', '$zip_code') "; 
    if ($mysqli->query($sql) == true) 
{ 
$subject="Your new Account at ".APPNAME."";
  $body="Hi $fname,<br/>
  Welcome to ".APPNAME.". To activate your account, your activation token is <b>$token</b>.<br/>
  Click ".APPURL."/activate/$token to activate your account<br/><br/>
Warm regards, <br/>
The ".APPNAME." Team.
";

  if (mail_tb($mysqli,$mail,$subject,$body,$timestamp)==true) {

     $_SESSION['fname']="$fname";
     $_SESSION['lname'] = "$lname";
    $_SESSION['mail']="$mail";
    $_SESSION['usertoken']="$token";

if (isset($_SESSION['ref'])) {
  # code...

}

  return true;
  exit();


 
}else{
    return false;
    exit();
   }
}
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
  
// Close connection 
$mysqli->close(); 
}




function GetUsertokenFromRef ($mysqli, $ref){
   $sql = "SELECT * FROM users where ref='$ref'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $token=$row['token'];
        //   $_SESSION['ttoken'] = $token;
    return $token;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}

function updateCreditScore($mysqli, $usertoken, $score){
  $timestamp = time();
  $creditscore = GetUserCreditscore($mysqli, $usertoken);
  $newscore = $creditscore + $score;

 $sql = "INSERT INTO credit_score (usertoken, score, timestamp) 
              VALUES('$usertoken', '$newscore','$timestamp') "; 
    if ($mysqli->query($sql) == true) 
{ 


}

}


function GetUserCreditscore($mysqli, $usertoken){

    $sql = "SELECT SUM(score) AS score FROM credit_score where usertoken='$usertoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
      // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
          $score = $row['score'];
       return $score;

        }
        $res->free(); 
    } 
    else { 
   
   } 
} 
else {
 
} 
$mysqli->close(); 

}


function CheckUserToken($mysqli, $token){
   $sql = "SELECT * FROM users where token='$token'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           return true;
        } 
        // echo "</table>"; 
        $res->free(); 
    } 
    else { 
      return false;
      //  echo "Incorrect Code. Try again. <br> <b>Reset</b> and try again biko"; 
    } 
} 
else {
return false; 
   // echo "ERROR: Could not able to execute command.. ";
                                             $mysqli->error; 
} 
$mysqli->close(); 
}



function ActivateUser($mysqli, $token){
    $timestamp = time();
  $sql = "UPDATE users SET activated=1 WHERE token='$token'";
if($mysqli->query($sql) === true){

$mail = GetUserMail($mysqli, $token);
$name = GetUserName($mysqli, $token);

  $subject="Your ".APPNAME." Account";
  $body="Hi $name, <br/>
  Your ".APPNAME." account has been activated<br />
Warm regards, <br />
The ".APPNAME." Team.
";

if (mail_tb($mysqli,$mail,$subject,$body,$timestamp)==true) {
  # code...
  return true;
}
}else{
  return false;
}
}



function GetUserMail($mysqli, $usertoken){
   $sql = "SELECT * FROM users where token='$usertoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $mail=$row['mail'];
    return $mail;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}


function getBankDetails($mysqli, $usertoken){
   $sql = "SELECT * FROM users where token='$usertoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $bankname=$row['bankname'];
           $banknumber = $row['banknumber'];

           $_SESSION['banknumber'] = $banknumber;
           $_SESSION['bankname'] = $bankname;
    return true;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}


function GetUserPhone($mysqli, $usertoken){
   $sql = "SELECT * FROM users where token='$usertoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $phone=$row['phone'];
    return $phone;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}



function GetUserFname ($mysqli, $usertoken){

 $sql = "SELECT * FROM users where token='$usertoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $fname=$row['fname'];
    return $fname;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}

}



function GetUserLname ($mysqli, $usertoken){

 $sql = "SELECT * FROM users where token='$usertoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $lname=$row['lname'];
    return $lname;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}

}




function CheckActivated($mysqli, $mail){
    $sql = "SELECT * FROM users where mail='$mail'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
          $activated=$row['activated'];
          $usertoken=$row['token'];
if ($activated=='1') {
  # code...
     return true;
}else{
  $subject = "Your ".APPNAME." Account Activation";
  $body = "Your User Unique Token is <b>$usertoken</b>
  <br/>Activate your account by clicking ".APPURL."/activate/$token .";
  
if(mail_tb($mysqli,$mail,$subject,$body,$timestamp)==true) {

  return false;
}
}
  } 
        // echo "</table>"; 
        $res->free(); 
    } 
    else { 
      return false;
      //  echo "Incorrect Code. Try again. <br> <b>Reset</b> and try again biko"; 
    } 
} 
else {
return false; 
   // echo "ERROR: Could not able to execute command.. ";
                                             $mysqli->error; 
} 
$mysqli->close(); 
}


function SignIn($mysqli, $email, $password){
$timestamp = time();
  $sql = "SELECT * FROM users where mail='$email'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 

          if ($password==$row['pword']) {
            # code...
           $_SESSION['mail']=$row['mail'];
           $_SESSION['fname'] = $row['fname'];
           $_SESSION['lname'] = $row['lname'];
           $_SESSION['phone'] = $row['phone'];
           $_SESSION['role'] = $row['role'];
           $_SESSION['address'] = $row['address'];
           $_SESSION['token'] = $row['token'];
           $_SESSION['timestamp'] = $row['timestamp'];
         
            $subject ="".APPNAME." Activity";
  $body = "You just logged in to your ".APPNAME." account few seconds ago.<br/>
Kindly let us know if you did not..<br/>
Warm regards,<br/>
".APPNAME." team
  ";
  
if(mail_tb($mysqli,$email,$subject,$body,$timestamp)==true) {

            return true;
                     }
          }else{
          
            return false;
          }
        } 
       
        $res->free(); 
    }
    else { 
     
    } 
} 
else { 
    return false;
} 
$mysqli->close(); 

}



function UpdateUserBankDetails($mysqli,$bankname,$banknumber,$usertoken,$timestamp){

$sql = "UPDATE users SET bankname='$bankname', banknumber='$banknumber' WHERE token='$usertoken'"; 
if($mysqli->query($sql) === true){
  return true;
}else{
  return false;
}

}

function markWithdrawPaid($mysqli, $id){
   $sql = "UPDATE withdraw SET status=1 WHERE id='$id'"; 
if($mysqli->query($sql) === true){
  return true;
}else{
  return false;
}
}


function WalletWork($mysqli, $usertoken, $amount, $type, $log, $timestamp){
   if (isset($_SESSION['walletupdatestatus'])) {
if ($_SESSION['walletupdatestatus']=='1') {
  # code...
  $pending="1";
}else{
  $pending="0";
}
  }else{
     $pending="0";
  }

if (isset($_SESSION['pending_invid'])) {
  # code...
  $updateinv=$_SESSION['pending_invid'];
}else{
  $updateinv="0";
}

if (isset($_SESSION['pending_cryptocontract'])) {
  # code...
  $pending_cryptocontract=$_SESSION['pending_cryptocontract'];
}else{
  $pending_cryptocontract="0";
}

    $sql = "INSERT INTO wallet (usertoken, amount, type, log, invid, pending, crypto_contract, timestamp) 
              VALUES('$usertoken', '$amount','$type','$log','$updateinv', $pending,'$pending_cryptocontract','$timestamp') "; 
    if ($mysqli->query($sql) == true) 
{ 
  unset($_SESSION['walletupdatestatus']);
  unset($_SESSION['pending_invid']);
  return true;
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
  
// Close connection 
$mysqli->close(); 

}


function CreateNewInvoice($mysqli, $usertoken, $rname, $rmail, $rphone, $title, $qty, $price, $amount, $description, $expiry, $type, $deliveryfee, $cost){

  if (CheckMailExist($mysqli, $rmail)==true) {
    
$invid=generateNumericOTP(9);
$timestamp=time();
$charges = getCharges($mysqli, $cost);
$sellercharges = getCharges($mysqli, $cost);
$buyercharges = getCharges($mysqli, $cost);
$rtoken=getUserToken_mail($mysqli, $rmail);
    $sql = "INSERT INTO invoices (invid, usertoken, rtoken, rname, rmail, rphone, title, qty, price, amount, description, expiry, type, timestamp, deliveryfee, charges, sellercharges, buyercharges, cost) 
              VALUES('$invid', '$usertoken','$rtoken','$rname','$rmail','$rphone','$title', '$qty', '$price', '$amount', '$description', '$expiry', '$type', '$timestamp', '$deliveryfee', '$charges', '$sellercharges', '$buyercharges', '$cost') "; 
    if ($mysqli->query($sql) == true) 
{ 
$username=GetUserName($mysqli, $usertoken);
 $subject="New Invoice on ".APPNAME."";
  $body="Hi $rname, <br/>
  $username has a rasied an invoice on your behalf on ".APPNAME."<br />
  Details below<br />
  <b>Title</b>: $title<br/>
  Pay here ".APPURL."/account/contract/view/$invid<br/>
Warm regards, <br />
The ".APPNAME." Team.
";

if (mail_tb($mysqli,$rmail,$subject,$body,$timestamp)==true) {

  $_SESSION['invid']="$invid";
  $_SESSION['title']="$title";
  $_SESSION['qty']="$qty";
  $_SESSION['price']="$price";
  $_SESSION['amount']="$amount";
  $_SESSION['description']="$description";
  $_SESSION['type']="$type";
  $_SESSION['rname']="$rname";
  $_SESSION['rmail']="$rmail";
  $_SESSION['rphone']="$rphone";
  $_SESSION['expiry']="$expiry";

  return true;
}

}
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
  
// Close connection 
$mysqli->close(); 
}else{
 if (AddNewUserfromInvoice($mysqli, $rmail, $rname, $rphone)==true) {
   # code...
   if (CreateNewInvoice($mysqli, $usertoken, $rname, $rmail, $rphone, $title, $qty, $price, $amount, $description, $expiry, $type, $deliveryfee, $cost)==true) {
     # code...
    return true;
   }
 }
}
}

function getUserDetails_mail($mysqli, $usermail){
 $sql = "SELECT * FROM users where mail='$usermail'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
         # code...
            $_SESSION['fullname']=$row['fullname'];
            $_SESSION['phone']=$row['phone'];
            $_SESSION['usertoken']=$row['token'];
       
        $res->free(); 
    }
    else { 
     return false;
    } 
}else{
  return false;
} 
}else{
  return false;
}
}


function getUserToken_mail($mysqli, $usermail){
 $sql = "SELECT * FROM users where mail='$usermail'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
         # code...
            $token=$row['token'];
       return $token;
        $res->free(); 
    }
    else { 
     return false;
    } 
}else{
  return false;
} 
}else{
  return false;
}
}

function AddNewUserfromInvoice($mysqli, $rmail, $rname, $rphone){
  $token = generateAlphaNumericOTP(10);
  $pword = md5($token);
     $sql = "INSERT INTO users (token, mail, fullname, phone, pword, timestamp) 
              VALUES('$token','$rmail','$rname','$rphone','$pword','$timestamp') "; 
    if ($mysqli->query($sql) == true) 
{ 
$subject="Your new Account at ".APPNAME."";
  $body="Hi $name,<br/>
  Welcome to ".APPNAME.".<br/>
An account has been created for you just now so that you can recieve invoices.<br/>
Your password is $token.<br/>
   To activate your account, your activation token is <b>$token</b>.<br/>
  <i>Copy this token to activate your account</i><br/>
Click ".APPURL."/auth to activate your account<br/><br/>
Warm regards, <br/>
The ".APPNAME." Team.
";
  if (mail_tb($mysqli,$rmail,$subject,$body,$timestamp)==true) {
return true;
}
}
}

function UpdateInvoice($mysqli, $invid, $title, $qty, $price, $amount, $description, $expiry, $deliveryfee, $cost){
  $timestamp=time();
$charges = getCharges($mysqli, $cost);
   $sql = "UPDATE invoices SET title='$title', qty='$qty', price='$price', amount='$amount', description='$description', edited_time='$timestamp', deliveryfee='$deliveryfee', cost='$cost', charges='$charges' WHERE invid='$invid'"; 
if($mysqli->query($sql) == true){ 
 return true;
}else{
  return false;
}
 // return true;
}

function PayInvoice ($mysqli, $invid, $trx){
   $sql = "UPDATE invoices SET paystatus='1', trx='$trx' WHERE invid='$invid'"; 
if($mysqli->query($sql) == true){ 
 return true;
}else{
  return false;
}
 // return true;
}

function confirmShipment($mysqli, $invid, $timestamp){
   $sql = "UPDATE invoices SET delivery='1', timestamp_shipment='$timestamp' WHERE invid='$invid'"; 
if($mysqli->query($sql) == true){ 
 return true;
}else{
  return false;
}
}

function confirmDelivery($mysqli, $invid, $timestamp){
   $sql = "UPDATE invoices SET delivery='2', timestamp_delivered='$timestamp' WHERE invid='$invid'"; 
if($mysqli->query($sql) == true){ 

resolveDispute($mysqli, $invid);

 return true;
}else{
  return false;
}
}

function resolveDispute($mysqli, $invid){
  $sql = "UPDATE disputes SET resolved='1' WHERE invid='$invid'"; 
if($mysqli->query($sql) == true){ 
  
 return true;
}else{
  return false;
}
}

function GetRName($mysqli, $invid){
   $sql = "SELECT * FROM invoices where invid='$invid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $rname=$row['rname'];
    return $rname;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}

function GetRMail($mysqli, $invid){
   $sql = "SELECT * FROM invoices where invid='$invid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $rmail=$row['rmail'];
    return $rmail;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}

function GetRPhone($mysqli, $invid){
   $sql = "SELECT * FROM invoices where invid='$invid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $rphone=$row['rphone'];
    return $rphone;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}

function GetInvUsertoken($mysqli, $invid){
   $sql = "SELECT * FROM invoices where invid='$invid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $usertoken=$row['usertoken'];
    return $usertoken;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}

function GetInvRUsertoken($mysqli, $invid){
   $sql = "SELECT * FROM invoices where invid='$invid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $rtoken=$row['rtoken'];
    return $rtoken;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}

function sms_tb($mysqli,$phone,$message,$timestamp){

    $sql = "INSERT INTO sms_tb (phone, message, send,timestamp) 
              VALUES('$phone', '$message','0','$timestamp') "; 
    if ($mysqli->query($sql) == true) 
{ 
  return true;
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
  
// Close connection 
$mysqli->close(); 

}

function releaseFunds($mysqli, $usertoken, $invid){
     $sql = "UPDATE wallet SET pending='0' WHERE invid='$invid' and usertoken='$usertoken'"; 
if($mysqli->query($sql) == true){ 

 $sql = "UPDATE wallet SET pending='0' WHERE invid='$invid' and usertoken=1"; 
if($mysqli->query($sql) == true){ 
 return true;
}else{
  return false;
}

 return true;
}else{
  return false;
}
}

function InvoiceDisputeUpdate($mysqli, $invid){
$sql = "UPDATE invoices SET dispute='1' WHERE invid='$invid'"; 
if($mysqli->query($sql) == true){ 
 return true;
}else{
  return false;
}
}

function CreateDispute($mysqli, $usertoken, $drtoken, $invid, $reason, $timestamp){
  $reason = addslashes($reason);
  $token=generateAlphaNumericOTP(15);
    $sql = "INSERT INTO disputes (token, usertoken, userrtoken, invid, reason,timestamp) 
              VALUES('$token', '$usertoken','$drtoken', '$invid','$reason','$timestamp') "; 
    if ($mysqli->query($sql) == true) 
{ 
  $file_path="";
  $filetype="";
 if (SubmitDisputeMessage($mysqli, $token, $usertoken, $reason, $file_path, $filetype, $timestamp)==true){

  $_SESSION['disputetoken'] = $token;
  return true;
}
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
  
// Close connection 
$mysqli->close(); 
}


function UpdateDisputeUsertoken($mysqli, $usertoken, $invid){
  $sql = "UPDATE disputes SET usertoken='$usertoken' WHERE invid='$invid'"; 
if($mysqli->query($sql) == true){ 
 return true;
}else{
  return false;
}
}



function SubmitDisputeMessage($mysqli, $disputetoken, $usertoken, $body, $file_path, $filetype, $timestamp){
  // $token=generateAlphaNumericOTP(15);
  $body = addslashes($body);
    $sql = "INSERT INTO disputes_convo (disputetoken,usertoken, body, file,filetype, timestamp) 
              VALUES('$disputetoken','$usertoken', '$body','$file_path','$filetype','$timestamp') "; 
    if ($mysqli->query($sql) == true) 
{ 
 
  return true;
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
  
// Close connection 
$mysqli->close(); 
}



function getInvoiceIDfromDispute($mysqli, $disputetoken){
    $sql = "SELECT * FROM disputes where token='$disputetoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $invid=$row['invid'];
    return $invid;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}


function getInvCharges($mysqli, $invid){
   $sql = "SELECT * FROM invoices where invid='$invid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $charges=$row['charges'];
    return $charges;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}


function getInvoiceAmount($mysqli, $invid){
   $sql = "SELECT * FROM invoices where invid='$invid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $amount=$row['amount'];
    return $amount;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}


function updatebio($mysqli, $usertoken, $fullname, $mail, $phone, $picture){
  $sql = "UPDATE users SET mail='$mail', fullname='$fullname', phone='$phone', picture='$picture' WHERE token='$usertoken'"; 
if($mysqli->query($sql) == true){ 
 return true;
}else{
  return false;
}
}


function updatebank($mysqli, $usertoken, $bankname, $banknumber){
  $sql = "UPDATE users SET bankname='$bankname', banknumber='$banknumber' WHERE token='$usertoken'"; 
if($mysqli->query($sql) == true){ 
 return true;
}else{
  return false;
}
}


function checkoldpword($mysqli, $token, $oldpword){
  $sql = "SELECT * FROM users where pword='$oldpword' and token='$token'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           return true;
        } 
        // echo "</table>"; 
        $res->free(); 
    } 
    else { 
      return false;
      //  echo "Incorrect Code. Try again. <br> <b>Reset</b> and try again biko"; 
    } 
} 
else {
return false; 
   // echo "ERROR: Could not able to execute command.. ";
                                             $mysqli->error; 
} 
$mysqli->close(); 
}


function updatepword($mysqli, $token, $pword){
   $sql = "UPDATE users SET pword='$pword' WHERE token='$token'"; 
if($mysqli->query($sql) == true){ 
 return true;
}else{
  return false;
}
}


function resetpword($mysqli, $mail, $timestamp){
  $pword=md5($timestamp);
  $sql = "UPDATE users SET pword='$pword' WHERE mail='$mail'"; 
if($mysqli->query($sql) == true){ 

  $subject="Password reset at ".APPNAME."";
  $body="Your password has been reset to <b>$timestamp</b><br /><br />
  Warm regards, <br/><br/>
";
  if (mail_tb($mysqli,$mail,$subject,$body,$timestamp)==true) {
 return true;
}

}else{
  return false;
}
}


function checkInvoiceResolved($mysqli, $invid){
 $sql = "SELECT * FROM invoices where status=1 and invid='$invid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           return true;
        } 
        // echo "</table>"; 
        $res->free(); 
    } 
    else { 
      return false;
      //  echo "Incorrect Code. Try again. <br> <b>Reset</b> and try again biko"; 
    } 
}
}


function checkinvociePaid($mysqli, $invid){
 $sql = "SELECT * FROM invoices where paystatus=1 and invid='$invid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           return true;
        } 
        // echo "</table>"; 
        $res->free(); 
    } 
    else { 
      return false;
      //  echo "Incorrect Code. Try again. <br> <b>Reset</b> and try again biko"; 
    } 
}

}


# system charges
function getCharges ($mysqli, $amount){
  if (($amount > 0) and ($amount < 5000)) {
    # code...
    return 100;
  }elseif (($amount >= 5000) and ($amount < 10000)) {
    # code...
    return 200;
  }elseif (($amount >= 10000) and ($amount < 20000)) {
    # code...
    return 400;
  }elseif (($amount >= 20000) and ($amount < 30000)) {
    # code...
    return 600;
  }

  else{
    return 2000;
  }
}


function getinvoiceType($mysqli, $invid){
  $sql = "SELECT * FROM invoices where invid='$invid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $type=$row['type'];
    return $type;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}


function getInvoiceDeliveryfee($mysqli, $invid){
   $sql = "SELECT * FROM invoices where invid='$invid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $deliveryfee=$row['deliveryfee'];
    return $deliveryfee;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}


function reversefunds($mysqli, $invid){
  $timestamp = time();
$type = getinvoiceType($mysqli, $invid);

if ($type=='seller') {
  # code...
  $buyertoken = GetInvRUsertoken($mysqli, $invid);
  $sellertoken = GetInvUsertoken($mysqli, $invid);
}elseif ($type=='buyer') {
  # code...
   $sellertoken = GetInvRUsertoken($mysqli, $invid);
  $buyertoken = GetInvUsertoken($mysqli, $invid);
}

$sellermail = GetUserMail($mysqli, $sellertoken);
$buyermail = GetUserMail($mysqli, $buyertoken);

$sellerphone = GetUserPhone($mysqli, $sellertoken);
$buyerphone = GetUserPhone($mysqli, $buyertoken);

$deliveryfee = getInvoiceDeliveryfee($mysqli, $invid);

if ($deliveryfee==0) {
  # code...
}

$charges = getInvCharges($mysqli, $invid);
$amount = getInvoiceAmount($mysqli, $invid);


$withdrawamount = $amount - $charges;
// $refundamount1 = $amount + $charges;
$refundamount1 = $amount;
$refundamount = $refundamount1 - $deliveryfee;

#withdraw from seller
$withdrawamount = "-$withdrawamount";
$type = "debit";
$log = "A withdrawal by the system for the refund of contract $invid";
if (WalletWork($mysqli, $sellertoken, $withdrawamount, $type, $log, $timestamp)==true) {
  # code...

  # refund to buyer
$type = "credit";
$log = "A refund for the contract $invid by the system";
if (WalletWork($mysqli, $buyertoken, $refundamount, $type, $log, $timestamp)==true) {
  # code...
  
 # withdraw from system seller charges
  $charges1 = "-$charges";
$type = "debit";
$log = "A withdrawal by the system for the refund of contract $invid";
if (WalletWork($mysqli, SYSTEMTOKEN, $charges1, $type, $log, $timestamp)==true) {
  # code...
  
 # withdraw from system buyer charges
   $charges2 = "-$charges";
// $type = "debit";
// $log = "A withdrawal by the system for the refund of contract $invid";
// if (WalletWork($mysqli, SYSTEMTOKEN, $charges2, $type, $log, $timestamp)==true) {
  # code...
  
 $sql = "UPDATE wallet SET pending=0 WHERE invid='$invid'"; 
if($mysqli->query($sql) == true){ 

 $sql = "UPDATE invoices SET reversed=1 WHERE invid='$invid'"; 
if($mysqli->query($sql) == true){ 


if ($deliveryfee==0) {
  # code...
return true;
}else{

  # refund seller delivery costs
$type = "credit";
$log = "A refund of delivery costs for contract $invid";
if (WalletWork($mysqli, $sellertoken, $deliveryfee, $type, $log, $timestamp)==true) {
return true;
}

}

}else{
  $log ="This is a report on a fatal error when I was trying to update a contract reversal, while reversing contract $invid. <br /> All withdrawals and refunds have been made except updating the invoice table reversed column. <br /> This is the only failure i can report at this time.<br /> functions.php line 1424";
systemlog($mysqli, $log);
return false;
}

}else{
  $log ="This is a report on a fatal error when I was trying to update a wallet pending status, while reversing contract $invid. <br /> All withdrawals and refunds have been made except updating the wallet pending status of contract $invid. <br /> This is the only failure i can report at this time. <br /> functions.php line 1430";
systemlog($mysqli, $log);
return false;
}

// }else{
//    $log ="Error trying to withdraw buyer charges from system wallet, while reversing contract $invid. <br /> functions.php, line 1436";
// systemlog($mysqli, $log);
// return false;
// }

}

}
}

}


function systemlog($mysqli, $log){
   $sql = "INSERT INTO logs (log, timestamp) 
              VALUES('$log','$timestamp') "; 
    if ($mysqli->query($sql) == true) 
{ 
  return true;
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
  
// Close connection 
$mysqli->close(); 
}


function checkInvoiceReversal($mysqli, $invid){
  $sql = "SELECT * FROM invoices where reversed=1 and invid='$invid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           return true;
        } 
        // echo "</table>"; 
        $res->free(); 
    } 
    else { 
      return false;
      //  echo "Incorrect Code. Try again. <br> <b>Reset</b> and try again biko"; 
    } 
}
}



function userwithdraw($mysqli, $usertoken, $amount){
  $timestamp = time();
     $sql = "INSERT INTO withdraw (usertoken, amount, timestamp) 
              VALUES('$usertoken', '$amount','$timestamp') "; 
    if ($mysqli->query($sql) == true) 
{ 



  return true;
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
}


function checkinvoicepay ($mysqli, $invid){
$sql = "SELECT * FROM invoices where paid=1 and invid='$invid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           return true;
        } 
        // echo "</table>"; 
        $res->free(); 
    } 
    else { 
      return false;
      //  echo "Incorrect Code. Try again. <br> <b>Reset</b> and try again biko"; 
    } 
}

}


# check if crypto currency exists
function checkCryptocurrencyExist($mysqli, $name){
   $sql = "SELECT * FROM crypto_currency where name='$name' or sname='$sname'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           return true;
        } 
        // echo "</table>"; 
        $res->free(); 
    } 
    else { 
      return false;
      //  echo "Incorrect Code. Try again. <br> <b>Reset</b> and try again biko"; 
    } 
}
}

#add new crypto currency
function addCryptoCurrency($mysqli, $name, $sname){
  $timestamp = time();
     $sql = "INSERT INTO crypto_currency (name, sname, timestamp, rates_timestamp) 
              VALUES('$name', '$sname','$timestamp', '$timestamp') "; 
    if ($mysqli->query($sql) == true) 
{ 
  return true;
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
}


# check if fiat currency exists
function checkFiatcurrencyExist($mysqli, $name){
   $sql = "SELECT * FROM crypto_fiat where name='$name' or sname='$sname'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           return true;
        } 
        // echo "</table>"; 
        $res->free(); 
    } 
    else { 
      return false;
      //  echo "Incorrect Code. Try again. <br> <b>Reset</b> and try again biko"; 
    } 
}
}

#add new fiat currency
function addFiatCurrency($mysqli, $name, $sname){
  $timestamp = time();
     $sql = "INSERT INTO crypto_fiat (name, sname, timestamp, rates_timestamp) 
              VALUES('$name', '$sname','$timestamp', '$timestamp') "; 
    if ($mysqli->query($sql) == true) 
{ 
  return true;
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
}


# add new crypto sell ad
function addCryptoSellAd($mysqli, $cryptoid, $amount, $fiatid, $rate, $notes, $usertoken){
  $timestamp = time();
  $token = generateAlphaNumericOTP(10);
  $amountpay = $amount * $rate;

     $sql = "INSERT INTO crypto_ad_sell (token, usertoken, cryptoid, amount, ramount, fiatid, rate, amountpay, notes, timestamp, status) 
              VALUES('$token', '$usertoken', '$cryptoid','$amount', '$amount', '$fiatid', '$rate', '$amountpay', '$notes', '$timestamp', '1') "; 
    if ($mysqli->query($sql) == true) 
{ 
  return true;
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
}


# add new crypto buy ad
function addCryptoBuyAd($mysqli, $cryptoid, $amount, $fiatid, $rate, $notes, $usertoken){
  $timestamp = time();
  $token = generateAlphaNumericOTP(10);
  $amountpay = $amount * $rate;

     $sql = "INSERT INTO crypto_ad_buy (token, usertoken, cryptoid, amount, ramount, fiatid, rate, amountpay, notes, timestamp, status) 
              VALUES('$token', '$usertoken', '$cryptoid','$amount', '$amount', '$fiatid', '$rate', '$amountpay', '$notes', '$timestamp', '1') "; 
    if ($mysqli->query($sql) == true) 
{ 
  return true;
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
}


function newCryptoOffer($mysqli, $usertoken, $adtoken, $comment, $type, $amount, $walletadd){
$timestamp = time();
  $token = generateAlphaNumericOTP(10);

     $sql = "INSERT INTO crypto_offer (token, usertoken, cryptowallet, adtoken, amount, comment, timestamp, type) 
              VALUES('$token', '$usertoken', '$walletadd', '$adtoken','$amount', '$comment', '$timestamp', '$type')"; 
    if ($mysqli->query($sql) == true) 
{ 
  if (newCryptoOfferChat($mysqli, $token, $usertoken, $comment)==true) {
    # code...
    return true;
  }else{
    return false;
  }
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
}


function newCryptoOfferChat ($mysqli, $token, $usertoken, $message){
 $timestamp = time();
    $sql = "INSERT INTO crypto_offer_chat (offertoken, sendertoken, message, timestamp) 
              VALUES('$token', '$usertoken', '$message', '$timestamp') "; 
    if ($mysqli->query($sql) == true) 
{ 
  return true;
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
}
}



function getcryptoAdType($mysqli, $adtoken){
  $sql = "SELECT * FROM crypto_ad_sell where token='$adtoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $type=$row['type'];
    return $type;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} else{

    $sql = "SELECT * FROM crypto_ad_buy where token='$adtoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $type=$row['type'];
    return $type;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}

}
}


# get adtoken from offertoken
function getcryptoAdToken($mysqli, $adtoken){
  $sql = "SELECT * FROM crypto_offer where token='$adtoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $adtoken=$row['adtoken'];
    return $adtoken;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}


# get ad usertoken 
function getCryptoAdUsertoken($mysqli, $adtoken){
  $sql = "SELECT * FROM crypto_ad_sell where token='$adtoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $usertoken=$row['usertoken'];
    return $usertoken;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} else{

    $sql = "SELECT * FROM crypto_ad_buy where token='$adtoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $usertoken=$row['usertoken'];
    return $usertoken;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}

}
}


# get offer usertoken
function getCryptoOfferUsertoken($mysqli, $offertoken){
 $sql = "SELECT * FROM crypto_offer where token='$offertoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $usertoken=$row['usertoken'];
    return $usertoken;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}


function getCryptoOfferAmount($mysqli, $offertoken){
      $sql = "SELECT * FROM crypto_offer where token='$offertoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
          $amount=$row['amount'];
        return $amount;
        }
        // echo "</table>"; 
        $res->free(); 
   
}
}
}

function getCOA ($mysqli, $offertoken){
     $sql = "SELECT * FROM crypto_offer where token='$offertoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
          $amount=$row['amount'];
        return $amount;
        }
        // echo "</table>"; 
        $res->free(); 
   
}
}
}


function createNewCryptoContract($mysqli, $adtoken, $offertoken, $pusertoken, $rusertoken, $cryptoamount, $fiatamount, $charges, $adtype, $timestamp, $rate, $cryptowallet){
$token = generateAlphaNumericOTP(8);
   $sql = "INSERT INTO crypto_contract (token, adtoken, offertoken, pusertoken, rusertoken, cryptoamount, fiatamount, rate, charges, adtype, timestamp, cryptowallet) 
              VALUES('$token', '$adtoken', '$offertoken', '$pusertoken', '$rusertoken', '$cryptoamount', '$fiatamount', '$rate', '$charges', '$adtype', '$timestamp','$cryptowallet') "; 
    if ($mysqli->query($sql) == true) 
{ 
  $_SESSION['cryptocontracttoken'] = $token;
  return true;
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
}

}


function updateCryptoAd($mysqli, $adtoken, $type, $amount){
  if ($type=="sell") {
    # code...
     $sql = "UPDATE crypto_ad_sell SET amount=amount-'$amount', bamount=bamount+'$amount' WHERE token='$adtoken'"; 
if($mysqli->query($sql) == true){ 
return true;
}else{
return false;
}
  }elseif ($type=="buy") {
    # code...
   $sql = "UPDATE crypto_ad_buy SET amount=amount-'$amount', bamount=bamount+'$amount' WHERE token='$adtoken'"; 
if($mysqli->query($sql) == true){ 
return true;
}else{
return false;
}
  }
}


function updateCryptoOffer($mysqli, $offertoken){
  $sql = "UPDATE crypto_offer SET accepted='1' WHERE token='$offertoken'"; 
if($mysqli->query($sql) == true){ 
return true;
}else{
return false;
}
}

function markRefunded($mysqli, $invid){
    $sql = "UPDATE disputes SET refunded='1', ended='1' WHERE invid='$invid'"; 
if($mysqli->query($sql) == true){ 
return true;
}else{
return false;
}
}

function markResolved($mysqli, $invid){
    $sql = "UPDATE disputes SET resolved='1', ended='1' WHERE invid='$invid'"; 
if($mysqli->query($sql) == true){ 
return true;
}else{
return false;
}
}


function getCryptoCurrencyNamefromAd($mysqli, $adtoken){
      $sql = "SELECT * FROM crypto_ad_buy where token='$adtoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
          $_SESSION['adrate'] = $row['rate'];
           $cryptoid=$row['cryptoid'];
  $cryptoname = getCryptoName($mysqli, $cryptoid);
  return $cryptoname;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} else{
      $sql = "SELECT * FROM crypto_ad_sell where token='$adtoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $_SESSION['adrate'] = $row['rate'];
           $cryptoid=$row['cryptoid'];
   $cryptoname = getCryptoName($mysqli, $cryptoid);
   return $cryptoname;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}
}
}

function getAdRate($mysqli, $adtoken){
     $sql = "SELECT * FROM crypto_ad_buy where token='$adtoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $rate=$row['rate'];
 return $rate;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} else{
      $sql = "SELECT * FROM crypto_ad_sell where token='$adtoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
          $rate=$row['rate'];
  return $rate;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}
}
}


function getCryptoName($mysqli, $cryptoid){
      $sql = "SELECT * FROM crypto_currency where id='$cryptoid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $name=$row['name'];
           $_SESSION['sname'] = $row['sname'];
           $_SESSION['rate_usd'] = $row['rate_usd'];
    return $name;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}


function getFiatCurrencyNamefromAd($mysqli, $adtoken){
      $sql = "SELECT * FROM crypto_ad_buy where token='$adtoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
          $_SESSION['adrate'] = $row['rate'];
           $cryptoid=$row['cryptoid'];
  $cryptoname = getFiatName($mysqli, $cryptoid);
  return $cryptoname;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} else{
      $sql = "SELECT * FROM crypto_ad_sell where token='$adtoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $_SESSION['adrate'] = $row['rate'];
           $cryptoid=$row['cryptoid'];
   $cryptoname = getFiatName($mysqli, $cryptoid);
   return $cryptoname;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}
}
}


function getFiatName($mysqli, $cryptoid){
      $sql = "SELECT * FROM crypto_fiat where id='$cryptoid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $name=$row['name'];
           $_SESSION['sname'] = $row['sname'];
           $_SESSION['rate_usd'] = $row['rate_usd'];
    return $name;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}

function getOfferCryptoWalletAdd($mysqli, $offertoken){
        $sql = "SELECT * FROM crypto_offer where token='$offertoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           
           $cryptowallet= $row['cryptowallet'];
    return $cryptowallet;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}


function updateOfferWalletAdd($mysqli, $offertoken, $walletadd){
   $sql = "UPDATE crypto_offer SET cryptowallet='$walletadd' WHERE token='$offertoken'"; 
if($mysqli->query($sql) == true){ 
return true;
}else{
return false;
}
}


function getAdAmount($mysqli, $adtoken){
   $sql = "SELECT * FROM crypto_ad_sell where token='$adtoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $amount=$row['amount'];
    return $amount;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} else{

    $sql = "SELECT * FROM crypto_ad_buy where token='$adtoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $amount=$row['amount'];
    return $amount;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}

}
}


function checkCryptoContractReversal($mysqli, $cryptocontracttoken){
  $sql = "SELECT * FROM crypto_contract where reversed=1 and token='$cryptocontracttoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           return true;
        } 
        // echo "</table>"; 
        $res->free(); 
    } 
    else { 
      return false;
      //  echo "Incorrect Code. Try again. <br> <b>Reset</b> and try again biko"; 
    } 
}
}


function checkCryptoContractResolved($mysqli, $cryptocontracttoken){
 $sql = "SELECT * FROM crypto_contract where status=1 and token='$cryptocontracttoken'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           return true;
        } 
        // echo "</table>"; 
        $res->free(); 
    } 
    else { 
      return false;
      //  echo "Incorrect Code. Try again. <br> <b>Reset</b> and try again biko"; 
    } 
}
}



function getCryptoContractDetails($mysqli, $token){
  $sql = "SELECT * FROM crypto_contract where token='$token'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
      $_SESSION['pusertoken'] = $row['pusertoken'];
      $_SESSION['rusertoken'] = $row['rusertoken'];
      $_SESSION['adtoken'] = $row['adtoken'];
      $_SESSION['offertoken'] = $row['offertoken'];
      $_SESSION['cryptoamount'] = $row['cryptoamount'];
      $_SESSION['fiatamount'] = $row['fiatamount'];
      $_SESSION['rate'] = $row['rate'];
      $_SESSION['charges'] = $row['charges'];
      $_SESSION['adtype'] = $row['adtype'];
      $_SESSION['paid'] = $row['paid'];
      $_SESSION['confirmed'] = $row['confirmed'];
      $_SESSION['timestamp'] = $row['timestamp'];
      $_SESSION['cryptowallet'] = $row['cryptowallet'];
           return true;
        } 
        // echo "</table>"; 
        $res->free(); 
    } 
    else { 
      return false;
      //  echo "Incorrect Code. Try again. <br> <b>Reset</b> and try again biko"; 
    } 
}
}




function ReverseCryptoContract($mysqli, $token){
  $pusertoken = $_SESSION['pusertoken'];
  $rusertoken = $_SESSION['rusertoken'];
  $fiatamount = $_SESSION['fiatamount'];
  $cryptoamount = $_SESSION['cryptoamount'];
  $adtoken = $_SESSION['adtoken'];


  $pusermail=GetUserMail($mysqli, $pusertoken);
  $pusername=GetUserName($mysqli, $pusertoken);
  $puserphone=GetUserPhone($mysqli, $pusertoken);

  $rusermail=GetUserMail($mysqli, $rusertoken);
  $rusername=GetUserName($mysqli, $rusertoken);
  $ruserphone=GetUserPhone($mysqli, $rusertoken);

$wfiatamount = "-$fiatamount";
$type = "Debit";
$log = "A withdrawal to refund Crypto Contract $token.";
  if (WalletWork($mysqli, $rusertoken, $wfiatamount, $type, $log, $timestamp)==true) {
    # code...
$rfiatamount = "$fiatamount";
$type = "Credit";
$log = "A refund from the reveral of Crypto Contract $token.";
  if (WalletWork($mysqli, $pusertoken, $rfiatamount, $type, $log, $timestamp)==true) {

$sql = "UPDATE crypto_contract SET reversed=1 WHERE token='$token'"; 
if($mysqli->query($sql) == true){ 

if ($_SESSION['type']=="sell") {
  # code...
  $sql = "UPDATE crypto_ad_sell SET amount=amount+'$cryptoamount', bamount-'$cryptoamount' WHERE token='$adtoken'"; 
if($mysqli->query($sql) == true){ 

# send mails and notifications
# send mail to the payer of the contract, who gets refunded
$subject="".APPNAME." crypto contract";
$body="Hi $pusername,<br/>
We have succefully reversed the transaction on the Crypto Contract $token (<a href=".APPURL."/account/crypto/contract/$token>".APPURL."/account/crypto/contract/$token</a>).<br /><br />
Your funds have been deposited in your wallet. Do reach out to use anytime here <b>".APPMAIL."</b>.<br /><br />
";

$notebody = "Hi $pusername,<br/>
We have succefully reversed the transaction on the Crypto Contract $token (<a href=".APPURL."/account/crypto/contract/$token>".APPURL."/account/crypto/contract/$token</a>).<br /><br />
Your funds have been deposited in your wallet. Do reach out to use anytime here <b>".APPMAIL."</b>.<br /><br />
Reni, for the ".APPNAME." team.";

notifications($mysqli, $pusertoken, $subject, $notebody, $timestamp);
mail_tb($mysqli,$pusermail,$subject,$body,$timestamp);

# send mail to the reciever of the contract who is refunding
$subject="".APPNAME." crypto contract";
$body="Hi $rusername,<br/>
We have succefully reversed the transaction on the Crypto Contract $token (<a href=".APPURL."/account/crypto/contract/$token>".APPURL."/account/crypto/contract/$token</a>).<br /><br />
Funds have been withdrawn from your wallet and refunded to $pusername. Reach out to use anytime here <b>".APPMAIL."</b>.<br /><br />
";

$notebody = "Hi $rusername,<br/>
We have succefully reversed the transaction on the Crypto Contract $token (<a href=".APPURL."/account/crypto/contract/$token>".APPURL."/account/crypto/contract/$token</a>).<br /><br />
Funds have been withdrawn from your wallet and refunded to $pusername. Reach out to use anytime here <b>".APPMAIL."</b>.<br /><br />
Reni, for the ".APPNAME." team.";

notifications($mysqli, $rusertoken, $subject, $notebody, $timestamp);
mail_tb($mysqli,$rusermail,$subject,$body,$timestamp);
 $sql = "UPDATE wallet SET pending=0 WHERE crypto_contract='$token'"; 
if($mysqli->query($sql) == true){ 
return true;
}
}
}elseif ($_SESSION['type']=="buy") {
  # code...
   $sql = "UPDATE crypto_ad_buy SET amount=amount+'$cryptoamount', bamount-'$cryptoamount' WHERE token='$adtoken'"; 
if($mysqli->query($sql) == true){ 

# send mails and notifications
# send mail to the payer of the contract, who gets refunded
$subject="".APPNAME." crypto contract";
$body="Hi $pusername,<br/>
We have succefully reversed the transaction on the Crypto Contract $token (<a href=".APPURL."/account/crypto/contract/$token>".APPURL."/account/crypto/contract/$token</a>).<br /><br />
Your funds have been deposited in your wallet. Do reach out to use anytime here <b>".APPMAIL."</b>.<br /><br />
";

$notebody = "Hi $pusername,<br/>
We have succefully reversed the transaction on the Crypto Contract $token (<a href=".APPURL."/account/crypto/contract/$token>".APPURL."/account/crypto/contract/$token</a>).<br /><br />
Your funds have been deposited in your wallet. Do reach out to use anytime here <b>".APPMAIL."</b>.<br /><br />
Reni, for the ".APPNAME." team.";

notifications($mysqli, $pusertoken, $subject, $notebody, $timestamp);
mail_tb($mysqli,$pusermail,$subject,$body,$timestamp);

# send mail to the reciever of the contract who is refunding
$subject="".APPNAME." crypto contract";
$body="Hi $rusername,<br/>
We have succefully reversed the transaction on the Crypto Contract $token (<a href=".APPURL."/account/crypto/contract/$token>".APPURL."/account/crypto/contract/$token</a>).<br /><br />
Your funds have been deposited in your wallet. Do reach out to use anytime here <b>".APPMAIL."</b>.<br /><br />
";

$notebody = "Hi $rusername,<br/>
We have succefully reversed the transaction on the Crypto Contract $token (<a href=".APPURL."/account/crypto/contract/$token>".APPURL."/account/crypto/contract/$token</a>).<br /><br />
Your funds have been deposited in your wallet. Do reach out to use anytime here <b>".APPMAIL."</b>.<br /><br />
Reni, for the ".APPNAME." team.";

notifications($mysqli, $rusertoken, $subject, $notebody, $timestamp);
mail_tb($mysqli,$rusermail,$subject,$body,$timestamp);

$sql = "UPDATE wallet SET pending=0 WHERE crypto_contract='$token'"; 
if($mysqli->query($sql) == true){ 

return true;
}

}
}

}else{
   $log ="could not update crypto contract while reversing crypto contract $token. function.php line 2271.";
systemlog($mysqli, $log);

return false;
}

  }else{
    $log ="could not refund payment to payer $pusertoken while reversing crypto contract $token. function.php line 2284.";
systemlog($mysqli, $log);

return false;
  }
  }else{
    $log ="could not withdraw from payment reciever $rusertoken while reversing crypto contract $token. function.php line 2296.";
systemlog($mysqli, $log);

return false;
  }

}


function payCryptoContract($mysqli, $token, $trx){
    $sql = "UPDATE crypto_contract SET trx='$trx', paid='1' WHERE token='$token'"; 
if($mysqli->query($sql) == true){ 
if (getCryptoContractDetails($mysqli, $token)==true) {
  # code...
  $rusertoken = $_SESSION['rusertoken'];
  $pusertoken = $_SESSION['pusertoken'];
  $cryptowallet = $_SESSION['cryptowallet'];

  $rusermail=GetUserMail($mysqli, $rusertoken);
  $rusername=GetUserName($mysqli, $rusertoken);
  $ruserphone=GetUserPhone($mysqli, $rusertoken);

  $pusermail=GetUserMail($mysqli, $pusertoken);
  $pusername=GetUserName($mysqli, $pusertoken);
  $puserphone=GetUserPhone($mysqli, $pusertoken);

# send mail to the reciever of the contract
$subject="".APPNAME." crypto contract";
$body="Hi $rusername,<br/>
Payment has been confirmed for your contract $token (<a href=".APPURL."/account/crypto/contract/$token>".APPURL."/account/crypto/contract/$token</a>) and added to your wallet pending balance.<br /><br />
You are required to transfer $cryptoamount $cryptoname to $pusername's wallet address <b>$cryptowallet</b> <br /> <br />
Your funds will only be released upon confirmation of this transfer by $pusername.
";

$notebody = "Hi $rusername,<br/>
Payment has been confirmed for your contract $token (<a href=".APPURL."/account/crypto/contract/$token>".APPURL."/account/crypto/contract/$token</a>) and added to your wallet pending balance.<br /><br />
You are required to transfer $cryptoamount $cryptoname to $pusername's wallet address <b>$cryptowallet</b> <br /> <br />
Your funds will only be released upon confirmation of this transfer by $pusername. <br /> <br />
Reni, for the ".APPNAME." team.";

notifications($mysqli, $rusertoken, $subject, $notebody, $timestamp);
mail_tb($mysqli,$rusermail,$subject,$body,$timestamp);

# send mail to the payer of the contract
$subject="".APPNAME." crypto contract";
$body="Hi $pusername,<br/>
Your payment has been confirmed for your contract $token (<a href=".APPURL."/account/crypto/contract/$token>".APPURL."/account/crypto/contract/$token</a>).<br /><br />
We have notified $rusername to transfer $cryptoamount $cryptoname to your wallet address <b>$cryptowallet</b> <br /> <br />
We will only release fund to $rusername upon your confirmation of the transfer.
";

$notebody = "Hi $pusername,<br/>
Your payment has been confirmed for your contract $token (<a href=".APPURL."/account/crypto/contract/$token>".APPURL."/account/crypto/contract/$token</a>).<br /><br />
We have notified $rusername to transfer $cryptoamount $cryptoname to your wallet address <b>$cryptowallet</b> <br /> <br />
We will only release fund to $rusername upon your confirmation of the transfer. <br /> <br />
Reni, for the ".APPNAME." team.";

notifications($mysqli, $pusertoken, $subject, $notebody, $timestamp);
mail_tb($mysqli,$pusermail,$subject,$body,$timestamp);

return true;

}else{
  return false;
}
}else{
  return false;
}
}

function rejectContract($mysqli, $invid){
   $sql = "UPDATE invoices SET rejected='1' WHERE invid='$invid'"; 
if($mysqli->query($sql) == true){ 
return true;
}else{
  return false;
}
}

function GetContractTitle($mysqli, $invid){
   $sql = "SELECT * FROM invoices where invid='$invid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $title=$row['title'];
    return $title;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}


function GetBuyerToken($mysqli, $invid){
   $sql = "SELECT * FROM invoices where invid='$invid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $rtoken=$row['rtoken'];
    return $rtoken;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}



function GetContractAmount($mysqli, $invid){
   $sql = "SELECT * FROM invoices where invid='$invid'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
       // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
           $amount=$row['amount'];
    return $amount;
        } 
        // echo "</table>"; 
        $res->free(); 
   
} 
}
}


function updateUserRef($mysqli, $usertoken, $ref){
   $sql = "UPDATE users SET ref='$ref' WHERE token='$usertoken'";
if($mysqli->query($sql) == true){ 
return true;
}else{
  return false;
}
}


function getTotalSystemBalance ($mysqli){
  $sql = "SELECT SUM(amount) AS balance FROM wallet"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
      // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
          $balance = $row['balance'];
       return $balance;

        }
        $res->free(); 
    } 
    else { 
   return 0;
   } 
} 
else {
  return 0;
} 
$mysqli->close(); 

}


function getTotalUsers ($mysqli){
  $sql = "SELECT * FROM users"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
      // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
          $total = $res->num_rows;
       return $total;

        }
        $res->free(); 
    } 
    else { 
   
   } 
} 
else {
 
} 
$mysqli->close(); 

}


function getTotalExpenses ($mysqli){
  $sql = "SELECT SUM(amount) AS balance FROM wallet where type='debit'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
      // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
          $balance = $row['balance'];
       return $balance;

        }
        $res->free(); 
    } 
    else { 
   return 0;
   } 
} 
else {
  return 0;
} 
$mysqli->close(); 

}


function getTotalIncomes ($mysqli){
  $sql = "SELECT SUM(amount) AS balance FROM wallet where type='credit'"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
      // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
          $balance = $row['balance'];
       return $balance;

        }
        $res->free(); 
    } 
    else { 
   return 0;
   } 
} 
else {
  return 0;
} 
$mysqli->close(); 

}


function getTotalUnpaidContracts($mysqli){
   $sql = "SELECT * FROM invoices where paystatus=0"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
      // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
          $balance = $res->num_rows;
       return $balance;

        }
        $res->free(); 
    } 
    else { 
   return 0;
   } 
} 
else {
  return 0;
} 
$mysqli->close(); 
}


function getAllContracts($mysqli){
   $sql = "SELECT * FROM invoices"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
      // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
          $balance = $res->num_rows;
       return $balance;

        }
        $res->free(); 
    } 
    else { 
   return 0;
   } 
} 
else {
  return 0;
} 
$mysqli->close(); 
}


function getTotalPaidContracts($mysqli){
   $sql = "SELECT * FROM invoices where paystatus=1"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
      // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
          $balance = $res->num_rows;
       return $balance;

        }
        $res->free(); 
    } 
    else { 
   return 0;
   } 
} 
else {
  return 0;
} 
$mysqli->close(); 
}


function sendchat ($mysqli, $usertoken, $rtoken, $chat){
 $timestamp = time();
   $sql = "INSERT INTO chat (usertoken, rtoken, chat, timestamp) 
              VALUES('$usertoken', '$rtoken', '$chat', '$timestamp')"; 
    if ($mysqli->query($sql) == true) 
{ 
  return true;
  exit();
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
}

}



function createHotel ($mysqli, $token, $hotelname, $description, $creator_token, $location, $country, $city, $longitude, $latitude, $street, $star, $amenities){

$timestamp = time();
// $token = generateNumericOTP(12);
$sql = "INSERT INTO hotels (token, hotelname, description, account_owner, location, timestamp, latitude, longitude, country, city, street, star) 
              VALUES('$token', '$hotelname', '$description', '$creator_token', '$location', '$timestamp', '$latitude', '$longitude', '$country', '$city', '$street', '$star')"; 
// $sql = "INSERT INTO hotels (token, name, timestamp) 
//               VALUES('$token', '$name', '$timestamp')"; 
    if ($mysqli->query($sql) == true) 
{

if (sizeof($amenities) > 0) {
    // code...
    addAmenitiesToHotel($mysqli, $amenities, $token);
}

  return true;
  exit();

}else{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
           exit();
}

}



function addAmenitiesToHotel ($mysqli, $amenities, $token){

if (sizeof($amenities) > 0) {
    // code...
    $timestamp = time();
$num = count($amenities);
for ($i=0; $i < $num; $i++) { 
    // code...
    $amenity = $amenities[$i];
    $sql = "INSERT INTO hotel_amenities (hoteltoken, amenity) 
              VALUES('$token', '$amenity')"; 
    if ($mysqli->query($sql) == true) 
{

  return true;
  exit();

}else{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
           exit();
}
}

}

}




function updateUserIP($mysqli, $ip, $usertoken){
    $sql = "UPDATE users SET ip_update='$ip' WHERE token='$usertoken'"; 
    if($mysqli->query($sql) == true){ 
        return true;
    }else{
        return false;
    }
}


function updateUserLocation($mysqli, $longitude, $latitude, $usertoken){
    $sql = "UPDATE users SET longitude='$longitude', latitude='$latitude' WHERE token='$usertoken'"; 
    if($mysqli->query($sql) == true){ 
     return true;
    }else{
      return false;
    }
}



function AddImage ($mysqli, $id, $filepath){

   $sql = "INSERT INTO images (oid, filepath) VALUES('$id', '$filepath')"; 
    if ($mysqli->query($sql) == true) 
{ 
  return true;
} 
else{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
}

}



function getHotelImageOne($mysqli, $token){
   $sql = "SELECT * FROM images where oid='$token' LIMIT 1"; 
if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
      // while ($row = $res->fetch_array())  
        if ($row = $res->fetch_array())  
        { 
      $path = $row['filepath'];
      return $path;
        }
        $res->free(); 
    } 
    else { 
   return 0;
   } 
} 
else {
  return 0;
} 
$mysqli->close(); 
}


function getfollowup ($mysqli, $start_date, $exp_date){
     
$sql1 = "SELECT * FROM contracts where start_date='$start_date' and exp_date='$exp_date'";
            if ($res = $mysqli->query($sql1)) {
                if ($res->num_rows > 0) {
          
    while ($col = $res->fetch_array()) { 
       
//        $array = [
// "start" => "$start_date",
// "end" => "$exp_date",
// "ItemQuantity" => "1"
// ];
// $array = json_encode($array);

$_SESSION['start'] = $col['start_date'];
$_SESSION['end'] = $col['exp_date'];

// echo $array;
}
}
}


}




function changeDateDurationCancel($mysqli, $start_date_new, $start_date_old, $end_date_new, $end_date_old){
  // code...
  $sql = "UPDATE contracts SET cancel_start='$start_date_new', cancel_end='$end_date_new' WHERE cancel_start='$start_date_old' and cancel_end='$end_date_old' and display=1 "; 
  if ($mysqli->query($sql) === true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}



function changeDateDurationMeals($mysqli, $start_date_new, $start_date_old, $end_date_new, $end_date_old){
  // code...
  $sql = "UPDATE contracts SET meals_start='$start_date_new', meals_end='$end_date_new' WHERE meals_start='$start_date_old' and meals_end='$end_date_old' and display=1 "; 
  if ($mysqli->query($sql) === true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}


function changeDateDurationOffers($mysqli, $start_date_new, $start_date_old, $end_date_new, $end_date_old){
  // code...
  $sql = "UPDATE contracts SET stay_from='$start_date_new', stay_to='$end_date_new' WHERE stay_from='$start_date_old' and stay_to='$end_date_old' and display=1 "; 
  if ($mysqli->query($sql) === true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}



function changeDateDurationOffersBooking($mysqli, $start_date_new, $start_date_old, $end_date_new, $end_date_old){
  // code...
  $sql = "UPDATE contracts SET booking_from='$start_date_new', booking_to='$end_date_new' WHERE booking_from='$start_date_old' and booking_to='$end_date_old' and display=1 "; 
  if ($mysqli->query($sql) === true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}



function changeDateDurationSup($mysqli, $start_date_new, $start_date_old, $end_date_new, $end_date_old){
  // code...
  $sql = "UPDATE contracts SET sup_stay_from='$start_date_new', sup_stay_to='$end_date_new' WHERE sup_stay_from='$start_date_old' and sup_stay_to='$end_date_old' and display=1 "; 
  if ($mysqli->query($sql) === true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}



function check_hotel_token($mysqli, $token){
    $token = intval($token);
$sql1 = "SELECT * FROM hotels where token='$token'";
            if ($res = $mysqli->query($sql1)) {
                if ($res->num_rows > 0) {
    if ($col = $res->fetch_array()) { 
    $_SESSION['id'] = $col['id'];
       return true;
}else{
    $_SESSION['id'] = "hi";
    return false;
}
}else{
    $_SESSION['id'] = "hey";
    return false;
}
}else{
    $_SESSION['id'] = "ho";
    return true;
}
}



function CheckForUnMappedDataFromEzee($mysqli){

// echo "hey";
$sql1 = "SELECT * FROM ex_ezee_availability where mapped = 0 and dayone_mapped = 0 order by rand() LIMIT 5";
            if ($res = $mysqli->query($sql1)) {
                if ($res->num_rows > 0) {
    while ($col = $res->fetch_array()) { 
   
// $availability = $col['available_rooms'];

// echo $availability->$col['dayone'];

MoveAndMapData($mysqli, $col, $col['dayone'], $col['dayone_avail'], 'one');

// echo "one";

}
}else{

$sql1 = "SELECT * FROM ex_ezee_availability where mapped = 0 and daytwo_mapped = 0 order by rand() LIMIT 5";
            if ($res = $mysqli->query($sql1)) {
                if ($res->num_rows > 0) {
    while ($col = $res->fetch_array()) { 
   
// $availability = $col['available_rooms'];

// echo $availability->$col['dayone'];

MoveAndMapData($mysqli, $col, $col['daytwo'], $col['daytwo_avail'], 'two');

// echo "two";

}
}else{

$sql1 = "SELECT * FROM ex_ezee_availability where mapped = 0 and daythree_mapped = 0 order by rand() LIMIT 5";
            if ($res = $mysqli->query($sql1)) {
                if ($res->num_rows > 0) {
    while ($col = $res->fetch_array()) { 
   
// $availability = $col['available_rooms'];

// echo $availability->$col['dayone'];

MoveAndMapData($mysqli, $col, $col['daythree'], $col['daythree_avail'], 'three');

// echo "three";

}
}
}else{
    // echo "oh!";
}

}

}

}
}

}



function MoveAndMapData($mysqli, $col, $date, $avail, $type){
    $start_date = strtotime($date);
    $end_date = strtotime($date);
$timestamp = time();
$sql = "INSERT INTO contracts (source, token, hoteltoken, hotelcode, roomtoken, roomtypeunkid, dmctoken, room_name, availnum, price, start_date, exp_date, currency, occupy_max, occupy_max_child, timestamp, price_sgl, invt_room, room_category, availability_calendar_only)
              VALUES('ezee','".$col['contract_token']."', '".$col['hoteltoken']."', '".$col['hotel_code']."','".$col['roomtypeunkid']."', '".$col['roomtypeunkid']."', '".$col['dmctoken']."', '".$col['roomtype_name']."', '$avail', '".$col['totalprice_room_only']."', '$start_date', '$end_date', '".$col['currency_code']."', '".$col['max_occupancy']."', '".$col['max_child_occupancy']."', '$timestamp', '".$col['totalprice_room_only']."', '$avail', '".$col['roomtype_name']."', 1) "; 
    if ($mysqli->query($sql) == true) 
{ 
            // return true;
   updateEzeeData($mysqli, $col['id'], $type);

            }
else
{
   // echo "ERROR: Could not able to execute $sql. ";
  // return false;
           // $mysqli->error; 
} 

}


function updateEzeeData($mysqli, $id, $type){

if ($type == "one") {
    // code...
  $sql = "UPDATE ex_ezee_availability SET dayone_mapped=1 WHERE id='$id'";
if($mysqli->query($sql) === true){

    // echo $type;

}else{
  // return false;
}

}

if ($type == "two") {
    // code...
  $sql = "UPDATE ex_ezee_availability SET daytwo_mapped=1 WHERE id='$id'";
if($mysqli->query($sql) === true){

    // echo $type;

}else{
  // return false;
}

}


if ($type == "three") {
    // code...
  $sql = "UPDATE ex_ezee_availability SET daythree_mapped=1 WHERE id='$id'";
if($mysqli->query($sql) === true){

    // echo $type;

}else{
  // return false;
}

}


}


function checkForContractsWithoutToken($mysqli){

    $sql1 = "SELECT * FROM contracts where token = '0' and source = 'ezee' order by rand() LIMIT 5";
            if ($res = $mysqli->query($sql1)) {
                if ($res->num_rows > 0) {
    while ($col = $res->fetch_array()) { 
   $id = $col['id'];
   $hoteltoken = $col['hoteltoken'];
   $timestamp = time();

$token1 = tryToGetContractToken($mysqli, $col['roomtoken']);
    // code...
if ($token1 == '0') {
    // code...

   $token = $hoteltoken.$timestamp.generateAlphaNumericOTP(3);
}else{
    $token = $token1;
}

  $sql = "UPDATE contracts SET token='$token' WHERE hoteltoken='$hoteltoken'";
if($mysqli->query($sql) === true){

    // echo "type";

}else{
  // return false;
}

}
}
}else{
    // echo "oh!";
}


}



function UpdateEzeeContracts($db, $mysqli){

    $sql1 = "SELECT * FROM contracts where (dmctoken = '0' or dmctoken = '' or contract_name = '') and source = 'ezee' order by rand() LIMIT 5";
            if ($res = $mysqli->query($sql1)) {
                if ($res->num_rows > 0) {
    while ($col = $res->fetch_array()) { 
   $id = $col['id'];
   $hoteltoken = $col['hoteltoken'];
   $contract_token = $col['token'];
   $timestamp = time();
   $initContractData = getInitContractData($db, $contract_token);
   $dmctoken =  $initContractData['dmctoken'];
 // $usertoken = getEzeeDMCTOken($mysqli);

  $sql = "UPDATE contracts SET dmctoken='$dmctoken', contract_name='HotelsOnline-Ezee' WHERE id='$id'";
if($mysqli->query($sql) === true){

    // echo "type";

}else{

  // return false;

}

}
}
}else{

    // echo "oh!";
    
}


}


function getEzeeDMCTOken($mysqli){

$sql1 = "SELECT * FROM users where partner='ezee' order by rand() LIMIT 5";
            if ($res = $mysqli->query($sql1)) {
                if ($res->num_rows > 0) {
    if ($col = $res->fetch_array()) { 
   // $id = $col['id'];
   // $hoteltoken = $col['hoteltoken'];
   // $timestamp = time();

$usertoken = $col['token'];
  return $usertoken;

}else{
    return false;
}
}else{
    return false;
}
}else{
    return false;
}

}




function tryToGetContractToken($mysqli, $roomtoken){

$sql1 = "SELECT * FROM contracts where token !='0' and roomtoken='$roomtoken' LIMIT 1";
            if ($res = $mysqli->query($sql1)) {
                if ($res->num_rows > 0) {
    if ($col = $res->fetch_array()) { 
   // $id = $col['id'];
   // $hoteltoken = $col['hoteltoken'];
   // $timestamp = time();

$token = $col['token'];
  return $token;

}else{
    return 0;
}
}else{
    return 0;
}
}else{
    return 0;
}

}


function getContractStartDate($mysqli, $token){
$timestamp = time();
$twelvehours = 12 * 3600;
$twentyfourhours = 24 * 3600;
$twentyfourhoursago = $timestamp - $twentyfourhours;

$timestamp = time();
$timestamp = $timestamp - $twentyfourhoursago;

// $sql1 = "SELECT * FROM contracts where token ='$token' and start_date > '$timestamp' LIMIT 1";

$sql1 = "SELECT * FROM contracts where token ='$token' and start_date != 0 and start_date !='0' order by id ASC LIMIT 1";

if ($res = $mysqli->query($sql1)) {
if ($res->num_rows > 0) {
if ($col = $res->fetch_array()) {

$start_date = $col['start_date'];
  return $start_date;
// return $col['start_date'];

}else{
    return 01;
}
}else{
    return 02;
}
}else{
    return 03;
}

}



function getContractEndDate($mysqli, $token){
$timestamp = time();
$twelvehours = 12 * 3600;
$twentyfourhours = 24 * 3600;
$twentyfourhoursago = $timestamp - $twentyfourhours;

$timestamp = time();
$timestamp = $timestamp - $twentyfourhoursago;

// $sql1 = "SELECT * FROM contracts where token ='$token' and start_date > '$timestamp' LIMIT 1";

$sql1 = "SELECT * FROM contracts where token ='$token' order by exp_date DESC LIMIT 1";

            if ($res = $mysqli->query($sql1)) {
                if ($res->num_rows > 0) {
    if ($col = $res->fetch_array()) { 
   // $id = $col['id'];
   // $hoteltoken = $col['hoteltoken'];
   // $timestamp = time();

$exp_date = $col['exp_date'];
  return $exp_date;

}else{
    return 0;
}
}else{
    return 0;
}
}else{
    return 0;
}
$mysqli->close(); 
}



function getRoomName($mysqli, $roomtoken){

 $sql = "SELECT * FROM hotel_rooms where room_id='$roomtoken'"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
      // while ($row = $res->fetch_array())  
      if ($row = $res->fetch_array())  { 
        $category=$row['category'];
        return $category;
      } 
      $res->free(); 
    }else{


 $sql = "SELECT * FROM contracts where roomtoken='$roomtoken'"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
      // while ($row = $res->fetch_array())  
      if ($row = $res->fetch_array())  { 
        $name=$row['room_category'];
        return $name;
      } 
      $res->free(); 
    } 
  }



    } 
  }
$mysqli->close(); 
}


function getUserCountry($mysqli, $usertoken){
     $sql = "SELECT * FROM users where token='$usertoken'"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) { 
      // while ($row = $res->fetch_array())  
      if ($row = $res->fetch_array())  { 
        $country=$row['country'];
        return $country;
      }else{
        return 0;
      } 
      $res->free(); 
    }else{
        return 0;
    } 
  }else{
    return 0;
  }
$mysqli->close(); 
}



function deletePackageItem($mysqli, $id){

$sql = "UPDATE package_item SET display=0 WHERE id='$id' "; 
  if ($mysqli->query($sql) == true){ 
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close(); 

}



function SubscribeNewsletter($mysqli, $name, $mail){
$timestamp = time();
$sql = "INSERT INTO newsletter (name, mail, timestamp)
              VALUES('$name', '$mail', '$timestamp') "; 
    if ($mysqli->query($sql) == true) 
{ 
            return true;
    }
else
{
  return false;
} 

}



function getSuplementPerc1($mysqli, $contract_token, $to, $from){

  // $sql = "SELECT * FROM contracts where token='$contract_token' and display=1 LIMIT 1";

  $sql = "SELECT * FROM contracts where token = '$contract_token' and sup_stay_from < '$from' and sup_stay_to > '$to' and display = 1
UNION ALL
SELECT * FROM contracts 
WHERE token = '$contract_token' and sup_stay_to = '$to' and display = 1
UNION ALL
SELECT * FROM contracts 
WHERE token = '$contract_token' and sup_stay_from = '$from' and display = 1 LIMIT 1";

  if ($res = $mysqli->query($sql)) {
    if ($res->num_rows > 0) { 
      if ($row = $res->fetch_array()){
        $supp_perc = $row['supp_perc'];
        return $supp_perc;
        exit();
      }else { 
      return 0; 
      exit();
    }  
      $res->free(); 
    }else { 
      return 0; 
      exit();
    } 
  }else {
    return 0; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();

}



function getSuplementAmount1($mysqli, $contract_token, $to, $from){

  // $sql = "SELECT * FROM contracts where token='$contract_token' and display=1 LIMIT 1";

  $sql = "SELECT * FROM contracts where token = '$contract_token' and sup_stay_from < '$from' and sup_stay_to > '$to' and display = 1
UNION ALL
SELECT * FROM contracts 
WHERE token = '$contract_token' and sup_stay_to = '$to' and display = 1
UNION ALL
SELECT * FROM contracts 
WHERE token = '$contract_token' and sup_stay_from = '$from' and display = 1 LIMIT 1";

  if ($res = $mysqli->query($sql)) {
    if ($res->num_rows > 0) { 
      if ($row = $res->fetch_array()){
        $child_amount = $row['child_amount'];
        return $child_amount;
        exit();
      }else { 
      return 0; 
      exit();
    }  
      $res->free(); 
    }else { 
      return 0; 
      exit();
    } 
  }else {
    return 0; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();

}


function hotelMapped($mysqli, $name, $hotelcode, $source, $sourceid, $dmctoken, $usertoken){
    $timestamp = time();
$sql = "INSERT INTO hotel_external_records (hoteltoken, name, hotelcode, source, sourceid, timestamp, dmctoken, usertoken)
              VALUES('$hoteltoken','$name', '$hotelcode', '$source', '$sourceid', '$timestamp', '$dmctoken', '$usertoken') "; 
    if ($mysqli->query($sql) == true) 
{ 
            return true;
    }
else
{
  return false;
} 

}



function mappRoom($mysqli, $roomid_external, $roomtoken){
$sql = "UPDATE hotel_rooms_external_records SET roomtoken='$roomtoken' WHERE id='$roomid_external'"; 
if($mysqli->query($sql) == true){ 
         return true;
}else{
         return false;
}

}



function debitUser($mysqli, $usertoken, $amount, $log, $source){

$wamount = "-$amount";
$timestamp = time();
$note = $log;
  $sql = "INSERT INTO wallet (usertoken, type, log, amount, timestamp, source, note) VALUES('$usertoken','debit','$log', '$wamount','$timestamp', '$source', '$note') "; 
  if ($mysqli->query($sql)==true) { 
    return true;
    exit();
  } else{ 
    return false;
    exit();
    $mysqli->error; 
  }   
  // Close connection 
  $mysqli->close(); 
}


function creditUser($mysqli, $usertoken, $amount, $log, $source){
$timestamp = time();
$note = $log;
  $sql = "INSERT INTO wallet (usertoken, type, log, amount, timestamp, source, note) VALUES('$usertoken','credit','$log', '$amount','$timestamp', '$source', '$note') "; 
  if ($mysqli->query($sql)==true) { 
    return true;
    exit();
  } else{ 
    return false;
    exit();
    $mysqli->error; 
  }   
  // Close connection 
  $mysqli->close(); 
}



function recordBooking($mysqli, $usertoken, $hoteltoken, $totalAmount, $hotelname, $source, $data, $contractToken, $dmctoken){
    $timestamp = time();
    $data = json_encode($data);
  $sql = "INSERT INTO bookings (usertoken, dmctoken, hoteltoken, totalamount, hotelname, source, contract_token, data, timestamp) VALUES('$usertoken', '$dmctoken','$hoteltoken','$totalAmount', '$hotelname','$source', '$contractToken', '".$data."', '$timestamp') "; 
  if ($mysqli->query($sql)==true) { 
    return true;
    exit();
  } else{ 
    return false;
    exit();
    $mysqli->error; 
  }   
  // Close connection 
  $mysqli->close(); 
}



function hotelIsExternal($mysqli, $hoteltoken){
  $sql = "SELECT * FROM hotel_external_records where hoteltoken='$hoteltoken'"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $source = $row['source'];
        return $source;
      }else{
        return "internal";
      }  
      $res->free(); 
    }else { 
      return "internal"; 
    } 
  }else {
    return "internal"; 
    $mysqli->error;
    exit(); 
  } 
  $mysqli->close();
}


function getMarkup($mysqli, $category, $contract_token, $country){
     try {
         $sql = "SELECT * from markup where category = '$category' and contract_token = '$contract_token' and country = '$country'";
                $stmt = $mysqli->connect()->prepare($sql);
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
            
           if($markups = $stmt->fetchAll(PDO::FETCH_ASSOC)){
return $markups[0];
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
}


function getBookingHistory ($mysqli, $usertoken) {

     try {
         $sql = "SELECT * from bookings where usertoken = '$usertoken'";
                $stmt = $mysqli->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again..";
                    return false;
                }else{
if($stmt->rowCount() == 0){

           $stmt = null;
           $_SESSION['err'] = "No booking found..";
            return false;
            // code...
        }else{
            
           if($markups = $stmt->fetchAll(PDO::FETCH_ASSOC)){
return $markups[0];
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }

}



function getAdminBookingHistory ($db) {

     try {
         $sql = "SELECT * from bookings";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again..";
                    return false;
                }else{
if($stmt->rowCount() == 0){

           $stmt = null;
           $_SESSION['err'] = "No booking found..";
            return false;
            // code...
        }else{
            
           if($markups = $stmt->fetchAll(PDO::FETCH_ASSOC)){
return $markups[0];
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }

}


function getEzeeRoomData($mysqli, $roomtoken){

     try {
         $sql = "SELECT * from ex_ezee_availability where roomtypeunkid = '$roomtoken'";
                $stmt = $mysqli->connect()->prepare($sql);
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
            
           if($markups = $stmt->fetchAll(PDO::FETCH_ASSOC)){
return $markups[0];
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }

}



function getUserData($db, $usertoken){
     try {
         $sql = "SELECT * from users where token = '$usertoken'";
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
            
           if($markups = $stmt->fetchAll(PDO::FETCH_ASSOC)){
return $markups[0];
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
}




function sendBookingToEzee($mysqli, $db, $data, $hoteltoken, $authkey, $username){

if (!empty($data->bookingData->rooms[0]->roomtoken)) {
    // code...
$phone = GetUserPhone($mysqli, $data->usertoken);
$fname = GetUserFname($mysqli, $data->usertoken);
$lname = GetUserLname($mysqli, $data->usertoken);
/* */


$roomData = new ArrayObject(array());
$foo = array();
$foo = (object)$foo;


foreach ($data->bookingData->rooms as $key => $value) {
    // code...

$availData = getEzeeRoomData($db, $value->roomtoken);
$contractData = getContractIDData($db, $value->contractid);

if (!empty($value->adultNumber)) {
    // code...
    $adultNumber = $value->adultNumber;
}else{
    $adultNumber = 0;
}

if (!empty($value->childNumber)) {
    // code...
    $childNumber = $value->childNumber;
}else{
$childNumber = 0;
}

$extradultrate = "";
$extrachildrate = "";
$baserate = "";


for ($i=0; $i < $data->no_days; $i++) { 
    // code...
    $extradultrate .= "".$data->bookingData->meals->fb_adult.",";
    $extrachildrate .= "".$data->bookingData->meals->fb_child.",";
    $baserate .= "9,";
}

$array = array(
            "Rateplan_Id" => $contractData->roomtypeunkid,
            "Ratetype_Id" => $value->roomtypeunkid,
            "Roomtype_Id" => $value->roomtypeunkid,
            "baserate" => $baserate,
            "extradultrate" => $extradultrate,
            "extrachildrate" => $extrachildrate,
            "number_adults" => $adultNumber,
            "number_children" => $childNumber,
            "ExtraChild_Age" => 0,
            "Title" => "",
            "First_Name" => $fname,
            "Last_Name" => $lname,
            "Gender" => "",
            "SpecialRequest" => ""
        // )
);
     $foo = (object) array_merge( (array)$foo, $array);
}


$rooms_no = sizeof($data->bookingData->rooms);

$roomInfo = $data->bookingData->rooms;
for ($i=0; $i < $rooms_no; $i++) { 
 
$availData = getEzeeRoomData($db, $roomInfo[$i]->roomtoken);

if (!empty($roomInfo[$i]->adultNumber)) {
    // code...
    $adultNumber = $roomInfo[$i]->adultNumber;
}else{
    $adultNumber = 0;
}

if (!empty($roomInfo[$i]->childNumber)) {
    // code...
    $childNumber = $roomInfo[$i]->childNumber;
}else{
$childNumber = 0;
}


$extradultrate = "";
$extrachildrate = "";
$baserate = "";


for ($a=0; $a < $data->no_days; $a++) { 
    // code...
    $extradultrate .= "".$data->bookingData->meals->fb_adult.",";
    $extrachildrate .= "".$data->bookingData->meals->fb_child.",";
    $baserate .= "9,";
}

$baserate = substr($baserate, 0, strlen($baserate)-1);
$extradultrate = substr($extradultrate, 0, strlen($extradultrate)-1);
$extrachildrate = substr($extrachildrate, 0, strlen($extrachildrate)-1);

    $array = array(
        "Rateplan_Id" => "1872700000000000001",
            "Ratetype_Id" => $roomInfo[$i]->roomtoken,
            "Roomtype_Id" => $roomInfo[$i]->roomtoken,
            "baserate" => "$baserate",
            "extradultrate" => "$extradultrate",
            "extrachildrate" => "$extrachildrate",
            "number_adults" => "$adultNumber",
            "number_children" => "$childNumber",
            "ExtraChild_Age" => "0",
            "Title" => "",
            "First_Name" => $fname,
            "Last_Name" => $lname,
            "Gender" => "",
            "SpecialRequest" => ""
        
);

 
    $roomData->append($array);
}

// exit();

$userData = getUserData($db, $data->usertoken);

$bookingData = array(
    "Room_Details" => $roomData,
    "check_in_date" => $data->start_date,
    "check_out_date" => $data->end_date,
    "Booking_Payment_Mode" => "HotelsOffline wallet",
    "Email_Address" => $userData['mail'],
    "Source_Id" => "",
    "MobileNo" => $userData['phone'],
    "Address" => $userData['address'],
    "State" => $userData['city'],
    "Country" => $userData['country'],
    "City" => $userData['city'],
    "Zipcode" => "",
    "Fax" => "",
    "Device" => "",
    "Languagekey" => "en",
    "paymenttypeunkid" => "",
);


$bookingDataJSON = json_encode($bookingData);

$data = array(
    'request_type' => 'InsertBooking',
    'HotelCode' => $hoteltoken,
    'APIKey' => $authkey,
    'BookingData' => $bookingData
);

$ezeebase = $_SESSION['EZEEBASEURL'];
$ezeeApiKey = "7c6f685a3432@9148790807c57666de-bb8c-11ea-a";
$baseurl = "".$ezeebase."/booking/reservation_api/listing.php?request_type=InsertBooking&HotelCode=$hoteltoken&APIKey=$authkey&BookingData=".$bookingDataJSON;
$url = "https://live.ipms247.com/booking/reservation_api/listing.php";


$payload = json_encode($data);
$params = http_build_query($data);
$params1 = json_encode(http_build_query($data));
// $payload = str_replace(" ", "", $payload);
$bookingDataJSON = preg_replace('/\s+/', '', $bookingDataJSON);


$data_result = @file_get_contents("https://live.ipms247.com/booking/reservation_api/listing.php?request_type=InsertBooking&HotelCode=$hoteltoken&APIKey=$authkey&BookingData=".$bookingDataJSON);

if($data_result == false){
     $error = error_get_last();
      echo "HTTP request failed. Error was: " . $error['message'];
      return $data_result;
} else {
      // echo $data_result;
    return true;
}

}else{
    return "Something went wrong";
    exit();
}
}




function searchEngine($db, $mysqli, $sql){
        try {
           $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again..";
                    return false;
                }else{
if($stmt->rowCount() == 0){

           $stmt = null;
           $_SESSION['err'] = "No File found..";
            return false;
            // code...
        }else{
            
           if($biz = $stmt->fetchAll(PDO::FETCH_ASSOC)){

$posts_arr = array();

foreach ($biz as $key => $value) {

   $contractName = getContractName($mysqli, $value['token']);
        $hotelRoomImage = getHotelRoomImage($mysqli, intval($value['roomtoken']));
        $hotelImage = getHotelImage($mysqli, intval($value['hoteltoken']));

        $post_item = array(
            'id' => "".$value['id']."",
            'contract_name' => "".$value['contract_name']."",
            'contract_id' => "".$value['token']."",
            'hoteltoken' => "".$value['hoteltoken']."",
            'roomtoken' => "".$value['roomtoken']."",
            'room_desc' => "".$value['room_desc']."",
            'dmctoken' => "".$value['dmctoken']."",
            'hotel_owner' => "".$value['hotel_owner']."",
            'account_owner' => "".$value['account_owner']."",
            'hotelname' => "".$value['hotelname']."",
            'hotel_desc' => "".$value['hotel_desc']."",
            'room_name' => "".$value['room_name']."",
            'price' => "".$value['price']."",
            'availnum' => "".$value['availnum']."",
            'timestamp' => "".$value['timestamp']."",
            'status' => "".$value['status']."", 
            'child_age_From' => "".$value['child_age_from']."", 
            'child_age_To' => "".$value['child_age_to']."",  
            'currency' => "".$value['currency']."", 
            'occupy_min' => "".$value['occupy_min']."", 
            'occupy_max' => "".$value['occupy_max']."", 
            'occupy_min_child' => "".$value['occupy_min_child']."", 
            'occupy_max_child' => "".$value['occupy_max_child']."", 
            'release_date' => "".$value['release_date']."", 
            'breakfast_adult' => "".$value['breakfast_adult']."", 
            'breakfast_child' => "".$value['breakfast_child']."", 
            'hb_adult' => "".$value['half_bar_adult']."", 
            'hb_child' => "".$value['half_bar_child']."", 
            'fb_adult' => "".$value['full_bar_adult']."", 
            'fb_child' => "".$value['full_bar_child']."", 
            'sai_adult' => "".$value['soft_all_incl_adult']."", 
            'sai_child' => "".$value['soft_all_incl_child']."", 
            'all_incl_adult' => "".$value['all_incl_adult']."", 
            'all_incl_child' => "".$value['all_incl_child']."", 
            'uai_adult' => "".$value['ultra_all_incl_adult']."", 
            'uai_child' => "".$value['ultra_all_incl_child']."", 
            'cancel_days' => "".$value['cancel_days']."", 
            'cancel_penalty' => "".$value['cancel_penalty']."", 
            'expiry_date' => "".$value['exp_date']."",
            'start_date' => "".$value['start_date']."",
            'meals_start' => "".$value['meals_start']."",
            'meals_end' => "".$value['meals_end']."",
            'cancel_start' => "".$value['cancel_start']."",
            'cancel_end' => "".$value['cancel_end']."",
            'display' => "".$value['display']."",
            'confirm' => "".$value['confirm']."",
            'rooms_only_child' => "".$value['rooms_only_child']."",
            'rooms_only_adult' => "".$value['rooms_only_adult']."", 
            'link1' => "".$value['link1']."",
            'link2' => "".$value['link2']."",
            'link3' => "".$value['link3']."",
            'link4' => "".$value['link4']."",
            'link5' => "".$value['link5']."",
            'stay_from' => "".$value['stay_from']."",
            'stay_to' => "".$value['stay_to']."",
            'booking_from' => "".$value['booking_from']."",
            'booking_to' => "".$value['booking_to']."",
            'discount_amount' => "".$value['discount_amount']."",
            'discount_percentage' => "".$value['discount_rate']."",
            'offer' => "".$value['offer']."",
            'subscription' => "".$value['subscription']."",
            'source_market' => "".$value['source_market']."",
            'room_category' => "".$value['room_category']."",
            'country' => "".$value['country']."",
            'price_sgl' => "".$value['price_sgl']."",
            'price_dbl' => "".$value['price_dbl']."",
            'price_trl' => "".$value['price_trl']."",
            'price_qud' => "".$value['price_qud']."",
            'price_chd1' => "".$value['price_chd1']."",
            'price_chd2' => "".$value['price_chd2']."",
            'city' => "".$value['city']."",
            'room' => "".$value['room']."",
            'invt_room' => "".$value['invt_room']."",
            'invt_rel' => "".$value['invt_rel']."",
            'service' => "".$value['service']."",
            'price_child' => "".$value['price_child']."",
            'price_adult' => "".$value['price_adult']."",
            'sup_stay_to' => "".$value['sup_stay_to']."",
            'sup_stay_from' => "".$value['sup_stay_from']."",
            'sup_type' => "".$value['sup_type']."",
            'twn' => "".$value['twn']."",
            'unit' => "".$value['unit']."",
            'availability_calendar_only' => "".$value['availability_calendar_only']."",
            'hotelRoomImage' => "$hotelRoomImage",
            '$hotelImage' => "$$hotelImage",
        );
        // push to 'data'
        array_push($posts_arr, $post_item);
    }
return $posts_arr;
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
}



function addExternalHotel ($db, $mysqli, $usertoken, $dmctoken, $hotelcode, $sourceid, $hotelname, $aotoken){
    $hoteltoken = generateNumericOTP(8);
$sql = "INSERT INTO hotel_external_records (hoteltoken, name, hotelcode, sourceid, timestamp, dmctoken, usertoken, aotoken) 
              VALUES('$hoteltoken', '$hotelname', '$hotelcode','$sourceid', '".time()."','$dmctoken','$usertoken', '$aotoken') "; 
    if ($mysqli->query($sql) == true) 
{ 

  return true;
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
  
// Close connection 
$mysqli->close();
}


function createSource($db, $mysqli, $usertoken, $source, $aotoken){

$sql = "INSERT INTO sources (usertoken, source, aotoken, timestamp) 
              VALUES('$usertoken', '$source', '$aotoken', '".time()."')"; 
    if ($mysqli->query($sql) == true) 
{ 

  return true;
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
  
// Close connection 
$mysqli->close();

}



function getExternalHotels($db, $mysqli, $dmctoken){

try {
         $sql = "SELECT * FROM hotels where dmctoken='$dmctoken' and external = '1' order by rand()";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again later..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
    $_SESSION['err'] = "No results.";
                    return false;
        }else{
     
     if($subs = $stmt->fetchAll(PDO::FETCH_ASSOC)){
    return $subs;
    }else{
        $_SESSION['err'] = "No hotels found";
        return false;
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }

}



function getExternalHotelsbySource($db, $mysqli, $sourceid){

try {
         $sql = "SELECT * FROM hotels where sourceid='$sourceid' and external = '1' order by rand()";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again later..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     
     if($subs = $stmt->fetchAll(PDO::FETCH_ASSOC)){
    return $subs;
    }else{
        $_SESSION['err'] = "User does not have access to admin rights on this business..";
        return false;
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }

}



function getSources($db, $mysqli) {

try {
         $sql = "SELECT * FROM sources order by rand()";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again later..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     
     if($subs = $stmt->fetchAll(PDO::FETCH_ASSOC)){
    return $subs;
    }else{
        $_SESSION['err'] = "User does not have access to admin rights on this business..";
        return false;
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }

}



function mappedExtRoom($db, $mysqli, $roomid, $category, $contract_token, $hoteltoken){
    $categoryData = getCategoryData($db, $category);
    $categoryname = $categoryData['name'];
$roomData = getRoomData_category_hotelid($db, $hoteltoken, $categoryname);

if ($roomData != false) {
    // code...
    $newroomid = $roomData['room_id'];
}else{
    $_SESSION['err'] = "Could not get category details, try new category";
    return false;
}
// echo $categoryname;
// echo $newroomid;
// echo $roomData;
// exit();

$sql = "UPDATE contracts SET room_category = '$categoryname', room_name = '$categoryname', roomtoken = '$newroomid', mapped_room = 1 WHERE token = '$contract_token' and roomtoken = '$roomid'"; 
if($mysqli->query($sql) === true){
  return true;
}else{
    $_SESSION['err'] = "Could not map this room the category";
  return false;
}

}



function getSourceHotels ($db, $mysqli, $usertoken, $sourceid, $source){

try {
         $sql = "SELECT * FROM hotels where (dmctoken='$usertoken' or account_owner='$usertoken' or hotel_owner='$usertoken') and sourceid = '$sourceid' order by rand()";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again later..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
    $_SESSION['err'] = "Could not find any hotel for this SOURCE.";
                    return false;
        }else{
     
     if($subs = $stmt->fetchAll(PDO::FETCH_ASSOC)){
    return $subs;
    }else{
        $_SESSION['err'] = "Could not find any hotel for this SOURCE..";
        return false;
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }

}




function hotelExistSource ($db, $mysqli, $sourceid, $hotelcode){

try {
         $sql = "SELECT * FROM hotel_external_records where sourceid = '$sourceid' and hotelcode = '$hotelcode' order by rand()";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again later..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     
     if($subs = $stmt->fetchAll(PDO::FETCH_ASSOC)){
    return true;
    }else{
        $_SESSION['err'] = "User does not have access to admin rights on this business..";
        return false;
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }

}



function getHotelRoomsFromEzee ($db, $mysqli, $hotelcode,$authkey){
    $baseurl = "https://live.ipms247.com/booking/reservation_api/listing.php?request_type=RoomTypeList&HotelCode=$hotelcode&APIKey=$authkey&publishtoweb=1";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$baseurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
$output1=curl_exec($ch);
var_dump($output1);
// exit();
$output = json_decode($output1);
// echo $baseurl;
// exit();
if ($e = curl_error($ch)){
    return false;
}else{
  // if (!empty($output[0]->roomtypeunkid)) {
  //       // code...
  //       return $output;
  //   }else{
  //       return false;
  //   }
    return $output;
}
curl_close($ch);
}



function mappExternalHotel($db, $mysqli, $hotelcode, $source, $sourceid, $hotelname,$dmctoken, $usertoken){
$token = generateNumericOTP(8);
$sql = "INSERT INTO hotels (token, hotelcode, hotelname, dmctoken, external, source, sourceid, timestamp) 
              VALUES('$token', '$hotelcode', '$hotelname', '$dmctoken', 1, '$source', '$sourceid', '".time()."')"; 
    if ($mysqli->query($sql) == true) 
{ 
    $_SESSION['hoteltoken'] = $token;
  return true;
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
  
// Close connection 
// $mysqli->close();

}



function updateExternalRooms($db, $mysqli, $rooms, $hotelcode, $hoteltoken, $hotelname){
$count = 0;
// $rooms = json_decode($rooms);
// var_dump($rooms);
// exit();
$roomno = sizeof($rooms);
// echo $roomno;
// exit();
foreach ($rooms as $key => $value) {
$roomtypeunkid = $value->roomtypeunkid;
$roomtype = $value->roomtype;
$shortcode = $value->shortcode;
$base_adult_occupancy = $value->base_adult_occupancy;
$base_child_occupancy = $value->base_child_occupancy;
$max_adult_occupancy = $value->max_adult_occupancy;
$max_child_occupancy = $value->max_child_occupancy;

$roomtoken = generateNumericOTP(8);
$sql = "INSERT INTO hotel_rooms_external_records (roomtoken, hotelid_external, hoteltoken, name, roomtypeunkid, roomtype, shortcode, base_adult_occupancy,base_child_occupancy,max_adult_occupancy,max_child_occupancy,timestamp,object) 
              VALUES('$roomtoken', '$hotelcode', '$hoteltoken', '$hotelname', '$roomtypeunkid', '$roomtype', '$shortcode', '$base_adult_occupancy', '$base_child_occupancy', '$max_adult_occupancy', '$max_child_occupancy', '".time()."', '".json_encode($value)."')"; 
    if ($mysqli->query($sql) == true)
{ 
    // return true;
    $count = ++$count;

} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  // return false;
           $mysqli->error; 
} 

}
if ($count == $roomno) {
    // code...
     return true;
}
}



function moveExternalRoom($db, $mysqli, $roomtoken, $hotelid_external, $hoteltoken, $name, $roomtypeunkid, $roomtype, $shortcode){
$sql = "INSERT INTO hotel_rooms (hotelid, room_id, roomtypeunkid, name, timestamp) 
              VALUES('$hoteltoken', '$roomtoken', '$roomtypeunkid', '$roomtype','".time()."')"; 
    if ($mysqli->query($sql) == true)
{ 
  return true;
} 
else
{ 
   // echo "ERROR: Could not able to execute $sql. ";
  return false;
           $mysqli->error; 
} 
}




function addHotelOwnerToHotel($db, $mysqli, $hoteltoken, $hotoken){

 $sql = "UPDATE hotels SET hotel_owner = '$hotoken' WHERE token='$hoteltoken'"; 
            if($mysqli->query($sql) == true){ 
    return true;
            }else{
          return false;
            }


}



function getRoles_HOTELLOWNER($mysqli) {
  $sql = "SELECT * FROM roles where role='HOTELCHAIN' "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}



function ExtHotelExists($mysqli, $usertoken, $hotelcode){
$sql = "SELECT * FROM hotels where role='HOTELCHAIN' "; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        return true;
        exit();
      }  
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}



function getDMCHotels($db, $mysqli, $token){

 try {
         $sql = "SELECT * FROM hotels_dmc_map WHERE dmctoken = '$token' GROUP BY hoteltoken ORDER BY rand()";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again..";
                    return false;
                }else{
if($stmt->rowCount() == 0){

           $stmt = null;
           $_SESSION['err'] = "No Hotel found..";
            return false;
            // code...
        }else{
            
           if($hotels = $stmt->fetchAll(PDO::FETCH_ASSOC)){

$posts_arr = array();

foreach ($hotels as $key => $value) {

    $hotelData = getHotelData ($db, $mysqli, $value['hoteltoken']);

       if($hotelData != false){
         $post_item = array(
            'hoteltoken' => $value['hoteltoken'],
            'token' => $hotelData['token'],
            'hotelname' => $hotelData['hotelname'],
            'description' => $hotelData['description'],
            'country' => $hotelData['country'],
            'city' => $hotelData['city'],
            'created' => date("d-m-Y", $hotelData['timestamp']),
            'timestamp' => $hotelData['timestamp'],
            'longitude' => $hotelData['longitude'],
            'latitude' => $hotelData['latitude']
        );
         array_push($posts_arr, $post_item);
       }else{}
    
    }
return $posts_arr;
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
$db = null;
}





function getHotelData ($db, $mysqli, $token){

 try {
         $sql = "SELECT * FROM hotels WHERE token = '$token' LIMIT 1";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again..";
                    return false;
                }else{
if($stmt->rowCount() == 0){

           $stmt = null;
           $_SESSION['err'] = "No Hotel found..";
            return false;
            // code...
        }else{
            
           if($hotels = $stmt->fetchAll(PDO::FETCH_ASSOC)){
return $hotels[0];
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }

}



function editHotel($mysqli, $hoteltoken, $hotelname, $country, $city, $longitude, $latitude){

    $sql = "UPDATE hotels SET hotelname = '$hotelname', latitude = '$latitude', longitude = '$longitude', country = '$country', city = '$city' WHERE token='$hoteltoken'"; 
            if($mysqli->query($sql) == true){ 

                return true;
                exit();

            }else{
                return false;
                exit();
            }

}



function initiateDynamicContract($mysqli, $hoteltoken, $hotelcode, $dmctoken, $hotelname, $country, $city, $timestamp, $channel){
  // code...
  $contractToken = generateAlphaNumericOTP_case(12);
  $sql = "INSERT INTO init_contract (token, type, hoteltoken, hotelcode, dmctoken,  timestamp, hotelname, country, city, channel) VALUES('$contractToken', 'dynamic', '$hoteltoken', '$hotelcode', '$dmctoken', '$timestamp', '$hotelname', '$country', '$city', '$channel')"; 
  if ($mysqli->query($sql)==true){ 
    $_SESSION['contractToken']="$contractToken";
    return true;
    exit();
  }else{ 
    return false;
    $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();

}



function getTokenFromPayoneer (){
    $curl = curl_init();

$base64 = base64_encode("XQqtdPaBw8fhflG6dEzEyA5OAo8GaWQE:neBWIwdFmTb6LUWU");
// echo $base64;
// exit;
$payload = array (
        'grant_type' => "client_credentials",
        'scope' => "read write", 'client_secret' => "neBWIwdFmTb6LUWU", 'client_id' => "XQqtdPaBw8fhflG6dEzEyA5OAo8GaWQE");

$payload = json_encode($payload);

curl_setopt_array($curl, [
  CURLOPT_URL => "https://login.sandbox.payoneer.com/api/v2/oauth2/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $payload,
  CURLOPT_HTTPHEADER => [
    "Authorization: Basic $base64",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
$output = json_decode($response);
if ($err) {
  // echo "cURL Error #:" . $err;
    return false;
} else {
  // echo $response;
if (isset($output->access_token)) {
    // code...
    return $output->access_token;
}else{
    return false;
}
}
}


function onBoardPayoneer($db, $mysqli, $usertoken){
    $userData = getUserData($db, $usertoken);
    $fname = $userData['fname'];
    $lname = $userData['lname'];
    $mail = $userData['mail'];
    $phone = $userData['phone'];
    $country = $userData['country'];
    $zip = $userData['zip'];

$payoneerToken = getTokenFromPayoneer();

    if ($payoneerToken != false) {
        // code...

// var_dump($payoneerToken);
// exit();


$payeedata = array(
  "payee_id" => "$usertoken",
  "client_session_id" => "$usertoken",
  "redirect_url" => "http://HotelsOffline.com",
  "redirect_time" => "5",
  "lock_type" => "",
  "payee_data_matching_type" => "",
  "already_have_an_account" => false,
  "language_id" => "1",
  "payout_methods" => array(
    // array(
    //   "BankTransfer"
    // )
    "BankTransfer"
  ),
   "payee" => array(
    "type" => "Individual",
    "contact" => array(
      "first_name" => "$fname",
      "last_name" => "$lname",
      "email" => "$mail",
      "date_of_birth" => "",
      "mobile" => "$phone",
      "mobile_country" => "$country",
      "phone" => "$phone",
      "phone_country" => "$country",
      "nationality" => "$country"
    ),
    "id_document" => array(
      "type" => "",
      "number" => "",
      "issue_country" => "$country",
      "name_on_id" => "",
      "expiration_date" => "",
      "IssueDate" => "",
      "first_name_in_local_language" => "",
      "last_name_in_local_language" => ""
    ),
    "address" => array(
      "address_line_1" => "$address",
      "address_line_2" => "",
      "city" => "$city",
      "state" => "$state",
      "country" => "$country",
      "zip_code" => "$zip"
    ),
    "company" => array(
      "name" => "",
      "url" => "",
      "incorporated_country" => "",
      "incorporated_state" => "",
      "incorporated_address_1" => "",
      "incorporated_address_2" => "",
      "incorporated_city" => "",
      "incorporated_zipcode" => "",
      "legal_type" => ""
    )
  ),
   "payout_method" => array(
    "type" => "BankTransfer",
    "bank_account_type" => "1",
    "country" => "US",
    "currency" => "USD",
    "bank_field_details" => array(
      array(
        "name" => "AccountNumber",
        "value" => "8276019671"
      ),
      array(
        "name" => "AccountName",
        "value" => "Ayodele Timothy"
      ),
      array(
        "name" => "BankName",
        "value" => "Access Bank"
      ),
      array(
        "name" => "RoutingNumber",
        "value" => "122105155"
      ),
      array(
        "name" => "AccountType",
        "value" => "S"
      )
    )
  )
);

$payeedata_obj = json_encode($payeedata);

        $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.sandbox.payoneer.com/v4/programs/100177440/payees/registration-link',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $payeedata_obj,
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$payoneerToken.'',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
$err = curl_error($curl);

$output = json_decode($response);
if ($err) {
  // echo "cURL Error #:" . $err;
    return false;
} else {
  // echo $response;
    // return $output;
    if (isset($output->result)) {
        // code...
        if (updateUserPayoneerToken($db, $mysqli, $usertoken, $output->result->token, $output->result->registration_link)==true) {
            // code...
            return $output;
        }else{
            $_SESSION['err'] = "Something went wrong, please try again..";
            return false;
        }
    }else{
        $_SESSION['err'] = "Could not link to Payoneer at this time, please try again";
        return false;
    }
}
    }else{
        $_SESSION['err'] = "Something went wrong at Payoneer, we would check it out now.";
        return false;
    }

}


function updateUserPayoneerToken ($db, $mysqli, $usertoken, $token, $registration_link){
 $sql = "UPDATE users SET payoneer_token='$token', payoneer_registration_link='$registration_link' WHERE token='$usertoken'"; 
            if($mysqli->query($sql) == true){ 
return true;
            }else{
return false;
            }
}




function sendMoney_payoneer($db, $mysqli, $usertoken, $wid, $amount, $currency, $description){
$payoneerToken = getTokenFromPayoneer();
    if ($payoneerToken != false) {
        $curl = curl_init();

$base64 = base64_encode("XQqtdPaBw8fhflG6dEzEyA5OAo8GaWQE:neBWIwdFmTb6LUWU");
// echo $base64;
// exit;
$payload = array (
        'Payments' => array(
            array(
              'client_reference_id' => "$wid",
              'payee_id' => "$usertoken",
              'description' => "$description",
              'currency' => "$currency",
              'amount' => "$amount"
            )
        )
      );

$payload = json_encode($payload);

// https://api.sandbox.payoneer.com/v4/programs/{program_id}/masspayouts
curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.sandbox.payoneer.com/v4/programs/100177440/masspayouts",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $payload,
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer $payoneerToken",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$output = json_decode($response);
if ($err) {
  // echo "cURL Error #:" . $err;
} else {
   if (isset($output->result)) {
   // code...
    // echo $response;
    // exit();
    updateWithdrawal($db, $mysqli, $wid, 'payoneer', 'Payment sent to Payoneer for processing', 2);

$userData = getUserData($db, $usertoken);
$email = $userData['mail'];
$subject = "HotelsOffline Payments";
$body = "Your withdraw has been sent to Payoneer for processing.";
$timestamp = time();
    mail_tb($mysqli,$email,$subject,$body,$timestamp);

  return true;
 }else{
  return false;
 }

}
    }
}



function updateWithdrawal($db, $mysqli, $wid, $type, $note, $status){
    $sql = "UPDATE withdrawals SET payout_type='$type', status= $status, note = '$note' WHERE id='$wid'"; 
            if($mysqli->query($sql) == true){ 
    return true;
            }else{
    return false;
            }
}


function confirmPayoneerPayout($db, $mysqli, $wid){
    $payoneerToken = getTokenFromPayoneer();
    if ($payoneerToken != false) {
    $curl = curl_init();
// https://api.sandbox.payoneer.com/v4/programs/{program_id}/payouts/{client_reference_id}/status
curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.sandbox.payoneer.com/v4/programs/100177440/payouts/$wid/status",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  // CURLOPT_POSTFIELDS => $payload,
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer $payoneerToken",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$output = json_decode($response);
if ($err) {
  // echo "cURL Error #:" . $err;
} else {
 if (isset($output->result)) {
   // code...

  return true;
  // echo $response;
 }else{
  return false;
  // echo $response;
 }
}
}
}



function updateUserPayoneerStatus ($db, $mysqli, $usertoken, $status){
    $sql = "UPDATE users SET payoneer_linked = $status WHERE token='$usertoken'"; 
            if($mysqli->query($sql) == true){ 
    return true;
            }else{
    return false;
            }
}




function getUserPayoneerStatus($db, $mysqli, $usertoken){
    $payoneerToken = getTokenFromPayoneer();
    if ($payoneerToken != false) {
    $curl = curl_init();
curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.sandbox.payoneer.com/v4/programs/100177440/payees/B9WYP1T4PM/status",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => $payload,
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer UZR9P67ThTwED3xA5noF3MN4RkNg",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$output = json_decode($response);
if ($err) {
  // echo "cURL Error #:" . $err;
} else {
 if (isset($output->result)) {
   // code...
  return true;
  // echo $response;
 }else{
  return false;
  // echo $response;
 }
}
}
}



function getInitContractData($db, $token){
 try {
         $sql = "SELECT * FROM init_contract where token='$token'";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $data = $package[0];
        $post_item = array(
           'id' => $data['id'],
            'token' => $data['token'],
    'dmctoken' => $data['dmctoken'],
        );
       
return $post_item;
    }else{
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
    $db = null;
}


function getContractIDData($db, $id){
try {
         $sql = "SELECT * FROM contracts where token='$token'";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $data = $package[0];
        $post_item = array(
           'id' => $data['id'],
            'token' => $data['token'],
    'dmctoken' => $data['dmctoken'],
        );
       
return $post_item;
    }else{
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
    $db = null;
}



function getContractData($db, $token){
    try {
         $sql = "SELECT * FROM init_contract where token='$token'";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $data = $package[0];
        $post_item = array(
           'id' => $data['id'],
            'token' => $data['token'],
        'dmctoken' => $data['dmctoken'],
        'type' => $data['type'],
        'hoteltoken' => $data['hoteltoken'],
        'hotelcode' => $data['hotelcode'],
        'hotelname' => $data['hotelname'],
        'city' => $data['city'],
        'country' => $data['country'],
        'timestamp' => $data['timestamp'],
        'date' => date("d-m-Y", $data['timestamp']),
        'source' => $data['channel']
        );
       
return $post_item;
    }else{
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
    $db = null;
}


function getExternalContractRooms($db, $token, $contract_token){
 try {
         $sql = "SELECT * FROM contracts where token = '$contract_token' and hoteltoken='$token' and (room_name != '0' or room_name != '') GROUP BY roomtoken ORDER by rand()";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $data = $package;
$posts_arr = array();
        foreach ($data as $key => $value) {
            // code...
        $post_item = array(
        'id' => $value['id'],
        'room_name' => $value['room_name'],
        'roomid' => $value['roomtoken'],
        'contract_token' => $contract_token
        );
array_push($posts_arr, $post_item);
        }
       
return $posts_arr;
    }else{
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
    $db = null;
}


function getExternalContractRawData($db, $token){
try {
         $sql = "SELECT * FROM ex_ezee_availability where contract_token='$token'";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $data = $package[0];

         $post_item = array(
        'id' => $data['id'],
        'hotelcode' => $data['hotel_code'],
        );
       
return $post_item;
    }else{
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
    $db = null;
}



function getRoomData_category_hotelid($db, $hotelid, $category){
    try {
         $sql = "SELECT * FROM hotel_rooms where hotelid='$hotelid' and category = '$category'";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
    $_SESSION['err'] = "Something went wrong";
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $data = $package[0];

         $post_item = array(
        'id' => $data['id'],
        'room_id' => $data['room_id'],
        );
       
return $post_item;
    }else{
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
    $db = null;
}


function getCategoryData($db, $category_id){
 try {
         $sql = "SELECT * FROM room_category where id='$category_id'";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $data = $package[0];

         $post_item = array(
        'id' => $data['id'],
        'name' => $data['category'],
        );
       
return $post_item;
    }else{
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
    $db = null;
}



function getCategoryData_byName($db, $name){
 try {
         $sql = "SELECT * FROM room_category where category='$name'";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $data = $package[0];

         $post_item = array(
        'id' => $data['id'],
        'name' => $data['category'],
        );
       
return $post_item;
    }else{
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
    $db = null;
}




function getHotelRoomCategories($db, $hoteltoken){
try {
         $sql = "SELECT * FROM hotel_rooms where hotelid='$hoteltoken' and (category != '' or category != '0') GROUP BY category ORDER by rand()";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $data = $package;
$posts_arr = array();
        foreach ($data as $key => $value) {
            // code...
        $catData = getCategoryData_byName($db, $value['category']);
        if ($catData != false) {
            // code...
            $name = $catData['name'];
        $id = $catData['id'];


        $post_item = array(
        'id' => $id,
        'category' => $name
        );

array_push($posts_arr, $post_item);

        }

        }
       
return $posts_arr;
    }else{
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
    $db = null;
}



function checkIfContractIsMapped($db, $token){
try {
         $sql = "SELECT * FROM contracts where token='$token' and mapped_room = 0";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $data = $package;
return true;
    }else{
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
    $db = null;
}


function getEzeeHotelData($hotelcode){
    $curl = curl_init();
curl_setopt_array($curl, [
  CURLOPT_URL => "https://live.ipms247.com/booking/reservation_api/listing.php?request_type=HotelList&HotelCode=$hotelcode&APIKey=983e6b30e133@9148790807c57666de-bb8c-11ea-a&language=en",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => $payload,
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer UZR9P67ThTwED3xA5noF3MN4RkNg",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if (!empty($response)) {
    // code...
    $output = json_decode($response);
    return $output;
    exit();
}else{
    return false;
}

}


function getAllUsers($db){

try {
         $sql = "SELECT * FROM users";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $data = $package;
$posts_arr = array();
        foreach ($data as $key => $value) {
           $roleData = getRoleData($db, $value['role']); 
           $post_item = array(
        'id' => $value['id'],
        'token' => $value['token'],
        'mail' => $value['mail'],
        'fname' => $value['fname'],
        'lname' => $value['lname'],
        'phone' => $value['phone'],
        'address' => $value['address'],
        'activated' => $value['activated'],
        'timestamp' => $value['timestamp'],
        'real_date' => date("d-m-Y", $value['timestamp']),
        'role' => $value['role'],
        'roleName' => $roleData['name'],
        'role_alt' => $roleData['role'],
        'country' => $value['country'],
        'city' => $value['city'],
        'state' => $value['state'],
        'zip_code' => $value['zip_code'],
        'contract_token' => $contract_token,
        'isApproved' => $value['is_approved']
        );
array_push($posts_arr, $post_item);
        }
       
return $posts_arr;
    }else{
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
    $db = null;

}



function getRoleData($db, $role){
    try {
         $sql = "SELECT * FROM roles where id='$role'";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $data = $package[0];

         $post_item = array(
        'id' => $data['id'],
        'name' => $data['name'],
        'role' => $data['role'],
        );
       
return $post_item;
    }else{
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
    $db = null;
}


function updateContractStatus($db, $mysqli, $contractToken, $status){
    $lastdate = getContractLastExpDate($db, $mysqli, $contractToken);
                $sql = "UPDATE init_contract SET status='$status', lastdate='$lastdate' WHERE token='$contractToken'"; 
            if($mysqli->query($sql) == true){ 
                return true;
            }else{
                return false;
            }
}


function getContractLastExpDate($db, $mysqli, $contracttoken){
      try {
         $sql = "SELECT * FROM contracts where token='$contracttoken' and exp_date != 0 order by exp_date DESC LIMIT 1";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $lastdate = $package[0]['exp_date'];
       
return $lastdate;
    }else{
        return 0;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return 0;
    }
    $db = null;
}



function getSelectedMapRoom($db, $hoteltoken, $contract_token, $roomtoken){
    try {
         $sql = "SELECT * FROM contracts where token = '$contract_token' and hoteltoken='$hoteltoken' and roomtoken = '$roomtoken' and mapped_room = 1 LIMIT 1";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $data = $package[0];

        $post_item = array(
        'id' => $data['id'],
        'room_name' => $data['room_name'],
        'roomid' => $data['roomtoken'],
        'contract_token' => $contract_token
        );

       
return $post_item;
    }else{
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
    $db = null;
}



function CheckForUnMappedDataFromHotelBeds($db, $mysqli){

  try {
         $sql = "SELECT * FROM ex_hotelbeds_availability where mapped = 0 LIMIT 1";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $data = $package;

        foreach ($data as $key => $value) {
            // code...
            $checkIn = strtotime($value['checkIn']);
            $checkOut = strtotime($value['checkOut']);
            $source = "hotelbeds";
            mapHotelBeds($db, $mysqli, $source, $contractName, $value['contract_token'], $value['hoteltoken'], $value['hotelcode'], $value['roomcode'], $value['hotelname'], $value['roomname'], $value['allotment'], $value['net'], $checkIn, $checkOut, $value['currency'], $value['id']);
        }

       
// return $post_item;
    }else{
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
    $db = null;
}


function mapHotelBeds($db, $mysqli, $source, $contractName, $contract_token, $hoteltoken, $hotelcode, $roomcode, $hotelname, $roomname, $allotment, $net, $checkIn, $checkOut, $currency, $id){
    $start_date = strtotime($date);
    $end_date = strtotime($date);
$timestamp = time();
$sql = "INSERT INTO contracts (source, token, hoteltoken, hotelcode, roomcode, dmctoken, room_name, availnum, price, start_date, exp_date, currency, timestamp, price_sgl, invt_room, room_category, availability_calendar_only)
              VALUES('$source','$contract_token', '$hoteltoken', '$hotelcode','$roomcode', '$dmctoken', '$roomname', '$allotment', '$net', '$checkIn', '$checkOut', '$currency', '$timestamp', '$net', '$allotment', '$roomname', 1) "; 
    if ($mysqli->query($sql) == true) 
{ 
            // return true;
   updateHotelBedsData($mysqli, $id);

            }
else
{
   // echo "ERROR: Could not able to execute $sql. ";
  // return false;
           // $mysqli->error; 
} 

}



function updateHotelBedsData($mysqli, $id){

$sql = "UPDATE ex_hotelbeds_availability SET mapped = 1 WHERE id='$id'"; 
            if($mysqli->query($sql) == true){ 
                return true;
            }else{
                return false;
            }

}




function stripeOnboardUser($db, $usertoken, $stripe){

$userData = getUserData($db, $usertoken);
    $fname = $userData['fname'];
    $lname = $userData['lname'];
    $mail = $userData['mail'];
    $phone = $userData['phone'];
    $country = $userData['country_ticker'];
    $zip = $userData['zip_code'];

if (!empty($country) and !empty($mail)) {
    // code...
 
 if ($country == "AE") {
     // code...
       $data = $stripe->accounts->create([
  'type' => 'express',
  'country' => $country,
  'email' => $mail,
  'capabilities' => [
    'card_payments' => ['requested' => true],
    'transfers' => ['requested' => true],
  ],
]);

if (isset($data->id)) {
    // code...
    return $data;
}else{
    return false;
}

 }else{
    $_SESSION['err'] = "Only users from United Arab Emirates can link to Stripe";
    return false;
 }

 }else{
    $_SESSION['err'] = "Complete your profile, before proceeding.";
    return false;
}


}



function stripeAccountLinks($db, $mysqli, $usertoken, $id, $stripe){

$data = $stripe->accountLinks->create([
  'account' => $id,
  'refresh_url' => 'https://hotelsoffline.com/reauth',
  'return_url' => 'https://hotelsoffline.com',
  'type' => 'account_onboarding',
]);

if (isset($data->expires_at)) {
    // code...
    if (updateStripeUserData($db, $mysqli, $usertoken, $data->expires_at, $data->url, $id, 1) == true) {
        // code...
        return $data;
    }else{
        return false;
    }
}

}



function updateStripeUserData($db, $mysqli, $usertoken, $expires_at, $url, $id){

$sql = "UPDATE users SET stripe_id ='$id', stripe_link = '$url', stripe_link_expire = '$expires_at', is_stripe_connected = 1 WHERE token='$usertoken'"; 
            if($mysqli->query($sql) == true){ 
                return true;
            }else{
                return false;
            }

}



function verifyUserStripeAuth($db, $mysqli, $usertoken, $stripeId, $stripe){

$data = $stripe->accounts->retrieve(
  $stripeId,
  []
);

if (isset($data->object)) {
    // code...

if (confirmStripeUSerConnect($db, $mysqli, $usertoken)==true) {
    // code...
    return true;
}else{
    return false;
}

}else{
    return false;
}

}


function confirmStripeUSerConnect($db, $mysqli, $usertoken){

$sql = "UPDATE users SET is_stripe_connected = 2 WHERE token='$usertoken'"; 
            if($mysqli->query($sql) == true){ 
                return true;
            }else{
                return false;
            }

}



function getWalletHistory($db, $usertoken){

   try {
         $sql = "SELECT * FROM wallet where usertoken = '$usertoken'";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $value = $package;
   
   $posts_arr = array();

foreach ($value as $key => $data) {
    // code...
      if(strpos($data['log'], 'withdraw') == true){
    $tab = "withdraw";
} elseif(strpos($data['log'], 'transfer') == true){
    $tab = "transfer";
}elseif(strpos($data['log'], 'withdrawal') == true){
    $tab = "withdraw";
}elseif(strpos($data['log'], 'transfer') == true){
    if ($data['type'] = "debit") {
        // code...
        $tab = "transfer";
    }elseif($data['type'] = "credit"){
        $tab = "fund";
    }
}elseif(strpos($data['log'], 'credits') == true){
    $tab = "fund";
}
        $post_item = array(
        'id' => $data['id'],
        'usertoken' => $data['usertoken'],
        'type' => $data['type'],
        'amount' => $data['amount'],
        'log' => $data['log'],
        'timestamp' => $data['timestamp'],
        'real_time' => date("d-m-Y", $data['timestamp']),
        'tab' => $tab
        );

        array_push($posts_arr, $post_item);
}
       
return $posts_arr;
    }else{
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
    $db = null;   
}



function updateUserCurrency($mysqli, $usertoken, $currency){
$sql1 = "UPDATE users SET currency = '$currency' WHERE token='$usertoken'"; 
            if($mysqli->query($sql1) == true){ 
                return true;
            }else{
                return false;
            }
}



function getCurrencyWithID($db, $id){
     try {
         $sql = "SELECT * FROM currencies where id = '$id'";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "User does not have access to admin rights on this business..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($package = $stmt->fetchAll(PDO::FETCH_ASSOC)){
        $data = $package[0];
      
        $post_item = array(
        'id' => $data['id'],
        'name' => $data['name'],
        'symbol' => $data['symbol'],
        );

       
return $post_item;
    }else{
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
    $db = null;   
}



function getThisTransactionID($mysqli, $usertoken, $timestamp){
     $sql = "SELECT * FROM wallet where usertoken='$usertoken' and timestamp='$timestamp'"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return $row['id'];
        exit();
      }  
      $res->free(); 
    }else { 
      return 0; 
      exit();
    } 
  }else {
    return 0; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}



function removeDistribution($mysqli, $did){
     $sql = "UPDATE contract_distribution SET display=0 WHERE id='$did'"; 
  if ($mysqli->query($sql)=== true){ 
    return true;
    exit();
  }else{ 
    return false;
    exit();
      $mysqli->error; 
  } 
  // Close connection 
  $mysqli->close();
}



function createContractDistribution_($mysqli, $contractToken, $country, $timestamp){
    $time = time();
    $sql = "INSERT INTO contract_distribution (contract_token, country, timestamp)
              VALUES('$contract_token', '$country', '$time') "; 
    if ($mysqli->query($sql) == true) 
{ 
         return true;

            }
else
{
  return false;
} 
}



function checkDistribution($mysqli, $contractToken, $country){
      $sql = "SELECT * FROM contract_distribution where contract_token='$contractToken' and country='$country'"; 
  if ($res = $mysqli->query($sql)) { 
    if ($res->num_rows > 0) {  
      if ($row = $res->fetch_array()){
        return true;
        exit();
      }else{
        return false;
      } 
      $res->free(); 
    }else { 
      return false; 
      exit();
    } 
  }else {
    return false; 
    exit();
    $mysqli->error; 
  } 
  $mysqli->close();
}



function adminGetHotels($db){

try {
         $sql = "SELECT * FROM hotels order by rand()";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again later..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
    $_SESSION['err'] = "No results.";
                    return false;
        }else{
     
     if($hotels = $stmt->fetchAll(PDO::FETCH_ASSOC)){
    $posts_arr = array();
foreach ($hotels as $key => $value) {
    $totalContracts = getHotelTotalContracts($db, $value['token']);
    $totalRooms = getHotelTotalRooms($db, $value['token']);
    $totalDMCs = getHotelTotalDMCs($db, $value['token']);

        $post_item = array(
            'id' => $value['id'],
            'token' => $value['token'],
            'hotelcode' => $value['hotelcode'],
            'hotelname' => $value['hotelname'],
            'description' => $value['description'],
            'location' => $value['location'],
            'country' => $value['country'],
            'totalContracts' => $totalContracts,
            'totalRooms' => $totalRooms,
            'totalDMCs' => $totalDMCs
        );
        // push to 'data'
        array_push($posts_arr, $post_item);
    }
    return $posts_arr;
    }else{
        $_SESSION['err'] = "No hotels found";
        return false;
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }

}




function getHotelTotalContracts($db, $hoteltoken){

try {
         $sql = "SELECT * FROM init_contract where hoteltoken = '$hoteltoken'";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again later..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
    $_SESSION['err'] = "No results.";
                    return false;
        }else{
     
     if($hotels = $stmt->fetchAll(PDO::FETCH_ASSOC)){
    return $stmt->rowCount();
    }else{
        $_SESSION['err'] = "No hotels found";
        return false;
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }

}



function getHotelTotalRooms($db, $hoteltoken){

try {
         $sql = "SELECT * FROM hotel_rooms where hotelid = '$hoteltoken'";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again later..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
    $_SESSION['err'] = "No results.";
                    return false;
        }else{
     
     if($hotels = $stmt->fetchAll(PDO::FETCH_ASSOC)){
    return $stmt->rowCount();
    }else{
        $_SESSION['err'] = "No hotels found";
        return false;
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
}



function getHotelTotalDMCs($db, $hoteltoken){
try {
         $sql = "SELECT * FROM hotels_dmc_map where hoteltoken = '$hoteltoken' and dmctoken != '' group by dmctoken";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again later..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
    $_SESSION['err'] = "No results.";
                    return false;
        }else{
     
     if($hotels = $stmt->fetchAll(PDO::FETCH_ASSOC)){
    return $stmt->rowCount();
    }else{
        $_SESSION['err'] = "No hotels found";
        return false;
    }

    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
}




function getAccountOwnerData($db, $token){
try {
         if ($token == null) {
             // code...
            $sql = "SELECT * FROM users where role = 2 group by token";
         }else{
            $sql = "SELECT * FROM users where token = '$token' group by token";
         }
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again later..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($users = $stmt->fetchAll(PDO::FETCH_ASSOC)){
    $posts_arr = array();
    foreach ($users as $key => $value) {
        // code...
        $data = getAccountOwnerHotelData($db, $value['token']);
        $post_item = array(
            'id' => $value['id'],
            'token' => $value['token'],
            'mail' => $value['mail'],
            'first_name' => $value['fname'],
            'last_name' => $value['lname'],
            'data' => $data
        );
        array_push($posts_arr, $post_item);
    }
return $posts_arr;
       }else{
        $_SESSION['err'] = "No hotels found";
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
}



function getAccountOwnerHotelData($db, $token){
try {
    $sql = "SELECT * FROM users where token = '$token' group by token";
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again later..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($users = $stmt->fetchAll(PDO::FETCH_ASSOC)){
    $posts_arr = array();
    foreach ($users as $key => $value) {
        // code...
        $post_item = array(
            'id' => $value['id'],
            'token' => $value['token'],
            'mail' => $value['mail'],
            'first_name' => $value['fname'],
            'last_name' => $value['lname'],
            'data' => $data
        );
        array_push($posts_arr, $post_item);
    }
return $posts_arr;
       }else{
        $_SESSION['err'] = "No hotels found";
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
}



function getDMCsData($db, $token){
try {
         if ($token == null) {
             // code...
            $sql = "SELECT * FROM users where role = 2 group by token";
         }else{
            $sql = "SELECT * FROM users where token = '$token' group by token";
         }
                $stmt = $db->connect()->prepare($sql);
                if (!$stmt->execute()) {
                    $stmt = null;
                  $_SESSION['err'] = "Something went wrong, please try again later..";
                    return false;
                }else{
if($stmt->rowCount() == 0){
                    return false;
        }else{
     if($users = $stmt->fetchAll(PDO::FETCH_ASSOC)){
    $posts_arr = array();
    foreach ($users as $key => $value) {
        // code...
        $data = getAccountOwnerHotelData($db, $value['token']);
        $post_item = array(
            'id' => $value['id'],
            'token' => $value['token'],
            'mail' => $value['mail'],
            'first_name' => $value['fname'],
            'last_name' => $value['lname'],
            'data' => $data
        );
        array_push($posts_arr, $post_item);
    }
return $posts_arr;
       }else{
        $_SESSION['err'] = "No hotels found";
        return false;
    }
    }
}
    } catch (PDOException $e) {
        $_SESSION['err'] = $e->getMessage();
  return false;
    }
}



?>