<?php
session_start();

$_SESSION["total"] = 0;

foreach ($_SESSION["cartItems"] as $item)
{
    $_SESSION["total"] += $item["subtotal"];
}
echo $_SESSION["total"];