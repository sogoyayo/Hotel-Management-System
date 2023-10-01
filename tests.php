<?
header('Content-Type: application/json');

$string = <<<XML
<?xml version='1.0'?> 
<document>
 <title>Forty What?</title>
 <from>Joe</from>
 <to>Jane</to>
 <body>
  I know that's the answer -- but what's the question?
 </body>
</document>
XML;

$data2 = <<<XML
<?xml version='1.0' encoding='utf-8'?>
<soap:Envelope xmlns:soap='http://schemas.xmlsoap.org/soap/envelope/'
	xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema'>
	<soap:Body>
		<CheckAvailability_ViaPropertiesIdsResponse xmlns='http://travelcontrol.softexsw.us/'>
			<CheckAvailability_ViaPropertiesIdsResult>
				<D xmlns=''>
					<AccRates>
						<Offers />
						<Hotel>1793</Hotel>
						<RoomType>636</RoomType>
						<MealPlan>10</MealPlan>
						<RatePerNight>515.0000</RatePerNight>
						<RatePerStay>515.0000</RatePerStay>
						<Availability>1</Availability>
						<HasMealUpgrade>0</HasMealUpgrade>
						<Occupancy>7</Occupancy>
						<SourceRoomInfo />
						<RequestID>1793|636|10|7|0|515|T|F|1|0|MDAwMC41MTU=</RequestID>
						<Serial>1</Serial>
					</AccRates>
					<AccRates>
						<Offers />
						<Hotel>1793</Hotel>
						<RoomType>636</RoomType>
						<MealPlan>1</MealPlan>
						<RatePerNight>668.0000</RatePerNight>
						<RatePerStay>668.0000</RatePerStay>
						<Availability>1</Availability>
						<HasMealUpgrade>0</HasMealUpgrade>
						<Occupancy>7</Occupancy>
						<SourceRoomInfo />
						<RequestID>1793|636|1|7|0|668|T|F|1|0|MDAwMC44NjY=</RequestID>
						<Serial>2</Serial>
					</AccRates>
					<AccRates>
						<Offers />
						<Hotel>1793</Hotel>
						<RoomType>636</RoomType>
						<MealPlan>8</MealPlan>
						<RatePerNight>821.0000</RatePerNight>
						<RatePerStay>821.0000</RatePerStay>
						<Availability>1</Availability>
						<HasMealUpgrade>0</HasMealUpgrade>
						<Occupancy>7</Occupancy>
						<SourceRoomInfo />
						<RequestID>1793|636|8|7|0|821|T|F|1|0|MDAwMC4xMjg=</RequestID>
						<Serial>3</Serial>
					</AccRates>
					<AccRates>
						<Offers />
						<Hotel>1793</Hotel>
						<RoomType>636</RoomType>
						<MealPlan>10</MealPlan>
						<RatePerNight>593</RatePerNight>
						<RatePerStay>593</RatePerStay>
						<Availability>1</Availability>
						<HasMealUpgrade>0</HasMealUpgrade>
						<Occupancy>7</Occupancy>
						<SourceRoomInfo />
						<RequestID>1793|636|10|7|4|593|T|F|1|0|Mzk1</RequestID>
						<Serial>5</Serial>
					</AccRates>
					<AccRates>
						<Offers />
						<Hotel>1793</Hotel>
						<RoomType>636</RoomType>
						<MealPlan>1</MealPlan>
						<RatePerNight>721</RatePerNight>
						<RatePerStay>721</RatePerStay>
						<Availability>1</Availability>
						<HasMealUpgrade>0</HasMealUpgrade>
						<Occupancy>7</Occupancy>
						<SourceRoomInfo />
						<RequestID>1793|636|1|7|4|721|T|F|1|0|MTI3</RequestID>
						<Serial>6</Serial>
					</AccRates>
					<AccRates>
						<Offers />
						<Hotel>1793</Hotel>
						<RoomType>636</RoomType>
						<MealPlan>8</MealPlan>
						<RatePerNight>874</RatePerNight>
						<RatePerStay>874</RatePerStay>
						<Availability>1</Availability>
						<HasMealUpgrade>0</HasMealUpgrade>
						<Occupancy>7</Occupancy>
						<SourceRoomInfo />
						<RequestID>1793|636|8|7|4|874|T|F|1|0|NDc4</RequestID>
						<Serial>7</Serial>
					</AccRates>
					<Hotels>
						<HotelID>1793</HotelID>
						<Name>TEST 4</Name>
						<Maplink />
						<LargeImgLink>https://images.darinab2b.com/ShowImg.aspx?params=dtc_1793_0_True_False_22
						</LargeImgLink>
						<SmallImgLink>https://images.darinab2b.com/ShowImg.aspx?params=dtc_1793_0_True_True_22
						</SmallImgLink>
					</Hotels>
					<RoomTypes>
						<RoomTypeID>636</RoomTypeID>
						<RoomTypeName>TWO BEDROOM</RoomTypeName>
					</RoomTypes>
				</D>
			</CheckAvailability_ViaPropertiesIdsResult>
		</CheckAvailability_ViaPropertiesIdsResponse>
	</soap:Body>
</soap:Envelope>
XML;

// $xml = simplexml_load_string($data2);
// $xml = new SimpleXMLElement($data2);
// print_r($xml);

// $document = new DOMDocument();
// $document->loadXML($data2);
// $xpath = new DOMXpath($document);

// $items = [];
// // iterate the Table nodes
// foreach ($xpath->evaluate('//NewDataSet/Table') as $tableNode) {
//     $items[] = [
//         // read CMan_Code as string 
//         'code' => trim($xpath->evaluate('string(CMan_Code)', $tableNode)),
//         // read CMan_Name as string 
//         'name' => trim($xpath->evaluate('string(CMan_Name)', $tableNode))
//     ];
// }

// var_dump($items);

// // encode the array variable as JSON
// var_dump(json_encode($items, JSON_PRETTY_PRINT));


// $apns = new SimpleXMLElement($string);

// $json = [
//     'apns' => []
// ];
// foreach ($apns->item as $item) {
//     $json['apns'][] = ['apn' => (string)$item->apn]; 
// }

// echo json_encode($json, JSON_PRETTY_PRINT);


$xml = simplexml_load_string($string);
$xml = new SimpleXMLElement($string);
print_r($data2);


?>