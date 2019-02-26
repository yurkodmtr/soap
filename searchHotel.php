<?php
include 'auth.php';

$city = isset($_POST["city"]) && !empty($_POST["city"]) ? $_POST["city"] : '';
$hotelCategory = isset($_POST["hotelCategory"]) && !empty($_POST["hotelCategory"]) ? $_POST["hotelCategory"] : '';
$hotelName = isset($_POST["hotelName"]) && !empty($_POST["hotelName"]) ? $_POST["hotelName"] : '';
$checkInDate = isset($_POST["checkInDate"]) && !empty($_POST["checkInDate"]) ? $_POST["checkInDate"] : '';
$nightDuration = isset($_POST["nightDuration"]) && !empty($_POST["nightDuration"]) ? $_POST["nightDuration"] : '';
$boardType = isset($_POST["boardType"]) && !empty($_POST["boardType"]) ? $_POST["boardType"] : '';
$adults = isset($_POST["adults"]) && !empty($_POST["adults"]) ? $_POST["adults"] : '';
$children = isset($_POST["children"]) && !empty($_POST["children"]) ? $_POST["children"] : '';
$hotelName = isset($_POST["hotelName"]) && !empty($_POST["hotelName"]) ? $_POST["hotelName"] : '';


$client = new SoapClient("http://test.bestoftravel.cz:8080/booking/public/ws/searchHotel.wsdl", array( 'trace' => 1));
$client->__setSoapHeaders(Array(new WsseAuthHeader($AuthUser, $AuthPassword)));

$parameters= array(
    'outOperatorIncID' => $AuthCompanyId,
    'dateFrom' => $checkInDate,
    'nightsDuration' => $nightDuration,
    'availableOnly' => false,
    'persons' => [
        'adults' => $adults,
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
