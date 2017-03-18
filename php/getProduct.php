<?php
require '../phpmongodb/vendor/autoload.php';
require_once 'functions.php';

$client = new MongoDB\Client;

$db = $client->gameworld;

$collection = $db->products;

$sku = $_GET["p"];

$result = $collection -> find(["SKU" => $sku]);

foreach ($result as $product)
{
    if(array_key_exists('otherPlatforms', $product))
    {
        $obj = json_decode(json_encode($product["otherPlatforms"]), true);
        $product["otherPlatforms"] = $obj;
    }
    if(array_key_exists('otherEditions', $product))
    {
        $obj = json_decode(json_encode($product["otherEditions"]), true);
        $product["otherEditions"] = $obj;
    }
    echo json_encode($product);
}

