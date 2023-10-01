<?

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
} else {
  echo $response;
  // echo $output->access_token;
}

?>