<?php
  //path to required driver
  require '../phpmongodb/vendor/autoload.php';
  //connect to Mongodb
  $client = new MongoDB\Client;
  //select a database
  $gameworld = $client ->gameworld;

  $products = $gameworld->products;

/*$image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
$sku = filter_input(INPUT_POST, 'SKU', FILTER_SANITIZE_STRING);
$productName = filter_input(INPUT_POST, 'Name', FILTER_SANITIZE_STRING);
$developer = filter_input(INPUT_POST, 'Developer', FILTER_SANITIZE_STRING);
$model = filter_input(INPUT_POST, 'Model', FILTER_SANITIZE_STRING);
$release = filter_input(INPUT_POST, 'ReleaseDate', FILTER_SANITIZE_STRING);
$platform = filter_input(INPUT_POST, 'Platform', FILTER_SANITIZE_STRING);
$category = filter_input(INPUT_POST, 'Genre', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'Description', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'Price', FILTER_SANITIZE_STRING);


$product = [
	'image' => $image,
  'SKU' => $sku,
  'Name' => $productName,
  'Developer' => $developer,
  'Model' => $model,
  'Release Date' => $release,
  'Platform' => $platform,
  'Genre' => $category,
  'Description' => $description,
  'Price' => $price 
];*/

//$id = $_GET['id'];

//$productID = array('_id' => new MongoId($id));
//$deleteID = $products->remove($productID);

$idString = $_GET["id"];

$id = new MongoDB\BSON\ObjectID( $idString );

$deleteID = $products->deleteOne(
    ['_id' => $id]
  );

header('Location: manage-products.php');
exit;