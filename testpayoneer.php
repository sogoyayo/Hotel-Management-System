<?

// https://api.sandbox.payoneer.com/v4/programs/%7b%7bprogram_id%7d%7d
// 100177440

$curl = curl_init();

// {
//   "payee_id": "test4564544",
//   "client_session_id": "sessionid0002",
//   "redirect_url": "http://partner.com",
//   "redirect_time": "5",
//   "lock_type": "",
//   "payee_data_matching_type": "",
//   "already_have_an_account": false,
//   "language_id": "1",
//   "payout_methods": [
//     "BankTransfer"
//   ],
//   "payee": {
//     "type": "Individual",
//     "contact": {
//       "first_name": "John",
//       "last_name": "Doe",
//       "email": "PayeeID031821V45ZZZ1@mailinator.com",
//       "date_of_birth": "1999-09-09",
//       "mobile": "4145551235",
//       "mobile_country": "US",
//       "phone": "4145551234",
//       "phone_country": "US",
//       "nationality": "US"
//     },
//     "id_document": {
//       "type": "SSN",
//       "number": "123456789",
//       "issue_country": "US",
//       "name_on_id": "",
//       "expiration_date": "",
//       "IssueDate": "",
//       "first_name_in_local_language": "",
//       "last_name_in_local_language": ""
//     },
//     "address": {
//       "address_line_1": "1505 Main St.",
//       "address_line_2": "",
//       "city": "Milwaukee",
//       "state": "WI",
//       "country": "US",
//       "zip_code": "53201"
//     },
//     "company": {
//       "name": "",
//       "url": "",
//       "incorporated_country": "",
//       "incorporated_state": "",
//       "incorporated_address_1": "",
//       "incorporated_address_2": "",
//       "incorporated_city": "",
//       "incorporated_zipcode": "",
//       "legal_type": ""
//     }
//   },
//   "payout_method": {
//     "type": "BankTransfer",
//     "bank_account_type": "1",
//     "country": "US",
//     "currency": "USD",
//     "bank_field_details": [
//       {
//         "name": "AccountNumber",
//         "value": "8276019671"
//       },
//       {
//         "name": "AccountName",
//         "value": "John Smith"
//       },
//       {
//         "name": "BankName",
//         "value": "Bank of Hope"
//       },
//       {
//         "name": "RoutingNumber",
//         "value": "122105155"
//       },
//       {
//         "name": "AccountType",
//         "value": "S"
//       }
//     ]
//   }
// }


// {
//     "payee_id": $usertoken,
//     "client_session_id": $usertoken,
//     "redirect_url": "http://HotelsOffline.com",
//     "redirect_time": "5",
//     "lock_type": "",
//     "payee_data_matching_type": "",
//     "already_have_an_account": true,
//     "language_id": "1",
//     "payout_methods": [
//         "BankTransfer"
//     ],
//     "payee": {
//         "type": "Individual",
//         "contact": {
//             "first_name": "$fname",
//             "last_name": "$lname",
//             "email": "$mail",
//             "date_of_birth": "",
//             "mobile": "$phone",
//             "mobile_country": "$country",
//             "phone": "$phone",
//             "phone_country": "$country",
//             "nationality": "$country"
//         },
//         "id_document": {
//             "type": "",
//             "number": "",
//             "issue_country": "$country",
//             "name_on_id": "",
//             "expiration_date": "",
//             "IssueDate": "",
//             "first_name_in_local_language": "",
//             "last_name_in_local_language": ""
//         },
//         "address": {
//             "address_line_1": "$address",
//             "address_line_2": "",
//             "city": "$city",
//             "state": "$state",
//             "country": "$country",
//             "zip_code": ""
//         },
//         "company": {
//             "name": "",
//             "url": "",
//             "incorporated_country": "",
//             "incorporated_state": "",
//             "incorporated_address_1": "",
//             "incorporated_address_2": "",
//             "incorporated_city": "",
//             "incorporated_zipcode": "",
//             "legal_type": ""
//         }
//     },
//     "payout_method": {
//         "type": "BankTransfer",
//         "bank_account_type": "1",
//         "country": "US",
//         "currency": "USD",
//         "bank_field_details": [
//             {
//                 "name": "AccountNumber",
//                 "value": ""
//             },
//             {
//                 "name": "AccountName",
//                 "value": ""
//             },
//             {
//                 "name": "BankName",
//                 "value": ""
//             },
//             {
//                 "name": "RoutingNumber",
//                 "value": ""
//             },
//             {
//                 "name": "AccountType",
//                 "value": "S"
//             }
//         ]
//     }
// }



$data = array(
  "payee_id" => "978t6gvjtimothyfneBWIwdFmTb6LUWU",
  "client_session_id" => "978t6gvjtimothyfneBWIwdFmTb6LUWU",
  "redirect_url" => "http://HotelsOffline.com",
  "redirect_time" => "5",
  "lock_type" => "",
  "payee_data_matching_type" => "",
  "already_have_an_account" => true,
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
      "first_name" => "Timothy",
      "last_name" => "Ayodele",
      "email" => "ayodeletim@gmail.com",
      "date_of_birth" => "1991-03-11",
      "mobile" => "2348037837313",
      "mobile_country" => "NG",
      "phone" => "2348037837313",
      "phone_country" => "NG",
      "nationality" => "NG"
    ),
    "id_document" => array(
      "type" => "DRIVERSLICENCE",
      "number" => "1KRFKBJK3434JK2",
      "issue_country" => "NG",
      "name_on_id" => "",
      "expiration_date" => "",
      "IssueDate" => "",
      "first_name_in_local_language" => "",
      "last_name_in_local_language" => ""
    ),
    "address" => array(
      "address_line_1" => "1 BODIJA IBADAN.",
      "address_line_2" => "",
      "city" => "IBADAN",
      "state" => "OY",
      "country" => "NG",
      "zip_code" => "53201"
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

echo json_encode($data);
exit();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.sandbox.payoneer.com/v4/programs/100177440/payees/registration-link",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer GBiWwT3Wi0o24WCNBk1lLyZujJ7M",
    "Content-Type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

?>