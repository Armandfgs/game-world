<?php
require '../phpmongodb/vendor/autoload.php';

$client = new MongoDB\Client;

$db = $client->gameworld;

$collection = $db->accounts;


$result = $collection -> find(["username" => ['$exists' => true]]);

$list = [];
foreach ($result as $user)
{
    $list[] = $user;
}

echo json_encode($list);