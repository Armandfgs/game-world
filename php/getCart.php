<?php
session_start();

if (isset($_SESSION["cartItems"]))
{
    echo json_encode($_SESSION["cartItems"]);
}else
{
    echo "empty";
}
