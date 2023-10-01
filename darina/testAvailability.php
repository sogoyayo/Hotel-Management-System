<?php


//  $xml = file_get_contents('xml.xml');

// $xml_parse = simplexml_load_string($xml);
// echo json_encode($xml_parse);
// echo "<pre>";
// // print_r($xml_parse);
// echo '</pre>';


// exit();


// echo "string";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://api.darinab2b.com/service_v4.asmx',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
<soap:Body>
  <CheckAvailability_ViaPropertiesIds xmlns="http://travelcontrol.softexsw.us/">
  <SecStr>#C|559341#W#274298</SecStr>
  <AccountName>DTC</AccountName>
  <UserName>XML2016Ra</UserName>
  <Password>DarinAH</Password>
  <AgentID>1701</AgentID>
  <FromDate>22/11/2022</FromDate>
  <ToDate>26/11/2022</ToDate>
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
</soap:Envelope>',
  CURLOPT_HTTPHEADER => array(
    'SOAPAction: http://travelcontrol.softexsw.us/CheckAvailability_ViaPropertiesIds',
    'Content-Type: text/xml; charset=utf-8'
  ),
));

// $response = curl_exec($curl);

// curl_close($curl);
// echo $response;





// 



$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
// echo $response;
//   $xml=simplexml_load_file($response);
// print_r($xml);
$time = time();
$filename = $time.rand().".xml";
// echo $filename;
// exit;
  $myfile = fopen($filename, "w");
  if (fwrite($myfile, $response)) {
    // code...
    if (file_exists($filename)) {
      // code...
      // $xml = simplexml_load_string($response);
      // 

      // echo "seen";
      // exit();

echo($filename);
exit();

$myfile1 = "$myfile";

// $myfile1 .= <<<'XML';
// $myfile1 .= $myfile; 

$dom = new DOMDocument();
$dom->loadXml($myfile);
$xpath = new DOMXPath($dom);
$xpath->registerNamespace('soap', 'http://schemas.xmlsoap.org/soap/envelope/');
$xpath->registerNamespace('ndfd', 'http://graphical.weather.gov/xml/DWMLgen/wsdl/ndfdXML.wsdl');

$innerXml = $xpath->evaluate(
  'string(/soap:Envelope/soap:Body/ndfd:NDFDgenResponse/dwmlOut)'
);
echo $innerXml;

exit();


$doc = new DOMDocument; 
$doc->load("$filename");

$thedocument = $doc->documentElement;

//this gives you a list of the messages
$list = $thedocument->getElementsByTagName('soap:Envelope');

var_dump($list);
exit();
      // 
  $xml = file_get_contents($filename);

$xml_parse = simplexml_load_string($xml);

// echo "<pre>";
// print_r($xml_parse);
// echo '</pre>';

    }else{
      echo "cant find $myfile - file..";
    }
    
  }else{
    echo " error saving file..content";
  }
// echo $xml->Hotel . "<br>";
// echo $xml->from . "<br>";
// echo $xml->heading . "<br>";
// echo $xml->body;

}