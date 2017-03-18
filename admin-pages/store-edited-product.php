<?php
  //path to required driver
  require '../phpmongodb/vendor/autoload.php';
  //connect to Mongodb
  $client = new MongoDB\Client;
  //select a database
  $gameworld = $client ->gameworld;

  $products = $gameworld->products;

$image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
$sku = filter_input(INPUT_POST, 'sku', FILTER_SANITIZE_STRING);
$productName = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$developer = filter_input(INPUT_POST, 'developer', FILTER_SANITIZE_STRING);
$model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
$release = filter_input(INPUT_POST, 'releaseDate', FILTER_SANITIZE_STRING);
$platform = filter_input(INPUT_POST, 'platform', FILTER_SANITIZE_STRING);
$category = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);


$product = [
	'image' => $image,
  'sku' => $sku,
  'name' => $productName,
  'developer' => $developer,
  'model' => $model,
  'releaseDate' => $release,
  'platform' => $platform,
  'genre' => $category,
  'description' => $description,
  'price' => $price 
];

//$filter=array('_id' => new MongoID(['id'] ));
//$update=array('$set'=>$product);
//$products->update($filter,$update);
$id = $_GET['id'];

//$filter=array('_id' => $id);
//$update=array('$set'=>$product);
//$products->updateOne($filter,$update);

$updateResult = $products -> replaceOne(
    ['_id' => $id],
    ['set' => [$product]]
  );
//$products ->updateOne(['_id' => new \MongoDB\BSON\ObjectID('58cc137df8a2f50c78004352')], ['$set' => [$product]]);

header('Location: manage-products.php');
exit;