<?php

include 'auth.php';

$client = new SoapClient("http://test.bestoftravel.cz:8080/booking/public/ws/syncLocation.wsdl");
$client->__setSoapHeaders(Array(new WsseAuthHeader('17', '881Ass963WX')));
$qqq = $client->pullLocations();

// $client = new SoapClient("http://test.bestoftravel.cz:8080/booking/public/ws/searchHotel.wsdl", array( 'trace' => 1));
// $client->__setSoapHeaders(Array(new WsseAuthHeader('17', '881Ass963WX')));

// $parameters= array(
//     'persons' => [
//         'adults' => 2,
//         'childAges' => ''
//     ],
//     'childAges'=> '',
//     'locationIds'=>'', 
//     'hotelIds'=>'', 
//     'hotelServices'=>'', 
//     'outOperatorIncID' => '981208873',
//     'dateFrom' => '',
//     'nightsDuration' => '',
//     'availableOnly' => ''
// );

echo "<pre>"; 
//print_r($qqq->location);

?>


<table border="1">
    <tr>
        <td>Name</td>
        <td>Type</td>
        <td>Id</td>
        <td>Iso</td>
        <td>Status</td>
    </tr>   
    <?php foreach($qqq->location as $item): ?>

    <tr>
        <td><?php echo $item->names->en; ?></td>
        <td><?php echo $item->type; ?></td>
        <td><?php echo $item->id; ?></td>
        <td><?php echo $item->iso; ?></td>
        <td><?php echo $item->status; ?></td>
    </tr>
    
    <?php endforeach; ?>
</table>


