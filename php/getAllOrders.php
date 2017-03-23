<?php

require '../phpmongodb/vendor/autoload.php';

$client = new MongoDB\Client;

$db = $client->gameworld;

$collection = $db->orders;

$orders = [];

$result = $collection -> find([],["sort"=>["transactionDate" => -1]]);

foreach ($result as $entry) {

    $utcdatetime = new MongoDB\BSON\UTCDateTime($entry["transactionDate"]);
    $datetime = $utcdatetime->toDateTime();
    $entry["transactionDate"] = $datetime->format('d-m-y');

    $obj = json_decode(json_encode($entry["productList"]), true);
    $entry["productList"] = $obj;

    $orders[] = $entry;
}

echo json_encode($orders);