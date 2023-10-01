<?

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
  CURLOPT_POSTFIELDS =>'{
    "payee_id": "978t6gvjtimothyfneBWIwdFmTb6LUWU",
    "client_session_id": "978t6gvjtimothyfneBWIwdFmTb6LUWU",
    "redirect_url": "http://HotelsOffline.com",
    "redirect_time": "5",
    "lock_type": "",
    "payee_data_matching_type": "",
    "already_have_an_account": true,
    "language_id": "1",
    "payout_methods": [
        "BankTransfer"
    ],
    "payee": {
        "type": "Individual",
        "contact": {
            "first_name": "Timothy",
            "last_name": "Ayodele",
            "email": "ayodeletim@gmail.com",
            "date_of_birth": "1991-03-11",
            "mobile": "2348037837313",
            "mobile_country": "NG",
            "phone": "2348037837313",
            "phone_country": "NG",
            "nationality": "NG"
        },
        "id_document": {
            "type": "DRIVERSLICENCE",
            "number": "1KRFKBJK3434JK2",
            "issue_country": "NG",
            "name_on_id": "",
            "expiration_date": "",
            "IssueDate": "",
            "first_name_in_local_language": "",
            "last_name_in_local_language": ""
        },
        "address": {
            "address_line_1": "1 BODIJA IBADAN.",
            "address_line_2": "",
            "city": "IBADAN",
            "state": "OY",
            "country": "NG",
            "zip_code": "53201"
        },
        "company": {
            "name": "",
            "url": "",
            "incorporated_country": "",
            "incorporated_state": "",
            "incorporated_address_1": "",
            "incorporated_address_2": "",
            "incorporated_city": "",
            "incorporated_zipcode": "",
            "legal_type": ""
        }
    },
    "payout_method": {
        "type": "BankTransfer",
        "bank_account_type": "1",
        "country": "US",
        "currency": "USD",
        "bank_field_details": [
            {
                "name": "AccountNumber",
                "value": "8276019671"
            },
            {
                "name": "AccountName",
                "value": "Ayodele Timothy"
            },
            {
                "name": "BankName",
                "value": "Access Bank"
            },
            {
                "name": "RoutingNumber",
                "value": "122105155"
            },
            {
                "name": "AccountType",
                "value": "S"
            }
        ]
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer GBiWwT3Wi0o24WCNBk1lLyZujJ7M',
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
} else {
  echo $response;
    // return $response;
}


?>