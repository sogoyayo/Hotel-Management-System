<?
// 3d048d8ae1
// 7307dd75b4df5f0269b5437df54811c3

// "hotel": [
        //     77,
        //     168,
        //     264,
        //     265,
        //     297,
        //     311
        // ]

                // "13619",
                // "12908",
                // "88115",
                // "883450",
                // "884325",
                // "884480",
                // "884533",
                // "884910",
                // "885107",
                // "885108",
                // "885286",
                // "886695",
                // "887191",
                // "12905"


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
    "stay": {
        "checkIn": "2022-11-23",
        "checkOut": "2022-11-25"
    },
    "occupancies": [
        {
            "rooms": 1,
            "adults": 2,
            "children": 0
        }
    ],
    "hotels": {
        "hotel": [
            264
        ]
    }
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