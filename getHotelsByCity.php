<?php
include 'auth.php';

$id = isset($_POST["id"]) && !empty($_POST["id"]) ? $_POST["id"] : '';

$client = new SoapClient("http://test.bestoftravel.cz:8080/booking/public/ws/syncHotel.wsdl");
$client->__setSoapHeaders(Array(new WsseAuthHeader($AuthUser, $AuthPassword)));

$parameters= array(
    'locationId' => $id 
);

$data = json_encode($client->pullHotels($parameters));

echo $data;
die();

?>