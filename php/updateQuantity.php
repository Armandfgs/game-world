<?php
session_start();

$sku = $_GET["p"];
$quantity = $_GET["q"];

for ($i = 0; $i < sizeof($_SESSION["cartItems"]); $i++)
{
    if (strcmp($sku, $_SESSION["cartItems"][$i]["sku"]) == 0)
    {
        $_SESSION["cartItems"][$i]["quantity"] = $quantity;
        $_SESSION["cartItems"][$i]["subtotal"] = $_SESSION["cartItems"][$i]["quantity"] * $_SESSION["cartItems"][$i]["price"];

        $_SESSION["total"] = 0;

        foreach ($_SESSION["cartItems"] as $item)
        {
            $_SESSION["total"] += $item["subtotal"];
        }

        $result = ["sku" => $sku,
                    "subtotal" => $_SESSION["cartItems"][$i]["subtotal"],
                    "total" => $_SESSION["total"]];

        echo json_encode($result);

    }
}
