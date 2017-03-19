<?php
session_start();

$sku = $_GET["p"];

for($i = 0, $len = sizeof($_SESSION["cartItems"]); $i<$len; $i++)
{
    $item = $_SESSION["cartItems"][$i];
    if (strcmp($sku, $item["sku"]) == 0)
    {
        unset($_SESSION["cartItems"][$i]);
        print_r($_SESSION["cartCount"]);
    }
}

