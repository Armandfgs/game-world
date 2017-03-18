<?php
session_start();
require '../phpmongodb/vendor/autoload.php';

$email = $_SESSION["email"];

$client = new MongoDB\Client;

$db = $client->gameworld;

$collection = $db->accounts;


$result = $collection -> find(["email" => $email]);

foreach ($result as $entry)
{
    echo json_encode($entry);
}
