<?php
session_start();

if(isset($_SESSION["email"]))
{
    $order = ['productList' => $_SESSION["cartItems"],
        'email'=> $_SESSION["email"],
        'price'=> $_SESSION["total"],
        'transactionDate' => new MongoDB\BSON\UTCDateTime((new DateTime())->getTimestamp()*1000),
    ];

    require '../phpmongodb/vendor/autoload.php';
    require_once 'functions.php';

    $client = new MongoDB\Client;

    $db = $client->gameworld;

    $collection = $db->orders;

    $returnVal = $collection->insertOne($order);

    unset($_SESSION["cartItems"]);
    unset($_SESSION["cartCount"]);
    unset($_SESSION["total"]);

    echo "successful";
}else
{
    echo "noAccount";
}



