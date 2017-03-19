<?php
session_start();

$sku = $_GET["p"];

if (isset($_SESSION["cartItems"])) {
    for ($i = 0; $i < sizeof($_SESSION["cartItems"]); $i++) {
        $item = $_SESSION["cartItems"][$i];
        if (strcmp($sku, $item["sku"]) == 0) {
            array_splice($_SESSION["cartItems"], $i, 1);
            $_SESSION["cartCount"] = sizeof($_SESSION["cartItems"]);

            if (!isset($_SESSION["cartItems"]) || empty($_SESSION["cartItems"])) {
                unset($_SESSION["cartItems"]);
                unset($_SESSION["cartCount"]);
                unset($_SESSION["total"]);
            }

        }
    }
}


