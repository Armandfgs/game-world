<?php
session_start();

$quantity = $_GET["q"];
$_SESSION["total"] = 0;
$subtotal = 0;
$result = ['sku' => $sku = $_GET["p"],
                'subtotal' => 0,
                'total' => 0];

foreach ($_SESSION["cartItems"] as $item)
{
    if(strcmp($item["sku"], $result['sku']))
    {
        $subtotal = $quantity * $item["price"];
        $item["subtotal"] = $result['subtotal'] ;
        print_r($item["price"]);
    }
    print_r($subtotal);
    print_r($result["subtotal"]);
    $_SESSION["total"] += $item["subtotal"];
}

$result['total'] = $_SESSION["total"];

echo json_encode($result);