<?php
  	require '../php-mongodb-driver/vendor/autoload.php';

  	//this can be used to output products in shop.php
	$client = new MongoDB\Client;
	$gameworld = $client->gameworld;
	$product = $gameworld->products;

	$search = $product->find();

	foreach ($search as $document) {
	    echo '<div class="text-center"><h3>'. $document["name"] . '</h3></div>';
	}