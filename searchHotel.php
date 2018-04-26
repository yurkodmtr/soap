<?php
include 'auth.php';

$city = isset($_POST["city"]) && !empty($_POST["city"]) ? $_POST["city"] : '';
$checkInDate = isset($_POST["checkInDate"]) && !empty($_POST["checkInDate"]) ? $_POST["checkInDate"] : '';

$client = new SoapClient("http://test.bestoftravel.cz:8080/booking/public/ws/searchHotel.wsdl", array( 'trace' => 1));
$client->__setSoapHeaders(Array(new WsseAuthHeader('17', '881Ass963WX')));

$parameters= array(
    'outOperatorIncID' => '981208873',
    'dateFrom' => $checkInDate,
    'nightsDuration' => 5,
    'availableOnly' => false,
    'persons' => [
        'adults' => 1,
        'childAges' => [11]
    ],    
    'locationIds'=>[$city], 
    'hotelIds'=>[], 
    'hotelServices'=> []    
);

$data = json_encode($client->hotelSearchStep1($parameters));

echo $data;
die();

?>
