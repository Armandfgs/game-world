<?php
session_start();


require '../phpmongodb/vendor/autoload.php';
require_once 'functions.php';

$client = new MongoDB\Client;

$db = $client->gameworld;

$collection = $db->accounts;


$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$repass = filter_input(INPUT_POST, 'repass', FILTER_SANITIZE_STRING);

$errors = [];
if($username == ''){$errors[] = 'username';}
if($password == ''){$errors[] = 'password';}
if($repass == ''){$errors[] = 'repass';}

if (strcmp($repass, $password) != 0){$errors[] = 'repass';}

if(checkAdminAccountExist($collection, $username)){$errors[] = 'username';}

if(!empty($errors))
{
    if(is_ajax_request())
    {
        $resultArray = array('errors' => $errors);
        echo json_encode($resultArray);
    }
    exit;
}

if (strcmp($password, $repass) == 0 && !checkAccountExist($collection, $username))
{
    $account = ['username' => $username,
        'password' => $password];

    $returnVal = $collection->insertOne($account);
}

if(is_ajax_request())
{
    echo json_encode(array('result' => "account added"));
}