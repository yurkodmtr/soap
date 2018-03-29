<?php

include 'auth.php';



$client = new SoapClient("http://test.bestoftravel.cz:8080/booking/public/ws/syncLocation.wsdl");
$client->__setSoapHeaders(Array(new WsseAuthHeader('17', '881Ass963WX')));
$qqq = $client->pullLocations();

echo json_encode($qqq);
die();
?>



