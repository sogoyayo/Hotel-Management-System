<?

$curl = curl_init();

// https://api.sandbox.payoneer.com/v4/programs/{program_id}/payees/{payee_id}/status
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
  // return true;
  echo $response;
 }else{
  // return false;
  echo $response;
 }
}

?>