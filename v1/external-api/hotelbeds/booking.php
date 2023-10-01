<?

// {
//   "holder": {
//     "name": "HolderFirstName",
//     "surname": "HolderLastName"
//   },
//   "rooms": [
//     {
//       "rateKey": "20190315|20190316|W|1|311|DBT.ST|PVP-SHORTSTAY|AI||1~2~0||N@08870BAE87754721542353710729AAES00000010000000007221346",
//       "paxes": [
//         {
//           "roomId": 1,
//           "type": "AD",
//           "name": "First Adult Name",
//           "surname": "Surname"
//         },
//         {
//           "roomId": 1,
//           "type": "AD",
//           "name": "Second Adult Name",
//           "surname": "Surname"
//         }
//       ]
//     }
//   ],
//   "clientReference": "IntegrationAgency",
//   "remark": "Booking remarks are to be written here.",
//   "tolerance": 2
// }



$curl = curl_init();
$hash = hash('sha256', "7307dd75b4df5f0269b5437df54811c33d048d8ae1".time()."");
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.test.hotelbeds.com/hotel-api/1.0/hotels',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "holder": {
    "name": "HolderFirstName",
    "surname": "HolderLastName"
  },
  "rooms": [
    {
      "rateKey": "20221123|20221125|W|1|264|DUS.SU-VM|ID_B2B_59|RO|B2BXXXX|1~2~0||N@06~~21d6f~1336912362~N~~~NOR~EF37AB210381472166924291477500AAUK0000001000100010521d6f",
      "paxes": [
        {
          "roomId": DUS.SU-VM,
          "type": "RECHECK",
          "name": "Second Adult Name",
          "surname": "Surname"
        }
      ]
    }
  ],
  "clientReference": "IntegrationAgency",
  "remark": "Booking remarks are to be written here.",
  "tolerance": 2
}',
  CURLOPT_HTTPHEADER => array(
    'Api-key: 7307dd75b4df5f0269b5437df54811c3',
    "X-Signature: $hash",
    'Accept: application/json',
    'Accept-Encoding: gzip',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>