<?

$curl = curl_init();

$base64 = base64_encode("XQqtdPaBw8fhflG6dEzEyA5OAo8GaWQE:neBWIwdFmTb6LUWU");
// echo $base64;
// exit;
$payload = array (
        'Payments' => array(
            array(
              'client_reference_id' => "1",
              'payee_id' => "B9WYP1T4PM",
              'description' => "Tests",
              'currency' => "USD",
              'amount' => "2.0"
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
  // return true;
  echo $response;
 }else{
  // return false;
  echo $response;
 }
}

?>