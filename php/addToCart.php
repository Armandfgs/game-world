<?php
session_start();
require '../phpmongodb/vendor/autoload.php';
require_once 'functions.php';

if (!isset($_SESSION["cartItems"]))
{
    $_SESSION["cartItems"] = array();
    $_SESSION["total"] = 0;
}

$client = new MongoDB\Client;

$db = $client->gameworld;

$collection = $db->products;

$sku = $_GET["p"];

$result = $collection -> find(["sku" => $sku]);

foreach ($result as $product)
{
    $_SESSION["cartItems"] [] =  ['sku' => $product["sku"],
                    'name' => $product["name"],
                    'platform' => $product["platform"],
                    'quantity' => 1,
                    'price' => $product["price"],
                    'subtotal' => $product["price"]
    ];

    $_SESSION["total"] += $product["price"];
}

echo sizeof($_SESSION["cartItems"]);
