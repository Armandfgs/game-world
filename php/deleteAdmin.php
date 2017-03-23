<?php
require '../phpmongodb/vendor/autoload.php';

$username = $_GET["a"];

$bulk = new MongoDB\Driver\BulkWrite;
$bulk->delete(['username' => $username], ['limit' => 1]);

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
$result = $manager->executeBulkWrite('gameworld.accounts', $bulk, $writeConcern);


