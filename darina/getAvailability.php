<?

$curl = curl_init();

$xml = '
<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
<soap:Body>
  <CheckAvailability_ViaPropertiesIds xmlns="http://travelcontrol.softexsw.us/">
  <SecStr>#C|559341#W#274298</SecStr>
  <AccountName>DTC</AccountName>
  <UserName>XML2016Ra</UserName>
  <Password>DarinAH</Password>
  <AgentID>1701</AgentID>
  <FromDate>20/11/2022</FromDate>
  <ToDate>21/11/2022</ToDate>
  <OccupancyID>0</OccupancyID>
  <AdultPax>4</AdultPax>
  <ChildPax>2</ChildPax>
  <ChildrenAges>
    <int>8</int>
    <int>8</int>
  </ChildrenAges>
  <ExtraBedAdult>false</ExtraBedAdult>
  <ExtraBedChild>false</ExtraBedChild>
  <Nationality_CountryID>340</Nationality_CountryID>
  <CurrencyID>1</CurrencyID>
  <MaxOverallPrice>0</MaxOverallPrice>
  <Availability>ShowAvailableOnly</Availability>
  <RoomType>0</RoomType>
  <MealPlan>0</MealPlan>
  <GetHotelImageLink>true</GetHotelImageLink>
  <GetHotelMapLink>true</GetHotelMapLink>
  <Source>0</Source>
  <LimitRoomTypesInResult>0</LimitRoomTypesInResult>
  <HotelsID_List>
    <int>1793</int>
    <int>1866</int>
    <int>287</int>
  </HotelsID_List>
  </CheckAvailability_ViaPropertiesIds>
</soap:Body>
</soap:Envelope>
';

$payload = array (
        'SecStr' => "#C|559341#W#274298",
        'AccountName' => "DTC",
        'UserName' => "XML2016Ra",
        'Password' => "DarinAH",
        'AgentID' => "1701",
        'FromDate' => "17/09/2022",
        'ToDate' => "19/09/2022",
        'OccupancyID' => 0,
        'AdultPax' => 2,
        'ChildPax' => 0,
        'ChildrenAges' => "",
        'ExtraBedAdult' => false,
        'ExtraBedChild' => false,
        'Nationality_CountryID' => "421",
        'CurrencyID' => 1,
        'MaxOverallPrice' => 0,
        'Availability' => " ShowAvailableOnly",
        'RoomType' => 0,
        'MealPlan' => 0,
        'GetHotelImageLink' => false,
        'GetHotelMapLink' => false,
        'Source' => 0,
        'LimitedRoomTypesInResult' => 0,
        'HotelsID_List' => array(
          'int' =>  39,
        )
      );
// $payload = json_encode($payload);
// $payload = json_decode($payload);
// $payload = xmlrpc_encode($payload);

// echo $payload;
// exit();

curl_setopt_array($curl, [
  CURLOPT_URL => "http://api.darinab2b.com/service_v4.asmx",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $payload,
  CURLOPT_HTTPHEADER => array(
    'SOAPAction: http://travelcontrol.softexsw.us/CheckAvailability_ViaPropertiesIds',
    'Content-Type: text/xml; charset=utf-8'
  ),
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
  // $jsondata = json_encode($response);
  // echo json_decode($jsondata);
  // $output = xmlrpc_decode($response);
  // echo $output;
}

?>